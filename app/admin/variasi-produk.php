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
          <button type="button" class="mb-3 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah</button>
          <!-- tanggapan -->
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h6>Tambah Produk</h6>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" enctype="multipart/form-data">
                  <div class="modal-body">
                    <div class="mb-3">
                      <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="nama_produk" placeholder="Produk">
                      <label for="" class="mt-3">Gambar</label>
                      <input type="file" class="form-control" id="recipient-name" autocomplete="off" name="foto">
                      <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="harga" placeholder="Harga">
                      <textarea name="deskripsi" class="mt-3 form-control" id="" cols="20" rows="5" placeholder="Deskripsi"></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="regist" value="tambah">
                  </div>
                </form>
                <?php
                if (isset($_POST["regist"])) {
                  function generateRandomText() {
                    $characters = 'abcdefghijklm0123456789';
                    $randomString = '';
                
                    for ($i = 0; $i < 5; $i++) {
                        $randomString .= $characters[rand(0, strlen($characters) - 1)];
                    }
                
                    return $randomString;
                }
                
                  $id_produk = generateRandomText();
                  $nama_produk = $_POST['nama_produk'];
                  $harga = $_POST['harga'];
                  $deskripsi = $_POST['deskripsi'];
                  $stok_produk = 0;

                  $filename1 = $_FILES['foto']['name'];
                     $tmp_name1 = $_FILES['foto']['tmp_name'];
                     $ukuran1 = $_FILES['foto']['size'];
                     $type1 = explode('.', $filename1);
                     $type2 = $type1[1];
                     $newname1 = 'f' . time() . '.' . $type2;
                     $tipe_diizinkan = array('jpg', 'jpeg', 'png', '');

                     $dest = "./foto/" . $_FILES['foto']['name'];
                     move_uploaded_file($tmp_name1, './foto/' . $newname1);

                  $get_regist = mysqli_query($conn, "INSERT INTO produk VALUE(
                                null,
                                '" . $id_produk . "',
                                '" . $nama_produk . "',
                                '" . $newname1 . "',
                                '" . $harga . "',
                                '" . $stok_produk . "',
                                '" . $deskripsi . "'
                            )");

                    $get_produk = mysqli_query($conn, "SELECT * FROM produk");
                    
                    $promo_lama = 0;
                    $promo_baru = 0;
                    $mulai = date('Y-m-d');
                    $berakhir = date('Y-m-d');

                    $get_promosi = mysqli_query($conn, "INSERT INTO promosi VALUE(
                    null,
                    '" . $id_produk . "',
                    '" . $promo_lama . "',
                    '" . $promo_baru . "',
                    '" . $mulai . "',
                    '" . $berakhir . "'
                    )");

                    if ($get_regist & $get_promosi) {
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
                    <th>Harga</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $get_paket = mysqli_query($conn, "SELECT * FROM produk");
                  while ($p = mysqli_fetch_array($get_paket)) {
                  ?>
                    <tr style="font-size: 16px;" id="klik-tabel">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['nama_produk']; ?></td>
                      <td><img src="./foto/<?= $p['gambar'] ?>" width="100px" alt=""></td>
                      <td><?php echo $p['harga']; ?></td>
                      <td><?php echo $p['deskripsi']; ?></td>
                      <td>
                        <a class="btn btn-sm btn-success" href="edit-variasi-produk.php?id_produk=<?php echo $p['id_produk'] ?>">Edit</a>
                        <a class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data?')" href="delete.php?id_produk=<?php echo $p['id_produk'] ?>">Delete</a>
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