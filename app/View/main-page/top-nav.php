<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EDUPGT | WELCOME</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
  <style>
    #carousel {
      display: block;
    }

    @media only screen and (max-width: 800px) {
      #carousel {
        display: none;
      }
    }

    .carousel-item {
        max-width: 100%;
        max-height: 700px; /* Sesuaikan dengan tinggi yang diinginkan */
        margin: 0 auto; /* Tengahkan gambar */
    }
  </style>
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

  <?php require __DIR__ . "/navbar.php" ?>



    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" id="carousel">
    <!-- Main content -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php
            $berita = new Krispachi\KrisnaLTE\Model\BeritaModel();
            $beritaList = $berita->getAllBerita();

            foreach ($beritaList as $index => $user) :
            ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $index ?>" <?= $index === 0 ? 'class="active"' : '' ?>></li>
            <?php endforeach; ?>
        </ol>

        <div class="carousel-inner">
            <?php foreach ($beritaList as $index => $user) : ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>">
                <img src="<?php __DIR__ ?>/img/<?= $user["gambar"] ?>" class="d-block w-100 carousel-img" alt="...">
            </div>
            <?php endforeach; ?>
        </div>
        
        <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </button>
    </div>
    <!-- /.content-wrapper -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

    

    <!-- Footer -->
    <footer class="text-center text-lg-start bg-body-tertiary text-muted">
      <!-- Section: Social media -->

      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container  text-md-start mt-5" style="text-align: justify;">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4">
                Description
              </h6>
              <p>
                Politeknik Gajah Tunggal (Poltek-GT) adalah sebuah institusi pendidikan tinggi di Indonesia. Berlokasi di Tangerang, Poltek-GT didirikan pada tahun 1981 dan menyelenggarakan program studi diploma tiga.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->

            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4" style="text-align:left;">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4">
                Useful links
              </h6>
              <p>
                <a href="https://poltek-gt.ac.id/" class="text-reset">POLTEK-GT</a>
              </p>
              <p>
                <a href="https://sisfo.poltek-gt.ac.id/" class="text-reset">SISFO POLTEK-GT</a>
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4" style="text-align:left;">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4" id="kontak">Contact</h6>
              <p><i class="fas fa-home me-3"></i> Politeknik Gajah Tunggal Jl. Gajah Tunggal No.16, Kec. Jatiuwung,Kota Tangerang,Banten 15133 </p>
              <p>
                <i class="fas fa-envelope me-3"></i>
                administrasi@poltek-gt.ac.id
              </p>
              <p><i class="fas fa-phone me-3"></i> 0215900468</p>

            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->

      <!-- Copyright -->
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2023
        <a class="text-reset fw-bold">eduPGT - Sistem Informasi Mahasiswa. </a>
      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->

    <!-- <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a> -->
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->

  <!-- jQuery -->
  <script src="AdminLTE/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="AdminLTE/plugins/bootstrap/js/bootstrap.js"></script>
  <!-- ChartJS -->
  <script src="AdminLTE/plugins/chart.js/Chart.min.js"></script>
  <!-- AdminLTE App -->
  <script src="AdminLTE/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <!-- <script src="AdminLTE/dist/js/demo.js"></script> -->
  <script>
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    $(function() {
      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData = {
        labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
        ],
        datasets: [{
          data: [700, 500, 400, 600, 300, 100],
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }]
      }
    })

    //- PIE CHART -
    var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
    var pieData = donutData;
    var pieOptions = {
      maintainAspectRatio: false,
      responsive: true,
    }
    new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  </script>
</body>

</html>