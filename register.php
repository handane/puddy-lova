<?php 
session_start();
include("./app/database/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

   <!-- title -->
   <title>Puddy Lova</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="./assets/images/favicon.png">
   <!-- google font -->
   <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
   <!-- fontawesome -->
   <link rel="stylesheet" href="assets/css/all.min.css">
   <!-- bootstrap -->
   <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
   <!-- owl carousel -->
   <link rel="stylesheet" href="assets/css/owl.carousel.css">
   <!-- magnific popup -->
   <link rel="stylesheet" href="assets/css/magnific-popup.css">
   <!-- animate css -->
   <link rel="stylesheet" href="assets/css/animate.css">
   <!-- mean menu css -->
   <link rel="stylesheet" href="assets/css/meanmenu.min.css">
   <!-- main style -->
   <link rel="stylesheet" href="assets/css/main.css">
   <!-- responsive -->
   <link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>

   <!--PreLoader-->
   <!-- <div class="loader">
      <div class="loader-inner">
         <div class="circle"></div>
      </div>
   </div> -->
   <!--PreLoader Ends-->

   <div class="container-fluid px-3">
      <ol class="breadcrumb mt-2">
         <li class="breadcrumb-item active">
            <h5>Registrasi Akun</h5>
         </li>
         <li class="position-absolute i-hover" style="right: 20px; cursor:pointer;">
            <a href="login.php"><i class="fas fa-sign-out-alt"></i></a>
         </li>

      </ol>
      <div class="card bx-shadow col-md-8 container">
         <div class="card-header">
            <h5 class="mb-4 mt-4">Masukkan Data</h5>
         </div>
         <div class="card-body">
            <form class="row g-3" method="POST" enctype="multipart/form-data">
               <div class="col-md-6">
                  <label for="" class="form-label-md" id="grey"><b>Nama</b></label>
                  <input type="text" class="form-control" name="nama" required />
               </div>
               <div class="col-md-6">
                  <label for="" class="form-label-md" id="grey"><b>No Telpon</b></label>
                  <input type="text" class="form-control" name="nomor_telepon" required />
               </div>
               <div class="col-md-6">
                  <label for="" class="form-label-md" id="grey"><b>Email</b></label>
                  <input type="text" class="form-control" name="email" required />
               </div>
               <div class="col-md-6">
                  <label for="" class="form-label-md" id="grey"><b>Password</b></label>
                  <input type="text" class="form-control" name="password" required />
               </div>
               <div class="col-md-12">
                  <button type="submit" name="submit" class="mt-3 btn btn-primary" style="float: right;">
                     Submit
                  </button>
               </div>
            </form>

            <?php
            if (isset($_POST['submit'])) {
               $nama = $_POST['nama'];
               $nomor_telepon = $_POST['nomor_telepon'];
               $email = $_POST['email'];
               $password = $_POST['password'];
               $frekuensi = 0;
               $status = 'Pelanggan Baru';

               if (strlen($password) >= 2 && strlen($password) <= 20) {
                  $query = mysqli_query($conn, "SELECT * FROM user WHERE email='{$email}'");
                  if (mysqli_num_rows($query) == 0) {
                     $add = mysqli_query($conn, "INSERT INTO user VALUES(
                        null,
                          '" . $nama . "',
                          '" . $nomor_telepon . "',
                          '" . $email . "',
                          '" . $password . "',
                          '" . $frekuensi . "',
                          '" . $status . "')
                          ");
                     if ($add) {
                        echo '<script>alert("data berhasil di tambahkan")</script>';
            ?>
                        <div class="alert alert-success alert-dismissible alert-atas"><img src="icons/check2-square.svg" alt=""> Pendaftaran berhasil<br>untuk login <a href="login.php" class="alert-link"> Klik disini</a>
                           <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                        </div>
                     <?php
                     } else {
                        echo 'pendaftaran gagal ' . mysqli_error($conn);
                     }
                  } else {
                     ?>
                     <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" style="margin-bottom: 4px;"> <span class="alert-link">Pendaftaran gagal,</span> email <b><?php echo $email ?></b> sudah terdaftar <br> Silahkan gunakan email lain
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                     </div>
                  <?php
                  }
               } else {
                  ?>
                  <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" style="margin-bottom: 4px;"> <span class="alert-link">Pendaftaran gagal,</span> Minimal password 5 karakter & Maksimal password 20 karakter
                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                  </div>
            <?php }
            } ?>

         </div>
      </div>
   </div>
   <!-- end breadcrumb section -->
   <!-- jquery -->
   <script src="assets/js/jquery-1.11.3.min.js"></script>
   <!-- bootstrap -->
   <script src="assets/bootstrap/js/bootstrap.min.js"></script>
   <!-- count down -->
   <script src="assets/js/jquery.countdown.js"></script>
   <!-- isotope -->
   <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
   <!-- waypoints -->
   <script src="assets/js/waypoints.js"></script>
   <!-- owl carousel -->
   <script src="assets/js/owl.carousel.min.js"></script>
   <!-- magnific popup -->
   <script src="assets/js/jquery.magnific-popup.min.js"></script>
   <!-- mean menu -->
   <script src="assets/js/jquery.meanmenu.min.js"></script>
   <!-- sticker js -->
   <script src="assets/js/sticker.js"></script>
   <!-- main js -->
   <script src="assets/js/main.js"></script>

</body>

</html>