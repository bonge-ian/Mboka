<nav class="uk-background-default uk-box-shadow-small" uk-navbar>
	<div class="uk-navbar-left">
		<a class="uk-navbar-item uk-logo" href="#">
			<img data-src="https://laravel.com/img/logomark.min.svg" alt="Laravel Logo" uk-svg uk-img width="40" height="40">
		</a>

		{{-- navigation links   --}}
		<ul class="uk-navbar-nav">
			@auth
				<li class="{{ request()->routeIs('dashboard') ? 'uk-active' : '' }}">
					<a href="{{ route('dashboard') }}">Dashboard</a>
				</li>
			@endauth
		</ul>
	</div>

	<div class="uk-navbar-right">
		<ul class="uk-navbar-nav">
			<li>
				<a href="#"><span uk-icon="grid"></span></a>
				<div class="uk-navbar-dropdown uk-width-medium">
					<ul class="uk-nav uk-navbar-dropdown-nav">
						<!-- Authentication Links -->
						@guest
							<li class="{{ request()->routeIs('login') ? 'uk-active' : '' }}">
								<a href="{{ route('login') }}">
									<span uk-icon="sign-in" class="uk-margin-small-right"></span>
									{{ __('Login') }}
								</a>
							</li>

						@if (Route::has('register'))
							<li class="{{ request()->routeIs('register') ? 'uk-active' : '' }}">
								<a href="{{ route('register') }}">
									<span uk-icon="user" class="uk-margin-small-right"></span>
									{{ __('Register') }}
								</a>
							</li>
						@endif
						@else
							<li class="uk-nav-header">
								Hi, {{ Auth::user()->name }}
							</li>

							<li class="uk-nav-divider"></li>

							<li>
								<a href="/user/profile">
									<span uk-icon="user" class="uk-margin-small-right"></span>
									Profile
								</a>
							</li>

							<li>
								<a href="{{ route('logout') }}"
									onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<span uk-icon="sign-out" class="uk-margin-small-right"></span>
									Logout
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" uk-hidden>
									@csrf
								</form>
							</li>
						@endguest
					</ul>
				</div>
			</li>
		</ul>
	</div>
</nav>
