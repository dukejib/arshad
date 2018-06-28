<div class="vertical-menu">
    <a href="#"><i class="fa fa-home"></i> Home</a>
    <a href="{{ route('dashboard')}}">Dashboard</a>
    <a href="{{ route('contact.index') }}">Contacts</a>
    <a href="{{ route('product.index') }}">Products</a>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    <a href="#">Link 4</a>
</div> 