<?php
	include_once('config/connect.php');
	$id = $_GET['id'];
	$sql = "delete from product where prd_id = '$id'";
	$ex = mysqli_query($connect, $sql);
	header('location: admin.php?page_layout=product');
?>