<?php
error_reporting(0);
session_start();
include("./app/database/db.php");
if (!isset($_SESSION["user"])) {
  echo "<script>location='./login.php'</script>";
} 

$id_user = $_SESSION["user"]['id_user'];
$produk = mysqli_query($conn, "SELECT * FROM keranjang LEFT JOIN produk ON keranjang.id_produk = produk.id_produk LEFT JOIN promosi ON produk.id_produk = promosi.id_produk WHERE keranjang.id_user = $id_user AND keranjang.riwayat = 'menunggu pembayaran' OR keranjang.id_user = $id_user AND keranjang.riwayat = 'sudah bayar' OR keranjang.id_user = $id_user AND keranjang.riwayat = 'Pembayaran Diterima' OR keranjang.id_user = $id_user AND keranjang.riwayat = 'Bukti Transfer Ditolak'");
$row = mysqli_num_rows($produk);
if ($row < 1) {
	echo '<script>alert("Belum ada riwayat transaksi")</script>';
	echo "<script>location='./produk.php'</script>";
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
						<p>Transaksi</p>
						<h1>Riwayat Pembelian</h1>
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
				<div class="col-lg-12 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-image">Hapus</th>
									<th class="product-image">Konfirmasi</th>
									<th class="product-image">Status</th>
									<th class="product-image">Gambar</th>
									<th class="product-name">Nama</th>
									<th class="product-quantity">Tanggal</th>
									<th class="product-quantity">Waktu</th>
									<th class="product-price">Harga</th>
									<th class="product-quantity">Jumlah</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								<?php $array = []; ?>
								
								<?php while($p = mysqli_fetch_array($produk)) { ?>
									<input type="hidden" name="nama" value="<?= $_SESSION['user']['nama'] ?>">
									<input type="hidden" name="promo" value="<?= $p['promo'] ?>">
								<tr class="table-body-row">
									<td class="product-remove"><a href="delete.php?id_keranjang_transaksi=<?= $p['id_keranjang'] ?>"><i class="far fa-window-close"></i></a></td>
									<?php 
										if($p['riwayat'] == 'menunggu pembayaran'){
									?>
										<td><a  class="cart-btn btn btn-sm" href="upload-bukti.php?id_keranjang=<?= $p['id_keranjang'] ?>"><i class="fas fa-money-bill-wave"></i> Upload</a></td>
									<?php }if($p['riwayat'] == 'sudah bayar'){?>
										<td>Menunggu</td>
										<?php }if($p['riwayat'] == 'Pembayaran Diterima'){ ?>
										<td>Lunas</td>
									<?php }if($p['riwayat'] == 'Bukti Transfer Ditolak'){ ?>
										<td>Ditolak</td>
										<?php } ?>
										
									<td class="product-name"><i><?= $p['riwayat'] ?></i></td>
									<td class="product-image"><img src="./app/admin/foto/<?= $p['gambar'] ?>" alt=""></td>
									<td class="product-name"><?= $p['nama_produk'] ?><input type="hidden" name="produk" value="<?= $p['nama_produk'] ?>"></td>
									<td class="product-name"><?= $p['tanggal'] ?></td>
									<td class="product-name"><?= $p['waktu'] ?></td>
									<td class="product-price">Rp. <?php echo number_format($p['harga']) ?></td>
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
			</div>
		</form>
			<?php
                if (isset($_POST["beli"])) {
                  $nama = $_POST['nama'];
                  $produk = $_POST['produk'];
                  $tanggal = date('d-m-Y');
                  $waktu = date('h:m');
                  $promo = $_POST['promo'];
                  $status = 'selesai';

                  $get_regist = mysqli_query($conn, "INSERT INTO transaksi VALUE(
                                null,
                                '" . $nama . "',
                                '" . $produk . "',
                                '" . $tanggal . "',
                                '" . $waktu . "',
                                '" . $promo . "',
                                '" . $status . "'
                            )");

					$update = mysqli_query($conn, "UPDATE keranjang SET
					riwayat = '$status',
					tanggal = '$tanggal',
					waktu = '$waktu'
					WHERE id_user = '$id_user'");
                    if ($get_regist) {
                      echo '<script>alert("pembelian berhasil")</script>';
					  echo '<script>window.location="produk.php"</script>';
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