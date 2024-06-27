<?php
session_start();
include("./app/database/db.php");
if (!isset($_SESSION["user"])) {
  echo "<script>location='./login.php'</script>";
} 
$id_user = $_SESSION['user']['id_user'];
$profil = mysqli_query($conn, "SELECT * FROM user WHERE id_user = $id_user");
$p = mysqli_fetch_array($profil);
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
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<?php include('./include/nav.php') ?>
	
	<!-- end header -->
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h1>Upload Bukti Pembayaran</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-100 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Upload Bukti Pembayaran</h2>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST" enctype="multipart/form-data">
							<input type="file" name="foto" required>
							<input type="submit" class="cart-btn btn-sm" name="submit" value="Upload Bukti Pembayaran">
						</form>
						<?php
              if (isset($_POST['submit'])) {
				$id_keranjang = $_GET['id_keranjang'];
				$status = 'sudah bayar';

                $filename1 = $_FILES['foto']['name'];
				$tmp_name1 = $_FILES['foto']['tmp_name'];
				$ukuran1 = $_FILES['foto']['size'];
				$type1 = explode('.', $filename1);
				$type2 = $type1[1];
				$newname1 = 'f' . time() . '.' . $type2;
				$tipe_diizinkan = array('jpg', 'jpeg', 'png', '');

				$dest = "./foto/" . $_FILES['foto']['name'];
				move_uploaded_file($tmp_name1, './foto/' . $newname1);

                $update = mysqli_query($conn, "UPDATE keranjang SET
                           riwayat = '$status',
						   bukti_transfer = '$newname1'
                           WHERE id_keranjang = '$id_keranjang'");
                if ($update) {
              ?>
              <?php
                  echo
                  '<script>
                  window.location="riwayat-transaksi.php";
                  alert("pembayaran berhasil");
                  </script>';
                } else {
                  echo 'gagal ' . mysqli_error($conn);
                }
              }
              ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end contact form -->


	<?php include('./include/footer.php') ?>
	
	<!-- end copyright -->
	
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
	<!-- form validation js -->
	<script src="assets/js/form-validate.js"></script>
	<!-- main js -->
	<script src="assets/js/main.js"></script>
	
</body>
</html>