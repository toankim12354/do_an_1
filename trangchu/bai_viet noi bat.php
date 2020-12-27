<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<?php
	$con = mysqli_connect("localhost", "root", "", "web_tre");
	$sql = "SELECT * FROM bai_viet";
	$kq = mysqli_query($con, $sql);
	//chia trang
	$so_bai_viet = mysqli_num_rows($kq);
	$so_bai_viet_tren_trang = 7;
	$so_trang = (ceil($so_bai_viet / $so_bai_viet_tren_trang)) ? ceil($so_bai_viet / $so_bai_viet_tren_trang) : 1;
	$trang_hien_tai = (isset($_GET['trang'])) ? $_GET['trang'] : 1;
	$so_bai_viet_bo_qua = ($trang_hien_tai - 1) * $so_bai_viet_tren_trang;
	$sql = "SELECT * FROM san_pham LIMIT $so_bai_viet_tren_trang OFFSET $so_bai_viet_bo_qua";
	
	//chia hang
	$result = mysqli_query($con, $sql);
	
	$so_san_pham_1_trang = mysqli_num_rows($result);
	
	$so_san_pham_tren_hang = 1;
	$so_hang = ceil($so_san_pham_1_trang / $so_san_pham_tren_hang);
?>
<?php for ($i=0; $i < $so_hang ; $i++) { ?>
					<?php 	$count = 0; ?>
					<?php while ($sp = mysqli_fetch_assoc($result)	) { ?>
					<div class="item-left">
							<a class="title-2" href="#"><?php echo $sp['ten_bai_viet']; ?></a>
							<img src="<?php echo $sp['anh_bai_viet']; ?>" alt="">
							<p>
								Lorem ipsum, dolor sit amet consectetur adipisicing elit. Magnam soluta consequuntur commodi quas unde eum alias repellendus! Nisi, et. Distinctio doloremque, error sapiente sequi accusamus rem in vel, dolores nobis.
							</p>
							<button><a href="#">Xem chi tiết...</a></button>
						</div>
						<?php $count++; if($count == $so_san_pham_tren_hang) break; ?>
						<?php } ?>
						<?php } ?>
</body>
</html>