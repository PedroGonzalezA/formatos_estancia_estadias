 <!-- SideBar -->
 <section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title --> 
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				<figcaption class="text-center text-titles">{{ auth()->user()->name }}</figcaption> <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="{{ asset('icons/img/usuario.png') }}" alt="UserIcon">
					<figcaption class="text-center text-titles">{{ auth()->user()->email }}</figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<!--<li>
						<a href="#!">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>-->
					<li>
						<a href="{{ route('login.destroy') }}">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href="{{ route('inicio.index') }}">
						<i class="zmdi zmdi-home zmdi-hc-fw"></i> Inicio
					</a>
                    
				</li>
                <li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-file zmdi-hc-fw"></i> Formatos <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href="{{ route('estancia.index') }}"></i> Estancias</a>
						</li>
                        <li>
							<a href="{{ route('estadia.index') }}"></i> Estadías</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="{{ route('fallos.index') }}">
						<i class="zmdi zmdi-alert-triangle zmdi-hc-fw"></i> Errores
					</a>
				</li>
			</ul>
		</div>
	</section>