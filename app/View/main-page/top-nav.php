<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EDUPGT | Top Navigation</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="<?php __DIR__ ?>/img/EDU.png" width="350" class="d-inline-block align-top" alt="" style="margin-left: 50px;">
    </a>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
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
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Tentang</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Aplikasi</a></li>
              <li><a href="#" class="dropdown-item">Pembuat</a></li>
            </ul>
          </li>

          <!-- End Level two -->
          <li class="nav-item">
            <a href="#" class="nav-link">Login</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">FAQ?</a>
          </li>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
              <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" >
        <div class="carousel-item active">
          <img src="<?php __DIR__ ?>/img/1325692.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?php __DIR__ ?>/img/1325692.jpeg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="<?php __DIR__ ?>/img/1325692.jpeg" class="d-block w-100" alt="...">
        </div>
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

  <!-- Main Footer -->
  
</div>
<div class="jumbotron" style="margin-bottom: 0;">
  <div class="card-group">
    <div class="card">
      
      <div class="card-body">
      
        <div class="footer-single-item">
          <p>eduPGT - Sistem Informasi Mahasiswa. © 2023  </p>
          <p class="contact-info"><img width="18"src="https://img.icons8.com/wired/64/online-support--v2.png" alt="online-support--v2"/> <a href="/">  0215900468</a></p>
          <p class="contact-info"><span class="far fa-envelope"></span><a href="/"> administrasi@poltek-gt.ac.id</a> </p>
          <p class="contact-info"><span><img width="18" src="https://img.icons8.com/ios/50/marker--v1.png" alt="marker--v1"/></span><a href="https://www.google.com/maps/place/Politeknik+Gajah+Tunggal/@-6.1931097,106.5666022,17z/data=!3m1!4b1!4m6!3m5!1s0x2e69fe4fc675da0f:0x84a0e5fc6c009127!8m2!3d-6.193115!4d106.5691771!16s%2Fg%2F11b6t85qc2?entry=ttu"> Politeknik Gajah Tunggal<br>Jl. Gajah Tunggal No.16,<br>Kec. Jatiuwung,<br>Kota Tangerang,<br>Banten 15133 </a></p>
        </div>

      </div>
      
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>

    <div class="card">
    <div class="card-body">
      <div class="col-md-7 col-sm-7 ">
        <div class="footer-single-item">
          <h2>LINK</h2>
          <div class="footer-links">
            <ul>
              <li><a href="https://poltek-gt.ac.id/">POLTEK-GT</a></li>
              <li><a href="https://sisfo.poltek-gt.ac.id/">SISFO POLTEK-GT</a></li>
            </ul>
          </div>
        </div>
      </div>
      </div>

      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
    <div class="card">

      <div class="card-body">
       <div class="container-fluid aos-init aos-animate" data-aos="flip-up" data-aos-duration="1000">
            <h2 class="text-4xl fw-bold color-palette-1 mb-10">Kritik &amp; Saran</h2>
            <div class="row">
                <form name="submit-to-google-sheet">
                    <div class="col mb-3">
                        <div class="form-group">
                            <label for="kritik">Kritik</label><br>
                            <textarea class="form-control" id="kritik" name="kritik" placeholder="Silahkan Isi"></textarea>
                        </div>
                    </div>
                    <div class="col mb-3">
                        <div class="form-group">
                            <label for="saran">Saran</label>
                            <textarea class="form-control" id="saran" name="saran" placeholder="Silahkan Isi"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-left:7px">Kirim</button>
                </form>
            </div>

            <p class="mt-2 text-xs color-palette-1 "><a href="/">Klik disini untuk melihat kritik dan saran</a></p>
        </div>
      </div>
      <div class="card-footer">
        <small class="text-muted">Last updated 3 mins ago</small>
      </div>
    </div>
  </div>
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
<script src="AdminLTE/dist/js/demo.js"></script>
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
