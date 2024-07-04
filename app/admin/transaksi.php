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
            <li class="breadcrumb-item active">Transaksi</li>
          </ol>
          <div class="card">
            <div class="card-body">
              <table id="datatablesSimple">
                <thead>
                  <tr style="font-size: 16px;">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Produk</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <!-- <th>Promo</th> -->
                    <th>Status</th>
                    <th>Bukti Transfer</th>
                    <th>Konfirmasi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  $produk = mysqli_query($conn, "SELECT * FROM keranjang LEFT JOIN produk ON keranjang.id_produk = produk.id_produk LEFT JOIN promosi ON produk.id_produk = promosi.id_produk LEFT JOIN user ON keranjang.id_user = user.id_user");
                  while ($p = mysqli_fetch_array($produk)) {
                  ?>
                    <tr style="font-size: 16px;" id="klik-tabel">
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $p['nama']; ?></td>
                      <td><?php echo $p['nama_produk']; ?></td>
                      <td><?php echo $p['tanggal']; ?></td>
                      <td><?php echo $p['waktu']; ?></td>
                      <!-- <td><?php echo $p['promo']; ?>%</td> -->
                      <td><?php echo $p['riwayat']; ?></td>
                      <td><img src="./../../foto/<?= $p['bukti_transfer'] ?>" height="60px" alt="" onClick="openOverlay(this)"></td>
                      <td>
                        <?php 
                          if($p['riwayat'] == 'Pembayaran Diterima') {
                          echo 'Selesai';
                          } if($p['riwayat'] == 'Bukti Transfer Ditolak') {
                            echo 'Ditolak';
                          } if($p['riwayat'] == 'sudah bayar') { ?>
                      <a href="terima.php?id_keranjang_transaksi=<?php echo $p['id_keranjang']?>&&id_user=<?= $p['id_user'] ?>" class="btn btn-sm btn-success" onclick="return confirm('apakah anda yakin ingin pelanggan sudah membayar?')">Terima</a>
                      <a class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin ingin menolak bukti transfer?')" href="delete.php?id_keranjang_transaksi=<?php echo $p['id_keranjang'] ?>">Tolak</a>
                      <?php } ?>
                      </td>
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