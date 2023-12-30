<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>eduPGT | Profil</title>
	<?php require __DIR__ . "/../layouts/headlinks.php" ?>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<?php
    use Krispachi\KrisnaLTE\App\FlashMessage;
    use Krispachi\KrisnaLTE\Model\MahasiswaModel;
    use Krispachi\KrisnaLTE\Model\MajorModel;
    use Krispachi\KrisnaLTE\Model\UserModel;

    FlashMessage::flashMessage();

    if(isset($_COOKIE["X-KRISNALTE-SESSION"])) {
        $jwt = $_COOKIE["X-KRISNALTE-SESSION"];
        $payload = Firebase\JWT\JWT::decode($jwt, new Firebase\JWT\Key(Krispachi\KrisnaLTE\Controller\AuthController::$SECRET_KEY, "HS256"));
        $query = new Krispachi\KrisnaLTE\Model\UserModel;
        $result = $query->getUserById($payload->user_id);
        $role = $query->getRoleUserById($payload->user_id)["role"];
        $nama = $result["username"] ;
        
    } else {
        echo "User tidak ditemukan";
    }
    $modelMahasiswa = new MahasiswaModel();
    $modelMajor = new MajorModel();
    $modelUser = new UserModel();
    $dataUser = $modelUser->getUserByUsername($nama);
    
    $dataMahasiswa = $modelMahasiswa->getMahasiswaByNim($nama);
    // foreach($dataMahasiswa as $dataMhs){
    //     $dataJurusan = $modelMajor->getMajorById($dataMhs["jurusan"]);
    //     var_dump($dataJurusan["nama"]);
    // // die;
    // }
    
    
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
						<h1 class="m-0">Profil</h1>
					</div><!-- /.col -->
					<div class="col-sm-6">
						<ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
							<li class="breadcrumb-item active">Profil</li>
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
            <div class="col-md-6 m-auto">

                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            
                            <img class="profile-user-img img-fluid img-circle" src="<?php __DIR__ ?>/PhotoProfile/<?php
                            if (isset($_COOKIE["X-KRISNALTE-SESSION"]) && $gambar !== null) {
                                $jwt = $_COOKIE["X-KRISNALTE-SESSION"];
                                $payload = Firebase\JWT\JWT::decode($jwt, new Firebase\JWT\Key(Krispachi\KrisnaLTE\Controller\AuthController::$SECRET_KEY, "HS256"));
                                $query = new Krispachi\KrisnaLTE\Model\UserModel;
                                $result = $query->getUserById($payload->user_id);
                                $role = $query->getRoleUserById($payload->user_id)["role"];
                                
                                    if($role === "admin"){
                                        echo "admin.png";
                                    }else{
                                        echo $result["gambar"];
                                    }
                            } else {
                                if($role === "admin"){
                                    echo "admin.png";
                                }else{
                                    echo "user.png";
                                }
                            }
                            ?>" alt="User profile picture" data-toggle="modal" data-target="#ubahPhotoModel" >
                        </div>

                        <h3 class="profile-username text-center"><?php echo $result["username"] ?? "Uknown" ?></h3>

                        <p class="text-muted text-center"><?php echo $role ?? "Uknown Role" ?></p>

                        <!-- About Me Box -->
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title">Tentang saya</h5>
                            </div>
                            <?php 
                                foreach($dataMahasiswa as $data):
                                    $dataJurusan = $modelMajor->getMajorById($data["jurusan"]);
                            ?>
                            <div class="card-body">
                                <strong><i class="fas fa-envelope mr-1"></i> Email</strong>

                                <p class="text-muted">
                                    <?php echo $result["email"] ?? "Belum Pengajuan Data" ?>
                                </p>

                                <hr>

                                <strong><i class="fas fa-university mr-1"></i> Jurusan</strong>

                                <p class="text-muted">
                                    <?php echo $dataJurusan["nama"] ?? "-" ?>
                                </p>

                                <hr>

                                <strong><i class="fas fa-columns mr-1"></i> Kelas</strong>

                                <p class="text-muted">
                                    <?php echo $data["kelas"] ?? "-" ?>
                                </p>

                                <hr>

                                <!-- Tambahkan field lain sesuai kebutuhan -->
                                <?php
                            endforeach;
                            ?>
                                <!-- Tombol untuk memanggil modal ubah password -->
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#ubahPasswordModal">
                                    Ubah Password
                                </button>

                            </div>
                            
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
    </div><!-- /.container-fluid -->

    <!-- Modal Ubah Password -->
    <div class="modal fade" id="ubahPasswordModal" tabindex="-1" role="dialog" aria-labelledby="ubahPasswordModalLabel" aria-hidden="true">
    <form action="/changePassword/<?=$result["id"]?>" method="post" id="modal-form">    
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahPasswordModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi dengan form ubah password sesuai kebutuhan -->
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="username" name="username" value="<?=$nama?>" required>
                    </div>
                    <div class="form-group">
                        <label for="password1">Password Lama</label>
                        <input type="password" class="form-control" id="password1" name="password1" required>
                    </div>
                    <div class="form-group">
                        <label for="password2">Password Baru</label>
                        <input type="password" class="form-control" id="password2" name="password2" required>
                    </div><!-- Tambahkan form ubah password di sini -->
                    <div class="form-group">
                        <label for="password3">Re-type Password</label>
                        <input type="password" class="form-control" id="password3" name="password3" required>
                    </div><!-- Tambahkan form ubah password di sini -->
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /.Modal Ubah Password -->
    <!-- Modal Ganti Photo Profile -->
    <div class="modal fade" id="ubahPhotoModel" tabindex="-1" role="dialog" aria-labelledby="ubahPhotoModel" aria-hidden="true">
    <form action="/changePhoto/<?=$result["id"]?>" method="post" id="modal-form" enctype="multipart/form-data">    
    <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ubahPasswordModalLabel">Ubah Photo Profile</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Isi dengan form ubah password sesuai kebutuhan -->
                    <!-- <div class="form-group">
                        <input type="hidden" class="form-control" id="username" name="username" value="<?=$nama?>" required>
                    </div> -->
                    <div class="form-group">
                        <label for="password1">Masukkan Gambar</label>
                        <input type="file" class="form-control" id="photo" name="photo" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- Modal ganti Photo profile -->
</section>


		<!-- /.content -->
	</div>
	<?php require __DIR__ . "/../layouts/footer.php" ?>
</div>
<!-- ./wrapper -->

<?php require __DIR__ . "/../layouts/bodyscripts.php" ?>
<!-- Page specific script -->
<script>
$(document).ready(function() {
	$(".button-delete-profile").click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "kamu tidak bisa kembali setelah ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus akun!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Sekali lagi, apakah kamu yakin?',
                    text: "kamu tidak bisa kembali setelah ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus sekarang!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $(".form-delete").submit();
                    } else {
                        Swal.fire({
                            title: 'Batal!',
                            text: 'Akun akhirnya tidak jadi dihapus.',
                            icon: 'success',
                            timer: 4000
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: 'Batal!',
                    text: 'Akun tidak jadi dihapus.',
                    icon: 'success',
                    timer: 4000
                });
            }
        });
    });
    
    $(".button-edit-profile").click(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Apakah kamu yakin?',
            text: "kamu tidak bisa kembali setelah ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, ubah akun!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Sekali lagi, apakah kamu yakin?',
                    text: "kamu tidak bisa kembali setelah ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, ubah sekarang!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $("#form-profile").submit();
                    } else {
                        Swal.fire({
                            title: 'Batal!',
                            text: 'Akun akhirnya tidak jadi diubah.',
                            icon: 'success',
                            timer: 4000
                        });
                    }
                });
            } else {
                Swal.fire({
                    title: 'Batal!',
                    text: 'Akun tidak jadi diubah.',
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
