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
            <h4 class="mb-2">LAPORAN KRITIK SARAN</h4>
            <h6 class="mt-2 mb-2"><?= $tgl_start_formated ?>
             s/d <?= $tgl_finish_formated ?></h6>
          </div>
          <table>
            <thead>
              <tr style="font-size: 16px;">
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Isi Kritik Saran</th>
                <th>Balasan/th>
              </tr>
            </thead>
            <tbody>
                <?php
                  $no = 1;
                  $get_paket = mysqli_query($conn, "SELECT * FROM kritik_saran WHERE tanggal BETWEEN '$tgl_start_formated' AND '$tgl_finish_formated' ORDER BY tanggal ASC");
                  while ($p = mysqli_fetch_array($get_paket)) {
                  ?>
                <tr style="font-size: 16px;" id="klik-tabel">
                  <td><?php echo $no++; ?></td>
                  <td><?php echo $p['nama']; ?></td>
                  <td><?php echo $p['tanggal']; ?></td>
                  <td><?php echo substr($p['isi_kritik_saran'], 0, 300); ?></td>
                  <td><?php echo substr($p['balasan'], 0, 300); ?></td>
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