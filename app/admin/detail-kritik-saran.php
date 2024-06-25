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
            <li class="breadcrumb-item active">Produk</li>
          </ol>
          <div class="card">
            <div class="card-body">
              <?php
              if (isset($_GET['id_kritik_saran'])) {
                $id_kritik_saran = $_GET['id_kritik_saran'];
                $edit = mysqli_query($conn, "SELECT * FROM kritik_saran WHERE id_kritik_saran = '$id_kritik_saran'");
                  $row = mysqli_fetch_array($edit);
              ?>

                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                      <div class="col-md-12">
                        <label for="" class="form-label-md"><b>Nama</b></label>
                        <input type="text" class="form-control" name="nama_produk" value="<?php echo $row['nama'] ?>" readonly />
                      </div>
                      <div class="col-md-12">
                        <label for="" class="form-label-md"><b>isi Kritik Saran</b></label>
                        <textarea name="" class="form-control" id="" cols="10" rows="5" readonly><?php echo $row['isi_kritik_saran'] ?></textarea>
                      </div>
                      <div class="col-md-1">
                        <a href="kritik-saran.php" class="btn btn-secondary">Kembali</a>
                      </div>
                    </form>
              <?php } ?>

              <?php
              if (isset($_POST['submit'])) {
                $nama_produk = $_POST['nama_produk'];
                $harga = $_POST['harga'];
                $stok_produk = $_POST['stok_produk'];

                $update = mysqli_query($conn, "UPDATE produk SET
                           nama_produk = '$nama_produk',
                           harga = '$harga',
                           stok_produk = '$stok_produk'
                           WHERE id_produk = '$id_produk'");
                if ($update) {
              ?>
              <?php
                  echo
                  '<script>
                  window.location="variasi-produk.php";
                  alert("data berhasil di update");
                  </script>';
                } else {
                  echo 'gagal ' . mysqli_error($conn);
                }
              }
              ?>

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