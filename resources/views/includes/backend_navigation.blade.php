<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    
        <a class="navbar-brand" href="{{ url('backend') }}">
                <img src="{{ asset('/images/ribsncuts-32.png') }}" alt="RibsnCuts Logo"> - Admin Panel
                {{-- {{ config('app.name', 'Laravel') }} - Admin Panel --}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
    
                </ul>
    
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('contact.index',['type' => 'Job']) }}" class="nav-link"><i class="fa fa-briefcase text-secondary"></i> Job
                                <span class="badge badge-secondary">{{ App\Contact::jobTotal() }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact.index',['type' => 'General Query']) }}" class="nav-link"><i class="fa fa-question text-warning"></i> Query
                                <span class="badge badge-warning">{{ App\Contact::queryTotal() }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact.index',['type' => 'Complain']) }}" class="nav-link"><i class="fa fa-exclamation-triangle text-danger"></i> Complains
                                <span class="badge badge-danger">{{ App\Contact::complainTotal() }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('contact.index',['type' => 'Feedback']) }}" class="nav-link"><i class="fa fa-compress text-info"></i> Feedback
                                <span class="badge badge-info">{{ App\Contact::feedbackTotal() }}</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                          document.getElementById('logout-form').submit();">
                                          <i class="fa fa-sign-out"></i>
                                          {{ __('Logout') }}
                             
                         </a>

                         <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                             @csrf
                         </form>
                        </li>
                       

                    @endguest
                </ul>
            </div>
</nav>