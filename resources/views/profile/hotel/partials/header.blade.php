<header>
	<div class="ui fluid container">
		<div class="admin-body">
			<div class="cd-logo">
				<a href="{{ url('/') }}">
					<img src="{{ asset('img/logo-white.png') }}" alt="Logo">
				</a>
			</div>
			<nav class="main-nav cd-main-nav-wrapper">
				<ul class="cd-main-nav">
					@if (Auth::user()->isAdmin())
						<li>
							<a href="{{ url('profile/hotel') }}">
								<i class="chevron left icon"></i>Буудлын жагсаалт
							</a>
						</li>
					@endif
					<li>
						<a href="{{ url('admin/hotel', $hotel->id) }}">
							<i class="user icon"></i>{{ $hotel->name }}
						</a>
					</li>
                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                            <i class="power icon"></i>Гарах
                        </a>
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
				</ul>
			</nav>
			<a href="#" class="cd-nav-trigger"><span></span></a>
		</div>
	</div>
</header>
<main class="cd-main-content"></main>