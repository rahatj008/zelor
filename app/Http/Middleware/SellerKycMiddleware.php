<?php

namespace App\Http\Middleware;

use App\Enums\StatusEnum;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as FoundationResponse ;
use Illuminate\Http\Response;
use App\Models\KycLog;

class SellerKycMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) :FoundationResponse
    {



        if((site_settings('seller_kyc_verification') == StatusEnum::true->status())){

            $seller = auth()->guard('seller')->user();
            if($request->is('api/seller/*')) $seller = auth()->guard('seller:api')->user();

            if(!$seller->kyc_status ||  $seller->kyc_status == StatusEnum::false->status()){
                if ($request->expectsJson() || $request->isXmlHttpRequest() || $request->is('api/*') ) {
                    return api([
                        'errors' => [translate('Please apply for KYC verification')]])->fails(__('response.fail'),Response::HTTP_FORBIDDEN ,6000000);
       
                }
                $kycLog = KycLog::where('seller_id',$seller->id)->first();
                if($kycLog){
                    return redirect()->route('seller.kyc.form')
                         ->with(response_status("Please wait for the admin to approve your KYC verification.",'error'));
                }
                return redirect()->route('seller.kyc.form')
                         ->with(response_status("Please apply for KYC verification",'error'));
            }
        }


        return $next($request);
    }
}
