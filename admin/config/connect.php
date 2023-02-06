<?php
	$connect = mysqli_connect('sql200.epizy.com', 'epiz_32367666', 'ERqQhJlGwq2E', 'epiz_32367666_auto_shop');
	if($connect) mysqli_query($connect, "set names 'utf8'");
	else echo "DB ERROR";
?>