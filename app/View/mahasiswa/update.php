<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>eduPGT | Ubah</title>
    <?php require __DIR__ . "/../layouts/headlinks.php" ?>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container .select2-selection--single {
            height: 2em;
        }
        .select2-container--default .select2-selection--single {
            padding: 0;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            padding-top: 4px;
        }
    </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<?php
    use Krispachi\KrisnaLTE\App\FlashMessage;
    FlashMessage::flashMessage();
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
						<h1 class="m-0">Ubah Data Mahasiswa</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
							<li class="breadcrumb-item"><a href="/">Dashboard</a></li>
							<li class="breadcrumb-item active">Ubah Data Mahasiswa</li>
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
						<!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Ubah Data Mahasiswa</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="/mahasiswas/update/<?= $model["mahasiswa"]["id_mahasiswa"] ?>" method="post" class="update-form">
                                <div class="card-body">
                                <div class="form-group">
                                        <label for="nim">ID</label>
                                        <input type="number" name="id_mahasiswa" class="form-control" id="id_mahasiswa" value="<?= $model["mahasiswa"]["id_mahasiswa"] ?? "" ?>" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="number" name="nim" class="form-control" id="nim" value="<?=  $model["mahasiswa"]["nim"] ?? "" ?>" placeholder="Masukkan NIM">
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $_SESSION["form-input"]["nama"] ?? $model["mahasiswa"]["nama"] ?? "" ?>" placeholder="Masukkan Nama">
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <!-- <input type="text" name="gender" class="form-control" id="gender" value="<?= $_SESSION["form-input"]["gender"] ?? "" ?>" placeholder="Masukkan Gender" required> -->

                                        <select name="gender" id="gender" style="width: 100%;" class="js-example-basic-single" value="<?= $_SESSION["form-input"]["gender"] ?? $model["mahasiswa"]["gender"] ?? "" ?>">
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jurusan">Jurusan</label>
                                        <select style="width: 100%;" name="id_jurusan" class="js-example-basic-single" id="jurusan">
                                            <option value="<?= null ?>" selected disabled>Pilih Jurusan</option>
                                            <?php
                                                foreach($model["majors"] as $jurusan) {
                                                    if(isset($_SESSION["form-input"]["jurusan"])) {
                                                        if($_SESSION["form-input"]["jurusan"] == $jurusan["id"]) {
                                                            echo "<option value=" . $jurusan["id"] . " selected>" . $jurusan["nama"] . "</option>";
                                                        } else {
                                                            echo "<option value=" . $jurusan["id"] . ">" . $jurusan["nama"] . "</option>";
                                                        }
                                                    } else if($model["mahasiswa"]["jurusan"] == $jurusan["id"]) {
                                                        echo "<option value=" . $jurusan["id"] . " selected>" . $jurusan["nama"] . "</option>";
                                                    } else {
                                                        echo "<option value=" . $jurusan["id"] . ">" . $jurusan["nama"] . "</option>";
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <input type="text" name="kelas" class="form-control" id="asal_sekolah" value="<?= $_SESSION["form-input"]["kelas"] ?? "" ?>" placeholder="Masukkan Kelas" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="asal_sekolah">Asal Sekolah</label>
                                        <input type="text" name="asal_sekolah" class="form-control" id="kelas" value="<?= $_SESSION["form-input"]["asal_sekolah"] ?? "" ?>" placeholder="Masukkan Asal Sekolah" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="tahun_ajaran">Tahun Ajaran</label>
                                        <select name="tahun_ajaran" id="tahun_ajaran" style="width: 100%;" class="js-example-basic-single">
                                            <option value="2023">2023</option>
                                            <option value="2022">2022</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">Telepon</label>
                                        <input type="number" name="no_hp" class="form-control" id="no_hp" value="<?= $_SESSION["form-input"]["no_hp"] ?? "" ?>" placeholder="Masukkan Telepon" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="<?= $_SESSION["form-input"]["email"] ?? "" ?>" placeholder="Masukkan Telepon" required>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Ubah</button>
                                    <a href="/" class="btn btn-secondary">Kembali</a>
                                </div>
                                <?php
                                    if(isset($_SESSION["form-input"])) {
                                        unset($_SESSION["form-input"]);
                                    }
                                ?>
                            </form>
                            </div>
                            <!-- /.card -->
					</div>
				</div>		
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->
	<?php require __DIR__ . "/../layouts/footer.php" ?>
</div>
<!-- ./wrapper -->

<?php require __DIR__ . "/../layouts/bodyscripts.php" ?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $(".js-example-basic-single").select2({
            placeholder: "Pilih Jurusan",
            allowClear: true
        });

        $(".update-form").on("submit", function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Konfirmasi Ubah',
                text: "kamu tidak bisa kembali setelah ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Ubah sekarang!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $(this).unbind("submit").submit();
                } else {
                    Swal.fire({
                        title: 'Batal!',
                        text: 'Mahasiswa tidak diubah.',
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
