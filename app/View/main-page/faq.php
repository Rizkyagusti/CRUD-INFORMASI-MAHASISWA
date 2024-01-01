<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>EDUPGT | FAQs</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="AdminLTE/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/faqs/faq-3/assets/css/faq-3.css">
<script src="https://unpkg.com/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <?php require __DIR__ . "/navbar.php" ?>

 <!-- FAQ 3 - Bootstrap Brain Component -->
<section class="bsb-faq-3 py-3 py-md-5 py-xl-8">
  <div class="container">
    <div class="row justify-content-md-center">
      <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
        <h2 class="mb-4 display-5 text-center">Frequently Asked Questions</h2>
        <p class="text-secondary text-center lead fs-4">Selamat datang di halaman FAQ kami, sumber informasi lengkap untuk jawaban atas pertanyaan yang sering diajukan.</p>
        <p class="mb-5 text-center">Baik anda adalah pengguna baru yang ingin memahami lebih banyak tentang apa yang kami berikan atau pengguna jangka panjang yang memiliki kepentingan lain, halaman ini menyediakan informasi yang jelas dan ringkas tentang akun dan layanan kami.</p>
        <hr class="w-50 mx-auto mb-5 mb-xl-9 border-dark-subtle">
      </div>
    </div>
  </div>

  <!-- FAQs: My Account -->
  <div class="mb-8">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-11 col-xl-10">
          <div class="d-flex align-items-end mb-5">
            <i class="bi bi-person-gear me-3 lh-1 display-5"></i>
            <h3 class="m-0">Tentang Akun Kamu</h3>
          </div>
        </div>
        <div class="col-11 col-xl-10">
          <div class="accordion accordion-flush" id="faqAccount">
            <div class="accordion-item bg-transparent border-top border-bottom py-3">
              <h2 class="accordion-header" id="faqAccountHeading1">
                <button class="accordion-button collapsed bg-transparent fw-bold shadow-none link-primary" type="button" data-bs-toggle="collapse" data-bs-target="#faqAccountCollapse1" aria-expanded="false" aria-controls="faqAccountCollapse1">
                 Bagaimana cara membuat akun?
                </button>
              </h2>
              <div id="faqAccountCollapse1" class="accordion-collapse collapse" aria-labelledby="faqAccountHeading1">
                <div class="accordion-body">
                  <p>Akun mahasiswa akan diberikan oleh administrasi BAAK berdasarkan NIM yang dimiliki mahasiswa dan dengan berdasar ketentuan lain yang dapat diketahui oleh mahasiswa itu sendiri.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item bg-transparent border-bottom py-3">
              <h2 class="accordion-header" id="faqAccountHeading2">
                <button class="accordion-button collapsed bg-transparent fw-bold shadow-none link-primary" type="button" data-bs-toggle="collapse" data-bs-target="#faqAccountCollapse2" aria-expanded="false" aria-controls="faqAccountCollapse2">
                  Bagaimana jika saya lupa password?
                </button>
              </h2>
              <div id="faqAccountCollapse2" class="accordion-collapse collapse" aria-labelledby="faqAccountHeading2">
                <div class="accordion-body">
                  <p>Kamu dapat menghubungi BAAK untuk meminta perubahan password yang kamu lupa sebelumnya.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item bg-transparent border-bottom py-3">
              <h2 class="accordion-header" id="faqAccountHeading3">
                <button class="accordion-button collapsed bg-transparent fw-bold shadow-none link-primary" type="button" data-bs-toggle="collapse" data-bs-target="#faqAccountCollapse3" aria-expanded="false" aria-controls="faqAccountCollapse3">
                  Bagaimana dapat mengamankan akun saya?
                </button>
              </h2>
              <div id="faqAccountCollapse3" class="accordion-collapse collapse" aria-labelledby="faqAccountHeading3">
                <div class="accordion-body">
                  <p>Untuk mengamankan akun, kamu dapat merubah password default yang telah diberikan oleh BAAK untuk menjaga keamanan akun, juga pastikan password yang kamu rubah berupa karakter unik atau khusus.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item bg-transparent border-bottom py-3">
              <h2 class="accordion-header" id="faqAccountHeading4">
                <button class="accordion-button collapsed bg-transparent fw-bold shadow-none link-primary" type="button" data-bs-toggle="collapse" data-bs-target="#faqAccountCollapse4" aria-expanded="false" aria-controls="faqAccountCollapse4">
                 Apa yang dapat saya lakukan ketika sudah bisa login?
                </button>
              </h2>
              <div id="faqAccountCollapse4" class="accordion-collapse collapse" aria-labelledby="faqAccountHeading4">
                <div class="accordion-body">
                  <p>Pertama kali kamu perlu mengajukan data mahasiswa pada halaman pengajuan untuk kemudian setelahnya kamu dapat menggunakan fitur perizinan mahasiswa untuk hal tertentu.</p>
                </div>
              </div>
            </div>
            <div class="accordion-item bg-transparent border-bottom py-3">
              <h2 class="accordion-header" id="faqAccountHeading5">
                <button class="accordion-button collapsed bg-transparent fw-bold shadow-none link-primary" type="button" data-bs-toggle="collapse" data-bs-target="#faqAccountCollapse5" aria-expanded="false" aria-controls="faqAccountCollapse5">
                  Bagaimana jika perizinan saya belum diproses, bahkan jika diproses begitu lama?
                </button>
              </h2>
              <div id="faqAccountCollapse5" class="accordion-collapse collapse" aria-labelledby="faqAccountHeading5">
                <div class="accordion-body">
                  <p>Kamu perlu menunggu administrasi BAAK mereview perizinan yang kamu ajukan, mohon tunggu untuk proses review yang baik supaya terhindar dari kesalahan kedua belah pihak.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  
  

</section>

<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted" style="padding-top: 50px;"> 
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
