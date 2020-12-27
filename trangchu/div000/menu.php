	<?php session_start() ?>
			<!-- MENU 1 -->
			
			
			
			<div id="menu1">
				<!-- THANH TIM KIEM -->
				<div id="tim-kiem">
					<form action="http://localhost/web/do_an/trangchu/timkiem.php" style="margin-top: 0px; float: left;">
					<input type="search"  name="tim_kiem" id="search-bar" placeholder="tim kiem ....">
					<button id="btn-search" style="float: right;">
						
						<img src="https://www.freepngimg.com/download/world_wide_web/62434-engine-web-search-wordpress.com-icons-wallpaper-desktop.png" alt="">
					
					</button>
					</form>
				</div>
				<h1><?php //if(isset($_SESSION['user'])) echo "XIN CHAO ".$_SESSION['user'];  ?></h1>
				<h1>
					

				</h1>
				<!-- TRANG CHU ICON -->
				<a href="trang_chu.php" id="trang-chu-icon">
					<img src="https://cdn.onlinewebfonts.com/svg/img_94553.png" alt="" >
				</a>
				<!-- TAI KHOAN -->
				<ul>
					<?php if (empty($_SESSION['ma'])) { ?>
						<li><a href="trang_DN.php" class="text-login">Đăng nhập</a></li>
						<li><a href="trangDK.php" class="text-login">Đăng ký</a></li>

					<?php }else{ ?>

						<li>

							<h4>&emsp;&emsp;xin chao : <a href="thong_tin.php " style="color: red"><?php echo $_SESSION['ho_ten'] ?></a> &emsp;		
								<a href="dang_suat.php" class="text-login" style="border:10px">Đăng suất </a></h4>
							</li>
						<?php } ?>

					</ul>
				</div>
				<!-- BANNER -->
				<div class="banner">
					<img src="img/logo123.png" alt="" width="280px" height="114px">
					<a href="#">
						<img src="img/header-org.png" alt="">
					</a>
				</div>
				<!-- MENU 2 -->
				<div id="menu2">
					<!-- NOI DUNG MENU -->
					<ul>
						<li><a href="http://localhost/web/do_an/trangchu/trang_chu.php">Home</a></li>
						<li><a href="http://localhost/web/do_an/trangchu/trang_gioi_thieu.php">Giới thiệu</a></li>
						<li><a href="http://localhost/web/do_an/trangchu/trang_san_pham.php">Sản phẩm</a></li>
						<li class="drop-item">
							<?php 	$con = mysqli_connect("localhost", "root", "", "web_tre");
							$sql = "SELECT * FROM danh_muc";
							$kq = mysqli_query($con, $sql);
							?>
							<a href="#">Blog trà</a>
							<div class="drop-content">
								<?php foreach ($kq as $key => $row): ?>
									<a href="http://localhost/web/do_an/trangchu/trang_san_pham.php?cat=<?php echo $row['ma_danh_muc'];?>"><?php echo $row['ten_danh_muc']; ?></a>
								<?php 	endforeach ?>
							</div>
						</li>
						<?php if (empty($_SESSION['ma'])) { ?>

						<?php }else{ ?>
							<li><a href="http://localhost/web/do_an/trangchu/gio_hang.php">gio hang</a></li>
						<?php } ?>
						<li><a href="http://localhost/web/do_an/trangchu/trang_lien_he.php">Liên hệ</a></li>
					</ul>
				</div>