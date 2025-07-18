<section class="pt-80" style="background:#404040;">
    <div class="Container">
        <div class="section-title">
            <div class="section-title-left">
                <div class="title-left-content">
                    <h3 style="color: white;">{{@frontend_section_data($best_selling_section->value,'heading')}} </h3>
                    <p style="color: white;">{{@frontend_section_data($best_selling_section->value,'sub_heading')}}</p>
                </div>
            </div>
            <div class="section-title-right">
                <a href="{{route('best.product')}}" style="color: white !important;border: 0.1rem solid white !important;" class="view-more-btn">
                     {{translate('View More')}}
                </a>
            </div>

        </div>

        <div class="best-selling-items">

            <div class="row g-4">
                @forelse($best_selling_products as $product)
                    <div class="col-xl-4 col-md-6">
                        <div class="best-selling-item">
                            <div class="product-img">
                                <a href="{{route('product.details',[$product->slug ? $product->slug : make_slug($product->name),$product->id])}}">
                                    <img src="{{show_image(file_path()['product']['featured']['path'].'/'.$product->featured_image,file_path()['product']['featured']['size'])}}" alt="{{$product->featured_image}}">
                                </a>
                                <div class="quick-view">
                                    <button class="quick-view-btn quick--view--product"  data-product_id="{{$product->id}}">
                                        <svg  version="1.1" width="18" height="18" x="0" y="0" viewBox="0 0 519.644 519.644"   xml:space="preserve" ><g><path d="M259.822 427.776c-97.26 0-190.384-71.556-251.854-145.843-10.623-12.839-10.623-31.476 0-44.314 15.455-18.678 47.843-54.713 91.108-86.206 108.972-79.319 212.309-79.472 321.492 0 50.828 36.997 91.108 85.512 91.108 86.206 10.623 12.838 10.623 31.475 0 44.313-61.461 74.278-154.572 145.844-251.854 145.844zm0-304c-107.744 0-201.142 102.751-227.2 134.243a2.76 2.76 0 0 0 0 3.514c26.059 31.492 119.456 134.243 227.2 134.243s201.142-102.751 227.2-134.243c1.519-1.837-.1-3.514 0-3.514-26.059-31.492-119.456-134.243-227.2-134.243z"  data-original="#000000" ></path><path d="M259.822 371.776c-61.757 0-112-50.243-112-112s50.243-112 112-112 112 50.243 112 112-50.243 112-112 112zm0-192c-44.112 0-80 35.888-80 80s35.888 80 80 80 80-35.888 80-80-35.888-80-80-80z"  data-original="#000000" ></path></g></svg>
                                        {{translate("Quick View")}}
                                    </button>
                                </div>
                                <ul class="hover-action">
                                    <li><a class="comparelist compare-btn wave-btn" data-product_id="{{$product->id}}" href="javascript:void(0)"><i class="fa-solid fa-code-compare"></i></a></li>
                                </ul>
                                @if($product->discount_percentage > 0)
                                <span class="offer-tag">-{{round($product->discount_percentage)}} %</span>
                                @endif

                            </div>
                            <div class="product-info">
                                <div class="stock-status">

                                    <div class='{{($product->stock->sum("qty")) > 0 ? "instock": "outstock"}} mt-0 mb-2'>
                                        <i class='@if(($product->stock->sum("qty")) > 0) fa-solid fa-circle-check @else fas fa-times-circle @endif'></i>
                                        <p>{{($product->stock->sum("qty")) > 0 ? translate('In Stock') :  translate('Stock out')  }}</p>
                                    </div>

                                </div>
                                <div class="priceAndRatting">
                                    <div class="ratting">
                                        @php echo show_ratings($product->review->avg('rating')) @endphp
                                    </div>
                                    <div class="product-price">

                                        @php
                                            $price      =  (@$product->stock->first()?->price ?? $product->price);
                                         
             
                                        @endphp

                                        @if(($product->discount_percentage) > 0)
                                            <span>
                                                {{short_amount(cal_discount($product->discount_percentage,$price))}}
                                            </span>

                                            <del>
                                                {{short_amount($price)}}</del>
                                        @else
                                            <span>
                                                {{short_amount($price)}}
                                            </span>

                                        @endif

                                    </div>
                                </div>
                                <h4 class="product-title">
                                    <a href="{{route('product.details',[$product->slug ? $product->slug : make_slug($product->name),$product->id])}}">{{$product->name}}</a>
                                </h4>

                                @php
                                $randNum = rand(10,100000);
                                $randNum =  $randNum."best_selling".$randNum;
                                @endphp


                                <form class="attribute-options-form-{{$randNum}}">
                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                </form>
                                <div class="product-action">
                                        <a href="javascript:void(0)"  data-product_id = '{{$randNum }}' class="buy-now addtocartbtn">
                                            <span class="buy-now-icon"><svg  version="1.1"  x="0" y="0" viewBox="0 0 511.997 511.997"   xml:space="preserve" ><g><path d="M405.387 362.612c-35.202 0-63.84 28.639-63.84 63.84s28.639 63.84 63.84 63.84 63.84-28.639 63.84-63.84-28.639-63.84-63.84-63.84zm0 89.376c-14.083 0-25.536-11.453-25.536-25.536s11.453-25.536 25.536-25.536c14.083 0 25.536 11.453 25.536 25.536s-11.453 25.536-25.536 25.536zM507.927 115.875a19.128 19.128 0 0 0-15.079-7.348H118.22l-17.237-72.12a19.16 19.16 0 0 0-18.629-14.702H19.152C8.574 21.704 0 30.278 0 40.856s8.574 19.152 19.152 19.152h48.085l62.244 260.443a19.153 19.153 0 0 0 18.629 14.702h298.135c8.804 0 16.477-6.001 18.59-14.543l46.604-188.329a19.185 19.185 0 0 0-3.512-16.406zM431.261 296.85H163.227l-35.853-150.019h341.003L431.261 296.85zM173.646 362.612c-35.202 0-63.84 28.639-63.84 63.84s28.639 63.84 63.84 63.84 63.84-28.639 63.84-63.84-28.639-63.84-63.84-63.84zm0 89.376c-14.083 0-25.536-11.453-25.536-25.536s11.453-25.536 25.536-25.536 25.536 11.453 25.536 25.536-11.453 25.536-25.536 25.536z" opacity="1" data-original="#000000" ></path></g></svg></span>
                                        {{translate('Add to cart')}}
                                        </a>
                                        @php
                                            $authUser = auth_user('web');
                                            $wishedProducts = $authUser ? $authUser->wishlist->pluck('product_id')->toArray() : [];
                                        @endphp
                                        <button data-product_id ="{{$product->id}}" class="heart-btn  wishlistitem"><i class="@if(in_array($product->id,$wishedProducts))
                                            fa-solid
                                        @else
                                            fa-regular
                                        @endif fa-heart"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        @include("frontend.partials.empty",['message' => 'No product found'])
                    </div>
                @endforelse
            </div>

        </div>

    </div>
</section>

@if( @frontend_section_data($promo_banner->value,'position') == 'best-selling-products')
  @includeWhen($promo_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_banner])
@endif

@if( @frontend_section_data($promo_second_banner->value,'position') == 'best-selling-products')
    @includeWhen($promo_second_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_second_banner])
@endif
