<div class="navbar-fixed">
    <nav class="transparent nav-center" style="height:180px">
        <div class="nav-wrapper transparent">
            <a href="{{route('home') }}" class="brand-logo center">
                <img src="{{ asset('/images/ribsncuts-64.png') }}" alt="RibsnCuts Logo" srcset="{{ asset('/images/ribsncuts-128.png') }} 1920w,{{ asset('/images/ribsncuts-96.png') }} 1280w,{{ asset('/images/ribsncuts-64.png') }} 768w">
            </a>
            <ul class="left hide-on-med-and-down">
                <li><a style="font-size:20px" href="{{ route('view.products',['slug' => 'Beef']) }}">Beef</a></li>
                <li><a href="{{ route('view.products',['slug' => 'Mutton']) }}">Mutton</a></li>
            </ul>
            <ul class="right hide-on-med-and-down">
                <li><a href="{{ route('cart')}}">Cart</a></li>
                <li><a href="#">Login</a></li>
            </ul>
        </div>
    </nav>
</div>


