<?php 

$ma_sp = $_GET['ma_sp'];

session_start();

		unset($_SESSION['gio_hang'][$ma_sp]);
	

header( 'location:gio_hang.php');
?>