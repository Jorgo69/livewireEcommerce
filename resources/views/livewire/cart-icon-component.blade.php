<div class="header-action-icon-2">
    <a class="mini-cart-icon" href="{{ route('shop.cart')}}">
        <img alt="Surfside Media" src="{{asset('assets/imgs/theme/icons/icon-cart.svg')}}">
        <span class="pro-count blue">
            @if (Cart::instance('cart')->count() > 0)
            {{ Cart::instance('cart')->count() }}
            @else
                {{ __(' 0 ')}}
            @endif    
        </span>
    </a>

    @if (Cart::instance('cart')->count() > 0)
    
    <div class="cart-dropdown-wrap cart-dropdown-hm2">
        <ul>
            @foreach (Cart::instance('cart')->content() as $Item)
            <li>
                <div class="shopping-cart-img">
                    <a href="{{ route('details.products', ["slug"=>$Item->model->slug])}}"><img alt="{{ $Item->model->name}}" src="{{ asset('assets/imgs/shop/product-') }}{{$Item->model->id}}-2.jpg"></a>
                </div>
                <div class="shopping-cart-title">
                    <h4><a href="{{ route('details.products', ["slug"=>$Item->model->slug])}}">{{ substr($Item->model->name, 0, 20) }} ...</a></h4>
                    <h4><span>{{ $Item->qty}} × </span>${{ $Item->model->regular_price}}</h4>
                </div>
                <div class="shopping-cart-delete">
                    <a href="#"><i class="fi-rs-cross-small"></i></a>
                </div>
            </li>
            @endforeach
        </ul>
        <div class="shopping-cart-footer">
            <div class="shopping-cart-total">
                <h4>Total <span>${{ Cart::instance('cart')->total()}}</span></h4>
            </div>
            <div class="shopping-cart-button">
                <a href="{{ route('shop.cart')}}" class="outline">View cart</a>
                <a href="checkout.html">Checkout</a>
            </div>
        </div>
    </div>
    
    @endif

</div>