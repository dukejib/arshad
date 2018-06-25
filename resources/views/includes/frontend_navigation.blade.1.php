<div class="container animated fadeInDown">
    <div class="row">
        
        {{-- Navigation Bar --}}
        <nav class="navbar navbar-expand-md">
            {{-- Left Side of Links --}}
            <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
                <ul class="navbar-nav mr-auto nav-fill w-100">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.products',['slug' => 'Beef']) }}">Beef</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.products',['slug' => 'Mutton']) }}">Mutton</a>
                    </li>
                    
                </ul>
            </div>
                
            {{-- Brand Logo --}}
            <div class="mx-auto order-0 order-sm-0">
                <a class="navbar-brand mx-auto" href="{{route('home') }}">
                    <img src="{{ asset('/images/ribsncuts-64.png') }}" alt="RibsnCuts Logo" srcset="{{ asset('/images/ribsncuts-128.png') }} 1920w,{{ asset('/images/ribsncuts-96.png') }} 1500w,{{ asset('/images/ribsncuts-64.png') }} 1280w,{{ asset('/images/ribsncuts-64.png') }} 768w">
                </a>
            </div>

            {{-- Right Side of Links --}}
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto nav-fill w-100">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i> Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> Signin</a>
                    </li>
                </ul>
            </div>
        
            {{-- Menu Toggler --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars fa-2x"></i>
            </button>
        
        </nav>
        
    </div>    
</div>