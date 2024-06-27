<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["admin"])) {
  echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_keranjang_transaksi'])) {
   $id_keranjang_transaksi = $_GET['id_keranjang_transaksi'];
   $status = 'Pembayaran Diterima';

   $update = mysqli_query($conn, "UPDATE keranjang SET
   riwayat = '$status'
   WHERE id_keranjang = '$id_keranjang_transaksi'");
   if($update){
      echo "<script>window.location='transaksi.php'</script>";
   }
}
?>
