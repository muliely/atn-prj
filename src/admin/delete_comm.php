<?php
	include_once('config/connect.php');
	$cmt1 = "%xxx%";
	$cmt2 = "%sex%";
	$sql = "delete 
			from comment
			where comm_details like $cmt1 or comment.cmt_text like $cmt2;
			";
	$ex = mysqli_query($connect, $sql);
	header('location: admin.php?page_layout=comment');
?>