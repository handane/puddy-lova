<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["admin"])) {
  echo "<script>location='../index.php'</script>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>KASIR</title>
  <link rel="icon" type="image/png" href="">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/LOGO UNMUL.png" />

  <link href="../css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    #ftz16 {
      font-size: 16px;
    }

    .tb-top {
      width: 40%;
      margin: 0 auto;
    }
    table, tr, th, td {
      border: 1px solid black;
    }

    .title-top {
      line-height: 1;
      text-align: center;
    }

    .data td {
      width: 200px;
      border: none;
      padding: 5px;
    }

    body {
      background-color: #fff;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <?php
  $id_transaksi = $_GET['id_transaksi'];
  $ping = mysqli_query($conn, "SELECT * FROM transaksi WHERE id_transaksi = '$id_transaksi'");
  $p = mysqli_fetch_array($ping);
  ?>
  <main>
    <table class="tb-top">
      <thead>
        <tr class="title-top">
          <td colspan="3">
            <h4>Aplikasi Kasir</h4>
            <h5>Jalan Kesuma Bangsa No 84. Kode Pos 75123</h5>
          </td>
        </tr>
        <tr class="data">
          <td>ID Transaksi</td>
          <td class="text-center">:</td>
          <td><?php echo $p['id_transaksi'] ?>
          </td>
        </tr>
        <tr class="data">
          <td>Tanggal</td>
          <td class="text-center">:</td>
          <td><?php echo $p['tanggal'] ?>
          </td>
        </tr>
        <tr class="data">
          <td>Nama Pelanggan</td>
          <td class="text-center">:</td>
          <td><?php echo $p['nama_pelanggan'] ?>
          </td>
        </tr>
        <tr class="data">
          <td>Nama Paket</td>
          <td class="text-center">:</td>
          <td><?php echo $p['nama_paket'] ?>
          </td>
        </tr>
        <tr class="data">
          <td>Harga Paket</td>
          <td class="text-center">:</td>
          <td><?php echo $p['biaya_paket'] ?>
          </td>
        </tr>
        <tr class="data">
          <td>Tambahan Orang</td>
          <td class="text-center">:</td>
          <td><?php echo $p['tambahan_orang'] ?>
          </td>
        </tr>
        <tr class="data">
          <td>Biaya Tambahan</td>
          <td class="text-center">:</td>
          <td><?php echo $p['biaya_tambahan'] ?>
          </td>
        </tr>
        <tr class="data">
          <td><b>Total</b></td>
          <td class="text-center"><b>:</b></td>
          <td><b><?php echo $p['total'] ?></b></td>
        </tr>
      </thead>
    </table>
  </main>
  <script src="../js/scripts.js"></script>
  <script src="../datatables/datatable.js"></script>
  <script src="../js/datatables-simple-demo.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>