<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>eduPGT | Log in</title>
    <?php require __DIR__ . "/../layouts/headlinks.php" ?>
    <style>
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
            background-image:url("<?php __DIR__ ?>/img/labte.jpeg");
            filter: brightness(0.2) blur(2px); /* Adjust brightness and blur values as needed */
            animation: backgroundAnimation 50s linear infinite;
        }

        .background-image {
            width: auto;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.2) blur(2px); /* Adjust brightness and blur values as needed */
            animation: backgroundAnimation 20s linear infinite;
        }

        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        @keyframes backgroundAnimation {
            0% {
                background-position: 100% 100%;
            }
            100% {
                background-position: 0% 0%;
            }
        }

        .login-box {
            display: flex;
            /* flex-direction: column; */
            justify-content: center;
            align-items: center;
            height: 50vh;
        }
        
        .card {
            /* min-width: 540px; */
            margin: 0 auto;
        }

        .card-img {
            height: 100%;
            width: 100%;
            object-fit: cover;
        } 



        @media(max-width:1000px){
            .card {
            width: 100%;
            margin: 0 auto;
        }
        }
    </style>
</head>
<body class="hold-transition login-page">

<?php
    use Krispachi\KrisnaLTE\App\FlashMessage;
    FlashMessage::flashMessage();
?>

<div class="background-container">
    <!-- <img src="<?php __DIR__ ?>/img/labte.jpeg" class="background-image" alt="Background Image"> -->
</div>
 <div class="login-logo" style="color:white;">
    <img src="<?php __DIR__ ?>/img/logo.png" alt="Logo" style="width:50px;">
<a><b>EDU</b>PGT</a>

    </div>
<div class="login-box">
   

    
   

    <div class="card mb-3" style="margin:0 auto;">
  <div class="row no-gutters">
    <div class="col-md-6" style="overflow:hidden;" id="gambar">
      <img src="<?php __DIR__ ?>/img/apel.jpeg" class="card-img" alt="..." style="height:100%; width:100%;object-fit:cover;">
    </div>
    <div class="col-md-6">
    <div class="card-body login-card-body" style="border-top-left-radius:10px;border-top-right-radius:10px;">
            <p class="login-box-msg">Log In untuk melanjutkan ke aplikasi</p>

            <form action="/login" method="post">
                <div class="input-group mb-3">
                    <input type="username" name="username" class="form-control" placeholder="Username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <!-- <span class="far fa-eye mr-2 eye-icon" onclick="hideShowPassword()"></span> -->
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class=" offset-4"><button type="submit" name="button-login" class="btn btn-primary btn-block mb-3">Log In</button></div>
                    <!-- /.col -->
                </div>
            </form>

            
            <p class="m-0"><a href="/forgot-password" class="text-center">Lupa Password?</a></p>
        </div>
    </div>
  </div>
</div>
</div>
<!-- /.login-box -->

<?php require __DIR__ . "/../layouts/bodyscripts.php" ?>
<script>
    $(document).ready(function() {
        function hideShowPassword() {
            if($("#password").attr("type") === "password") {
                $("#password").attr("type", "text");
                $(".eye-icon").removeClass("fa-eye").addClass("fa-eye-slash");
            } else {
                $("#password").attr("type", "password");
                $(".eye-icon").removeClass("fa-eye-slash").addClass("fa-eye");
            }
        }
    });
</script>
</body>
</html>
