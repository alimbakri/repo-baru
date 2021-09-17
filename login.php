<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="template/css/sb-admin-2.css" rel="stylesheet">
    <style>
        #myVideo{
            position: fixed;
            right: 0;
            z-index: 0;
            bottom: 0;
            min-width: 100%; 
            min-height: 100%;
        }
        .tcont{
            z-index: 0;
            position: fixed;
            right: 0;
            background: rgba(0,0,0,0.2);
            bottom: 0;
            min-width: 100%; 
            min-height: 100%;
        }
        ::placeholder{
            color:white !important;
        }
    </style>

</head>

<body class="bg-gradient-primary">
    <video autoplay muted loop id="myVideo">
      <source src="statics/smv.mp4" type="video/mp4">
      
    </video>
    <div class="tcont"></div>
    <div class="container" style="margin-top: 50px">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" style="background:rgba(255,255,255,0.1);">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                             
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 mb-4" style="color:white">Selamat Datang Kembali</h1>
                                    </div>
                                    <form class="user" action="auth/login.php" method="POST">
                                        <div class="form-group">
                                            <input name="email" type="email" class="form-control form-control-user"
                                                style="background:rgba(255,255,255,0.1);border:.1em white solid;color:white"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Masukkan alamat E-Mail...">
                                        </div>
                                        <div class="form-group">
                                            <input name="password" type="password" class="form-control form-control-user"
                                            style="background:rgba(255,255,255,0.1);border:.1em white solid;color:white"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        
                                        <button class="btn btn-primary btn-user btn-block">
                                        	Masuk Ke Sistem
                                        </button>
                                        
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                    	<small style="color:white">&copy; 2021 SISTEM INFORMASI PERSUARATAN BERBASIS WEB PADA PEMERINTAH KABUPATEN GOWA</small><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>