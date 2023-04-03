<?php
	include_once('config/connect.php');
	$id = $_GET['id'];
	$sql = "delete from user where user_id = '$id'";
	$ex = mysqli_query($connect, $sql);
	header('location: admin.php?page_layout=user');
?>