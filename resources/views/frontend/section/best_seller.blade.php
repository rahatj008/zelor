
<section class="shop" style="background:#404040;">
    <div class="Container">
        <div class="section-title">
            <div class="section-title-left">
                <div class="title-left-content">
                    <h3 style="color: white;">{{@frontend_section_data($best_shops_section->value,'heading')}} </h3>
                    <p style="color: white;">{{@frontend_section_data($best_shops_section->value,'sub_heading')}}</p>
                </div>
            </div>
            <div class="section-title-right">
               <a href="{{route('shop')}}" class="view-more-btn" style="color: white !important;border: 0.1rem solid white !important;">
                  {{translate('View More')}}
                </a>
            </div>
        </div>

        <div class="row g-4">
            @forelse($bestsellers   as $key => $seller)
                @if($seller->sellerShop)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="shop-item">
                            <div class="shop-thumbnail">
                                <a href="{{route('seller.store.visit',[make_slug($seller->sellerShop->name), $seller->id])}}">
                                    <img src="{{show_image(file_path()['shop_first_image']['path'].'/'.@$seller->sellerShop->shop_first_image,file_path()['shop_first_image']['size'])}}" alt="{{@$seller->sellerShop->shop_first_image}} ?v={{ rand() }}" style="width: 100%; height: 200px; object-fit: cover; display: block;">
                                </a>
                                <div class="shop-logo">
                                    <img src="{{show_image(file_path()['shop_logo']['path'].'/'.@$seller->sellerShop->shop_logo,file_path()['shop_logo']['size'])}}" alt="{{@$seller->sellerShop->shop_logo}}">
                                </div>
                              
                            </div>
                            <div class="shop-info">
                                <div class="shop-item-top">
                                    <div class="ratting">
                                        @php echo show_ratings($seller->rating ? $seller->rating :0 ) @endphp
                                    </div>
                                    <a href="{{route('user.seller.chat.list' , ['seller_id' => @$seller->id])}}" class="chat-btn"><i class="fa-brands fa-rocketchat"></i>
                                    </a>
                                    <div class="shop-content">
                                        <h5>{{$seller->sellerShop->name}}</h5>
                                        <div class="shop-follower">
                                            <span>
                                            {{ $seller->product->count() }}
                                            </span>
                                            {{translate('Products')}}
                                        </div>

                                    </div>
                                </div>

                                <div class="shop-actions">
                                    <a href="{{route('seller.store.visit',[make_slug($seller->sellerShop->name), $seller->id])}}" class="shop-action on-active"><i class="fa-solid fa-shop"></i>
                                        {{translate('View
                                        Store')}}
                                    </a>

                                    @if(auth()->check())
                                        @if(in_array(auth()->user()->id,$seller->follow->pluck('follower_id')->toArray()))
                                            <a class="shop-action" href="{{route('user.follow', $seller->id)}}">
                                                <i class="fa-regular fa-user">
                                                </i> {{translate('Following')}}
                                            </a>
                                            @else
                                                <a class="shop-action" href="{{route('user.follow', $seller->id)}}">  <i class="fa-regular fa-user"></i>   {{translate('Follow')}}</a>
                                            @endif
                                        @else
                                        <a  class="shop-action" href="{{route('user.follow', $seller->id)}}">  <i class="fa-regular fa-user"></i>  {{translate('Follow')}}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-12">
                    @include("frontend.partials.empty",['message' => 'No product found'])
                </div>
            @endforelse
        </div>
    </div>
</section>


@if( @frontend_section_data($promo_banner->value,'position') == 'best-shops')
  @includeWhen($promo_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_banner])
@endif

@if( @frontend_section_data($promo_second_banner->value,'position') == 'best-shops')
    @includeWhen($promo_second_banner->status == '1', 'frontend.section.promotinal_banner', ['promo_banner' => $promo_second_banner])
@endif



