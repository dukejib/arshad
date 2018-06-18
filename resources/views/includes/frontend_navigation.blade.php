<div class="container animated fadeInDown">
        
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
        <div class="mx-auto order-0">
            {{-- Brand Logo --}}
        <a class="navbar-brand mx-auto" href="{{route('home') }}">
            <img src="{{ asset('/images/ribsncutslogo.png') }}" alt="" srcset="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        {{-- Right Side of Links --}}
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto nav-fill w-100">
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="fa fa-shopping-bag"></i> Shopping Bag</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" data-toggle="modal" data-target="#loginModal"><i class="fa fa-sign-in"></i> Signin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contactus')}}">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>
    

</div>