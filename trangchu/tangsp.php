

<?php
var_dump($_GET['ma_sp']);

$ma_sp = $_GET['ma_sp'];
session_start();

if(isset($ma_sp) && $_SESSION['gio_hang'][$ma_sp] <= 10){
	$_SESSION['gio_hang'][$ma_sp]++;
}

	

header( 'location:gio_hang.php');
?>