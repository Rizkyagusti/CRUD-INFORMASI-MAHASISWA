<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eduPGT | Jurusan</title>
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

    FlashMessage::flashMessage();
    ?>

    <div class="wrapper">
        <?php require __DIR__ . "/../layouts/nav-aside.php"; ?>

        <!-- Modal -->
        <div class="modal fade" id="majorModal" tabindex="-1" aria-labelledby="majorModalLabel" aria-hidden="true">
            <!-- form start -->
            <form action="/majors" method="post" id="modal-form">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="majorModalLabel">Tambah Jurusan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Nama Jurusan</label>
                                        <input type="text" name="nama" class="form-control" id="nama"
                                            value="<?= $_SESSION["form-input"]["nama"] ?? "" ?>"
                                            placeholder="Masukkan Nama Jurusan">
                                    </div>
                                    <div class="form-group">
                                        <label for="mata_kuliah">Mata Kuliah</label>
                                        <select style="width: 100%;" class="js-example-basic-multiple" id="mata_kuliah"
                                            name="mata_kuliahs[]" multiple="multiple">
                                            <?php
                                            $majors = [];
                                            $subjects = [];
                                            $subjects = $model["subjects"];

                                            foreach ($subjects as $row) {
                                                if (isset($_SESSION["form-input"]["mata_kuliahs"])) {
                                                    foreach ($_SESSION["form-input"]["mata_kuliahs"] as $id_mata_kuliah) {
                                                        if ($id_mata_kuliah == $row["id"]) {
                                                            echo "<option value=" . $row["id"] . " selected>" . $row["nama"] . "</option>";
                                                        } else {
                                                            echo "<option value=" . $row["id"] . ">" . $row["nama"] . "</option>";
                                                        }
                                                    }
                                                } else {
                                                    echo "<option value=" . $row["id"] . ">" . $row["nama"] . "</option>";
                                                }
                                            }

                                            if (isset($_SESSION["form-input"])) {
                                                unset($_SESSION["form-input"]);
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" name="create_jurusan"
                                class="btn btn-success button-save">Tambah</button>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Jurusan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
                            <li class="breadcrumb-item active">Jurusan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <section class="content">
                    <div class="container-fluid">
                                            <?php
                                            $model = new Krispachi\KrisnaLTE\Model\MajorModel();
                                            $modelKelas = new Krispachi\KrisnaLTE\Model\KelasModel();
                                            $modelMahasiswa = new Krispachi\KrisnaLTE\Model\MahasiswaModel();
                                            $majors = $model->getAllMajor();
                                            
                                            ?>
                        <div class="row">
                            <div class="col">
                                <div class="card">
                                    <div class="card-header d-flex align-items-center">
                                        <h3 class="card-title">Tabel Daftar Jurusan</h3>
                                        <!-- Dropdown to select majors -->
                                        <select id="majorDropdown" class="form-control ml-auto">
                                            <?php foreach ($majors as $major): ?>
                                                <option value="<?= $major['id'] ?>">
                                                    <?= $major['nama'] ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <!-- /.card-header -->
                                        <div class="card-body">
                                        <!-- Table for displaying class information based on the selected major -->
                                        <table id="classTable" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Jurusan</th>
                                                    <th>Kelas</th>
                                                    <th>Jumlah Mahasiswa</th>
                                                    <th>Jumlah Pria</th>
                                                    <th>Jumlah Wanita</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- Class information will be dynamically loaded here -->
                                                <?php
                                                // Sample data, replace with actual data retrieval logic
                                                // $majors = [
                                                //     ['id' => 1, 'nama' => 'Teknik Elektronika'],
                                                //     ['id' => 2, 'nama' => 'Teknik Informatika'],
                                                //     // Add more majors as needed
                                                // ];
                                    
                                                foreach ($majors as $index => $major):
                                                    // Retrieve class information for the current major
                                                    $kelas = $modelKelas->getKelasByJurusanId($major['id']);
                                                    $rowspan = count($kelas); // Calculate rowspan based on the number of classes
                                    
                                                    foreach ($kelas as $classIndex => $classInfo):
                                                ?>
                                                        <tr>
                                                            <?php if ($classIndex === 0): // Display Jurusan only for the first row ?>
                                                                <td rowspan="<?= $rowspan ?>"><?php echo $index + 1; ?></td>
                                                                <td rowspan="<?= $rowspan ?>"><?php echo $major['nama']; ?></td>
                                                            <?php endif; ?>
                                                            <td><?php echo $classInfo['kelas']; ?></td>
                                                            <!-- Populate the table with the fetched class information -->
                                                            <td><?php echo $modelMahasiswa->getJumlahMahasiswaByKelas($classInfo['kelas']); ?></td>
                                                            <td><?php echo $modelMahasiswa->getJumlahMahasiswaPriaByJurusan($classInfo['kelas']); ?></td>
                                                            <td><?php echo $modelMahasiswa->getJumlahMahasiswaWanitaByJurusan($classInfo['kelas']); ?></td>
                                                            <td>
                                                                <button class="btn btn-sm btn-warning button-edit">Ubah</button>
                                                                <!-- Add your delete form here -->
                                                            </td>
                                                        </tr>
                                                <?php
                                                    endforeach;
                                                endforeach;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                
                                    <!-- /.card-body -->
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                        <!-- JavaScript to handle dynamic loading of class information based on selected major -->
                        <!-- ... (code sebelumnya) ... -->

<!-- JavaScript to handle dynamic loading of class information based on selected major -->



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
        $(document).ready(function () {
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

            $('.js-example-basic-multiple').select2({
                placeholder: "Pilih Mata Kuliah",
                allowClear: true
            });

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
                            text: 'Jurusan tidak jadi dihapus.',
                            icon: 'success',
                            timer: 4000
                        });
                    }
                });
            });

            $(".button-create").click(function () {
                $(".button-save").text("Tambah").removeClass("btn-warning").addClass("btn-success").attr("name", "create_major");
                $("#majorModalLabel").text("Tambah Jurusan");
            });

            $(".button-edit").click(function () {
                // Reset form
                $("#modal-form").attr("action", "/majors");
                $("#modal-form")[0].reset();
                $("#mata_kuliah").val(null).trigger('change');

                $.get("/majors/" + $(this).data("id"), function (response) {
                    let data;
                    try {
                        data = JSON.parse(response);
                        if (data.error) {
                            // Jika ada error
                            // console.log(data.error);
                        } else {
                            // Set value dan action form
                            $("#modal-form").attr("action", "/majors/" + data.id);
                            $("#nama").val(data.nama);
                            let mata_kuliah = [];
                            data.mata_kuliahs.forEach(element => {
                                mata_kuliah.push(element.id);
                            });
                            $("#mata_kuliah").val(mata_kuliah).trigger("change");
                        }
                    } catch (exception) {
                        // Jika tidak ada respon dari server
                    }
                    $(".button-save").text("Ubah").removeClass("btn-success").addClass("btn-warning").attr("name", "edit_major");
                    $("#majorModalLabel").text("Ubah Jurusan");
                    $("#majorModal").modal("show");
                });
            });

            // Clear form saat modal edit close dan cek atribut name button-save
            $("#majorModal").on('hidden.bs.modal', function () {
                if ($(".button-save").attr("name") == "edit_major") {
                    $("#modal-form").attr("action", "/majors");
                    $("#modal-form")[0].reset();
                    $("#mata_kuliah").val(null).trigger('change');
                }
                $(".button-save").attr("name", "create_major");
            });
        });
    </script>
</body>

</html>