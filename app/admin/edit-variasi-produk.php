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
            <li class="breadcrumb-item active">Edit Produk</li>
          </ol>
          <div class="card">
            <div class="card-body">
              <?php
              if (isset($_GET['id_produk'])) {
                $id_produk = $_GET['id_produk'];
                $edit = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk = '$id_produk'");
                  $row = mysqli_fetch_array($edit);
              ?>

                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Nama</b></label>
                        <input type="text" class="form-control" name="nama_produk" value="<?php echo $row['nama_produk'] ?>" />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>harga</b></label>
                        <input type="text" class="form-control" name="harga" value="<?php echo $row['harga'] ?>" />
                      </div>
                      <!-- <div class="col-md-6">
                        <label for="" class="form-label-md"><b>stok</b></label>
                        <input type="text" class="form-control" name="stok_produk" value="<?php echo $row['stok_produk'] ?>" />
                      </div> -->
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Gambar</b></label>
                        <input type="file" class="form-control" name="foto" required />
                      </div>
                      <div class="col-md-12">
                        <input type="submit" class="btn btn-success" name="submit" value="Save" />
                      </div>
                    </form>
              <?php } ?>

              <?php
              if (isset($_POST['submit'])) {
                $nama_produk = $_POST['nama_produk'];
                $harga = $_POST['harga'];
                $stok_produk = $_POST['stok_produk'];

                $filename1 = $_FILES['foto']['name'];
                $tmp_name1 = $_FILES['foto']['tmp_name'];
                $ukuran1 = $_FILES['foto']['size'];
                $type1 = explode('.', $filename1);
                $type2 = $type1[1];
                $newname1 = 'f' . time() . '.' . $type2;
                $tipe_diizinkan = array('jpg', 'jpeg', 'png', '');

                $dest = "./foto/" . $_FILES['foto']['name'];
                move_uploaded_file($tmp_name1, './foto/' . $newname1);

                $update = mysqli_query($conn, "UPDATE produk SET
                           nama_produk = '$nama_produk',
                           gambar = '$newname1',
                           harga = '$harga'
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