<?php
session_start();
include("./app/database/db.php");
if (!isset($_SESSION["user"])) {
  echo "<script>location='./login.php'</script>";
}
$status_user = $_SESSION['user']['status'];
?>
<?php
    if (isset($_POST["keranjang"])) {
        $id_produk = $_POST['id_produk'];
        $id_user =  $_POST['id_user'];
        $jumlah =  $_POST['jumlah'];
        $riwayat =  "belum checkout";
        $tanggal = '';
        $waktu = '';
        $bukti_transfer = '';

        $produk = mysqli_query($conn, "SELECT * FROM produk LEFT JOIN promosi ON produk.id_produk = promosi.id_produk WHERE produk.id_produk = '$id_produk'");
        $p = mysqli_fetch_array($produk);

        if($status_user == 'Pelanggan Lama'){
            $promo = $p['promo_lama'] / 100;
            $harga_promo = $p['harga'] * $promo;
            $harga_baru = $p['harga'] - $harga_promo;
            $total = $harga_baru * $jumlah;
            $frekuensi = 0;
        }if($status_user == 'Pelanggan Baru'){
            $promo = $p['promo_baru'] / 100;
            $harga_promo = $p['harga'] * $promo;
            $harga_baru = $p['harga'] - $harga_promo;
            $total = $harga_baru * $jumlah;
            $frekuensi = 0;
        }

        $get_regist = mysqli_query($conn, "INSERT INTO keranjang VALUE(
                    null,
                    '" . $id_produk . "',
                    '" . $id_user . "',
                    '" . $jumlah . "',
                    '" . $total . "',
                    '" . $riwayat . "',
                    '" . $tanggal . "',
                    '" . $waktu . "',
                    '" . $bukti_transfer . "'
                )");
        if ($get_regist) {
            echo '<script>alert("ditambahkan ke keranjang")</script>';
            echo '<script>window.location="checkout.php"</script>';
        } else {
            echo '<script>alert("gagal")</script>';
        }
    }
?>