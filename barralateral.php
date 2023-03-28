<div class="full-width navLateral-body">
	<div class="full-width navLateral-body-logo text-center tittles">
		<i class="zmdi zmdi-close btn-menu"></i> App Bar
	</div>
	<figure class="full-width" style="height: 77px;">
		<div class="navLateral-body-cl">
			<img src="assets/img/avatar.png" alt="Avatar" class="img-responsive">
		</div>
		<figcaption class="navLateral-body-cr hide-on-tablet">
			<span>
				<?php echo $_SESSION['nom']; ?><br>
				<small><?php echo $_SESSION['rol']; ?></small>
			</span>
		</figcaption>
	</figure>
	<div class="full-width tittles navLateral-body-tittle-menu">
		</i><span class="hide-on-tablet">&nbsp; MODULOS</span>
	</div>
	<nav class="full-width">
		<ul class="full-width list-unstyle menu-principal">
			<li class="full-width">
				<a href="home.php" class="full-width">
					<div class="navLateral-body-cl">
						<i class="zmdi zmdi-view-dashboard"></i>
					</div>
					<div class="navLateral-body-cr hide-on-tablet">
						INICIO
					</div>
				</a>
			</li>
			<li class="full-width divider-menu-h"></li>
			<li class="full-width divider-menu-h"></li>
			<?php
			if ($_SESSION['rol'] == 'Administrador') {
			?>
				<li class="full-width">
					<a href="#!" class="full-width btn-subMenu">
						<div class="navLateral-body-cl">
							<i class="zmdi zmdi-face"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							ADMINISTRADOR
						</div>
						<span class="zmdi zmdi-chevron-left"></span>
					</a>
					<ul class="full-width menu-principal sub-menu-options">
						<li class="full-width">
							<a href="index1.php" class="full-width">
								<div class="navLateral-body-cl">
									<i class="zmdi zmdi-accounts"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									Listar Usuarios
								</div>
							</a>
						</li>
					</ul>
				</li>
			<?php } ?>
			<li class="full-width divider-menu-h"></li>
			<li class="full-width divider-menu-h"></li>
			<?php
			if ($_SESSION['rol'] == 'Cajero' || $_SESSION['rol'] == 'Administrador') {
			?>
				<li class="full-width">
					<a href="#!" class="full-width btn-subMenu">
						<div class="navLateral-body-cl">
							<i class="fas fa-box-open"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							INVENTARIOS
						</div>
						<span class="zmdi zmdi-chevron-left"></span>
					</a>
					<ul class="full-width menu-principal sub-menu-options">
						<li class="full-width">
							<a href="index2.php" class="full-width">
								<div class="navLateral-body-cl">
									<i class="fas fa-hdd"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									Listar Inventario
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="index5.php" class="full-width">
								<div class="navLateral-body-cl">
									<i class="fas fa-hdd"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									Combos
								</div>
							</a>
						</li>
					</ul>
				</li>
			<?php }
			?>
			<li class="full-width divider-menu-h"></li>
			<li class="full-width divider-menu-h"></li>
			<?php
			if ($_SESSION['rol'] == 'Administrador') {
			?>
				<li class="full-width">
					<a href="#!" class="full-width btn-subMenu">
						<div class="navLateral-body-cl">
							<i class="fas fa-chart-line"></i>
						</div>
						<div class="navLateral-body-cr hide-on-tablet">
							REPORTES
						</div>
						<span class="zmdi zmdi-chevron-left"></span>
					</a>
					<ul class="full-width menu-principal sub-menu-options">
						<li class="full-width">
							<a href="index7.php" class="full-width">
								<div class="navLateral-body-cl">
									<i class="fas fa-upload"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									Ventas
								</div>
							</a>
						</li>
						<li class="full-width">
							<a href="index8.php" class="full-width">
								<div class="navLateral-body-cl">
									<i class="fas fa-hdd"></i>
								</div>
								<div class="navLateral-body-cr hide-on-tablet">
									Inventarios
								</div>
							</a>
						</li>
					</ul>
				</li>
			<?php
			} ?>
			<li class="full-width divider-menu-h"></li>
			<li class="full-width divider-menu-h"></li>
		</ul>
	</nav>
</div>