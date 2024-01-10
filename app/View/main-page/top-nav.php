<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EDUPGT | Welcome</title>
  
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
  <style>
    #carousel {
      display: block;
      /* height: 100px; */
    }


   .carousel-item {
    position: relative;
     /* Sesuaikan tinggi carousel sesuai kebutuhan Anda */
    overflow: hidden;
    height: 700px;
  }

  .carousel-item img {
    width: 100%;
    /* height: auto; */
    transform: translateY(-10%);
  }

  .overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.7));
  }

  .carousel-caption {
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
    color: #fff; /* Warna teks caption */
  }

  .navbar {
    background: none;
  }

        .navbar .navbar-brand img{
        width:300px;
        margin-left:20px;
      }

  .hidden {
      display: none;
    }

    
    @media only screen and (max-width: 800px) {
      #carousel {
        display: none;
      }
      .navbar{
        background-color:black;
        position:relative;
      }
      .navbar .navbar-brand {
        width:100px;
      }
      .navbar .navbar-brand img{
        width:100px;
        margin-left:10px;
      }
    }
  </style>
</head>

<body class="hold-transition layout-top-nav">
  <div class="wrapper">

  <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" >
    <a class="navbar-brand" href="#">
        <img src="<?php __DIR__ ?>/img/EDU.png" class="d-inline-block align-top" alt="" >
      </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/' ? 'active' : '' ?>">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#kontak" >Contact</a>
      </li>
      <li class="nav-item dropdown <?= $_SERVER['REQUEST_URI'] == '/tentang' ? 'active' : '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          About
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/tentang" >About Apps</a>
          <a class="dropdown-item" href="/tentang2">About Authors</a>
        </div>
      </li>
      <li class="nav-item <?= $_SERVER['REQUEST_URI'] == '/faq' ? 'active' : '' ?>">
        <a class="nav-link " href="/faq">FAQ</a>
      </li>
      <li class="nav-item" style="margin-top:-10px;">
        <a class="nav-link" href="/login">
        <button type="button" class="btn btn-info">Login</button>
        </a>
      </li>
    </ul>
  </div>
</nav>


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
                <div class="overlay"></div>
                <div class="carousel-caption d-none d-md-block">
                  <h5><?= $user["headline"] ?></h5>
                  <p><?= $user["deskripsi"] ?></p>
                </div>
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

<!-- Card Section -->
<div class="container mt-5">
  <div class="row">
    <?php
    // Ambil 3 berita pertama untuk ditampilkan pada card
    $threeBerita = array_slice($beritaList, 0, 3);
    foreach ($threeBerita as $berita) :
    ?>
      <div class="col-md-4">
        <div class="card mb-4">
          <img src="<?php __DIR__ ?>/img/<?= $berita["gambar"] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?= $berita["headline"] ?></h5>
            <p class="card-text"><?= $berita["deskripsi"] ?></p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
<!-- /Card Section -->


    

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
    document.addEventListener('DOMContentLoaded', function () {
      var lastScrollTop = 100;
      var navbar = document.querySelector('.navbar');

      window.addEventListener('scroll', function () {
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > lastScrollTop) {
          // Scroll down
          navbar.classList.add('hidden');
        } else {
          // Scroll up
          navbar.classList.remove('hidden');
        }

        lastScrollTop = scrollTop;
      });
    });
  </script>
 
</body>

</html>