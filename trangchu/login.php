<?php
		session_start();
			$con = mysqli_connect('localhost','root','','web_tre');
			
			if (isset($_POST['to'])) {
			 		$email = $_POST['taikhoan'];
					$matkhau = $_POST['matkhau'];
					$sql = "SELECT * FROM khach_hang where email = '$email'and mat_khau ='$matkhau'";
					/*echo $sql;*/
					$kq = mysqli_query($con,$sql);
					if(mysqli_num_rows($kq) == 0){
						echo "DANG NHAP THAT BAI";
					}
					else{
						$row = mysqli_fetch_assoc($kq);
						$_SESSION['id'] = $row['ma'];
						$_SESSION['user'] = $row['ho_ten'];
						$_SESSION['email'] = $row['email'];
						header('location: trang_chu.php');
					}
			 } 
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
				<?php include 'div000/anh_slide.php' ?>
			</div>
			<!-- HANG 2 -->
			<div id="row2">
				<!-- COT TRAI -->
				<div id="left">
					<!-- COT TRAI KHOI 1 -->
					<div id="left_row1">
						<!-- TIEU DE -->
						<h2 class="title">Bài viết xem nhiều</h2>
						<!-- TIN TUC -->
						<?php include 'div000/tintuc/item.php'; ?>
						<?php include 'div000/tintuc/item1.php'; ?>
						<?php include 'div000/tintuc/item2.php'; ?>
						<?php include 'div000/tintuc/item3.php'; ?>
						<?php include 'div000/tintuc/item4.php'; ?>
						<?php include 'div000/tintuc/item5.php'; ?>
						<?php include 'div000/tintuc/item6.php'; ?>

						
					</div>
				</div>
				<!-- COT PHAI -->
				<div id="right">
					<!--COT PHAI KHOI 1 -->
					<div id="right-row1">
						<h2 class="title">Đăng nhập </h2>
						
						<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>	</title>
		<link rel="stylesheet" href="">
	</head>
	<body>
		<form action="" method="POST">
			<table border="1" align="center">
				<br>
				<br>
				<tr>
					<td>Tài khoản </td>
					<td> <input type="text" name="taikhoan"  placeholder="nhập e mail" required=""></td>
				</tr>
				<tr>
					<td>Mật khẩu </td>
					<td><input type="password"  placeholder="nhập mật khẩu " required="" name="matkhau"></td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<button name="to"> Đăng nhập
						</button>
						<button> hủy   </button>
						<button> <a href="">Đăng ký  </a> </button>
					</td>
				</tr>
				</table>
			</form>
			
		</body>
	</html>
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