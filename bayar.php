<?php
error_reporting(0);
session_start();
include("./app/database/db.php");
if (!isset($_SESSION["user"])) {
  echo "<script>location='./login.php'</script>";
} 
if (isset($_GET["id_keranjang_transaksi"])) {
    $status = 'sudah bayar';
    $id_keranjang_transaksi = $_GET['id_keranjang_transaksi'];
    $update = mysqli_query($conn, "UPDATE keranjang SET
    riwayat = '$status'
    WHERE id_keranjang = '$id_keranjang_transaksi'");
    if ($update) {
        echo '<script>alert("pembayaran berhasil")</script>';
        echo '<script>window.location="riwayat-transaksi.php"</script>';
    } else {
        echo '<script>alert("pembayaran gagal")</script>';
    }
}
?>