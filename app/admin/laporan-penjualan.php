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
            <li class="breadcrumb-item active">Laporan Penjualan</li>
          </ol>
          <div class="col-md-9 row mb-3">
            <form action="laporan-penjualan-pdf.php" method="GET" class="row">
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
                    <th>Nama</th>
                    <th>Produk</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Promo</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $produk = mysqli_query($conn, "SELECT * FROM keranjang LEFT JOIN produk ON keranjang.id_produk = produk.id_produk LEFT JOIN promosi ON produk.id_produk = promosi.id_produk LEFT JOIN user ON keranjang.id_user = user.id_user");
                  while ($p = mysqli_fetch_array($produk)) {
                  ?>
                    <tr style="font-size: 16px;" id="klik-tabel">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['nama']; ?></td>
                      <td><?php echo $p['nama_produk']; ?></td>
                      <td><?php echo $p['tanggal']; ?></td>
                      <td><?php echo $p['waktu']; ?></td>
                      <td><?php echo $p['promo']; ?>%</td>
                      <td><?php echo $p['riwayat']; ?></td>
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