<?php
session_start();
include("./app/database/db.php");
if (!isset($_SESSION["user"])) {
  echo "<script>location='./login.php'</script>";
} 
$status_user = $_SESSION['user']['status'];
$id_user = $_SESSION["user"]['id_user'];
$id_produk = $_GET['id_produk'];
$produk = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN promosi ON produk.id_produk = promosi.id_produk WHERE produk.id_produk = '$id_produk'");
$p = mysqli_fetch_array($produk);
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
						<p>See more Details</p>
						<h4 style="color: white;">Detail Produk</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- single product -->
	<div class="single-product mt-150 mb-150">
		<div class="container">
			<form action="post-keranjang.php" method="POST">
				<div class="row">
					<div class="col-md-5">
						<div class="single-product-img">
							<img src="./app/admin/foto/<?= $p['gambar'] ?>" alt="">
						</div>
					</div>
					<div class="col-md-7">
						<div class="single-product-content">
							<h3><?php echo $p['nama_produk'] ?></h3>
							<p class="single-product-pricing"><span>Rp <?php echo number_format($p['harga']) ?></span></p>
							<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta sint dignissimos, rem commodi cum voluptatem quae reprehenderit repudiandae ea tempora incidunt ipsa, quisquam animi perferendis eos eum modi! Tempora, earum.</p> -->
							<div class="single-product-form">
								<?php 
								if($status_user == 'Pelanggan Baru'){
									?>
									<p><strong>Promo: </strong><?php echo $p['promo_baru'] ?>%</p>
									<?php 
								}
								if($status_user == 'Pelanggan Lama'){ ?>
								<p><strong>Promo: </strong><?php echo $p['promo_lama'] ?>%</p>
								<?php } ?>
								
								<p><strong>Stok: </strong><?php echo $p['stok_produk'] ?></p>
								<p class="mb-1"><strong>Deskripsi Produk</strong></p>
								<p style="text-align: justify;"><?php echo $p['deskripsi'] ?></p>
								<p><strong>Jumlah Beli</strong></p>
								<input type="number" name="jumlah" value="1">
							</div>
							<h4></h4>
							<input type="hidden" name="id_produk" value="<?= $id_produk ?>">
							<input type="hidden" name="id_user" value="<?= $id_user ?>">
							<!-- <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a> -->
							<!-- <a href="post-keranjang.php?id_produk=<?= $id_produk ?>&id_user=<?= $id_user ?>" class="cart-btn"><i class="fas fa-shopping-cart"></i></a> -->
							<!-- <input type="submit" name="beli" value="Checkout" class="cart-btn"> -->
							<button type="submit" name="keranjang" class="cart-btn"><i class="fas fa-shopping-cart"></i> Masukkan Keranjang</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

	<!-- footer -->
	<?php include('./include/footer.php') ?>
	
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