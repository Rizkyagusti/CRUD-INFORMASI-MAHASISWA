<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>eduPGT | Panduan Aplikasi</title>
	<?php require __DIR__ . "/../layouts/headlinks.php" ?>
	<!-- DataTables -->
	<link rel="stylesheet" href="AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
	<style>
		  .card {
			width: 100%;
        margin-bottom: 20px; /* Atur margin bawah sesuai kebutuhan */
    }

    /* Atur lebar card pada layar kecil */
    @media (max-width: 767px) {
        .card {
            width: 100%; /* Sesuaikan lebar card pada layar kecil */
        }
    }
	</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">

	<?php
	use Krispachi\KrisnaLTE\App\FlashMessage;

	FlashMessage::flashMessage();
	use Krispachi\KrisnaLTE\Model\MahasiswaModel;
	// use Krispachi\KrisnaLTE\Model\MahasiswaModel();
	?>

	<div class="wrapper">
		<?php require __DIR__ . "/../layouts/nav-aside.php" ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Panduan Aplikasi</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
								<li class="breadcrumb-item active">Panduan Aplikasi</li>
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
						<?php
						$jwt = $_COOKIE["X-KRISNALTE-SESSION"];
						$payload = Firebase\JWT\JWT::decode($jwt, new Firebase\JWT\Key(Krispachi\KrisnaLTE\Controller\AuthController::$SECRET_KEY, "HS256"));
						$query = new Krispachi\KrisnaLTE\Model\UserModel;
						$result = $query->getUserById($payload->user_id);
						$role = $query->getRoleUserById($payload->user_id)["role"];
						?>
                            <!-- Section 1: YouTube Video -->
                            <div class="card" id="section-youtube">
                                <div class="card-header">
                                    <h3 class="card-title">YouTube Video</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body" style="text-align:center;">
                                    <!-- YouTube Video iframe -->
									<?php if ($role == 'admin') :?>
										<div style="position: relative; overflow: hidden; max-width: 100%;">
										<iframe width="560" height="315" src="https://www.youtube.com/embed/RiUqSLTpZOE?si=qDOsmLsQ-Jvs7MnM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
										</div>
									<?php else:?>
										<div style="position: relative; overflow: hidden; max-width: 100%;">
										<iframe width="560" height="315" src="https://www.youtube.com/embed/Ugl-fkdng6s?si=v54AL58Ye6NNWV8C" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
										<?php endif;?>
										</div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

                            <!-- Section 2: PDF File -->
                            <div class="card" id="section-pdf">
                                <div class="card-header">
                                    <h3 class="card-title">PDF File</h3>
									<?php if($role == 'admin') :?>
									<a class="btn btn-success ml-auto" id="downnload" href="panduan/admin.pdf" download="admin.pdf" style="float:right;">Download Pdf</a>
									<?php else:?>
										<a class="btn btn-success ml-auto" id="download" href="panduan/mahasiswa.pdf" download="mahasiswa.pdf" style="float:right;">Download Pdf</a>
										<?php endif;?>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <!-- PDF File iframe -->
									<?php if($role == 'admin'):?>
                                    <iframe src="panduan/admin.pdf" width="100%" height="600px"></iframe>
									<?php else:?>
										<iframe src="panduan/mahasiswa.pdf" width="100%" height="600px"></iframe>
									<?php endif;?>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
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
