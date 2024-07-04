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
    .overlay {
    display: none;
    position: fixed;
    z-index: 999;
    padding-top: 100px;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.9);
    overflow: auto;
  }

  .overlay-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 800px;
  }

  .overlay img {
    display: block;
    width: 100%;
    height: auto;
    margin: auto;
  }

  .closebtn {
    color: white;
    position: absolute;
    top: 15px;
    right: 35px;
    font-size: 40px;
    cursor: pointer;
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
            <li class="breadcrumb-item active">Laporan Frekuensi Pelanggan</li>
          </ol>
          <div class="col-md-9 row mb-3">
            <form action="laporan-frekuensi-pdf.php" method="GET" class="row">
              <!-- <div class="col-md-3">
                <label for="">Tanggal Mulai</label>
                <input type="date" class="form-control" name="tgl_start">
              </div>
              <div class="col-md-3">
                <label for="">Tanggal Berakhir</label>
                <input type="date" class="form-control" name="tgl_finish">
              </div> -->
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
                    <th>Frekuensi Pembelian</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $produk = mysqli_query($conn, "SELECT * FROM user");
                  while ($p = mysqli_fetch_array($produk)) {
                  ?>
                    <tr style="font-size: 16px;" id="klik-tabel">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['nama']; ?></td>
                      <td><?php echo $p['frekuensi']; ?></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
              <div id="overlay" class="overlay" onClick="closeOverlay()">
                <span class="closebtn">&times;</span>
                <div class="overlay-content">
                  <img id="img-overlay" src="" alt="">
                </div>
              </div>
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

  <script>
  // Fungsi untuk membuka overlay dengan gambar yang diperbesar
  function openOverlay(img) {
    var overlay = document.getElementById("overlay");
    var imgOverlay = document.getElementById("img-overlay");

    // Set gambar pada overlay
    imgOverlay.src = img.src;

    // Tampilkan overlay
    overlay.style.display = "block";
  }

  // Fungsi untuk menutup overlay
  function closeOverlay() {
    document.getElementById("overlay").style.display = "none";
  }
</script>
</body>

</html>