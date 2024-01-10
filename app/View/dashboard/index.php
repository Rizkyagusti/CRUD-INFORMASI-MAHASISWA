<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>eduPGT | Dashboard </title>
  <?php require __DIR__ . "/../layouts/headlinks.php" ?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- jquery -->
  <!-- jQuery -->
  <script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="AdminLTE/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="AdminLTE/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="AdminLTE/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="AdminLTE/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>
<body class="hold-transition  sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  
<?php
    use Krispachi\KrisnaLTE\App\FlashMessage;
    FlashMessage::flashMessage();
?>
    
<div class="wrapper">
<?php 
require __DIR__ . "/../layouts/nav-aside.php"; 

$mahasiswaModel = new Krispachi\KrisnaLTE\Model\MahasiswaModel();
$izinModel = new Krispachi\KrisnaLTE\Model\IzinModel();
$jumlahElektro = $mahasiswaModel->getJumlahMahasiswaByJurusan(1);
$jumlahMesin = $mahasiswaModel->getJumlahMahasiswaByJurusan(2);
$jumlahIndustri = $mahasiswaModel->getJumlahMahasiswaByJurusan(3);
$jumlahAll = $jumlahElektro + $jumlahMesin + $jumlahIndustri;

$jumlahIzinElektro = $izinModel->getJumlahIzinByJurusan(1);
$jumlahIzinMesin = $izinModel->getJumlahIzinByJurusan(2);
$jumlahIzinIndustri = $izinModel->getJumlahIzinByJurusan(3);
$jumlahIzinAll = $jumlahIzinElektro + $jumlahIzinMesin + $jumlahIzinIndustri;


// $persentaseElektro = $persentaseElektro * (100/100);
if ($jumlahElektro != 0) {
  $persentaseElektro = $jumlahIzinElektro / $jumlahElektro * (100/100);
} else {
  // Handle ketika $jumlahElektro sama dengan nol (hindari pembagian dengan nol)
  $persentaseElektro = 0; // Atau berikan nilai default lainnya
}
if ($jumlahMesin != 0) {
  $persentaseMesin = $jumlahIzinMesin / $jumlahMesin * (100/100);
} else {
  // Handle ketika $jumlahMesin sama dengan nol (hindari pembagian dengan nol)
  $persentaseMesin = 0; // Atau berikan nilai default lainnya
}

if ($jumlahIndustri != 0) {
  $persentaseIndustri = $jumlahIzinIndustri / $jumlahIndustri * (100/100);
} else {
  // Handle ketika $jumlahMesin sama dengan nol (hindari pembagian dengan nol)
  $persentaseIndustri = 0; // Atau berikan nilai default lainnya
}

$allPersentase = $persentaseElektro + $persentaseMesin + $persentaseIndustri;
?>
  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img src="img/logo.png" alt="AdminLTELogo" height="120" width="120">
  </div> -->

  <!-- Navbar -->
    <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mahasiswa Teknik Mesin</span>
                <span class="info-box-number">
                 <?=$jumlahMesin;?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-bolt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">mahasiswa Teknik Elektronika</span>
                <span class="info-box-number"><?=$jumlahElektro;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon elevation-1" style="background-color: #8A2BE2;"><i class="fas fa-industry"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Mahasiswa Teknologi Industri</span>
                <span class="info-box-number"><?=$jumlahIndustri;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Jumlah Mahasiswa</span>
                <span class="info-box-number"><?=$jumlahAll;?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title">Rekap Tahunan</h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-7" style="border-right:1px solid rgba(0,0,0,0.2) ">
                    <p class="text-center">
                      <strong>Grafik Jumlah Mahasiswa th.2023/2024</strong>
                    </p>

                    <div class="chart">
                      <!-- Sales Chart Canvas -->
                      <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-5">
                    <p class="text-center">
                      <strong>Jumlah Izin Tidak Masuk</strong>
                    </p>

                    <div class="progress-group">
                      Mahasiswa Mesin Izin
                      <span class="float-right"><b><?=$jumlahIzinMesin;?></b>/<?=$jumlahMesin;?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-primary" style="width: <?=$persentaseMesin;?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      Mahasiswa Elektro Izin
                      <span class="float-right"><b><?=$jumlahIzinElektro;?></b>/<?=$jumlahElektro;?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-danger" style="width: <?=$persentaseElektro;?>%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Mahasiswa Industri Izin </span>
                      <span class="float-right"><b><?=$jumlahIzinIndustri;?></b>/<?=$jumlahIndustri;?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar " style="background-color: #8A2BE2; width:<?=$persentaseIndustri;?>%;"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      Total Izin
                      <span class="float-right"><b><?=$jumlahIzinAll;?></b>/<?=$jumlahAll;?></span>
                      <div class="progress progress-sm">
                        <div class="progress-bar bg-warning" style="width: <?=$allPersentase;?>%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Mahasiswa Izin Keluar Area Kampus</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <?php
               $modelIzin = new Krispachi\KrisnaLTE\Model\IzinModel();
               $dataIzin = $modelIzin->getAllIzin1();
              ?>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Link ID</th>
                      <th>Keterangan Izin</th>
                      <th>Status</th>
                      <th>Tanggal</th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                    $no = 1;
                    foreach ($dataIzin as $hasilDataIzin) :
                    ?>
                    <tr>
                      <td><a href="/izin">Pergi</a></td>
                      <td><?= $hasilDataIzin['keperluan'] ?></td>
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
                      <td>
                      <?= date("d F Y", strtotime($hasilDataIzin['tanggal'])); ?>
                      </td>
                    </tr>
                   
                    <?php

                    endforeach;
                                        ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              
              <!-- /.card-footer -->
            </div>
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          
          <!-- /.col -->

          
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
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

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<!-- <script src="AdminLTE/plugins/jquery/jquery.min.js"></script> -->
<!-- jQuery -->
<script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="AdminLTE/dist/js/adminlte.js"></script>

<!-- jQuery event listener untuk tombol sidebar -->
<script>
  $(document).ready(function() {
    // Event listener untuk tombol sidebar
    $('[data-widget="pushmenu"]').on('click', function() {
      $('body').toggleClass('sidebar-collapse');
    });
  });
</script>


<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="AdminLTE/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="AdminLTE/plugins/raphael/raphael.min.js"></script>
<script src="AdminLTE/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="AdminLTE/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="AdminLTE/plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="AdminLTE/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="AdminLTE/dist/js/pages/dashboard2.js"></script> -->
<script>
var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Teknik Mesin',
          'Teknik Elektro',
          'Teknik Industri',
      ],
      datasets: [
        {
          data: [<?= json_encode($jumlahMesin); ?>,<?= json_encode($jumlahElektro); ?>,<?= json_encode($jumlahIndustri); ?>],
          backgroundColor : ['#17A2B8', '#DC3545', '#8A2BE2'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })
    </script>
</body>
</html>
