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
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>KASIR</title>
  <link rel="icon" type="image/png" href="">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/LOGO UNMUL.png" />

  <link href="../css/styles.css" rel="stylesheet" />
  <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
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
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">


    <a class="navbar-brand ps-3" href="index.php">KASIR</a>
    <!-- Navbar Brand-->
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
      <i class="fas fa-bars"></i>
    </button>

    <!-- navbar nama -->
    <div class="navbar-nav ps-3 d-md-inline-block form-inline ms-auto" style="color: white; text-decoration: none">
      <p><?php echo "<p>" . $_SESSION['admin']['nama'] . "</p>" ?></p>
    </div>

    <!-- navbar icon  -->
    <ul class="navbar-nav me-0 me-md-3 my-2 my-md-0">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
          
          <li>
            <hr class="dropdown-divider" />
          </li>
          <li><a href="logout.php" class="dropdown-item">logout</a></li>

        </ul>
      </li>
    </ul>
  </nav>
  <div id="layoutSidenav">
    <div id="layoutSidenav_nav">
      <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
        <div class="nav">
                <div class="sb-sidenav-menu-heading">Admin</div>
                  <a class="nav-link" href="index.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-home"></i>
                     </div>
                     Dashboard
                  </a>
                  <a class="nav-link" href="data-paket.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-clipboard-list"></i>
                     </div>
                     Data Paket
                  </a>
                  <a class="nav-link aktif" href="transaksi.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-money-bill-wave"></i>
                     </div>
                     Transaksi
                  </a>
                  <a class="nav-link" href="laporan.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-book-open"></i>
                     </div>
                     Laporan
                  </a>
                  <a class="nav-link" href="manajemen-user.php">
                     <div class="sb-nav-link-icon">
                        <i class="fas fa-user-check"></i>
                     </div>
                     Manajemen User
                  </a>
               </div>
        </div>
        <div class="sb-sidenav-footer">
          <div class="small">masuk sebagai:</div>
          <h6>Admin</h6>
        </div>
      </nav>
    </div>
    <div id="layoutSidenav_content">
      <main>
        <div class="container-fluid px-3">
          <ol class="breadcrumb mb-4 mt-2">
            <li class="breadcrumb-item active">Transaksi</li>
          </ol>
          <!-- <button type="button" class="mb-3 btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah</button> -->
          <!-- tanggapan -->
          <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h6>Tambah Transaksi</h6>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                  <div class="modal-body">
                    <div class="mb-3">
                      <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="nama_pelanggan" placeholder="nama_pelanggan">
                      <select name="paket" class="form-control mt-3" id="">
                        <option value=""><i>--Pilih Paket--</i></option>
                        <?php 
                          $get_paket = mysqli_query($conn, "SELECT * FROM paket");
                          while($p = mysqli_fetch_array($get_paket)){
                        ?>
                        <option value="<?= $p['id_paket'] ?>"><?= $p['nama_paket'] ?></option>
                        <?php } ?>
                      </select>
                      <input type="number" class="form-control mt-3" id="recipient-name" autocomplete="off" name="tambahan_orang" placeholder="Tambahan Orang">
                      <input type="text" class="form-control mt-3" id="recipient-name" autocomplete="off" name="biaya_paket">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" name="regist" value="Save">
                  </div>
                </form>
                <?php
                if (isset($_POST["regist"])) {
                  $nama_paket = $_POST['nama_paket'];
                  $deskripsi_paket = $_POST['deskripsi_paket'];
                  $harga = $_POST['harga'];
                  $harga_tambahan = $_POST['harga_tambahan'];

                  $get_regist = mysqli_query($conn, "INSERT INTO paket VALUE(
                                null,
                                '" . $nama_paket . "',
                                '" . $deskripsi_paket . "',
                                '" . $harga . "',
                                '" . $harga_tambahan . "'
                            )");
                    if ($get_regist) {
                      echo '<script>alert("data berhasil ditambahkan")</script>';
                    } else {
                      echo '<script>alert("data gagal ditambahkan")</script>';
                    }
                  }
                ?>
              </div>
            </div>
          </div> -->
          <a href="pilih-paket.php" class="btn btn-sm btn-primary mb-1">Tambah Transaksi</a>
          <div class="card">
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr style="font-size: 16px;">
                    <th>ID Transaksi</th>
                    <th>Tanggal</th>
                    <th>Nama Pelanggan</th>
                    <th>Nama Paket</th>
                    <th>Biaya Paket</th>
                    <th>Tambahan Orang</th>
                    <th>Biaya Tambahan</th>
                    <th>Total</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $get_transaksi = mysqli_query($conn, "SELECT * FROM transaksi");
                  while ($p = mysqli_fetch_array($get_transaksi)) {
                  ?>
                    <tr style="font-size: 16px;" id="klik-tabel">
                      <td><?php echo $p['id_transaksi']; ?></td>
                      <td><?php echo $p['tanggal']; ?></td>
                      <td><?php echo $p['nama_pelanggan']; ?></td>
                      <td><?php echo $p['nama_paket']; ?></td>
                      <td><?php echo $p['biaya_paket']; ?></td>
                      <td><?php echo $p['tambahan_orang']; ?></td>
                      <td><?php echo $p['biaya_tambahan']; ?></td>
                      <td><?php echo $p['total']; ?></td>
                      <td>
                        <!-- <a class="btn btn-sm btn-success" href="edit-transaksi.php?id_transaksi=<?php echo $p['id_transaksi'] ?>">Edit</a> -->
                        <a class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data?')" href="delete.php?id_transaksi=<?php echo $p['id_transaksi'] ?>">Delete</a>
                        <a class="btn btn-sm btn-warning" target="_blank" href="cetak-laporan.php?id_transaksi=<?php echo $p['id_transaksi'] ?>">Cetak</a>
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