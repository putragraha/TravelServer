<?php
require 'config/koneksi.php';
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
  <title>Neptuunia Travel &rsaquo; Login Administrator</title>
  <!-- Favicon -->
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
  <!-- CSS -->
  <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/modules/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="assets/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="assets/modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- JS Sweet Alert -->
  <script src="assets/modules/sweetalert/sweetalert.min.js"></script>
</head>

<body background="Univrab-depan.jpg" >
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <h2>Neptuunia Travel</h2>
            </div>

            <div class="card ">
              <div class="card-header"><center><h2>Login</h2></center></div>

              <div class="card-body">
                <form method="POST" class="needs-validation" novalidate="">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Masukkan Email. . .
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      Masukkan Password. . .
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" name="login" class="btn btn-warning btn-block" tabindex="4">
                      Masuk
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php //Aksi Login
  if(isset($_POST['login'])) {
  session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    //Query SQL
    $login = mysqli_query($konek," SELECT * FROM admin WHERE email='$email' AND password='$password' ");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah email dan password di temukan pada database
if($cek > 0){

  $data = mysqli_fetch_assoc($login);

  // cek jika user login sebagai admin
  if($data){

    // buat session login dan email
    $_SESSION['email'] = $email;
    $_SESSION['nama'] = $data['nama_admin'];
    $_SESSION['foto'] = $data['foto'];
    $_SESSION['id'] = $data['id'];
    // alihkan ke halaman dashboard admin
    header("location:admin.php");

  // cek jika user login sebagai pegawai
  }
 else {
        echo "<script>
          swal('Gagal!', 'Password anda Salah', 'error')
        </script>";
      }
    } else {
      echo "<script>
        swal('Gagal!', 'Email belum terdaftar', 'error')
      </script>";
    }
  }
  ?>
  <script src="assets/modules/jquery.min.js"></script>
  <script src="assets/modules/popper.js"></script>
  <script src="assets/modules/tooltip.js"></script>
  <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="assets/modules/moment.min.js"></script>
  <script src="assets/modules/scroll-up-bar/dist/scroll-up-bar.min.js"></script>
  <script src="assets/js/sa-functions.min.js"></script>
  <script src="assets/js/scripts.min.js"></script>
  <script src="assets/js/custom.js"></script>
</body>
</html>