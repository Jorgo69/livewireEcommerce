
<div>
    <style>
        nav svg{
            height: 30px;
        }
        nav .hidden{
            display: block;
        }
    </style>
    <main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow">Home</a>
                    <span></span> Shop
                </div>
            </div>
        </div>
        <section class="mt-50 mb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="shop-product-fillter">
                            <div class="totall-product">
                                <p> We found <strong class="text-brand">{{$products->total()}}</strong> items in the Category <strong class="text-brand"> {{$category_name}} </strong> for you!</p>
                            </div>
                            <div class="sort-by-product-area">
                                <div class="sort-by-cover mr-10">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps"></i>Show:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$pageSize}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a type="button" class="{{$pageSize === 12 ? 'active' : ''}}" href="#" wire:click.prevent="changePageSize(12)">12</a></li>
                                            <li><a type="button" class="{{$pageSize === 15 ? 'active' : ''}}" href="#" wire:click.prevent="changePageSize(15)">15</a></li>
                                            <li><a type="button" class="{{$pageSize === 20 ? 'active' : ''}}" href="#" wire:click.prevent="changePageSize(20)">20</a></li>
                                            <li><a type="button" class="{{$pageSize === 25 ? 'active' : ''}}" href="#" wire:click.prevent="changePageSize(25)">25</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sort-by-cover">
                                    <div class="sort-by-product-wrap">
                                        <div class="sort-by">
                                            <span><i class="fi-rs-apps-sort"></i>Trier par:</span>
                                        </div>
                                        <div class="sort-by-dropdown-wrap">
                                            <span> {{$triEnCours}} <i class="fi-rs-angle-small-down"></i></span>
                                        </div>
                                    </div>
                                    <div class="sort-by-dropdown">
                                        <ul>
                                            <li><a type="button" class="{{$triEnCours == 'Par Defaut' ? 'active' : ''}}" href="#" wire:click.prevent="changeTri('Par Defaut')">Defaut</a></li>
                                            <li><a type="button" class="{{$triEnCours == 'Prix: Petit au Grand' ? 'active' : ''}}" href="#" wire:click.prevent="changeTri('Prix: Petit au Grand')">Prix: Petit au Grand</a></li>
                                            <li><a type="button" class="{{$triEnCours == 'Prix: Grand au Petit' ? 'active' : ''}}" href="#" wire:click.prevent="changeTri('Prix: Grand au Petit')">Prix: Grand au Petit</a></li>
                                            <li><a type="button" class="{{$triEnCours == 'Nouveautés' ? 'active' : ''}}" href="#" wire:click.prevent="changeTri('Nouveautés')">Nouveautés</a></li>
                                            {{-- <li><a href="#" wire:click.prevent="changeTri('Par Defaut')">Avg. Rating</a></li> --}}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row product-grid-3">
                            @php
                            $whishItems = Cart::instance('whishlist')->content()->pluck('id');
                        @endphp
                            @forelse ($products as $product)
                            <div class="col-lg-4 col-md-4 col-6 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="{{ route('details.products', ["slug"=>$product->slug])}}">
                                                <img class="default-img" src="{{ asset('assets/imgs/products')}}/{{$product->image}}" alt="{{ $product ->name}}">
                                                <img class="hover-img" src="{{ asset('assets/imgs/shop/product-') }}{{ $product->id}}-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                                @if ($whishItems->contains($product->id))
                                                <a aria-label="Remove From Wishlist" class="action-btn hover-up whishlisted" href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fi-rs-heart"></i></a>
                                                @else
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"><i class="fi-rs-heart"></i></a>
                                                @endif
                                            {{-- <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a> --}}
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop.html">Music</a>
                                        </div>
                                        <h2><a href="product-details.html">{{ $product -> name}}</a></h2>
                                        <div class="rating-result" title="90%">
                                            <span>
                                                <span>90%</span>
                                            </span>
                                        </div>
                                        <div class="product-price">
                                            <span>${{ $product -> regular_price}} </span>
                                            <span class="old-price">$245.8</span>
                                        </div>
                                        <div class="product-action-1 show">
                                            @if ($whishItems->contains($product->id))
                                            <a aria-label="Remove From Wishlist" class="action-btn hover-up whishlisted" href="#" wire:click.prevent="removeFromWishlist({{$product->id}})"><i class="fi-rs-heart"></i></a>                                                    
                                            @else
                                            <a aria-label="Add To Wishlist" class="action-btn hover-up" href="#" wire:click.prevent="addToWishlist({{$product->id}}, '{{$product->name}}', {{$product->regular_price}})"><i class="fi-rs-heart"></i></a>
                                            @endif
                                            <a aria-label="Add To Cart" class="action-btn hover-up" href="#" wire:click.prevent="store({{$product->id}}, '{{$product->name}}', {{$product->regular_price}} )"><i class="fi-rs-shopping-bag-add"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @empty
                                Rien pour le moment
                            @endforelse

                        </div>
                        <!--pagination-->
                        <div class="pagination">

  {{-- {{ $products->appends(request()->input())->links() }} --}}

                        </div>

                     
                        <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">

                            <nav aria-label="Page navigation example">
                                {{ $products->appends(request()->input())->links() }}

                                {{-- {{ $products -> links()}} --}}
                                
                                {{-- <ul class="pagination justify-content-start">
                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                    <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                                    <li class="page-item"><a class="page-link" href="#">16</a></li>
                                    <li class="page-item"><a class="page-link" href="#"><i class="fi-rs-angle-double-small-right"></i></a></li>
                                </ul> --}}
                            </nav>
                        </div>
                        
                    </div>
                    <div class="col-lg-3 primary-sidebar sticky-sidebar">
                        <div class="row">
                            <div class="col-lg-12 col-mg-6"></div>
                            <div class="col-lg-12 col-mg-6"></div>
                        </div>
                        <div class="widget-category mb-30">
                            <h5 class="section-title style-1 mb-30 wow fadeIn animated">Category</h5>
                            <ul class="categories">
                                @forelse ( $categories as $category )
                                <li><a href="{{ route('product.category', ['slug' => $category->slug])}}">{{$category ->name}}</a></li>
                            @empty
                                <li><a href="#">{{ __('Aucune Categories') }}</a></li>
                            @endforelse
                            </ul>
                        </div>
                        <!-- Product sidebar Widget -->
                        <div class="sidebar-widget product-sidebar  mb-30 p-30 bg-grey border-radius-10">
                            <div class="widget-header position-relative mb-20 pb-10">
                                <h5 class="widget-title mb-10">New products</h5>
                                <div class="bt-1 border-color-1"></div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('assets/imgs/shop/thumbnail-3.jpg') }}" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h5><a href="product-details.html">Chen Cardigan</a></h5>
                                    <p class="price mb-0 mt-5">$99.50</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:90%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('assets/imgs/shop/thumbnail-4.jpg') }}" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h6><a href="product-details.html">Chen Sweater</a></h6>
                                    <p class="price mb-0 mt-5">$89.50</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:80%"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-post clearfix">
                                <div class="image">
                                    <img src="{{ asset('assets/imgs/shop/thumbnail-5.jpg') }}" alt="#">
                                </div>
                                <div class="content pt-10">
                                    <h6><a href="product-details.html">Colorful Jacket</a></h6>
                                    <p class="price mb-0 mt-5">$25</p>
                                    <div class="product-rate">
                                        <div class="product-rating" style="width:60%"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="banner-img wow fadeIn mb-45 animated d-lg-block d-none">
                            <img src="{{ asset('assets/imgs/banner/banner-11.jpg') }}" alt="">
                            <div class="banner-text">
                                <span>Women Zone</span>
                                <h4>Save 17% on <br>Office Dress</h4>
                                <a href="shop.html">Shop Now <i class="fi-rs-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>