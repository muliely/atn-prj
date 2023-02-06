<!-- Delete cart -->
<?php
	session_start();
	unset($_SESSION['cart'][$_GET['id']]);
	if(count($_SESSION['cart']) == 0 ) session_destroy();
	header('location: ../../index.php?page_layout=cart');
?>