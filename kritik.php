<?php
session_start();
include("./app/database/db.php");
if (!isset($_SESSION["user"])) {
  echo "<script>location='./login.php'</script>";
}
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

	<style>
		table, tr, th, td {
			color: white;
			border: 1px solid white;
			text-indent: 10px;
			padding: 10px;
		}
		table {
			width: 100%;
			margin-bottom: 100px;
		}
	</style>

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<?php include('./include/nav.php') ?>
	
	<!-- end header -->

	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<h4 style="color: white;">Kritik & Saran</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- contact form -->
	<div class="contact-from-section mt-150 mb-4">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 mb-5 mb-lg-0">
					<div class="form-title">
						<h2>Masukkan kritik dan Saran</h2>
						<p></p>
					</div>
				 	<div id="form_status"></div>
					<div class="contact-form">
						<form method="POST">
							<p>
								<input type="text" placeholder="Name" name="nama">
							</p>
							<p><textarea name="isi" cols="30" rows="10" placeholder="Message"></textarea></p>
							<input style="background-color: #ff4fe2;" type="submit" name="kirim" value="Submit">
						</form>
						<?php
                if (isset($_POST["kirim"])) {
					$id_user = $_SESSION['user']['id_user'];
                  $nama = $_POST['nama'];
                  $tanggal = date('d-m-Y');
				  $isi = $_POST['isi'];
				  $balasan = '';

                  $get_regist = mysqli_query($conn, "INSERT INTO kritik_saran VALUE(
                                null,
								'" . $id_user . "',
                                '" . $nama . "',
                                '" . $tanggal . "',
                                '" . $isi . "',
                                '" . $balasan . "'
                            )");
                    if ($get_regist) {
                      echo '<script>alert("kritik saran berhasil terkirim")</script>';
					  echo '<script>window.location="kritik.php"</script>';
                    } else {
                      echo '<script>alert("data gagal terkirim")</script>';
                    }
                }
                ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="find-location blue-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h4 style="color: white;" class="m-5">Kritik Terkirim</h4>
					<table id="datatablesSimple">
                <thead>
                  <tr style="font-size: 16px;">
                    <th>Tanggal</th>
                    <th>Isi Kritik Saran</th>
					<th>Balasan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
					$id_user = $_SESSION['user']['id_user'];
                    $get_paket = mysqli_query($conn, "SELECT * FROM kritik_saran WHERE id_user = '$id_user'");
                    while ($p = mysqli_fetch_array($get_paket)) {
                  ?>
                    <tr style="font-size: 16px;" id="klik-tabel">
                      <td><?php echo $p['tanggal']; ?></td>
                      <td><?php echo $p['isi_kritik_saran']; ?></td>
					  <td><?php echo $p['balasan']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
				</div>
			</div>
		</div>
	</div>
	<!-- end google map section -->

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