@extends('frontend.layouts.app')
@section('content')
    @php
        $campaign_section = frontend_section('campaign');
        $todays_deal = frontend_section('todays-deals');
        $flash_deal = frontend_section('flash-deals');
        $new_arrival = frontend_section('new-arrivals');
        $digital_product_section = frontend_section('digital-products');
        $product_offer_section = frontend_section('product-offer');
        $best_selling_section = frontend_section('best-selling-products');
        $menu_category_section = frontend_section('menu-category');
        $promo_banner = frontend_section('promotional-offer');
        $promo_second_banner = frontend_section('promotional-offer-2');
        $top_category = frontend_section('top-category');
        $top_product_section = frontend_section('top-products');
        $best_shops_section = frontend_section('best-shops');
        $top_brands_sections = frontend_section('top-brands');
        $trending_sections = frontend_section('trending-products');
        $service_sections = frontend_section('service-section');
        $testimonial = frontend_section('testimonial');
    @endphp

{{--  @include('frontend.section.banner') --}}
  <div class="container-fluid hero body1 ">
            <div class="row">
              <div class="col-sm hero-col-1">
                <h1>Explore Organic <br> Wines!</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacinia,
                    nunc a condimentum sodales, neque metus vulputate neque, quis sagittis
                    elit libero id urna</p>

                    <div class="shop-container">
                    </div>
              </div>
              <div class="col-sm hero-col-2">
                <img src="{{asset('assets/images/Group 62.png')}}" alt="">
              </div>
            </div>
          </div>

  {{-- @includeWhen($service_sections->status == '1', 'frontend.section.service_section', ['service_sections' => $service_sections]) --}}


<div class="container-fluid Sec-2 body1">
    <div class="row ">
      <div class="col-sm Sec-2-col-1">
        <h1>Welcome</h1>
        <h2>We feature award-winning, estate-produced wines in a <br>
            family-owned, boutique winery.</h2>
            <img src="{{asset('assets/images/Horizontal Divider.png')}}" alt="">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam lacinia,
            nunc a condimentum sodales, neque metus vulputate neque, quis sagittis
            elit libero id urna. Fusce ultrices tellus arcu, sit amet efficitur urna
            sollicitudin in. Nullam id massa volutpat, tincidunt ipsum at, posuere
            sapien.</p>

            <button class="mt-5"><a href="{{route('todays.deal')}}?v={{ rand() }}" style="color:white;">SHOP NOW</a></button>
      </div>
      <div class="col-sm p-0 Sec-2-col-2">
        <img src="{{asset('assets/images/couple-working-farm 1.png')}}"  alt="">
      </div>
    </div>
  </div>

 
  @includeWhen($todays_deal->status == '1', 'frontend.section.today_deals', ['todays_deal' => $todays_deal])
  @includeWhen($top_category->status == '1', 'frontend.section.top_category', ['top_category' => $top_category])

  @includeWhen($campaign_section->status == '1', 'frontend.section.campaigns', ['campaigns' => $campaigns])

  @includeWhen($flash_deal->status == '1', 'frontend.section.flash_deal', ['flash_deal' => $flash_deal])

  @includeWhen($new_arrival->status == '1', 'frontend.section.new_product', ['new_arrival' => $new_arrival])

  <!--@includeWhen($digital_product_section->status == '1', 'frontend.section.digital_product', ['digital_product_section' => $digital_product_section])-->

  @includeWhen($product_offer_section->status == '1', 'frontend.section.product_offer', ['product_offer_section' => $product_offer_section])

  @includeWhen($best_selling_section->status == '1', 'frontend.section.best_selling_product', ['best_selling_section' => $best_selling_section])

  @includeWhen($menu_category_section->status == '1', 'frontend.section.menu_category', ['menu_category_section' => $menu_category_section])

  @includeWhen($top_product_section->status == '1', 'frontend.section.top_product', ['top_product_section' => $top_product_section])

  @includeWhen($best_shops_section->status == '1', 'frontend.section.best_seller', ['best_shops_section' => $best_shops_section])

  @includeWhen($top_brands_sections->status == '1', 'frontend.section.top_brand', ['top_brands_sections' => $top_brands_sections])

  @includeWhen($trending_sections->status == '1', 'frontend.section.trending_product', ['trending_sections' => $trending_sections])
  @includeWhen($testimonial->status == '1', 'frontend.section.testimonial', ['testimonial_section' => $testimonial])

  <div class="modal fade" id="testimonialModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="testimonialModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg--primary border-0 p-25">
                <h1 class="modal-title fs-5" id="testimonialModalLabel">
                    {{translate('Write Your Word')}}
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form enctype="multipart/form-data" class="review-form" method="post" action="{{route('feedback.store')}}">
                   @csrf
                    <div class="modal-body p-25">

                            <div class="mb-4">
                                <label for="author" class="fw-semibold fs-13 mb-1">
                                    {{translate('Author Name')}} <span class="text-danger">*</span>
                                </label>
                                <input required name="author" id="author" type="text" value="{{old('author')}}" placeholder="{{translate('Enter name')}}">
                            </div>
                            <div class="mb-4">
                                <label for="image" class="fw-semibold fs-13 mb-1">
                                    {{translate('Author Image')}} <span class="text-danger">*</span>
                                </label>
                                <input name="image" id="image" required  type="file">
                            </div>
                            <div class="mb-4">
                                <label for="designation" class="fw-semibold fs-13 mb-1">
                                    {{translate('Designation')}} <span class="text-danger">*</span>
                                </label>
                                <input id="designation" name="designation" value="{{old('designation')}}" type="text" placeholder='{{translate("Enter designation")}}'>
                            </div>
                            <div class="mb-4 d-block w-100">
                                <div class="rate">

                                    @for($i = 5 ; $i > 0; $i--)
                                        <input type="radio" id="star{{$i}}" name="rating" value="{{$i}}" />
                                        <label for="star{{$i}}" title="text">{{$i}} {{translate("stars")}}</label>
                                    @endfor

                                </div>
                            </div>

                            <div class="mb-4 d-block">
                                <label for="quote" class="fw-semibold fs-13 mb-1">
                                    {{translate('Review')}} <span class="text-danger">*</span>
                                </label>
                                <textarea required name="quote"  id="quote" cols="30" rows="2" placeholder="{{translate('Write Opinion')}}">{{old('quote')}}</textarea>
                            </div>

                    </div>
                    <div class="modal-footer bg--primary border-0 gap-3 py-3">
                        <button type="button" class="btn btn--close btn--modal btn-capsule" data-bs-dismiss="modal">
                             {{translate('Close')}}
                        </button>
                        <button type="submit" class="btn btn-success btn--modal">
                             {{translate("Submit")}}
                        </button>
                    </div>
            </form>
        </div>
    </div>
 </div>

@endsection





