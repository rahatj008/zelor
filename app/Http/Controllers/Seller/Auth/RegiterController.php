<?php

namespace App\Http\Controllers\Seller\Auth;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Seller;
use App\Models\SellerShopSetting;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Http;
use App\Enums\KYCStatus;
use Illuminate\Support\Facades\DB;
use App\Models\KycLog;
use App\Rules\General\FileExtentionCheckRule;
use App\Rules\General\FileLengthCheckRule;
use Image;
use Closure;

class RegiterController extends Controller
{
    public function register()
    {

        $title = translate('Register as Seller');
        return view('seller.auth.register', compact('title'));
    }

    public function store(Request $request)
    {

        $rules =  [
            'username' => 'required|max:255|unique:sellers,username',
        	'email' => 'required|email|max:255|unique:sellers,email',
        	'password' => 'required|confirmed|min:6',
            // 'name' => 'required|max:150',
            'company_name' => 'required|max:150',
            'ssn_number' => 'required|max:150',
            'files' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10048',
        ];


        if(site_settings('strong_password') == 1){
            $rules['password']    =  ["required","confirmed",Password::min(8)
                                            ->mixedCase()
                                            ->letters()
                                            ->numbers()
                                            ->symbols()
                                            ->uncompromised()
                                     ];
        }


        if(site_settings("seller_captcha") == StatusEnum::true->status()){
            $rules['g-recaptcha-response'] = ['required' , function (string $attribute, mixed $value, Closure $fail) {
                $g_response =  Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify",[
                    "secret"=> site_settings("recaptcha_secret_key"),
                    "response"=> $value,
                    "remoteip"=> request()->ip,
                ]);
                if (!$g_response->json("success")) (translate("Recaptcha validation failed"));
            }];
        }

        $request->validate($rules);

        $seller = Seller::create([
            'username' => $request->username,
            'email' => $request->email,
            'status' => '1',
            'kyc_status' => '1',
            'password' => Hash::make($request->password),
        ]);
        SellerShopSetting::create([
        	'seller_id' => $seller->id,
        ]);
        //
        $kycLog =   DB::transaction(function() use ($request ,$seller ) {


            $request->request->add(['name'=> $request->company_name]);
            $customData = $request->only(['name', 'company_name', 'ssn_number']);
             $kycLog                  = new KycLog();
             $kycLog->seller_id       = $seller->id;
             $kycLog->status          = KYCStatus::APPROVED->value;
             $kycLog->save();
             $files =  [];
             if(isset($request['files'])){
                 foreach($request['files'] as $key => $file){

                      try{
                          $files [$key] = store_file($file,file_path()['seller_kyc']['path']);
                      }catch (\Exception $exp) {
                      
                      }
                    
                 }
             }

             if(count($files) > 0 ) $customData['files'] = $files;
             $kycLog->custom_data = $customData;
             $kycLog->save();
             return $kycLog ;
         });
        //
        Auth::guard('seller')->login($seller);
        // return redirect(route('seller.dashboard'));
         return redirect(route('seller.shop.setting'));
    }
}
