@extends('seller.layouts.app')
@section('main_content')
	<div class="page-content">
		<div class="container-fluid">

            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">
                    {{translate('Shop Setting')}}
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{route('seller.dashboard')}}">
                            {{translate('Home')}}
                        </a></li>
                        <li class="breadcrumb-item active">
                            {{translate('Shop Settings')}}
                        </li>
                    </ol>
                </div>
            </div>

			<div class="card">
				<div class="card-header border-bottom-dashed">
					<div class="d-flex align-items-center">
						<h5 class="card-title mb-0 flex-grow-1">
							{{translate('Shop Settings')}}
						</h5>
					</div>
				</div>

				<div class="card-body">
                    <form action="{{route('seller.shop.setting.update', $shopSetting->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="border rounded p-3">
                            <h6 class="mb-3 fw-bold">
                                {{translate('Shop Information')}} <span class="text-danger" >*</span>
                            </h6>

                            <div class="row g-4">
                                <div class="col-lg-6">
                                    <label for="name" class="form-label">{{translate('Shop Name')}} <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" value="{{@$shopSetting->name}}" class="form-control" placeholder="{{translate('Enter name')}}" required>
                                </div>

                                <div class="col-lg-6">
                                    <label for="phone" class="form-label">{{translate('Shop Phone')}} <span class="text-danger"></span></label>
                                    <input type="text" name="phone" id="phone" value="{{@$shopSetting->phone}}" class="form-control" placeholder="{{translate('Enter shop phone number')}}" >
                                </div>


                                <div class="col-lg-6">
                                    <label for="whatsapp_number" class="form-label">{{translate('WhatsApp Number')}} <span class="text-danger"></span>

                                        <i class="cursor-pointer ri-information-line"  data-bs-toggle="tooltip" data-bs-placement="top" title="{{translate('The number that you want to receive whatsapp order  message (enter number with your country code)')}}"></i>

                                    </label>

                                    <input type="text" name="whatsapp_number" id="whatsapp_number" value="{{@$shopSetting->whatsapp_number}}" class="form-control" placeholder="880000XXXX" >
                                </div>



                                <div class="col-lg-6">

                                    <label for="whatsapp_order" class="form-label">{{translate('WhatsApp Order')}} <span class="text-danger"></span>

                                    </label>

                                    <select class="form-select" name="whatsapp_order" id="whatsapp_order">

                                         <option value="">
                                            {{translate('Select status')}}
                                         </option>

                                         <option {{@$shopSetting->whatsapp_order ==  App\Enums\StatusEnum::true->status() ? "selected" :""}} value="{{App\Enums\StatusEnum::true->status()}}">

                                            {{translate('Active')}}
                                         </option>
                                         <option {{@$shopSetting->whatsapp_order ==  App\Enums\StatusEnum::false->status() ? "selected" :""}} value="{{App\Enums\StatusEnum::false->status()}}">

                                            {{translate('Inactive')}}
                                         </option>



                                    </select>

                                </div>





                                <div class="col-lg-6">
                                    <label for="email" class="form-label">{{translate('Shop Email')}}</label>
                                    <input type="email" name="email" id="email" value="{{@$shopSetting->email}}" class="form-control" placeholder="{{translate('Enter shop email address')}}">
                                </div>

                                <div class="col-lg-6">
                                    <label for="address" class="form-label">{{translate('Shop Address')}}</label>
                                    <input type="text" name="address" id="address" value="{{@$shopSetting->address}}" class="form-control" placeholder="{{translate('Enter shop address')}}">
                                </div>
                               

                                <div class="col-12">
                                    <label for="short_details" class="form-label">{{translate('Shop Short Details')}}</label>
                                    <textarea class="form-control" rows="4" name="short_details" id="short_details" placeholder="{{translate('Enter short details')}}">{{@$shopSetting->short_details}}</textarea>
                                </div>
                                 <div class="col-xl-6">
                                    <div>
                                        <label for="latitude" class="form-label">
                                            {{translate('Latitude')}} <span class="text-danger" >*</span>
                                        </label>
                                        <input id="latitude"   type="text" name="latitude" class="form-control" value="{{site_settings('latitude','-33.8688')}}" readonly>
                                    </div>
                                </div>
            
                                <div class="col-xl-6">
                                    <div>
                                        <label for="longitude" class="form-label">
                                            {{translate('Longitude')}} <span class="text-danger" >*</span>
                                        </label>
                                        <input  id="longitude" type="text" name="longitude" class="form-control" value="{{site_settings('longitude','151.2195')}}" readonly>
                                    </div>
                                </div>
            
            
                                <div class="col-12">
                                   
            
                                      <input id="map-input" class="form-control mt-1 map-search-input"
                                        type="text"
                                        placeholder="{{translate('Search your loaction here')}}"/>
                              
            
            
                                        <div class="rounded w-100  mb-5 h-400"
                                             id="gmap-site-address"></div>
                                
                                </div>
                                <div class="col-xl-6 col-lg-6">
                                    <label for="seller_store_video" class="form-label">
                                        {{ translate('Store Video') }}
                                    </label>
                                
                                    <input type="file" name="seller_store_video" id="seller_store_video" class="form-control" accept="video/mp4, video/webm">
                                
                                    <div class="text-danger py-1">
                                        {{ translate('Video Size Should Be Max 5mb') }}
                                    </div>
                                    @if(isset($shopSetting->shop_video))
                                    <div class="gallery_img">
                                        {{-- <div class="logo-md"> --}}
                                            <video 
                                                width="100%" 
                                                controls 
                                                class="img-thumbnail">
                                                <source src="{{ env('APP_URL') . '/assets/shop_video/' . @$shopSetting->shop_video }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        {{-- </div> --}}
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="border rounded my-4 p-3">
                            <h6 class="mb-3 fw-bold">
                                {{translate('Logo Section')}}
                            </h6>

                            <div class="row g-4">
                                <div class="col-xl-3 col-lg-6">
                                    <label for="shop_logo" class="form-label">{{translate('Shop Logo')}}</label>
                                    <input type="file" name="shop_logo" id="shop_logo" class="form-control">
                                    <div class="text-danger py-1">{{translate('File Size')}} : {{file_path()['shop_logo']['size']}} {{translate('px')}}</div>
                                    <div class="gallery_img">
                                        <div class="gallery_img-item">
                                            <img src="{{show_image(file_path()['shop_logo']['path'].'/'.$shopSetting->shop_logo, file_path()['shop_logo']['size'])}}" alt="{{@$shopSetting->shop_logo}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6">
                                    <label for="shop_first_image" class="form-label">{{translate('Shop Image')}} </label>
                                    <input type="file" name="shop_first_image" id="shop_first_image" class="form-control" aria-describedby="featuredimageTwo">
                                    <div id="featuredimageTwo" class="text-danger py-1">{{translate('Image Size Should Be')}} {{file_path()['shop_first_image']['size']}}</div>

                                    <div class="gallery_img">
                                        <div class="gallery_img-item">
                                            <img src="{{show_image(file_path()['shop_first_image']['path'].'/'.@$shopSetting->shop_first_image ,file_path()['shop_first_image']['size'] )}}" alt="{{@$shopSetting->shop_first_image}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6">
                                    <label for="seller_site_logo" class="form-label">{{translate('Site Logo')}}

                                    </label>

                                    <input type="file" name="seller_site_logo" id="seller_site_logo" class="form-control" aria-describedby="featuredimageThree">
                                    <div id="featuredimageThree" class="text-danger py-1">{{translate('Image Size Should Be')}} {{file_path()['seller_site_logo']['size']}}</div>

                                    <div class="gallery_img">
                                        <div class="gallery_img-item">
                                            <img class="bg-dark" src="{{show_image(file_path()['seller_site_logo']['path'].'/'.$shopSetting->seller_site_logo ,file_path()['seller_site_logo']['size'])}}" alt="{{$shopSetting->seller_site_logo}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-lg-6">
                                    <label for="seller_site_logo_sm" class="form-label">{{translate('Site Logo Icon')}}

                                    </label>

                                    <input type="file" name="seller_site_logo_sm" id="seller_site_logo_sm" class="form-control">

                                    <div class="text-danger py-1">{{translate('Image Size Should Be')}} {{file_path()['seller_site_logo_sm']['size']}}</div>

                                    <div class="gallery_img">
                                        <div class="logo-md">
                                            <img src="{{show_image(file_path()['seller_site_logo']['path'].'/'.@$shopSetting->logoicon,file_path()['loder_logo']['size'])}}" alt="seller_site_logo_sm.png" class="img-thumbnail">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="text-start">
                            <button type="submit"
                                class="btn btn-success waves ripple-light"
                                id="add-btn">
                                {{translate('Submit')}}
                            </button>
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('script-push')
{{-- <script src="https://maps.googleapis.com/maps/api/js?key={{site_settings('gmap_client_key')}}&callback=loadGmap&libraries=places&v=3.49"
defer></script> --}}
<script>
    let map, marker, geocoder, debounceTimer;

    function initMap() {
      const defaultLat = parseFloat(document.getElementById('latitude').value) || -37.810272;
      const defaultLng = parseFloat(document.getElementById('longitude').value) || 144.962646;
      const defaultPosition = { lat: defaultLat, lng: defaultLng };

      geocoder = new google.maps.Geocoder();

      map = new google.maps.Map(document.getElementById("gmap-site-address"), {
        center: defaultPosition,
        zoom: 13,
      });

      marker = new google.maps.Marker({
        position: defaultPosition,
        map: map,
      });

      // Click map to update coordinates
      google.maps.event.addListener(map, 'click', function (event) {
        const latlng = event.latLng;
        marker.setPosition(latlng);
        map.panTo(latlng);

        document.getElementById('latitude').value = latlng.lat();
        document.getElementById('longitude').value = latlng.lng();

        geocoder.geocode({ location: latlng }, function (results, status) {
          if (status === 'OK' && results[0]) {
            document.getElementById('address').value = results[0].formatted_address;
          }
        });
      });

      // Address field input event with debounce
      const addressField = document.getElementById('address');
      addressField.addEventListener('input', function () {
        clearTimeout(debounceTimer);
        const address = this.value.trim();

        if (address.length >= 10) {
          debounceTimer = setTimeout(() => {
            geocodeAddress(address);
          }, 700);
        }
      });
    }

    function geocodeAddress(address) {
      if (!geocoder || !address) return;

      geocoder.geocode({ address: address }, function (results, status) {
        if (status === 'OK' && results[0]) {
          const location = results[0].geometry.location;

          map.setCenter(location);
          marker.setPosition(location);

          document.getElementById('latitude').value = location.lat();
          document.getElementById('longitude').value = location.lng();
        } else {
          console.warn('Geocoding failed: ' + status);
        }
      });
    }
  </script>

  <!--  Load Maps with async and defer -->
  <script src="https://maps.googleapis.com/maps/api/js?key={{ site_settings('gmap_client_key') }}&callback=initMap&libraries=places&v=weekly" defer></script>

@endpush
