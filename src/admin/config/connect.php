<?php
	$connect = mysqli_connect('localhost', 'root', '', 'assignment2_autoshop');
	if($connect) mysqli_query($connect, "set names 'utf8'");
	else echo "DB ERROR";
?>