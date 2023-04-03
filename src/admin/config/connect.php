<?php
	$connect = mysqli_connect('db', 'thuy', 'thuy@123', 'assignment2_autoshop');
	if($connect) mysqli_query($connect, "set names 'utf8'");
	else echo "DB ERROR";
?>