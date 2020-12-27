<?php
					$ma_sp = $_GET['ma_sp'];
					session_start();
					if (isset($_SESSION['gio_hang'][$ma_sp])) {
						$_SESSION['gio_hang'][$ma_sp]++;
						header( 'location: trang_chu.php');
					}else{
					$_SESSION['gio_hang'][$ma_sp] = 1;
					header( 'location:trang_chu.php');
					}

?>