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
            <li class="breadcrumb-item active">Tambah Pengaduan</li>
          </ol>
          <div class="card">
            <div class="card-body">
              <?php
              // if (isset($_GET['id_paket'])) {
                $id_user = $_SESSION['user']['id_user'];
                $edit = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id_user'");
                $row = mysqli_fetch_array($edit)
                // if (mysqli_num_rows($edit) > 0) {
                //   while ($row = mysqli_fetch_array($edit)) {
              ?>
                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Nama Pelapor</b></label>
                        <input type="text" class="form-control" readonly name="nama_pelapor" value="<?php echo $row['nama'] ?>" />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Pilih Seksi</b></label>
                        <select name="seksi" class="form-control" id="">
                          <option> -- </option>
                          <?php 
                            $get_seksi = mysqli_query($conn, "SELECT * FROM seksi");
                            while ($x = mysqli_fetch_array($get_seksi)) {
                          ?>
                          <option value="<?php echo $x['seksi'] ?>"><?php echo $x['seksi'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>sifat aduan</b></label>
                        <select name="sifat_aduan" class="form-control" id="">
                          <option> -- </option>
                          <option value="biasa">Biasa</option>
                          <option value="segera">segera</option>
                          <option value="sangat segera">sangat segera</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Kategori</b></label>
                        <input type="text" class="form-control" name="kategori_aduan" />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Petugas Tujuan</b></label>
                        <input type="text" class="form-control" name="petugas" />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Uraian Pengaduan</b></label>
                        <input type="text" class="form-control" name="uraian_pengaduan" />
                      </div>
                      <div class="col-md-6">
                        <label for="" class="form-label-md"><b>Upload Gambar</b></label>
                        <input type="file" class="form-control" name="foto" />
                      </div>
                      <div class="col-md-12">
                        <input type="submit" class="btn btn-success" name="submit" value="Save" />
                      </div>
                    </form>
              <?php 
              // }}} 
            ?>

              <?php
              if (isset($_POST['submit'])) {
                $nama_pelapor = $_POST['nama_pelapor'];
                $seksi = $_POST['seksi'];
                $sifat_aduan = $_POST['sifat_aduan'];
                $kategori_aduan = $_POST['kategori_aduan'];
                $petugas = $_POST['petugas'];
                $uraian_pengaduan = $_POST['uraian_pengaduan'];
                $tanggal_pengaduan = date('d-m-Y');
                $balasan = '';
                $status = '';

                $filename1 = $_FILES['foto']['name'];
                $tmp_name1 = $_FILES['foto']['tmp_name'];
                $ukuran1 = $_FILES['foto']['size'];
                $type1 = explode('.', $filename1);
                $type2 = $type1[1];
                $newname1 = 'f' . time() . '.' . $type2;
                $tipe_diizinkan = array('jpg', 'jpeg', 'png', '');
                move_uploaded_file($tmp_name1, './foto/' . $newname1);

                $insert = mysqli_query($conn, "INSERT INTO aduan VALUE(
                  null,
                  '" . $petugas . "',
                  '" . $nama_pelapor . "',
                  '" . $uraian_pengaduan . "',
                  '" . $sifat_aduan . "',
                  '" . $tanggal_pengaduan . "',
                  '" . $newname1 . "',
                  '" . $balasan . "',
                  '" . $kategori_aduan . "',
                  '" . $status . "'
                )");
                if ($insert) {
              ?>
              <?php
                  echo
                  '<script>
                  window.location="aduan.php";
                  alert("data berhasil di kirim");
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