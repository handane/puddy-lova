<?php 
session_start();
include("./app/database/db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>LOGIN </title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="assets/css/responsive.css">

</head>

<body>

	<style>
		h1 {
			letter-spacing: -1px;
		}

		a {
			color: black;
			text-decoration: unset;
		}

		.login-root {
			background: #fff;
			display: flex;
			width: 100%;
			min-height: 100vh;
			overflow: hidden;
		}

		.loginbackground {
			min-height: 692px;
			position: fixed;
			bottom: 0;
			left: 0;
			right: 0;
			top: 0;
			z-index: 0;
			overflow: hidden;
		}

		.flex-flex {
			display: flex;
		}

		.align-center {
			align-items: center;
		}

		.center-center {
			align-items: center;
			justify-content: center;
		}

		.box-root {
			box-sizing: border-box;
		}

		.flex-direction--column {
			-ms-flex-direction: column;
			flex-direction: column;
		}

		.loginbackground-gridContainer {
			display: -ms-grid;
			display: grid;
			-ms-grid-columns: [start] 1fr [left-gutter] (86.6px)[16] [left-gutter] 1fr [end];
			grid-template-columns: [start] 1fr [left-gutter] repeat(16, 86.6px) [left-gutter] 1fr [end];
			-ms-grid-rows: [top] 1fr [top-gutter] (64px)[8] [bottom-gutter] 1fr [bottom];
			grid-template-rows: [top] 1fr [top-gutter] repeat(8, 64px) [bottom-gutter] 1fr [bottom];
			justify-content: center;
			margin: 0 -2%;
			transform: rotate(-12deg) skew(-12deg);
		}

		.box-divider--light-all-2 {
			box-shadow: inset 0 0 0 2px peachpuff;
		}

		.box-background--blue {
			background-color: magenta;
		}

		.box-background--white {
			background-color: hotpink;
		}

		.box-background--blue800 {
			background-color: #212d63;
		}

		.box-background--gray100 {
			background-color: pink;
		}

		.box-background--cyan200 {
			background-color: hotpink;
		}

		.padding-top--64 {
			padding-top: 64px;
		}

		.padding-top--24 {
			padding-top: 24px;
		}

		.padding-top--48 {
			padding-top: 48px;
		}

		.padding-bottom--24 {
			padding-bottom: 24px;
		}

		.padding-horizontal--48 {
			padding: 48px;
		}

		.padding-bottom--15 {
			padding-bottom: 15px;
		}


		.flex-justifyContent--center {
			-ms-flex-pack: center;
			justify-content: center;
		}

		.formbg {
			margin: 0px auto;
			width: 100%;
			max-width: 448px;
			background: white;
			border-radius: 25px;
			box-shadow: rgba(60, 66, 87, 0.12) 0px 7px 14px 0px, rgba(0, 0, 0, 0.12) 0px 3px 6px 0px;
		}

		span {
			display: block;
			font-size: 20px;
			line-height: 28px;
			color: #1a1f36;
		}

		label {
			margin-bottom: 10px;
		}

		.reset-pass a,
		label {
			font-size: 14px;
			font-weight: 600;
			display: block;
		}

		.reset-pass>a {
			text-align: right;
			margin-bottom: 10px;
		}

		.grid--50-50 {
			display: grid;
			grid-template-columns: 50% 50%;
			align-items: center;
		}

		.field input {
			font-size: 16px;
			line-height: 28px;
			padding: 8px 16px;
			width: 100%;
			min-height: 44px;
			border: unset;
			border-radius: 15px;
			outline-color: rgb(84 105 212 / 0.5);
			background-color: rgb(255, 255, 255);
			box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
				rgba(0, 0, 0, 0) 0px 0px 0px 0px,
				rgba(0, 0, 0, 0) 0px 0px 0px 0px,
				rgba(60, 66, 87, 0.16) 0px 0px 0px 1px,
				rgba(0, 0, 0, 0) 0px 0px 0px 0px,
				rgba(0, 0, 0, 0) 0px 0px 0px 0px,
				rgba(0, 0, 0, 0) 0px 0px 0px 0px;
		}

		input[type="submit"] {
			background-color: #37393b;
			box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px,
				rgba(0, 0, 0, 0) 0px 0px 0px 0px,
				rgba(0, 0, 0, 0.12) 0px 1px 1px 0px,
				rgba(0, 0, 0, 0.12) 0px 0px 0px 1px,
				rgba(0, 0, 0, 0) 0px 0px 0px 0px,
				rgba(0, 0, 0, 0) 0px 0px 0px 0px,
				rgba(60, 66, 87, 0.08) 0px 2px 5px 0px;
			color: #fff;
			font-weight: 600;
			cursor: pointer;
		}

		.field-checkbox input {
			width: 20px;
			height: 15px;
			margin-right: 5px;
			box-shadow: unset;
			min-height: unset;
		}

		.field-checkbox label {
			display: flex;
			align-items: center;
			margin: 0;
		}

		a.ssolink {
			display: block;
			text-align: center;
			font-weight: 600;
		}

		.footer-link span {
			font-size: 14px;
			text-align: center;
		}

		.listing a {
			color: #697386;
			font-weight: 600;
			margin: 0 10px;
		}

		.animationRightLeft {
			animation: animationRightLeft 2s ease-in-out infinite;
		}

		.animationLeftRight {
			animation: animationLeftRight 2s ease-in-out infinite;
		}

		.tans3s {
			animation: animationLeftRight 3s ease-in-out infinite;
		}

		.tans4s {
			animation: animationLeftRight 4s ease-in-out infinite;
		}

		@keyframes animationLeftRight {
			0% {
				transform: translateX(0px);
			}

			50% {
				transform: translateX(1000px);
			}

			100% {
				transform: translateX(0px);
			}
		}

		@keyframes animationRightLeft {
			0% {
				transform: translateX(0px);
			}

			50% {
				transform: translateX(-1000px);
			}

			100% {
				transform: translateX(0px);
			}
		}

		.box-alert {
			padding: 5px 10px;
			width: 100%;
			background-color: rgba(255, 13, 13, 0.18);
			color: brown;
			font-weight: bold;
			border-radius: 10px;
		}
	</style>

	<!--PreLoader-->
	<div class="loader">
		<div class="loader-inner">
			<div class="circle"></div>
		</div>
	</div>
	<!--PreLoader Ends-->

	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<!-- <img src="imagefrom/Logo2.png" alt=""> -->
							</a>
						</div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- breadcrumb-section -->
	<div class="login-root">
		<div class="box-root flex-flex flex-direction--column" style="min-height: 100vh;flex-grow: 1;">
			<div class="loginbackground box-background--white padding-top--64">
				<div class="loginbackground-gridContainer">
					<div class="box-root flex-flex" style="grid-area: top / start / 8 / end;">
						<div class="box-root" style="background-image: linear-gradient(white 0%, rgb(247, 250, 252) 33%); flex-grow: 1;">
						</div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 4 / 2 / auto / 5;">
						<div class="box-root box-divider--light-all-2 animationLeftRight tans3s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 6 / start / auto / 2;">
						<div class="box-root box-background--blue800" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 7 / start / auto / 4;">
						<div class="box-root box-background--blue animationLeftRight" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 8 / 4 / auto / 6;">
						<div class="box-root box-background--gray100 animationLeftRight tans3s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 2 / 15 / auto / end;">
						<div class="box-root box-background--cyan200 animationRightLeft tans4s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 3 / 14 / auto / end;">
						<div class="box-root box-background--blue animationRightLeft" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 4 / 17 / auto / 20;">
						<div class="box-root box-background--gray100 animationRightLeft tans4s" style="flex-grow: 1;"></div>
					</div>
					<div class="box-root flex-flex" style="grid-area: 5 / 14 / auto / 17;">
						<div class="box-root box-divider--light-all-2 animationRightLeft tans3s" style="flex-grow: 1;"></div>
					</div>
				</div>
			</div>
			<div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1; z-index: 9;">
				<div class="box-root padding-top--48 padding-bottom--24 flex-flex flex-justifyContent--center">
					<h1><a href="http://blog.stackfindover.com/" rel="dofollow"></a></h1>
				</div>
				<div class="formbg-outer">
					<div class="formbg">
						<center class="formbg-inner padding-horizontal--48">
							<span class="padding-bottom--15 mb-4">
								<h3>LOGIN</h3>
							</span>

							<form method="POST" id="stripe-login">
								<div class="field padding-bottom--24">
									<input class="form-control" id="inputEmail" placeholder="Email" name="email" />
								</div>
								<div class="field padding-bottom--24">
									<input class="form-control" id="inputPassword" type="password" placeholder="Password" name="password" />
								</div>
								<input type="submit" name="submit" value="Masuk" class="btn btn-primary col-md-12 p-2">
								<div class="text-center py-2 mt-2">
									<!-- <a style="color: #212d63;" href="lupa-password.php">Lupa Password</a><br> -->
									<a href="register.php">Daftar</a><br>
									<a href="index.php">Home</a>
								</div>
							</form>
							<?php

							if (isset($_POST["submit"])) {
								$email = $_POST['email'];
								$password = $_POST['password'];

								if ($email != "" && $password != "") {
									$get_user = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email' AND password = '$password'");
									$akun_user = mysqli_num_rows($get_user);
									if ($akun_user == 1) {
									  $user = $get_user->fetch_assoc();
									  $_SESSION["user"] = $user;
									  echo "<script>location='index.php';</script>";
									} else {
							?>
											<p style="font-weight: bold; color:brown;"><img src="icons/exclamation-circle-fill.svg" alt="" style="float:left; padding-top:4px;">Email atau Password salah</p>
										<?php
										}
										?>
									<?php
									}
									?>
							<?php
								}
							?>
						</center>
					</div>
				</div>
			</div>
			<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
			<script>
				$(document).ready(function() {
					$('#show-password').click(function() {
						if ($(this).is(':checked')) {
							$('#inputPassword').attr('type', 'text');
						} else {
							$('#inputPassword').attr('type', 'password');
						}
					});
				});
			</script>
		</div>
		<!-- end breadcrumb section -->
		<!-- jquery -->
		<script src="assets/js/jquery-1.11.3.min.js"></script>
		<!-- bootstrap -->
		<script src="assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- count down -->
		<script src="assets/js/jquery.countdown.js"></script>
		<!-- isotope -->
		<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
		<!-- waypoints -->
		<script src="assets/js/waypoints.js"></script>
		<!-- owl carousel -->
		<script src="assets/js/owl.carousel.min.js"></script>
		<!-- magnific popup -->
		<script src="assets/js/jquery.magnific-popup.min.js"></script>
		<!-- mean menu -->
		<script src="assets/js/jquery.meanmenu.min.js"></script>
		<!-- sticker js -->
		<script src="assets/js/sticker.js"></script>
		<!-- main js -->
		<script src="assets/js/main.js"></script>

</body>

</html>