<div class="vertical-menu">
    <a><i class="fa fa-home"></i> Home</a>
    <a href="{{ route('dashboard')}}"><i class="fa fa-cog"></i> Dashboard</a>
    <a href="{{ route('contact.index',['type' => 'All']) }}"><i class="fa fa-compress text-success"></i> Contacts
        <span class="badge badge-success">{{ App\Contact::allTotal() }}</span></a>
    <a href="{{ route('product.index') }}"><i class="fa fa-product-hunt text-secondary"></i> Products
        <span class="badge badge-secondary">{{ App\Product::productTotal() }}</span></a>
    <a href="{{ route('orders',['type' => 'pending']) }}"><i class="fa fa-list text-danger"></i> Pending Orders
        <span class="badge badge-danger">{{ App\Order::pendingOrdersTotal() }}</span></a>
    <a href="{{ route('orders',['type' => 'transit']) }}"><i class="fa fa-list-ul text-warning"></i> Transit Orders
        <span class="badge badge-warning">{{ App\Order::transitOrdersTotal() }}</span></a>
    <a href="{{ route('orders',['type' => 'completed']) }}"><i class="fa fa-bars text-success"></i> Completed Orders
        <span class="badge badge-success">{{ App\Order::completedOrdersTotal() }}</span></a>
    {{-- For Logout --}}
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out"></i>
        {{ __('Logout') }}</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
   {{-- For Logout --}}
</div> 