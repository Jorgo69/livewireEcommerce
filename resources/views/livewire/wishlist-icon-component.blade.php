<div class="header-action-icon-2">
    <a href="{{ route('shop.wishlist')}}">
        <img class="svgInject" alt="Wishlist" src="{{ asset('assets/imgs/theme/icons/icon-heart.svg')}}">
        @if (Cart::instance('whishlist')->count() > 0)
            <span class="pro-count blue"> {{ Cart::instance('whishlist')-> count() }} </span>
        @endif
    </a>
</div>