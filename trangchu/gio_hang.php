
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8 Byte Order Mark">
	<title></title>
	<link rel="stylesheet" href="css/trang_chu.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<!-- TRANG CHU -->
	<div class="trang-chu">
		<?php include 'div000/menu.php'?>
		<!-- MAIN -->
		<id id="main">
			<!-- NOI DUNG -->
			<id id="content">
				<!-- HANG 1 -->
				<div id="row1" >
					<?php include 'div000/anh_slide.php' ?>
					<!-- HANG 2 -->
					<div id="row2">
						<!-- COT TRAI -->
						<div id="left">
							<!-- COT TRAI KHOI 1 -->
							<div id="left_row1"style="padding:10px">
								<?php 

								$sqll= "SELECT * FROM bai_viet limit 6";
								$kq = mysqli_query($con, $sqll);
								?>
							
								<!-- TIEU DE -->
								<h2 class="title" >Bài viết xem nhiều</h2>
									<?php while ($bv = mysqli_fetch_assoc($kq)	) { ?>
								<!-- TIN TUC -->
								<div class="item-left">
									<a class="title-2" href="#"><?php echo $bv['ten_bai_viet'] ?></a>
									<img height="100" width="100" src="img/<?php echo $bv['anh_bai_viet'] ?>" alt="">
									<p>
										<?php echo $bv['nd_mieu_ta'] ?>
									</p>
									<button><a href="chi_tiet_bai_viet.php?mabv=<?php echo $bv['ma']?>">Xem chi tiết...</a></button>
								</div>
								<?php } ?>
							</div>
						</div>
						<!-- COT PHAI -->
						<div id="right">
							<!--COT PHAI KHOI 1 -->
							<div id="right-row1" style="padding:10px">
								<h2 class="title">giỏ hàng </h2>


								<?php
								$con = mysqli_connect("localhost", "root", "", "web_tre");
								$tong=0;
								?>
									<?php 	
									if (!empty($_SESSION['gio_hang'])) {?>
										
									
									
								

								<table border="	1">
									<tr style="background: #E3D3D3">
										<th> ảnh sản phẩm </th>
										<th>tên sản phảm </th>
										<th> số lượng </th>
										<th>giá sản phẩm </th>
										<th>số tiền </th>
										<th> thao tác</th>

										<?php 	foreach ($_SESSION['gio_hang'] as $ma_sp => $so_luong) : ?>
											<?php 	$sql = "SELECT * FROM san_pham WHERE ma_sp ='$ma_sp' ";
											$result = mysqli_query($con,$sql);
											$to = mysqli_fetch_assoc($result);
											/*var_dump($to);*/

											?>
											<tr>


												<td align="center"> 
													<img height="60"src="img/<?php echo $to['anh_sp'] ?>" alt="">
												</td>
												<td align="center" >
													<?php echo $to['ten_sp'] ?>
												</td>
												<td align="center">
													<a href="giamsp.php?ma_sp=<?php echo $ma_sp; ?>">-</a>
													<?php 	echo $so_luong ?>
													<a href="tangsp.php?ma_sp=<?= $ma_sp;?>">+</a>
												</td>
												<td align="center" >
													<?php echo number_format($to['gia_sp'], 0, ',', '.'); ?> VNĐ
												</td>

												<td align="center"  >
													<span style="color: red"><?php $gia= $to['gia_sp']* $so_luong ?>
													<?php echo number_format($gia, 0, ',', '.'); ?> VNĐ
												</span>
												<?php 	$tong += $to['gia_sp'] * $so_luong ?>
											</td>
											<td align="center" >
												<a style="text-decoration: none;" href="xoasp.php?ma_sp=<?= $ma_sp;?>"  >Xóa</a>
											</td>
										</tr>
									<?php endforeach ?>
								</table>
								<h4 style="color: red">Tổng tiền : <?php 	echo number_format($tong,0,',','.');  ?> VNĐ</h4>
								<form action="">
									<?php 
										$ma = $_SESSION['ma'];	
										$sqll = "SELECT * FROM khach_hang WHERE ma = '$ma'";

										$kp= mysqli_query($con,$sqll);
										 $kiem = mysqli_fetch_assoc($kp);
									 ?>
									<table border="   1"  align="center" >  
										<a href="../khach_hang.php.php"></a>
										<tr>
											<td>họ tên  </td>
											<td>  <input type="" name="ho_ten" value="<?php echo $kiem['ho_ten'];?>"> </td>
										</tr>
									
										<tr>
											<td>sdt người nhận  </td>
											<td> <input type="" name="sdt" value="<?php echo $kiem['sdt'];?>">  </td>
										</tr>
										


										<tr>
											<td>dia_Chi_người_nhận </td> 
											<td>  <input type="" name="dia_chi" value="<?php echo $kiem['dia_chi'];?>"></td>
										</tr>
										
										</table>    
										<button> <a style="text-decoration: none;" href="thanhtoan.php">đặt hàng </a></button>
									</form>
											<?php 	}else{ ?>
												<h3 >	Mời thêm sản phẩm vào giỏ hàng <a href="trang_chu.php"> thêm </a> </h3>
											<?php 	} ?>

								</div>


							</div>
						</div>
					</id>
				</id>
				<!-- FOOTER -->
				<div id="footer">
					<div id="footer-info" align="center">
						<h1>Trè	Đại từ  </h1>
						<h3>	Địa chỉ: đại từ - thái nguyên | Phone: 0375325089 </h3>
						<h3>	Trụ sở 2: Số 25/178/71 Tây Sơn - Đống Đa - Hà Nội | Hotline: 0917163908</h3>
						
					</div>
				</div>
			</div>
		</body>
		</html>
		<script>
		var menu = document.querySelector('#menu2');//thanh menu 2
		var khoang_cach = menu.offsetTop; //khoảng cách từ thanh menu đến đỉnh của phần tử cha
		const stickyMenu = ()=>{
			if(window.pageYOffset >= khoang_cach){
				menu.classList.add('sticky');
			}
			//nếu phần đã cuộn có độ dài lớn hơn khoảng cách từ thanh menu đến đỉnh của màn hình trình duyệt thì thêm class sticky vào thanh menu
			else{
				menu.classList.remove('sticky');
			}
			/*
			//nếu phần đã cuộn có độ dài nhỏ hơn khoảng cách từ thanh menu đến đỉnh của màn hình trình duyệt thì thêm class sticky vào thanh menu
			//---------------đỉnh màn hình------------------- *
																																																		g
			//                                                *
			//----------thanh menu--------------------------- *
					//
			// cuộn xuống bao nhiêu thì thanh menu càng đi lên bấy nhiêu  => khi cuộn xuống 1 đoạn có độ dài
			// bằng khoảng cách từ thanh menu đến màn hình trình duyệt => thanh menu chạm màn hình trình duyệt
			// Không muốn  thanh menu bị cuộn lên nữa => đặt position = fixed => thêm class sticky vừa tạo bên
																// trên vào thanh menu và ngược lại
																*/
															}
															window.onscroll = ()=>{
																stickyMenu();
															}
		//bắt sự kiện cuộn màn hình: khi màn hình được cuộn thì thực thi hàm stickyMenu
		var vi_tri_slide = 0;
		showSlide();
		function showSlide(){
			let i;
			slides = document.querySelector('#row1').querySelectorAll('img');
			//lấy tất cả ảnh
			dots = document.querySelector('#index').querySelectorAll('.dot');
			//lấy tất cả dấu chấm
			for(i = 0; i < slides.length; ++i){
				slides[i].style.display = "none";
			}
			//ẩn tất cả ảnh
			for(i = 0; i < dots.length; ++i){
				dots[i].classList.remove('hoat_dong');
			}
			//xóa class hoạt động(HIỂN THỊ DẤU CHẤM CÓ MÀU KHÁC KHI SLIDES TƯƠNG ỨNG ĐANG ĐƯỢC HIỂN THỊ) của các dấu chấm
			vi_tri_slide = (vi_tri_slide + 1  > slides.length) ? 1 : vi_tri_slide + 1;
			//nếu vị trí truyền vào hàm > số lượng các ảnh thì vị trí ảnh cần hiển thị = 1(ảnh đầu tiên)
			//nếu vị trí truyền vào hàm <= 0  thì vị trí ảnh cần hiển thị = ảnh cuối cùng
			
			slides[vi_tri_slide - 1].style.display="block";
			dots[vi_tri_slide -1].classList.add('hoat_dong');
			//hiển thị và thêm class cho slide và dấu chấm được gọi đến
			setTimeout(showSlide, 3000);
		}
	</script>