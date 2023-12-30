<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eduPGT | Izin 2</title>
    <?php require __DIR__ . "/../layouts/headlinks.php" ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>
<body class="hold-transition sidebar-mini">

<?php
    use Krispachi\KrisnaLTE\App\FlashMessage;
    use Krispachi\KrisnaLTE\Model\KelasModel;
    use Krispachi\KrisnaLTE\Model\MajorModel;
    $majorModel = new MajorModel();
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
?>
    
<div class="wrapper">
        <?php
        require __DIR__ . "/../layouts/nav-aside.php";
        $modelIzin = new Krispachi\KrisnaLTE\Model\IzinModel();
        $dataIzin = $modelIzin->getAllIzin2();
        ?>

    <!-- Modal -->
    <div class="modal fade" id="izinModal" tabindex="-1" aria-labelledby="izinModalLabel" aria-hidden="true">
    <!-- Form start -->
    <form action="/izin/create2" method="post" id="modal-form" enctype="multipart/form-data">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="izinModalLabel">Tambah Izin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Tambahkan elemen formulir untuk setiap field izin -->
                    <div class="form-group">
                        <!-- <label for="tanggal">Tanggal</label> -->
                        <!-- <input type="hidden" class="form-control" id="tanggal" name="tanggal" required> -->
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">NIM</label>
                        <input type="number" class="form-control" id="nim" name="nim" value="<?=$nama?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select style="width: 100%;" name="id_jurusan"
                        class="js-example-basic-single" id="jurusan">
                        <option value="<?= null ?>" selected disabled>Pilih Jurusan</option>
                        <?php
                                                $jurusanModel = new MajorModel();
                                                $hasil = $jurusanModel->getAllMajor();
                                                foreach ($hasil as $jurusan) {
                                                
                                                    if (isset($_SESSION["form-input"]["id_jurusan"])) {
                                                        if ($_SESSION["form-input"]["id_jurusan"] == $jurusan["id"]) {
                                                            echo "<option value=" . $jurusan["id"] . " selected>" . $jurusan["nama"] . "</option>";
                                                        } else {
                                                            echo "<option value=" . $jurusan["id"] . ">" . $jurusan["nama"] . "</option>";
                                                        }
                                                    } else {
                                                        echo "<option value=" . $jurusan["id"] . ">" . $jurusan["nama"] . "</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                                                <select style="width: 100%;" name="kelas" class="" id="kelas">
                                                                    <option value="" selected disabled>Pilih Kelas</option>
                                                                    <?php
                                                                    // Mendapatkan semua kelas
                                                                    $kelasModel = new KelasModel();
                                                                    $kelas = $kelasModel->getAllKelas();
                    
                                                                    // Menampilkan opsi untuk setiap kelas
                                                                    foreach ($kelas as $kelasData) {
                                                                        echo "<option value='{$kelasData['kelas']}'>{$kelasData['kelas']}</option>";
                                                                    }
                                                                    ?>
                                                                </select>
                                        </div>
                    <div class="form-group">
                        <label for="nama">Tanggal Izin</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Keperluan</label>
                        <input type="text" class="form-control" id="keperluan" name="keperluan" required>
                    </div>
                    <div class="form-group">
                        <label for="nama">Bukti Dokumen</label>
                        <input type="file" class="form-control" id="bukti" name="bukti" required>
                    </div>
                    <!-- Tambahkan elemen formulir untuk field lainnya -->

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" name="create_izin" class="btn btn-success button-save">Tambah</button>
                </div>
            </div>
        </div>
    </form>
</div>
    <!-- </div> -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Data Izin</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Izin</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header d-flex align-items-center">
								<h3 class="card-title">Data Izin Tidak Masuk Mahasiswa</h3>
								<a class="btn btn-success ml-auto button-create" data-toggle="modal" data-target="#izinModal">Ajukan izin</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Permohonan</th>
                                    <th>Nama</th>
                                    <th>NIM</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>Tanggal Izin</th>
                                    <th>Keperluan</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                    <?php
                                                if($role === "admin") :
                                            ?>
                                            <th>Aksi</th>
                                            <?php
                                                endif;
                                            ?>
                                    <!-- <th>Aksi</th> -->
                                </tr>
                                </thead>
                                <tbody id="majorTableBody">
                                        <?php
                                        if ($role !== "admin") {
											
                                            $dataIzin =$modelIzin -> getIzin2ByNim($nama);
											
										}	else{
											$dataIzin = $modelIzin->getAllIzin2();
										}
                                        $no = 1;
                                        foreach ($dataIzin as $hasilDataIzin) {
                                                                                       
                                            
                                                
                                                ?>  
                                                    <td>
                                                        <?= $no++ ?>
                                                    </td>
                                                    <td>
                                                       <?= $hasilDataIzin['tanggal']?>
                                                    </td>
                                                    <td>
                                                    <?= $hasilDataIzin['nama']?>
                                                    </td>
                                                    <td>
                                                    <?= $hasilDataIzin['nim']?>
                                                    </td>
                                                    <td>
                                                    <?= $hasilDataIzin['kelas']?>
                                                    </td>
                                                    <td>
                                                <?=  $hasilDataIzin["jurusan"] < 0 ? "-" : $majorModel->getNamaById($hasilDataIzin["jurusan"])["nama"] ?>
                                                     </td>
                                                   
                                                    <td>
                                                    <?= $hasilDataIzin['tanggal_izin']?>
                                                    </td>
                                                    <td>
                                                    <?= $hasilDataIzin['keperluan']?>
                                                    </td>
                                                    <td>
                                                    <a href="bukti/<?= $hasilDataIzin['bukti']?>" download="<?= $hasilDataIzin['bukti']?>">Download File</a>

                                                </td>
                                                    <td style="background-color: 
                                            <?php
                                                if ($role === "admin") {
                                                    // Jika admin, tampilkan warna berdasarkan status persetujuan2 dari database
                                                    echo $hasilDataIzin['persetujuan2'] === "Di Izinkan" ? "#7FFF7F" : ($hasilDataIzin['persetujuan2'] === "Di Tolak" ? "#FF7F7F" : "#FFFF7F");
                                                } else {
                                                    // Jika bukan admin, tampilkan warna berdasarkan keputusan admin (approve/reject/pending)
                                                    echo $hasilDataIzin['persetujuan2'] === "Di Izinkan" ? "#7FFF7F" : ($hasilDataIzin['persetujuan2'] === "Di Tolak" ? "#FF7F7F" : "#FFFF7F");
                                                }
                                            ?>
                                        ;">
                                            <?php
                                        if ($role === "admin") {
                                            // Jika admin, tampilkan status persetujuan2 dari database
                                            echo $hasilDataIzin['persetujuan2'];
                                        } else {
                                            // Jika bukan admin, tampilkan status sesuai keputusan admin (approve/reject/pending)
                                            echo $hasilDataIzin['persetujuan2'] === "Di Izinkan" ? "Disetujui" : ($hasilDataIzin['persetujuan2'] === "Di Tolak" ? "Ditolak" : "Pending");
                                        }
                                        ?>
                                            </td>
                                            <?php
                                                if($role === "admin") :
                                            ?>
                                            <td>
                                                <?php
                                                if ($role === "admin") {
                                                    ?>
                                                    <form action="/izin/process-approval2" method="post">
                                                        <input type="hidden" name="izin_id" value="<?= $hasilDataIzin['id'] ?>">
                                                        <button type="submit" name="approval" value="Di Izinkan"
                                                            class="btn btn-sm btn-success">setujui</button>
                                                        <button type="submit" name="approval" value="Di Tolak"
                                                            class="btn btn-sm btn-danger">tolak</button>
                                                    </form>
                                                    <?php
                                                } else {
                                                    echo $hasilDataIzin['persetujuan1'];
                                                }
                                                ?>
                                                <!-- <?= $hasilDataIzin['persetujuan1'] ?> -->
                                            </td>
                                            <?php
					endif;
				?>
                                                    <!-- Add more columns as needed -->
                                                    <!-- <td>
                                                        <button class="btn btn-sm btn-warning button-edit">Ubah</button>
                                                        
                                                    </td> -->
                                                </tr>
                                                <?php
                                            
                                        }
                                        ?>
                                    </tbody>
                                <tfoot>
                                <!-- <tr>
                                    <th>#</th>
                                    <th>Jurusan</th>
                                    <th>Kode Mata Kuliah</th>
                                    <th>Mata Kuliah</th>
                                    <th>Jumlah SKS</th>
                                    <th>Aksi</th>
                                </tr> -->
                                </tfoot>
                                </table>
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
    <!-- /.content-wrapper -->
    <?php require __DIR__ . "/../layouts/footer.php"; ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php require __DIR__ . "/../layouts/bodyscripts.php" ?>
<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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
    $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false, "responsive": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

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
                    text: 'Jurusan tidak jadi dihapus.',
                    icon: 'success',
                    timer: 4000
                });
            }
        });
    });

    $(".button-create").click(function() {
        $(".button-save").text("Tambah").removeClass("btn-warning").addClass("btn-success").attr("name", "create_major");
        $("#majorModalLabel").text("Tambah Jurusan");
    });
    });


    // Clear form saat modal edit close dan cek atribut name button-save
    $("#majorModal").on('hidden.bs.modal', function() {
        if($(".button-save").attr("name") == "edit_major") {
            $("#modal-form").attr("action", "/majors");
            $("#modal-form")[0].reset();
            $("#mata_kuliah").val(null).trigger('change');
        }
        $(".button-save").attr("name", "create_major");
    });

</script>
</body>
</html>