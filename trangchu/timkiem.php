<?php
	$con = mysqli_connect("localhost", "root", "", "web_tre");

	$tim_kiem = $_GET['tim_kiem'] ??  '' ;

	$sql = "SELECT * FROM san_pham";

	$kq = mysqli_query($con, $sql);
	//chia trang
	$so_san_pham = mysqli_num_rows($kq);
	$so_san_pham_tren_trang = 12;
	$so_trang = (ceil($so_san_pham / $so_san_pham_tren_trang)) ? ceil($so_san_pham / $so_san_pham_tren_trang) : 1;
	$trang_hien_tai = (isset($_GET['trang'])) ? $_GET['trang'] : 1;
	$so_san_pham_bo_qua = ($trang_hien_tai - 1) * $so_san_pham_tren_trang;

	
		$sql = "SELECT * FROM san_pham where ten_sp like '%$tim_kiem%'";

		
	

	$sql .= " LIMIT $so_san_pham_tren_trang OFFSET $so_san_pham_bo_qua";
		
	//chia hang
	$result = mysqli_query($con, $sql);
	
	$so_san_pham_1_trang = mysqli_num_rows($result);
	
	$so_san_pham_tren_hang = 3;
	$so_hang = ceil($so_san_pham_1_trang / $so_san_pham_tren_hang);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
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
					<?php include 'div000/anh_slide.php' ?>			<!-- HANG 2 -->
			<div id="row2">
				<!-- COT TRAI -->
				<div id="left">
					<!-- COT TRAI KHOI 1 -->
					<div id="left_row1"style="padding:10px">
						<!-- TIEU DE -->
						<h2 class="title">Bài viết xem nhiều</h2>
						<!-- TIN TUC -->
						<div class="item-left">
							<a class="title-2" href="#">Mua Trà Bắc(Chè Bắc) Ở</a>
							<img src="https://4.bp.blogspot.com/-elHcidP2MmU/WFf19J69WtI/AAAAAAAAjug/0Xlyxuq41Co77HHP-xt6aXq4HcqoSj2ngCLcB/s640/14344167_1704018319646621_2524702075849774767_n.png" alt="">
							<p>
								Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam soluta consequuntur commodi quas unde eum alias repellendus! Nisi, et. Distinctio doloremque, error sapiente sequi accusamus rem in vel, dolores nobis.
							</p>
							<button><a href="#">Xem chi tiết...</a></button>
						</div>
						
					</div>
				</div>
				<!-- COT PHAI -->
				<div id="right">
					<!--COT PHAI KHOI 1 -->
					<div id="right-row1" style="padding:10px">
						<?php
						?>
					</PHP>
					<h2 class="title">Sản phẩm</h2>
					<?php for ($i=0; $i < $so_hang ; $i++) { ?>
					<?php 	$count = 0; ?>
					<div class="right-row1-row1">
						<?php while ($sp = mysqli_fetch_assoc($result)	) { ?>
						<div class="item-right">
							<img src="img/<?= $sp['anh_sp']?>" alt="">
							<h2><a href="#"><?php echo $sp['ten_sp']; ?></a></h2>
							
							<p>Giá bán:<span class="gia_do"> <?php echo number_format($sp['gia_sp'], 0, ',', '.'); ?> VNĐ</span></p>
								<?php if (isset($_SESSION['ma'])) { ?>
							<button ><a style="text-decoration: none;padding:5px" href="them_vao_gio_hang.php?ma_sp=<?php echo $sp['ma_sp']; ?>">thêm giỏ hàng   
							 </a></button>
						<?php 	} ?>
							<button><a  style="text-decoration: none;" href="	" >xem chi tiết    </a></button>
						
						</div>
						<?php $count++; if($count == $so_san_pham_tren_hang) break; ?>
						<?php } ?>
					</div>
					<?php } ?>
					
				</div>
				<br>
				<br>
				<div>
					<a href="?trang=<?= ($trang_hien_tai > 1) ? $trang_hien_tai - 1 : 1 ?>"> </a>
					<?php 	for ($i	= 1; $i <= $so_trang ; $i++) { ?>
					<a  style="display: inline-block; width: 20px;" href="?trang=<?= $i?>"><?= $i ?></a>
					<?php } ?>
					<a href="?trang=<?= ($trang_hien_tai < $so_trang) ? $trang_hien_tai + 1 : $so_trang ?>"> </a>
				</div>
			</div>
		</div>
		
		
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