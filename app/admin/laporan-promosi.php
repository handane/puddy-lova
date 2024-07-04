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
  <?php include('./include/meta.php') ?>
  
  <style>
    #ftz16 {
      font-size: 16px;
    }

    body {
      background-color: #f1f1f1;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <?php include('./include/nav.php') ?>
  
  <div id="layoutSidenav">
    <?php include('./include/sidenav.php') ?>
    
    <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-3">
          <ol class="breadcrumb mb-4 mt-2">
            <li class="breadcrumb-item active">Laporan Promosi</li>
          </ol>
          <div class="col-md-9 row mb-3">
            <form action="laporan-promosi-pdf.php" method="GET" class="row">
              <div class="col-md-3">
                <label for="">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tgl_start">
              </div>
              <div class="col-md-3">
                <label for="">Tanggal Berakhir</label>
                <input type="date" class="form-control" name="tgl_finish">
              </div>
              <div class="col-md-3">
                <label for="" class="mb-5"></label>
                <input type="submit" name="submit" value="Cetak Laporan" class="btn btn-sm btn-warning mb-2">
              </div>
            </form>
          </div>
          <div class="card">
            <div class="card-body">
              <table id="datatablesSimple">
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
                  $produk = mysqli_query($conn, "SELECT * FROM promosi LEFT JOIN produk ON promosi.id_produk = produk.id_produk WHERE promosi.promo_lama > 0 || promosi.promo_baru > 0");
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
            </div>
          </div>
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