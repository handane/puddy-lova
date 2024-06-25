<?php
require('database/db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <style>
    .gradient-custom {
      /* fallback for old browsers */
      background: #6a11cb;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(106, 17, 203, 1), rgba(37, 117, 252, 1))
    }
  </style>
</head>

<body>
  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
              <!-- <img src="" alt="" class="align-center mb-4" width="150px"> -->
              <h3 class="mb-5">Login Admin</h3>
              <form action="" method="POST">
                <div class="form-outline mb-4">
                  <input type="username" id="typeEmailX-2" class="form-control form-control-lg" name="username" placeholder="username" required />
                </div>

                <div class="form-outline mb-4">
                  <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="password" placeholder="password" required />
                </div>

                <div class="login">
                  <button class="btn btn-success form-control btn-block" name="submit" type="submit">Masuk</button><br>
                  <a href="./../index.php" class="pt-3">Home User</a>
                </div>
              </form>
              <!-- regist -->
              <?php
              if (isset($_POST["submit"])) {
                $username = $_POST['username'];
                $password = $_POST['password'];

                if ($username != "" && $password != "") {
                  $get_admin = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
                  $akun_admin = mysqli_num_rows($get_admin);
                  if ($akun_admin == 1) {
                    $admin = $get_admin->fetch_assoc();
                    $_SESSION["admin"] = $admin;
                    echo "<script>location='admin/';</script>";
                  } else {
              ?>
                    <div class="alert alert-danger alert-dismissible alert-atas"><img src="icons/exclamation-circle-fill.svg" alt="" style="margin-bottom: 3px;"> tidak dapat login, username atau password salah
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
                    </div>
              <?php
                  }
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>