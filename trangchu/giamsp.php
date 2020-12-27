<?php 

$ma_sp = $_GET['ma_sp'];

session_start();

if (isset($ma_sp)) {
	if($_SESSION['gio_hang'][$ma_sp]> 1 ){
		$_SESSION['gio_hang'][$ma_sp]--;
	} else {
		unset($_SESSION['gio_hang'][$ma_sp]);
	}
} 

header( 'location:gio_hang.php');
?>