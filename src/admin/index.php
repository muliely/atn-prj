<!-- Start Index -->
<?php session_start();
define('SECURITY', true);
	include_once('config/connect.php');
	if(isset($_SESSION['account']) && isset($_SESISON['pass'])){
		include_once('admin.php');
	}else include_once('login.php');
?>