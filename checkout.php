<?php
error_reporting(0);
session_start();
include("./app/database/db.php");
if (!isset($_SESSION["user"])) {
  echo "<script>location='./login.php'</script>";
} 
$id_user = $_SESSION["user"]['id_user'];
$produk = mysqli_query($conn, "SELECT * FROM keranjang LEFT JOIN produk ON keranjang.id_produk = produk.id_produk LEFT JOIN promosi ON produk.id_produk = promosi.id_produk WHERE keranjang.id_user = $id_user AND keranjang.riwayat = 'belum checkout'");
$row = mysqli_num_rows($produk);
$status_pelanggan = $_SESSION['user']['status'];

// if ($row < 1) {
// 	echo "<script>location='./produk.php'</script>";
//   } 
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
						<p>Checkout</p>
						<h1>Keranjang</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
		<form action="" method="POST">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-image"></th>
									<th class="product-image">Image</th>
									<th class="product-name">Nama</th>
									<th class="product-price">Harga</th>

									<?php if($status_pelanggan == "Pelanggan Lama"){ ?>
										<th class="product-quantity">Promo(%)</th>
									<?php }else{
										?>
										<th class="product-quantity">Promo(%)</th>
										<?php 
									} ?>
									<th class="product-quantity">Jumlah</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$array = []; 
								?>
								<?php while($p = mysqli_fetch_array($produk)) { ?>
								
								<tr class="table-body-row">
									<td class="product-remove"><a href="delete.php?id_keranjang=<?= $p['id_keranjang'] ?>"><i class="far fa-window-close"></i></a></td>
									<input type="hidden" name="nama" value="<?= $_SESSION['user']['nama'] ?>">
									<input type="hidden" name="promo" value="<?= $p['promo'] ?>">
									<td class="product-image"><img src="./app/admin/foto/<?= $p['gambar'] ?>" alt=""></td>
									<td class="product-name"><?= $p['nama_produk'] ?><input type="hidden" name="produk" value="<?= $p['nama_produk'] ?>"></td>
									<td class="product-price">Rp. <?php echo number_format($p['harga']) ?></td>

									<?php if($status_pelanggan == 'Pelanggan Lama'){ ?>
										<td class="product-price">
											<?php echo $p['promo_lama'] ?>%
										</td>
									<?php }else{ ?>
										<td class="product-price">
											<?php echo $p['promo_baru'] ?>%
										</td>
									<?php } ?>
									<td class="product-quantity"><?php echo $p['jumlah'] ?><input type="hidden" name="jumlah" value="<?php echo $p['jumlah'] ?>"></td>
									<td class="product-total">Rp <?php echo number_format($p['total']) ?></td>
									<?php 
										$total = $p['total'];
										array_push($array, $total );
									?>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Biaya Pengiriman: </strong></td>
									<td>Rp. 15.000</td>
								</tr>
								<tr class="total-data">
									<?php 
										$total_akhir = array_sum($array);
										$total_paling_akhir = $total_akhir + 15000;
									?>
									<td><strong>Total: </strong></td>
									<td>Rp <?php echo number_format($total_paling_akhir) ?><input type="hidden" name="total" value="<?php echo number_format($total_paling_akhir) ?>"></td>
								</tr>
							</tbody>
						</table>
						<?php 
						if ($row < 1) {
							// echo "<script>location='./produk.php'</script>";
						} else{
						?>
						<div class="cart-buttons">
							<input type="submit" name="beli" class="cart-btn" value="Checkout">
						</div>
						<?php } ?>
						
					</div>
				</div>
			</div>
		</form>
		<?php
                if (isset($_POST["beli"])) {
					date_default_timezone_set('Asia/Jakarta');
                  $nama = $_POST['nama'];
                  $produk = $_POST['produk'];
                  $tanggal = date('d-m-Y');
                  $waktu = date('H:i');
                  $promo = $_POST['promo'];
                  $status = 'menunggu pembayaran';

                //   $get_regist = mysqli_query($conn, "INSERT INTO transaksi VALUE(
                //                 null,
                //                 '" . $nama . "',
                //                 '" . $produk . "',
                //                 '" . $tanggal . "',
                //                 '" . $waktu . "',
                //                 '" . $promo . "',
                //                 '" . $status . "'
                //             )");

					$update = mysqli_query($conn, "UPDATE keranjang SET
					riwayat = '$status',
					tanggal = '$tanggal',
					waktu = '$waktu'
					WHERE id_user = '$id_user' AND riwayat = 'belum checkout'");
                    if ($update) {
                      echo '<script>alert("pembelian berhasil")</script>';
					  echo '<script>window.location="riwayat-transaksi.php"</script>';
                    } else {
                      echo '<script>alert("pembelian gagal")</script>';
                    }
                }
            ?>
		</div>
	</div>
	<!-- end logo carousel -->

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
	<!-- main js -->
	<script src="assets/js/main.js"></script>

</body>
</html>