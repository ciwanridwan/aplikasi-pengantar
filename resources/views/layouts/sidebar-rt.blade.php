<div id="sidebar-nav" class="sidebar">
	<div class="sidebar-scroll">
		<nav>
			<ul class="nav">
				<li>
					<a href="#subPages" class="collapsed" data-toggle="collapse"><i class="lnr lnr-code"></i> <span>Input</span>
						<i class="icon-submenu lnr lnr-chevron-left"></i></a>
						<div id="subPages" class="collapse ">
							<ul class="nav">
								<li><a href="{{ route('form')}}" class="">Data Penduduk</a></li>
								<li><a href="{{ route('form-pengantar')}}" class="">Permohonan Pengantar</a></li>
							</ul>
						</div>
					</li>
					<li><a href="{{ route('table')}}" class=""><i class="lnr lnr-dice"></i> <span>Data Penduduk</span></a></li>
					<li><a href="{{ route('table-pengantar')}}" class=""><i class="lnr lnr-dice"></i> <span>Permohonan Pengantar</span></a></li>
				</ul>
			</nav>
		</div>
	</div>