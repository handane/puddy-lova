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
            <li class="breadcrumb-item active">Stok Produk</li>
          </ol>
          <button type="button" class="mb-3 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah</button>
          <!-- tanggapan -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h6>Tambah Stok Produk</h6>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="mb-3">
                      <select name="id_produk" class="form-control" id="">
                        <option>Pilih Produk</option>
                        <?php
                        $no = 1;
                        $get_paket = mysqli_query($conn, "SELECT * FROM produk");
                        while ($p = mysqli_fetch_array($get_paket)) {
                      ?>
                        <option value="<?= $p['id_produk'] ?>"><?= $p['nama_produk'] ?></option>
                        <?php } ?>
                      </select>
                      
                      <input type="number" class="form-control mt-3" id="recipient-name" autocomplete="off" name="stok_produk" placeholder="Stok Produk">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="regist" value="tambah">
                  </div>
                </form>
                <?php
                if (isset($_POST["regist"])) {
                  $id_produk = $_POST['id_produk'];
                  $stok_produk = $_POST['stok_produk'];

                  $update = mysqli_query($conn, "UPDATE produk SET
                      stok_produk = '$stok_produk'
                      WHERE id_produk = '$id_produk'");
                    if ($update) {
                      echo '<script>alert("data berhasil ditambahkan")</script>';
                    } else {
                      echo '<script>alert("data gagal ditambahkan")</script>';
                    }
                }
                ?>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr style="font-size: 16px;">
                    <th>No</th>
                    <th>Produk</th>
                    <th>Gambar</th>
                    <th>Stok</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $get_paket = mysqli_query($conn, "SELECT * FROM produk WHERE stok_produk > 0");
                  while ($p = mysqli_fetch_array($get_paket)) {
                  ?>
                    <tr style="font-size: 16px;" id="klik-tabel">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['nama_produk']; ?></td>
                      <td><img src="./foto/<?= $p['gambar'] ?>" width="100px" alt=""></td>
                      <td><?php echo $p['stok_produk']; ?></td>
                      <td>
                        <a class="btn btn-sm btn-success" href="edit-stok-produk.php?id_produk=<?php echo $p['id_produk'] ?>">Edit</a>
                        <a class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data?')" href="delete.php?id_stok_produk=<?php echo $p['id_produk'] ?>">Delete</a>
                      </td>
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