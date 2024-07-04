<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["admin"])) {
  echo "<script>location='../index.php'</script>";
}
$tgl_start = $_GET['tgl_start'];
$tgl_finish = $_GET['tgl_finish'];
$tgl_start_formated = date('d-m-Y', strtotime($tgl_start));
$tgl_finish_formated = date('d-m-Y', strtotime($tgl_finish));
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
      text-indent: 10px;
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
            <h4 class="mb-2">LAPORAN PROMOSI</h4>
            <h6 class="mt-2 mb-2"><?= $tgl_start_formated ?>
             s/d <?= $tgl_finish_formated ?></h6>
          </div>
          <table>
            <thead>
              <tr style="font-size: 16px;">
              <th>No</th>
              <th>Produk</th>
              <th>Promo Pelanggan Lama</th>
              <th>Promo Pelanggan Baru</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Berakhir</th>
              </tr>
            </thead>
            <tbody>
                <?php
                  $no = 1;
                  $produk = mysqli_query($conn, "SELECT * FROM promosi LEFT JOIN produk ON promosi.id_produk = produk.id_produk WHERE promosi.mulai BETWEEN '$tgl_start' AND '$tgl_finish' AND promosi.promo_lama > 0 || promosi.promo_baru > 0 ORDER BY mulai ASC");
                  while ($p = mysqli_fetch_array($produk)) {
                  ?>
                <tr style="font-size: 16px;" id="klik-tabel">
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $p['nama_produk']; ?></td>
                    <td><?php echo $p['promo_lama']; ?>%</td>
                    <td><?php echo $p['promo_baru']; ?>%</td>
                    <td><?php echo $p['mulai']; ?></td>
                    <td><?php echo $p['berakhir']; ?></td>
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