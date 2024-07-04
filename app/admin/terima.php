<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["admin"])) {
  echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_keranjang_transaksi'])) {
   $id_keranjang_transaksi = $_GET['id_keranjang_transaksi'];
   $status = 'Pembayaran Diterima';
   $id_user = $_GET['id_user'];
   $pelanggan_lama = 'Pelanggan Lama';

   $update = mysqli_query($conn, "UPDATE keranjang SET
   riwayat = '$status'
   WHERE id_keranjang = '$id_keranjang_transaksi'");
   // if($update){
   //    echo "<script>window.location='transaksi.php'</script>";
   // }
   $get_user = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
   $array = mysqli_fetch_array($get_user);
   $frekuensi = $array['frekuensi'] + 1;
   if($frekuensi >= 5){
      $update_frekuensi = mysqli_query($conn, "UPDATE user SET
      frekuensi = '$frekuensi',
      status = '$pelanggan_lama'
      WHERE id_user = '$id_user'");
      if($update_frekuensi && $update){
         echo "<script>window.location='transaksi.php'</script>";
      }
   }else{
      $update_frekuensi = mysqli_query($conn, "UPDATE user SET
      frekuensi = '$frekuensi'
      WHERE id_user = '$id_user'");
      if($update_frekuensi && $update){
         echo "<script>window.location='transaksi.php'</script>";
      }
   }
}
?>
