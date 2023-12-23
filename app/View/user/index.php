<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>eduPGT | Pengajuan Data</title>
	<?php require __DIR__ . "/../layouts/headlinks.php" ?>
	<!-- DataTables -->
	<link rel="stylesheet" href="AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">

	<?php

	use Krispachi\KrisnaLTE\App\FlashMessage;

	FlashMessage::flashMessage();
	?>
	<div class="wrapper">


		<!-- Modal -->
		<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="majorModalLabel" aria-hidden="true">
			<!-- form start -->
			<form action="/register2" method="post" id="modal-form">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="majorModalLabel">Tambah User</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col">

									<div class="input-group mb-3">
										<input type="text" name="username" class="form-control" value="<?= $_SESSION["form-input"]["username"] ?? "" ?>" placeholder="Username" required>
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-user"></span>
											</div>
										</div>
									</div>
									<div class="input-group mb-3">
										<input type="email" name="email" class="form-control" value="<?= $_SESSION["form-input"]["email"] ?? "" ?>" placeholder="Email" required>
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-envelope"></span>
											</div>
										</div>
									</div>
									<div class="input-group mb-3">
										<input type="file" name="gambar" class="form-control" value="<?= $_SESSION["form-input"]["gambar"] ?? "" ?>" placeholder="Gambar" required>
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-image"></span>
											</div>
										</div>
									</div>
									<div class="input-group mb-3">
										<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="far fa-eye mr-2 eye-icon" onclick="hideShowPassword()"></span>
												<span class="fas fa-lock"></span>
											</div>
										</div>
									</div>
									<div class="input-group mb-3">
										<input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Konfirmasi Password" required>
										<div class="input-group-append">
											<div class="input-group-text">
												<span class="fas fa-eye mr-2 eye-icon2" onclick="hideShowConfirmPassword()"></span>
												<span class="fas fa-lock"></span>
											</div>
										</div>
									</div>
									<div class="row">
										<!-- /.col -->
										
										<!-- /.col -->
									</div>
									<?php
									if (isset($_SESSION["form-input"])) {
										unset($_SESSION["form-input"]);
									}
									?>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" name="create_jurusan" class="btn btn-success button-save">Tambah</button>
						</div>
					</div>
			</form>
		</div>



	</div>
	<div class="wrapper">
		<?php require __DIR__ . "/../layouts/nav-aside.php" ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Informasi Users</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
								<li class="breadcrumb-item active">Informasi Users</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col">
							<!-- Tabel Mahasiswa Section -->
							<div class="card" id="tabel-pengguna">
								<div class="card-header d-flex align-items-center">
									<h3 class="card-title" style="margin-bottom: 0;">Tabel Users</h3><br>
									<a class="btn btn-success ml-auto button-create" data-toggle="modal" data-target="#userModal">Tambah Users</a>
								</div>
								<!-- /.card-header -->
								<div class="card-body table-responsive">
									<table id="example" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>ID</th>
												<th>Username</th>
												<th>Email</th>
												<th>Role</th>
												<th>Aksi</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$users = new Krispachi\KrisnaLTE\Model\UserModel();

											foreach ($users->getAllUser() as $user) :
											?>
												<tr>
													<td><?= $user['id'] ?></td>
													<td><?= $user['username'] ?></td>
													<td><?= $user['email'] ?></td>

													<td><?= $user['role'] ?></td>

													<td style="white-space: nowrap;">
														<!-- Tambahkan tombol aksi sesuai kebutuhan -->
														<button class="btn btn-sm btn-warning">Ubah</button>
														<form action="/users/delete/<?= $user["id"] ?>" method="post" class="form-delete d-inline-block">
															<button type="submit" class="btn btn-sm btn-danger  button-delete-profile"><b>Hapus Akun</b></button>
														</form>
													</td>
												</tr>
											<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>

							<!-- /.card -->
							<!-- /.Informasi Pribadi Mahasiswa Section -->
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<?php require __DIR__ . "/../layouts/footer.php" ?>
	</div>
	<!-- ./wrapper -->

	<?php require __DIR__ . "/../layouts/bodyscripts.php" ?>
	<!-- DataTables  & Plugins -->
	<script src="AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="AdminLTE/plugins/jszip/jszip.min.js"></script>
	<script src="AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	<!-- Page specific script -->
	<script>
		$(document).ready(function() {
			// Inisialisasi DataTables untuk tabel pengguna
			var tablePengguna = $("#example").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				"responsive": true,
				"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');

			// Mengonfigurasi SweetAlert untuk konfirmasi hapus
			$(".form-delete").on("submit", function(e) {
				e.preventDefault();
				Swal.fire({
					title: 'Konfirmasi Hapus',
					text: "kamu tidak bisa kembali setelah ini!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Ya, hapus sekarang!'
				}).then((result) => {
					if (result.isConfirmed) {
						$(this).unbind("submit").submit();
					} else {
						Swal.fire({
							title: 'Batal!',
							text: 'Mahasiswa tidak dihapus.',
							icon: 'success',
							timer: 4000
						});
					}
				});
			});
		});
	</script>
</body>

</html>