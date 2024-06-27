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
            <li class="breadcrumb-item active">Laporan Kritik Saran</li>
          </ol>
          <div class="col-md-9 row mb-3">
            <form action="laporan-kritik-pdf.php" method="GET" class="row">
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
                    <th>Tanggal</th>
                    <th>Isi Kritik Saran</th>
                    <th>Balasan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $no = 1;
                    $get_paket = mysqli_query($conn, "SELECT * FROM kritik_saran");
                    while ($p = mysqli_fetch_array($get_paket)) {
                  ?>
                    <tr style="font-size: 16px;" id="klik-tabel">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['nama']; ?></td>
                      <td><?php echo $p['tanggal']; ?></td>
                      <td><?php echo substr($p['isi_kritik_saran'], 0, 200); ?></td>
                      <td><?php echo substr($p['balasan'], 0, 200); ?></td>
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