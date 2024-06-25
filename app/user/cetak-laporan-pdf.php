<?php
session_start();
// error_reporting(0);
include("../database/db.php");
if (!isset($_SESSION["admin"])) {
  echo "<script>location='../index.php'</script>";
}
$startperiod = $_POST['startperiod'];
$endperiod = $_POST['endperiod'];
$awal = date("d-m-Y", strtotime($startperiod));
$akhir = date("d-m-Y", strtotime($endperiod));
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
    .tb-top {
      width: 100%;
      margin: 0 auto;
    }

    .title-top {
      line-height: 1;
      text-align: center;
    }

    .title-top .logo {
      text-align: left;
    }

    .text-justify {
      text-align: justify;
      padding-right: 10px;
      padding-left: 10px;
    }

    .title-top h4,
    h3,
    h6 {
      line-height: 0.8;
    }


    .title-top td {
      padding-bottom: 5px;
    }

    .title-top .a-1 {
      margin-right: 10px;
    }

    .title-top .a-2 {
      margin-left: 10px;
    }

    .tb-top {
      border-bottom: 3px solid #000;
    }

    

    .fill-1 td {
      padding-right: 20px;
    }

    .ttd {
      float: right;
    }

    .tb_data {
      width: 90%;
      margin: 0 auto;
    }

    .tb_data tr,
    .tb_data th,
    .tb_data td {
      border: 1px solid black;
      padding: 4px;
      text-align: center;
    }

    .tb_data .title {
      text-align: left;
    }


    body {
      background-color: #fff;
    }
  </style>
</head>

<body class="sb-nav-fixed">
  <?php
  // $awal = isset($_GET['awal']);
  // $akhir = isset($_GET['akhir']);
  // $ping = mysqli_query($conn, "SELECT * FROM pengajuan LEFT JOIN pegawai USING(id_pegawai)");
  // $pks = mysqli_fetch_array($ping);
  // $waktu_awal = date_create($pk['tgl_cuti']);
  // $waktu_akhir = date_create($pk['tgl_berakhir']);
  // $diff = date_diff($waktu_awal, $waktu_akhir);
  // $diff_d = $diff->d;
  ?>
  <?php
  // function tgl_indo($tanggal)
  // {
  //   $bulan = array(
  //     1 =>   'Januari',
  //     'Februari',
  //     'Maret',
  //     'April',
  //     'Mei',
  //     'Juni',
  //     'Juli',
  //     'Agustus',
  //     'September',
  //     'Oktober',
  //     'November',
  //     'Desember'
  //   );
  //   $pecahkan = explode('-', $tanggal);

  //   return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
  // }

  // $tgl = $pks['tgl_cuti'];
  // $pick = tgl_indo($tgl);
  ?>

  <main>
    <table class="tb-top">
      <thead>
        <tr class="title-top">
          <td>
            <h5>Rekap Data Transaksi</h5>
            <h6><b>Tanggal: </b> <?php echo $awal ?> s.d <?php echo $akhir ?>
            
            </h6>
            <br>
          </td>
        </tr>
      </thead>
    </table>
    <div class="text-justify">
      <table class="tb_data mt-4">
        <thead>
          <tr>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Nama Pelanggan</th>
            <th>Nama Paket</th>
            <th>Tambahan Orang</th>
            <th>Biaya</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;
          $ping2 = mysqli_query($conn, "SELECT * FROM transaksi WHERE tanggal BETWEEN '$awal' AND '$akhir' ORDER BY tanggal ASC");
          if (mysqli_num_rows($ping2) > 0) {
            while ($pk = mysqli_fetch_array($ping2)) {
          ?>
              <tr>
                <td><?php echo $pk['id_transaksi']; ?></td>
                <td><?php echo $pk['tanggal']; ?></td>
                <td class="title"><?php echo $pk['nama_pelanggan']; ?></td>
                <td><?php echo $pk['nama_paket']; ?></td>
                <td><?php echo $pk['tambahan_orang']; ?></td>
                <td><?php echo $pk['total']; ?></td>
              </tr>
          <?php }
          } ?>
        </tbody>
      </table>
      <?php
      // $datem = tgl_indo(date('Y-m-d'));
      // $date = date('d');
      // $month = date('M');
      // $year = date('Y');
      // $kadis = mysqli_query($conn, "SELECT * FROM kepala_dinas");
      // $pkadis = mysqli_fetch_array($kadis);
      ?>
    </div>
  </main>
  <script src="../js/scripts.js"></script>
  <script src="../datatables/datatable.js"></script>
  <script src="../js/datatables-simple-demo.js"></script>
  <script src="../bootstrap/js/bootstrap.min.js"></script>
  <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>