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
            <div class="d-flex justify-content-center">
                <a class="navbar-brand mx-auto" href="{{route('home') }}">
                    <img src="{{ asset('/images/ribsncuts-64.png') }}" alt="RibsnCuts Logo" srcset="{{ asset('/images/ribsncuts-128.png') }} 1920w,{{ asset('/images/ribsncuts-96.png') }} 1280w,{{ asset('/images/ribsncuts-64.png') }} 768w">
                </a>
            </div>

            {{-- Right Side of Links --}}
            <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
                <ul class="navbar-nav ml-auto nav-fill w-100">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i> Cart</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> Login
                        </a>
                    </li>
                    @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-user"></i> Logged-in
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('profile') }}">Profile</a>
                              <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('logout')}}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          <i class="fa fa-sign-out"></i>
                          Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </div>
                      </li>
                      @endguest
                </ul>
            </div>
        
            {{-- Menu Toggler --}}
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
        
        </nav>
        
    </div>    
</div>