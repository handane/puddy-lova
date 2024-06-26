<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index.php">
								<img src="./assets/images/logo2.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						<nav class="main-menu">
							<ul>
								<li><a href="index.php">Home</a>
								</li>
								<li><a href="produk.php">Produk</a>
								</li>
                                <li><a href="kritik.php">Kritik</a>
								<li><a href="riwayat-transaksi.php">Riwayat</a>
                                <li><a href="profil.php">Profil</a>
								</li>
                                    <?php if(!isset($_SESSION['user'])){ ?>
                                        <li><a href="login.php">Login</a></li>
                                    <?php }else{ ?>
                                        <li><a href="logout.php">Logout</a></li>
                                        <li><a href="#"><?php echo $_SESSION['user']['nama'] ?></a></li>
                                    <?php } ?>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>