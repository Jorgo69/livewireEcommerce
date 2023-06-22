<div>
    <style>
        nav svg{
            height: 30px;
        }
        nav .hidden{
            display: block;
        }
        .whishlisted{
            background-color: #F15412 !important;
            border: 1px solid transparent !important;
        }
        .whishlisted i{
            color: #fff !important;
        }
        .product-cart-wrap .product-action-1 button:after, .product-cart-wrap .product-action-1 a.action-btn:after {
        left: -32px;
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
                    @forelse (Cart::instance('whishlist')->content() as $wItem)
                                <div class="col-lg-3 col-md-3 col-6 col-sm-6">
                                    <div class="product-cart-wrap mb-30">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="{{ route('details.products', ["slug"=>$wItem->model->slug])}}">
                                                    <img class="default-img" src="{{ asset('assets/imgs/shop/product-') }}{{$wItem->model-> id}}-1.jpg" alt="{{ $wItem->model ->name}}">
                                                    <img class="hover-img" src="{{ asset('assets/imgs/shop/product-') }}{{ $wItem->model->id}}-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn hover-up" data-bs-toggle="modal" data-bs-target="#quickViewModal">
                                                    <i class="fi-rs-search"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn hover-up" href="wishlist.php"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn hover-up" href="compare.php"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Hot</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop.html">Music</a>
                                            </div>
                                            <h2><a href="product-details.html">{{ $wItem->model -> name}}</a></h2>
                                            <div class="rating-result" title="90%">
                                                <span>
                                                    <span>90%</span>
                                                </span>
                                            </div>
                                            <div class="product-price">
                                                <span>${{ $wItem->model -> regular_price}} </span>
                                                <span class="old-price">$245.8</span>
                                            </div>
                                            <div class="product-action-1 show">
                                                <a aria-label="Remove From Wishlist" class="action-btn hover-up whishlisted" href="#" wire:click.prevent="removeFromWishlist({{$wItem->model->id}})"><i class="fi-rs-heart"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                Rien pour le moment
                            @endforelse
                </div>
            </div>
        </section>
    </main>
</div>
