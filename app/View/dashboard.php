<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>eduPGT | Dashboard</title>
	<?php require __DIR__ . "/layouts/headlinks.php" ?>
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
		<?php require __DIR__ . "/layouts/nav-aside.php" ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Dashboard</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item active">Dashboard</li>
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
							<div class="card" id="tabel-mahasiswa">
								<div class="card-header d-flex align-items-center">
									<h3 class="card-title" style="margin-bottom: 0;">Informasi Kampus Tabel Mahasiswa
									</h3><br>
									<?php
									if ($role === "admin" || $role === "petugas_pendaftaran") {
										echo '<a href="/mahasiswas/create" class="btn btn-success ml-auto">Tambah Mahasiswa</a>';
									}
									?>
									<!-- Ganti "#informasi-pribadi-btn" dengan ID atau kelas yang sesuai -->
									<button id="informasi-pribadi-btn" class="btn btn-primary "
										style="margin-left: 5px;">Pindah ke Informasi Pribadi</button>
								</div>
								<!-- /.card-header -->
								<div class="card-body table-responsive">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>id</th>
												<th>NIM</th>
												<th>Nama</th>
												<th>Gender</th>
												<th>Jurusan</th>
												<th>Kelas</th>
												<th>Asal Sekolah</th>
												<th>Tahun Ajaran</th>
												<th>Telepon</th>
												<th>Email</th>
												<?php
												if ($role === "admin" || $role === "petugas_pendaftaran") {
													echo '<th>Aksi</th>';
												}
												?>
											</tr>
										</thead>
										<tbody>
											<?php
											$majors = new Krispachi\KrisnaLTE\Model\MajorModel();
											$subjects = new Krispachi\KrisnaLTE\Model\SubjectModel();

											$iteration = 0;
											foreach ($model as $row):
												$iteration++;

												try {
													$majors_subjects = $subjects->getByMajor($row["jurusan"]);
												} catch (Exception $exception) {
													$majors_subjects = [];
												}
												?>
												<tr>
													<td>
														<?= $iteration ?>
													</td>
													<td>
														<?= $row["nim"] ?? "-" ?>
													</td>
													<td>
														<?= $row["nama"] ?? "-" ?>
													</td>
													<td>
														<?= $row["jenis_kelamin"] ?? "-" ?>
													</td>
													<td>
														<?= $row["jurusan"] < 0 ? "-" : $majors->getNamaById($row["jurusan"])["nama"] ?>
													</td>
													<td>
														<?= $row["kelas"] ?? "-" ?>
													</td>
													<td>
														<?= $row["asal_sekolah"] ?? "-" ?>
													</td>
													<td>
														<?= $row["tahun_ajaran"] ?? "-" ?>
													</td>
													<td>
														<?= $row["no_hp"] ?? "-" ?>
													</td>
													<td>
														<?= $row["email"] ?? "-" ?>
													</td>

													<?php
													if ($role === "admin" || $role === "petugas_pendaftaran"):
														?>
														<td style="white-space: nowrap;">
															<a href="/mahasiswas/update/<?= $row["id_mahasiswa"] ?>"
																class="btn btn-sm btn-warning">Ubah</a>
															<form action="/mahasiswas/delete/<?= $row["id_mahasiswa"] ?>"
																method="post" class="form-delete d-inline-block">
																<button type="submit"
																	class="btn btn-sm btn-danger button-delete">Hapus</button>
															</form>
														</td>

														<?php
													endif;
													?>

												</tr>
												<?php
											endforeach;
											?>
										</tbody>
									</table>
								</div>
								<!-- /.card-body -->
							</div>
							<!-- /.card -->
							<!-- /.Tabel Mahasiswa Section -->

							<!-- Informasi Pribadi Mahasiswa Section -->
							<?php
							// File yang membutuhkan informasi pribadi mahasiswa (contoh: informasi_pribadi.php)
							
							// Import model MahasiswaPribadiModel
							use Krispachi\KrisnaLTE\Model\MahasiswaModel;

							// Buat objek model
							$mahasiswaPribadiModel = new MahasiswaModel();

							// Panggil metode untuk mendapatkan informasi pribadi mahasiswa
							$model_info = $mahasiswaPribadiModel->getAllMahasiswaPribadi();
							?>

							<div class="card" id="informasi-pribadi" style="display: none;" >
								<div class="card-header d-flex align-items-center">
									<h3 class="card-title">Informasi Pribadi Mahasiswa</h3>
									<!-- Ganti "#tabel-mahasiswa-btn" dengan ID atau kelas yang sesuai -->
									<button id="tabel-mahasiswa-btn" class="btn btn-primary ml-auto">Pindah ke Tabel
										Mahasiswa</button>
								</div>
								<!-- /.card-header -->
								<div class="card-body table-responsive">
									<table id="example2" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>Nama</th>
												<th>Agama</th>
												<th>NIK</th>
												<th>Nama Ibu Kandung</th>
												<th>NPWP</th>
												<th>No BPJS</th>
												<th>Alamat</th>
												<th>Golongan Darah</th>
												<!-- Tambahkan kolom lain sesuai kebutuhan -->
											</tr>
										</thead>
										<tbody>
											<?php foreach ($model_info as $info): ?>
												<tr>
													<td>
														<?= $info['nama'] ?? '-' ?>
													</td>
													<td>
														<?= $info['agama'] ?? '-' ?>
													</td>
													<td>
														<?= $info['nik'] ?? '-' ?>
													</td>
													<td>
														<?= $info['nama_ibu_kandung'] ?? '-' ?>
													</td>
													<td>
														<?= $info['npwp'] ?? '-' ?>
													</td>
													<td>
														<?= $info['no_bpjs'] ?? '-' ?>
													</td>
													<td>
														<?= $info['alamat'] ?? '-' ?>
													</td>
													<td>
														<?= $info['golongan_darah'] ?? '-' ?>
													</td>
													<!-- Tambahkan kolom lain sesuai kebutuhan -->
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
		<?php require __DIR__ . "/layouts/footer.php" ?>
	</div>
	<!-- ./wrapper -->

	<?php require __DIR__ . "/layouts/bodyscripts.php" ?>
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
		$(document).ready(function () {
			// Inisialisasi DataTables
			var tableMahasiswa = $("#example1").DataTable({
				"responsive": true, "lengthChange": false, "autoWidth": false, "responsive": true,
				"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

			var tableInformasiPribadi = $("#example2").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": [
            {
                extend: 'copy',
                text: 'Copy',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'csv',
                text: 'CSV',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'excel',
                text: 'Excel',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                text: 'PDF',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                text: 'Print',
                exportOptions: {
                    columns: ':visible'
                }
            },
            'colvis'
        ]
    });

    // Add the buttons container to the DataTable
    tableInformasiPribadi.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');


			

				

			
			// Toggle visibility tabel-mahasiswa dan informasi-pribadi
			$("#informasi-pribadi-btn").on("click", function () {
				$("#tabel-mahasiswa").hide();
				$("#informasi-pribadi").show();
			});

			$("#tabel-mahasiswa-btn").on("click", function () {
				$("#informasi-pribadi").hide();
				$("#tabel-mahasiswa").show();
			});

			// ... (sama seperti sebelumnya) ...

			// ada banyak form di tabel dengan class .form-delete, makannya pakai $(this)
			$(".form-delete").on("submit", function (e) {
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
