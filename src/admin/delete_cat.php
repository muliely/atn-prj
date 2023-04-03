<?php
	include_once('config/connect.php');
	$name = $_GET['name'];
	$sql = "delete from category where cat_name = '$name'";
	$ex = mysqli_query($connect, $sql);
	header('location: admin.php?page_layout=category');
?>