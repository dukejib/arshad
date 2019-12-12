<nav class="navbar is-dark" role="navigation" aria-label="main navigation">
	<div class="navbar-brand">
		<a class="navbar-item" href="{{ route('admin.dashboard') }}">
			{{-- <img src="https://bulma.io/images/bulma-logo.png" width="112" height="28"> --}}
			@fa('home','fa-fw has-text-primary')
			Admin Panel
		</a>
		{{-- Hamburger --}}
		<a role="button" class="navbar-burger burger has-text-primary" aria-label="menu" aria-expanded="false"
			data-target="mobileMenu">
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
			<span aria-hidden="true"></span>
		</a>
	</div>

	<div id="desktopMenu" class="navbar-menu">
		<div class="navbar-start">
			<a class="navbar-item">
				<span class="tag is-success is-rounded">hi</span>
				Home
			</a>
			<div class="navbar-item has-dropdwon is-hoverable">
				<a class="navbar-link">Products</a>
				<div class="navbar-dropdown">
					<a href="{{ route('product.index') }}" class="nav-item">View Products</a>
				</div>
			</div>
			@switch(\Request::route()->getName())
				@case('product.index')
					<a class="navbar-item" data-value="product" onclick="addNew(this)">@fa('plus','fa-fw has-text-success') Add New</a>
					@break
				@case('contact.index')
					<a class="navbar-item" data-value="contact" onclick="addNew(this)">@fa('plus','fa-fw has-text-success') Add New</a>
					@break
			@endswitch
		</div>

		<div class="navbar-end">
			@auth
			<div class="navbar-item">
				<a href="{{ route('contact.index',['type' => 'Job']) }}" class="nav-link  has-text-white">@fa('briefcase','fa-fw has-text-primary') Jobs</a>
				<a href="{{ route('contact.index',['type' => 'General Query']) }}" class="nav-link  has-text-white">@fa('question','fa-fw has-text-warning') Query</a>
				<a href="{{ route('contact.index',['type' => 'Complain']) }}" class="nav-link  has-text-white">@fa('exclamation-triangle','fa-fw has-text-danger') Complains</a>
				<a href="{{ route('contact.index',['type' => 'Feedback']) }}" class="nav-link  has-text-white">@fa('compass','fa-fw has-text-info') Feedback</a>
			</div>

			<div class="navbar-item has-dropdown is-hoverable">
				<a class="navbar-link">
					@fa('user','fa-fw has-text-success') {{ auth()->user()->name }}
				</a>

				<div class="navbar-dropdown">
					<a class="nav-item has-margin-left-15" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
						@fa('sign-out-alt','fa-fw has-text-danger')
						{{ __('Logout') }}
					</a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf
					</form>
				</div>
			</div>
			@endauth
		</div>

	</div>
</nav>
{{-- Mobile Menu --}}
<aside class="menu is-hidden" id="mobileMenu">
	<p class="menu-label">Overview</p>
	<ul class="menu-list">
		<li><a href="{{ route('contact.index',['type' => 'Job']) }}" class="aside-link">@fa('briefcase','fa-fw has-text-primary') Jobs</a></li>
		<li><a href="{{ route('contact.index',['type' => 'General Query']) }}" class="nav-link ">@fa('question','fa-fw has-text-warning') Query</a></li>
		<li><a href="{{ route('contact.index',['type' => 'Complain']) }}" class="nav-link ">@fa('exclamation-triangle','fa-fw has-text-danger') Complains</a></li>
		<li><a href="{{ route('contact.index',['type' => 'Feedback']) }}" class="nav-link ">@fa('compass','fa-fw has-text-info') Feedback</a></li>
	</ul>
	<p class="menu-label">Actions</p>
	<ul-menu-list>
		<li>@switch(\Request::route()->getName())
				@case('product.index')
					<a class="navbar-item" data-value="product" onclick="addNew(this)">@fa('plus','fa-fw has-text-success') Add New</a>
					@break
				@case('contact.index')
					<a class="navbar-item" data-value="contact" onclick="addNew(this)">@fa('plus','fa-fw has-text-success') Add New</a>
					@break
			@endswitch</li>
	</ul-menu-list>
	<p class="menu-label">Tables</p>
	<ul class="menu-list">
			<li><a href="{{ route('product.index') }}" class="nav-item">View Products</a></li>
	</ul>
	
</aside>
