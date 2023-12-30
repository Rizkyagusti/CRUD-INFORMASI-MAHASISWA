<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EDUPGT | Aplikasi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
  <style>
    
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="<?php __DIR__ ?>/img/EDU.png" width="350" class="d-inline-block align-top" alt="" style="margin-left: 50px;">
    </a>
    
  </nav>
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    
    <div class="container">
      <!-- Image and text -->

      
      <br>
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="/" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#kontak" class="nav-link">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tentang</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="/tentang" class="dropdown-item">Aplikasi</a></li>
              <li><a href="/tentang2" class="dropdown-item">Pembuat</a></li>
            </ul>
          </li>

          <!-- End Level two -->
          <li class="nav-item">
            <a href="/login" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="/faq" class="nav-link">FAQ?</a>
          </li>
      </div>

      <!-- Right navbar links -->
      
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- About 1 - Bootstrap Brain Component -->
    <div class="bg-light">
  <div class="container py-5">
    <div class="row h-100 align-items-center py-5">
      <div class="col-lg-6">
        <h1 class="display-4">Tujuan</h1>
        <p class="lead text-muted mb-0">Menjadikan Administrasi yang memiliki responsibilitas tinggi bagi Mahasiswa Politeknik Gajah Tunggal.</p>
        
      </div>
      <div class="col-lg-6 d-none d-lg-block"><img src="<?php __DIR__ ?>/img/1.png" alt="" class="img-fluid"></div>
    </div>
  </div>
</div>

<div class="bg-white py-5">
  <div class="container py-5">
    <div class="row align-items-center mb-5">
      <div class="col-lg-6 order-2 order-lg-1"><i class="fa fa-bar-chart fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Pusat Izin Mahasiswa</h2>
        <p class="font-italic text-muted mb-4">Dapat mengajukan izin untuk keluar area kampus maupun izin cuti (tidak masuk) dengan bukti otentik </p>
      </div>
      <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="<?php __DIR__ ?>/img/2.jpeg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-5 px-5 mx-auto"><img src="<?php __DIR__ ?>/img/3.jpeg" alt="" class="img-fluid mb-4 mb-lg-0"></div>
      <div class="col-lg-6"><i class="fa fa-leaf fa-2x mb-3 text-primary"></i>
        <h2 class="font-weight-light">Responsive view</h2>
        <p class="font-italic text-muted mb-4">Dapat di jalankan di berbagai platform dengan memiliki responsive view yang baik.</p>
      </div>
    </div>
  </div>
</div>

<div class="bg-light py-5">
  <div class="container py-5">
    <div class="row mb-4">
      <div class="col-lg-5">
        <h2 class="display-4 font-weight-light">Our team</h2>
        <p class="font-italic text-muted">Kami berkarya pada wadah dengan jerih dan upaya</p>
      </div>
    </div>

    <div class="row text-center">
      <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://bootstrapious.com/i/snippets/sn-about/avatar-3.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Finnan Erlandung</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->

      <!-- Team item-->
      <div class="col-xl-3 col-sm-6 mb-5">
        <div class="bg-white rounded shadow-sm py-5 px-4"><img src="https://bootstrapious.com/i/snippets/sn-about/avatar-3.png" alt="" width="100" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
          <h5 class="mb-0">Rizky Agusti</h5><span class="small text-uppercase text-muted">CEO - Founder</span>
          <ul class="social mb-0 list-inline mt-3">
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
          </ul>
        </div>
      </div>
      <!-- End-->

      <!-- Team item-->
      

    </div>
  </div>
</div>
  
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
  $(function () {
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Chrome',
          'IE',
          'FireFox',
          'Safari',
          'Opera',
          'Navigator',
      ],
      datasets: [
        {
          data: [700,500,400,600,300,100],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
        }
      ]
    }
    })

    //- PIE CHART -
  var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
  var pieData        = donutData;
  var pieOptions     = {
    maintainAspectRatio : false,
    responsive : true,
  }
  new Chart(pieChartCanvas, {
      type: 'pie',
      data: pieData,
      options: pieOptions
    })
  </script>
</body>
</html>
