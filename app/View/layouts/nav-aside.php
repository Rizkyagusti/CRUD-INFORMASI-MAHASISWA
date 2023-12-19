<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" data-widget="pushmenu" role="button"><i class="fas fa-bars"></i></a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a href="/" class="nav-link">Home</a>
			</li>
			<li class="nav-item d-none d-sm-inline-block">
				<a class="nav-link" onclick="alert('Hubungi BAAK')">Kontak</a>
			</li>
		</ul>
	</nav>
	<!-- /.navbar -->

	<!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-primary elevation-4">
		<!-- Brand Logo -->
		<a class="brand-link">
			<img src="<?php __DIR__ ?>/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
			<span class="brand-text font-weight-light">eduPGT</span>
		</a>

		<!-- Sidebar -->
		<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?php __DIR__ ?>/img/<?php
					if(isset($_COOKIE["X-KRISNALTE-SESSION"])) {
						$jwt = $_COOKIE["X-KRISNALTE-SESSION"];
						$payload = Firebase\JWT\JWT::decode($jwt, new Firebase\JWT\Key(Krispachi\KrisnaLTE\Controller\AuthController::$SECRET_KEY, "HS256"));
						$query = new Krispachi\KrisnaLTE\Model\UserModel;
						$result = $query->getUserById($payload->user_id);
						$role = $query->getRoleUserById($payload->user_id)["role"];
						echo $result["gambar"];
					} else {
						echo "Uknown Users";
					}
				?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<?php
					if(isset($_COOKIE["X-KRISNALTE-SESSION"])) {
						$jwt = $_COOKIE["X-KRISNALTE-SESSION"];
						$payload = Firebase\JWT\JWT::decode($jwt, new Firebase\JWT\Key(Krispachi\KrisnaLTE\Controller\AuthController::$SECRET_KEY, "HS256"));
						$query = new Krispachi\KrisnaLTE\Model\UserModel;
						$result = $query->getUserById($payload->user_id);
						$role = $query->getRoleUserById($payload->user_id)["role"];
						echo "<a class='d-block'>" . $result["username"] ?? "N/A" . "</a>";
					} else {
						echo "<a class='d-block'>Uknown Users</a>";
					}
				?>
			</div>
		</div>

		<!-- SidebarSearch Form -->
		<div class="form-inline">
			<div class="input-group" data-widget="sidebar-search">
				<input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
				<div class="input-group-append">
					<button class="btn btn-sidebar">
						<i class="fas fa-search fa-fw"></i>
					</button>
				</div>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
				<?php
					if($role === "admin") :
				?>
				<li class="nav-item">
					<a href="/dashboard" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/dashboard' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>Dashboard</p>
					</a>
				</li>
				<?php
					endif;
				?>
				<li class="nav-item">
					<a href="/mahasiswas" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/mahasiswas' ? 'active' : '' ?>">
						<i class="nav-icon fas  fa-graduation-cap"></i>
						<p>Info Mahasiswa</p>
					</a>
				</li>

				<?php
					if($role === "admin") :
				?>
				<li class="nav-item">
					<a href="/majors" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/majors' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-university"></i>
						<p>Jurusan</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="/kelas" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/kelas' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-columns"></i>
						<p>Kelas</p>
					</a>
				</li>
			
				<li class="nav-item">
					<a href="/subjects" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/subjects' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-book"></i>
						<p>Mata Kuliah</p>
					</a>
				</li>
				<?php
					endif;
				?>
				<li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Izin
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
			  <a href="/izin" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/izin' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Izin Keluar Kampus</p>
                </a>
              </li>
              <li class="nav-item">
			  <a href="/izin2" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/izin2' ? 'active' : '' ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Izin tidak masuk</p>
                </a>
              </li>
             
            </ul>
          </li>
				<li class="nav-item">
					<a href="/users" class="nav-link <?= $_SERVER['REQUEST_URI'] == '/users' ? 'active' : '' ?>">
						<i class="nav-icon fas fa-user-cog"></i>
						<p>Profil</p>
					</a>
				</li>
				<li class="nav-item nav-log-out">
					<a href="/logout" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>Log Out</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
		</div>
		<!-- /.sidebar -->
	</aside>