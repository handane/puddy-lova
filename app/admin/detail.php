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
            <li class="breadcrumb-item active">Detail Pengaduan</li>
          </ol>
          <div class="card">
            <div class="card-body">
              <?php
              // if (isset($_GET['id_paket'])) {
                $id_aduan = $_GET['id_aduan'];
                $edit = mysqli_query($conn, "SELECT * FROM aduan WHERE id_aduan = '$id_aduan'");
                $row = mysqli_fetch_array($edit)
                // if (mysqli_num_rows($edit) > 0) {
                //   while ($row = mysqli_fetch_array($edit)) {
              ?>
                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Nama Pelapor</b></label>
                        <input type="text" class="form-control" value="<?php echo $row['nama_pelapor'] ?>" readonly />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Petugas Tujuan</b></label>
                        <input type="text" class="form-control" value="<?php echo $row['petugas'] ?>" readonly />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Sifat Aduan</b></label>
                        <input type="text" class="form-control" value="<?php echo $row['sifat_aduan'] ?>" readonly />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Tanggal Pengaduan</b></label>
                        <input type="text" class="form-control" value="<?php echo $row['tanggal_pengaduan'] ?>" readonly />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Kategori</b></label>
                        <input type="text" class="form-control" value="<?php echo $row['kategori_aduan'] ?>" readonly />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b><span style="color: maroon;">Status</span></b></label>
                        <select name="status" class="form-control" id="" required>
                          <option> -- </option>
                          <option value="diterima">Diterima</option>
                          <option value="ditolak">Ditolak</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <img src="./../user/foto/<?= $row['gambar'] ?>" width="190px" alt="">
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Isi Aduan</b></label>
                        <textarea name="" class="form-control" readonly id="" cols="30" rows="5"><?php echo $row['isi_aduan'] ?></textarea>
                      </div>
                      <div class="col-md-12">
                        <label for="" class="form-label-md"><b><span style="color: maroon;">Berikan Balasan</span></b></label>
                        <textarea name="balasan" class="form-control" id="" cols="30" rows="5" placeholder="tulis balasan"></textarea>
                      </div>
                      <input type="submit" name="submit" class="btn btn-success">
                    </form>
              <?php 
              // }}} 
            ?>

              <?php
              if (isset($_POST['submit'])) {
                $status = $_POST['status'];
                $balasan = $_POST['balasan'];

                $update = mysqli_query($conn, "UPDATE aduan SET
                           status = '$status',
                           balasan = '$balasan'
                           WHERE id_aduan = '$id_aduan'");
                if ($update) {
              ?>
              <?php
                  echo
                  '<script>
                  window.location="aduan.php";
                  alert("balasan berhasil di tersimpan");
                  </script>';
                } else {
                  echo 'gagal ' . mysqli_error($conn);
                }
              }
              ?>

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


</body>

</html>