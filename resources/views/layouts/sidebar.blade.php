<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<a href="#" class="brand-link">
		<img src="{{URL::asset('/img/Capture.png')}}" alt="Porprov Logo" class="brand-image" />
		<span class="brand-text font-weight-light"></span>
	</a>
	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-collumn" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item" >
            	<a href="{{ route('dashboard') }}" class="nav-link {{ Route::currentRouteNamed('dashboard') ? 'active' : '' }}">
						<i class=" fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<li class="nav-item {{ (
					Route::currentRouteNamed('olahraga') || 
					Route::currentRouteNamed('cabor') || 
					Route::currentRouteNamed('caborCreate') ||
					Route::currentRouteNamed('caborStore') ||
					Route::currentRouteNamed('nomor') ||
					Route::currentRouteNamed('nomorCreate') ||
					Route::currentRouteNamed('nomorStore')
					) ? 'menu-open' : '' }}">
            		<a href="#" class="nav-link {{ (
						Route::currentRouteNamed('olahraga') || 
						Route::currentRouteNamed('cabor') || 
						Route::currentRouteNamed('caborCreate') ||
						Route::currentRouteNamed('nomor') ||
						Route::currentRouteNamed('nomorCreate') 
						) ? 'active' : '' }}">
					<i class="fa-regular fa-futbol " ></i>
						<p>Olahraga<i class="right fas fa-angle-right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ route('cabor') }}" 
							class="nav-link {{ (
								Route::currentRouteNamed('cabor') ||
								Route::currentRouteNamed('caborCreate')
								) ? 'active' : '' }}">
							<i class="ml-2 far fa-circle "></i>
							<p>Cabang Olahraga</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ route('nomor')}}" 
							class="nav-link {{ (
								Route::currentRouteNamed('nomor') ||
								Route::currentRouteNamed('nomorCreate')
								) ? 'active' : '' }}">
							<i class="ml-2 far fa-circle "></i>
							<p>Nomor</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
            		<a href="{{ route('kontingen') }}" class="nav-link {{ Route::currentRouteNamed('kontingen') ? 'active' : '' }}">
						<i class="fa-solid fa-city "></i>
						<p>Kontingen</p>
					</a>
				</li>
				<li class="nav-item ">
            		<a href="#" class="nav-link">
					<i class="fas fa-users " ></i>
						<p>Atlet<i class="right fas fa-angle-right"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="#" class="nav-link">
							<i class="ml-2 fas fa-angle-double-right "></i>
							<p>Kontingen + Cabor</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link">
							<i class="ml-2 fas fa-angle-double-right "></i>
							<p>Lengkap</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
            		<a href="#" class="nav-link">
						<i class=" fa-solid fa-calendar-days"></i>
						<p>Jadwal</p>
					</a>
				</li>
				<li class="nav-item">
            		<a href="#" class="nav-link">
						<i class=" fa-solid fa-square-poll-horizontal"></i>
						<p>Hasil</p>
					</a>
				</li>
			</ul>
		</nav>
	</div>
</aside>
