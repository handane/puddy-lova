<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["admin"])) {
  echo "<script>location='../index.php'</script>";
}
$tgl_start_awal = $_GET['tgl_start'];
$tgl_finish_awal = $_GET['tgl_finish'];
$tgl_start = date('d-m-Y', strtotime($tgl_start_awal));
$tgl_finish = date('d-m-Y', strtotime($tgl_finish_awal));
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include('./include/meta.php') ?>
  
  <style>
    #ftz16 {
      font-size: 16px;
    }
    table, tr, th, td {
      border: 1px solid black;
    } 
    table td, th{
      padding: 5px;
    }
    /* table th {
      text-align: center;
    } */
    table {
      width: 100%;
    }
    body {
      background-color: #f1f1f1;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  
  <div id="layoutSidenav">
    
    <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-3">
          <div style="text-align: center;" class="mb-4">
            <h4 class="mb-2">LAPORAN PENJUALAN</h4>
            <h6 class="mt-2 mb-2"><?= $tgl_start ?>
             s/d <?= $tgl_finish ?></h6>
          </div>
          <table>
            <thead>
              <tr style="font-size: 16px;">
                <th>No</th>
                <th>Nama</th>
                <th>Produk</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <!-- <th>Promo</th> -->
                <th>Total</th>
                <th>Status</th>
                <th>Bukti Transfer</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $produk = mysqli_query($conn, "SELECT * FROM keranjang LEFT JOIN produk ON keranjang.id_produk = produk.id_produk LEFT JOIN promosi ON produk.id_produk = promosi.id_produk LEFT JOIN user ON keranjang.id_user = user.id_user WHERE keranjang.tanggal BETWEEN '$tgl_start' AND '$tgl_finish' ORDER BY tanggal ASC");
              while ($p = mysqli_fetch_array($produk)) {
              ?>
                <tr style="font-size: 16px;" id="klik-tabel">
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $p['nama']; ?></td>
                  <td><?php echo $p['nama_produk']; ?></td>
                  <td><?php echo $p['tanggal']; ?></td>
                  <td><?php echo $p['waktu']; ?></td>
                  <!-- <td><?php echo $p['promo']; ?>%</td> -->
                  <td>Rp <?php echo number_format($p['total']) ?></td>
                  <td><?php echo $p['riwayat']; ?></td>
                  <td class="pb-2 pt-2 text-center"><img src="./../../foto/<?= $p['bukti_transfer'] ?>" height="60px" alt="img"></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
      </main>
      <footer class="mt-5">
      </footer>
    </div>
  </div>
  <script src="../js/scripts.js"></script>
  <script src="../datatables/datatable.js"></script>
  <script src="../js/datatables-simple-demo.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>