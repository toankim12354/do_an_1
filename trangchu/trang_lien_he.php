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

								$sqll= "SELECT * FROM bai_viet limit 3";
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
					<div id="right-row1">
						<h2 class="title"> liên hệ  </h2>

			<br>				
<h3>&emsp;&emsp;CÔNG TY TNHH TRÀ ĐẠI TỪ	</h3> <br>
<br>
&emsp;&emsp;– MST: 0312393412 <br>
&emsp;&emsp;– Nhà máy SX: Xóm bẫu châu , Xã lục ba , Huyện Đại Từ , Thái Nguyên <br>
<br>
&emsp;&emsp;Tại Hà Nội: <br>
<br>
&emsp;&emsp;– CH1: 189 Giáp Nhất, Thượng Đình, Thanh Xuân, Hà Nội <br>
&emsp;&emsp;(Gần ngã tư sở Hà Nội) <br>
&emsp;&emsp;(Giờ mở cửa: 8h – 18h, từ thứ 2 – thứ 7, CN Nghỉ) <br>
<br>
&emsp;&emsp;Tại TP.HCM: <br>
<br>
&emsp;&emsp;– CH2: 589 Hoàng Văn Thụ , F.4, quận Tân Bình, TP.HCM <br>
&emsp;&emsp;(Đối diện Trung tâm triển lãm Tân Bình) <br>
&emsp;&emsp;(Giờ mở cửa: 8h – 21h, từ thứ 2 đến CN, ngày lễ làm bình thường) <br>
&emsp;&emsp;– CH3: 52A Thanh Đa, F.27, quận Bình Thạnh, TP.HCM <br>
&emsp;&emsp;(Đối diện Khách sạn Công Đoàn Thanh Đa)<br>
&emsp;&emsp;(Giờ mở cửa: 8h – 17h, từ thứ 2 đến thứ 7, ngày lễ và CN nghỉ)<br>
<br>
&emsp;&emsp;ĐT Hà Nội: 0917163908 <br>
&emsp;&emsp;ĐT TP.HCM: 037582123 <br>
&emsp;&emsp;HOTLINE / ZALO ĐẶT HÀNG: 0375325089 <br>
<br>
&emsp;&emsp;Email: toankim12354@gmail.com <br>
&emsp;&emsp;Website: https://tradaitu.vn
						
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