<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>eduPGT | Berita</title>
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
		<!-- Modal Edit User -->
		<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
			<form action="/berita/edit" method="post" id="edit-user-form" enctype="multipart/form-data">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="editUserModalLabel">Edit Berita</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col">
									<!-- Tambahkan input fields untuk data yang ingin diubah -->
									<input type="hidden" name="id" class="form-control" placeholder="id" id="id" required>
									<div class="input-group mb-3">
										<input type="text" name="headline" class="form-control" placeholder="Headline" id="headline" required>
										
									</div>
									<div class="input-group mb-3">
										<textarea name="deskripsi" id="deskripsi" cols="50" rows="10" class="form-control" placeholder="Masukkan Deskripsi Berita"></textarea>
										
									</div>
									<div class="input-group mb-3">
										<input type="file" name="gambar" id="gambar" class="form-control"  required>
										
									</div>
									<!-- Tambahkan input fields lainnya sesuai kebutuhan -->
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
							<button type="submit" name="edit_user" class="btn btn-primary">Simpan Perubahan</button>
						</div>
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
							<h1 class="m-0">Informasi berita</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
								<li class="breadcrumb-item active">Informasi berita</li>
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
									<h3 class="card-title" style="margin-bottom: 0;">Tabel berita</h3><br>
									
								</div>
								<!-- /.card-header -->
								<div class="card-body table-responsive">
									<table id="example" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>ID</th>
												<th>Headline</th>
												<th>Deskripsi</th>									
												<th>Gambar</th>									<th>Aksi</th>

											</tr>
										</thead>
										<tbody>
											<?php
											$berita = new Krispachi\KrisnaLTE\Model\BeritaModel();

											foreach ($berita->getAllBerita() as $user) :
											?>
												<tr>
													<td><?= $user['id'] ?></td>
													<td><?= $user['headline'] ?></td>
													<td><?= $user['deskripsi'] ?></td>

													<td><img src="<?php __DIR__ ?>/img/<?= $user['gambar'] ?>" width="100px"></td>

													<td style="white-space: nowrap;">
														<!-- Tambahkan tombol aksi sesuai kebutuhan -->
														<button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#editUserModal" onclick="kirimdata(<?= $user['id'] ?>, '<?= $user['headline'] ?>','<?= $user['deskripsi'] ?>')">Ubah</button>
                                                        
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
		function kirimdata(id, username, email) {
            // Set data ke dalam modal
            document.getElementById('id').value = id;
            document.getElementById('headline').value = username;
            document.getElementById('deskripsi').value = email ;
           

            // Tampilkan modal edit
            $('#kelasModalEdit').modal('show');
        }

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