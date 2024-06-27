<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["admin"])) {
  echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_produk'])) {
   $id_produk = $_GET['id_produk'];
   $delete_produk = mysqli_query($conn, "DELETE FROM produk WHERE id_produk = '$id_produk'");
   if($delete_produk){
      echo "<script>window.location='variasi-produk.php'</script>";
   }
}
if (isset($_GET['id_promosi'])) {
   $id_promosi = $_GET['id_promosi'];
   $delete_promosi = mysqli_query($conn, "DELETE FROM promosi WHERE id_promosi_produk = '$id_promosi'");
   if($delete_promosi){
      echo "<script>window.location='promosi.php'</script>";
   }
}
if (isset($_GET['id_stok_produk'])) {
   $id_stok_produk = $_GET['id_stok_produk'];
   $delete_stok_produk = mysqli_query($conn, "UPDATE produk SET stok_produk = 0 WHERE id_produk = '$id_stok_produk'");
   if($delete_stok_produk){
      echo "<script>window.location='stok-produk.php'</script>";
   }
}
if (isset($_GET['id_user'])) {
   $id_user = $_GET['id_user'];
   $delete_pelanggan = mysqli_query($conn, "DELETE FROM user WHERE id_user = '$id_user'");
   if($delete_pelanggan){
      echo "<script>window.location='pelanggan.php'</script>";
   }
}
if (isset($_GET['id_kritik_saran'])) {
   $id_kritik_saran = $_GET['id_kritik_saran'];
   $delete_kritik = mysqli_query($conn, "DELETE FROM kritik_saran WHERE id_kritik_saran = '$id_kritik_saran'");
   if($delete_kritik){
      echo "<script>window.location='kritik-saran.php'</script>";
   }
}
if (isset($_GET['id_keranjang_transaksi'])) {
   $id_keranjang_transaksi = $_GET['id_keranjang_transaksi'];
   $status = 'Bukti Transfer Ditolak';

   $delete_transaksi_keranjang = mysqli_query($conn, "UPDATE keranjang SET
   riwayat = '$status'
   WHERE id_keranjang = '$id_keranjang_transaksi'");
   if($delete_transaksi_keranjang){
      echo "<script>window.location='transaksi.php'</script>";
   }
}
?>
