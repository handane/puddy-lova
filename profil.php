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
						<h1>Profil</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Perbarui Profil</h2>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="post">
							<p>
								<input type="text" placeholder="Nama" name="nama" id="name" value="<?php echo $p['nama'] ?>">
								<input type="text" placeholder="Email" name="email" id="email" value="<?php echo $p['email'] ?>">
							</p>
							<p>
								<input type="text" placeholder="telepon" name="telepon" id="phone" value="<?php echo $p['no_hp'] ?>">
								<input type="text" placeholder="password" name="password" id="subject" value="<?php echo $p['password'] ?>" >
							</p>
							<p><input type="submit" name="submit" value="Submit"></p>
						</form>
						<?php
              if (isset($_POST['submit'])) {
                $nama = $_POST['nama'];
				$email = $_POST['email'];
				$telepon = $_POST['telepon'];
				$password = $_POST['password'];

                $update = mysqli_query($conn, "UPDATE user SET
                           nama = '$nama',
						   email = '$email',
						   no_hp = '$telepon',
						   password = '$password'
                           WHERE id_user = '$id_user'");
                if ($update) {
              ?>
              <?php
                  echo
                  '<script>
                  window.location="profil.php";
                  alert("data berhasil di update");
                  </script>';
                } else {
                  echo 'gagal ' . mysqli_error($conn);
                }
              }
              ?>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="contact-form-wrap">
						<div class="contact-form-box">
							<h4><i class="fas fa-map"></i> Nama</h4>
							<p><?php echo $p['nama'] ?></p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-book"></i> Email</h4>
							<p><?php echo $p['email'] ?></p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-address-book"></i> No Telepon</h4>
							<p><?php echo $p['no_hp'] ?></p>
						</div>
						<div class="contact-form-box">
							<h4><i class="fas fa-key"></i> Password</h4>
							<p><?php echo $p['password'] ?></p>
						</div>
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