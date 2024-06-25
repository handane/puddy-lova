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
          <!-- <ol class="breadcrumb mb-4 mt-2">
            <li class="breadcrumb-item active">Data Pengaduan</li>
          </ol>
          <div class="card">
            <div class="card-body">
                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                    <?php
                        $edit = mysqli_query($conn, "SELECT * FROM seksi");
                        $row = mysqli_fetch_array($edit);
                     ?>
                      <div class="col-md-4 card card-body">
                        <label for="" class="form-label-md"><b></b></label>
                        <input type="text" class="form-control" name="seksi"/>
                        <input type="submit" class="btn btn-success mt-4" name="submit_struktur" value="Tambah" />
                      </div>
                      <div class="col-md-5 card card-body ms-2">
                        <h4>Perangkat Desa</h4>
                        <label for="" class="form-label-md"><b>Foto</b></label>
                        <input type="file" class="form-control" name="foto_perangkat" />
                        <label for="" class="form-label-md"><b>Nama</b></label>
                        <input type="text" class="form-control" name="nama" />
                        <input type="submit" class="btn btn-success mt-4" name="submit_perangkat" value="Save" />
                      </div>
                    </form>

              <?php
                  if (isset($_POST['submit_struktur'])) {
                        $id_struktur = $row['id_struktur'];
                        $filename1 = $_FILES['foto_struktur']['name'];
                        $tmp_name1 = $_FILES['foto_struktur']['tmp_name'];
                        $ukuran1 = $_FILES['foto_struktur']['size'];
                        $type1 = explode('.', $filename1);
                        $type2 = $type1[1];
                        $newname1 = 'f' . time() . '.' . $type2;
                        $tipe_diizinkan = array('jpg', 'jpeg', 'png', '');

                        $dest = "./foto/" . $_FILES['foto_struktur']['name'];
                        move_uploaded_file($tmp_name1, './foto/' . $newname1);
                           $update = mysqli_query($conn, "UPDATE struktur_organisasi SET
                                 gambar = '$newname1'
                                 WHERE id_struktur = '$id_struktur'");
                     if ($update) {
                        echo
                        '<script>
                        window.location="pemerintahan.php";
                        alert("data berhasil di update");
                        </script>';
                     } else {
                        echo 'gagal ' . mysqli_error($conn);
                     }
                  }
                  //   batas
                  if (isset($_POST['submit_perangkat'])) {
                     $nama = $_POST['nama'];
                     $filename1 = $_FILES['foto_perangkat']['name'];
                     $tmp_name1 = $_FILES['foto_perangkat']['tmp_name'];
                     $ukuran1 = $_FILES['foto_perangkat']['size'];
                     $type1 = explode('.', $filename1);
                     $type2 = $type1[1];
                     $newname1 = 'f' . time() . '.' . $type2;
                     $tipe_diizinkan = array('jpg', 'jpeg', 'png', '');

                     $dest = "./foto/" . $_FILES['foto_perangkat']['name'];
                     move_uploaded_file($tmp_name1, './foto/' . $newname1);
                     $get_regist = mysqli_query($conn, "INSERT INTO perangkat_desa VALUE(
                        null,
                        '" . $nama . "',
                        '" . $newname1 . "'
                  )");
                     if ($get_regist) {
                        echo
                        '<script>
                        window.location="pemerintahan.php";
                        alert("data berhasil di update");
                        </script>';
                     } else {
                        echo 'gagal ' . mysqli_error($conn);
                     }
                  }
              ?>
            </div>
          </div>
          
          <div class="col-md-12 mt-4">
            <div class="row">
            <?php 
            $edit = mysqli_query($conn, "SELECT * FROM perangkat_desa");
            while($p = mysqli_fetch_array($edit)) {
            ?>
              <div class="col-md-3">
                <div class="card card-body">
                  <h6><b><?php echo $p['nama'] ?>
                  </b></h6>
                  <img src="./foto/<?= $p['gambar'] ?>" width="150px" class="mb-2" alt="">
                  <a href="delete.php?id_perangkat=<?= $p['id_perangkat'] ?>" class="btn btn-sm btn-danger">Delete</a>
                  </p>
                </div>
              </div>
              <?php } ?>
            </div>
              
          </div> -->
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