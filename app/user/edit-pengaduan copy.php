<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["user"])) {
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
            <li class="breadcrumb-item active">Update Paket</li>
          </ol>
          <div class="card">
            <div class="card-body">
              <?php
              if (isset($_GET['id_paket'])) {
                $id_paket = $_GET['id_paket'];
                $edit = mysqli_query($conn, "SELECT * FROM aduan WHERE id_paket = '$id_paket'");
                if (mysqli_num_rows($edit) > 0) {
                  while ($row = mysqli_fetch_array($edit)) {
              ?>

                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Nama Paket</b></label>
                        <input type="text" class="form-control" name="nama_paket" value="<?php echo $row['nama_paket'] ?>" />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Deskripsi Paket</b></label>
                        <input type="text" class="form-control" name="deskripsi_paket" value="<?php echo $row['deskripsi_paket'] ?>" />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Harga</b></label>
                        <input type="text" class="form-control" name="harga" value="<?php echo $row['harga'] ?>" />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Harga Tambahan/Orang</b></label>
                        <input type="number" class="form-control" name="harga_tambahan" value="<?php echo $row['harga_tambahan'] ?>" />
                      </div>
                      <div class="col-md-12">
                        <input type="submit" class="btn btn-success" name="submit" value="Save" />
                      </div>
                    </form>
              <?php }
                }
              } ?>

              <?php
              if (isset($_POST['submit'])) {
                $nama_paket = $_POST['nama_paket'];
                $deskripsi_paket = $_POST['deskripsi_paket'];
                $harga = $_POST['harga'];
                $harga_tambahan = $_POST['harga_tambahan'];

                $update = mysqli_query($conn, "UPDATE paket SET
                           nama_paket = '$nama_paket',
                           deskripsi_paket = '$deskripsi_paket',
                           harga = '$harga',
                           harga_tambahan = '$harga_tambahan'
                           WHERE id_paket = '$id_paket'");
                if ($update) {
              ?>
              <?php
                  echo
                  '<script>
                  window.location="data-paket.php";
                  alert("data berhasil di update");
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