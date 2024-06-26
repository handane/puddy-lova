<?php
session_start();
include("./app/database/db.php");
if (!isset($_SESSION["user"])) {
  echo "<script>location='./login.php'</script>";
} 

if (isset($_GET['id_keranjang'])) {
   $id_keranjang = $_GET['id_keranjang'];
   $delete_keranjang = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang'");
   if($delete_keranjang){
      echo "<script>window.location='checkout.php'</script>";
   }
}
if (isset($_GET['id_keranjang_transaksi'])) {
   $id_keranjang_transaksi = $_GET['id_keranjang_transaksi'];
   $delete_keranjang_transaksi = mysqli_query($conn, "DELETE FROM keranjang WHERE id_keranjang = '$id_keranjang_transaksi'");
   if($delete_keranjang_transaksi){
      echo "<script>window.location='riwayat-transaksi.php'</script>";
   }
}
?>
