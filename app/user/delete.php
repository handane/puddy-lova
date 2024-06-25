<?php
session_start();
include("../database/db.php");
if (!isset($_SESSION["user"])) {
  echo "<script>location='../index.php'</script>";
}

if (isset($_GET['id_aduan'])) {
   $id_aduan = $_GET['id_aduan'];
   $delete_aduan = mysqli_query($conn, "DELETE FROM aduan WHERE id_aduan = '$id_aduan'");
   if($delete_aduan){
      echo "<script>window.location='aduan.php'</script>";
   }
}
?>
