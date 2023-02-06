<?php
	include_once('config/connect.php');
	$id = $_GET['id'];
	$prd_id = $_GET['prd_id'];
	mysqli_query($connect, "delete from bill where bill_id = $id and prd_id = $prd_id");
	header('location: admin.php?page_layout=bill');
?>