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

      .bg-greenyellow {
         background-color: #63dd60;
      }

      .badges {
         padding: 2px 10px 0 10px;
         font-weight: bold;
      }

      .pesan {
         font-size: 7pt;
         border-radius: 10px;
         background-color: #3ba539;
         color: white;
         margin-left: 0;
         width: 50px;
      }

      .isi-pesan p {
         margin: 0;
      }

      .bungkus-atas {
         display: flex;
         justify-content: space-between;
      }

      .tooltips button {
         padding: 0 0 0 0;
         margin: 0;
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
                  <li class="breadcrumb-item active">Beranda</li>
               </ol>
               <div class="">
                  <section id="minimal-statistics">
                     <?php
                     $data_aduan = mysqli_query($conn, "SELECT * FROM aduan");
                     $jumlah_aduan = mysqli_num_rows($data_aduan);
                     ?>
                     <div class="row bg-light pt-2 pb-1">
                        <div class="col-md-3">
                           <div class="card bg-primary text-white mb-1">
                              <div class="card-body">
                                 <h4><?php echo $jumlah_aduan; ?></h4>
                              </div>
                              <div class="card-footer d-flex align-items-center justify-content-between">
                                 <h6>Data aduan</h6>
                                 <div class="small text-white"><i class="fas fa-box-open"></i></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
               </div>
         </main>
         <footer class="mt-5">
         </footer>
      </div>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
   <script src="../js/scripts.js"></script>
   <script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
   <script>
      ClassicEditor
         .create(document.querySelector('#editor'))
         .catch(error => {
            console.error(error);
         });
   </script>
   <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
   </script>

</body>

</html>