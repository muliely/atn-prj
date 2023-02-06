<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Homepage</title>
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/home.css">
<link rel="stylesheet" href="css/product.css">
<link rel="stylesheet" href="css/search.css">
<link rel="stylesheet" href="css/success.css">
<link rel="stylesheet" href="css/cart.css">
<link rel="stylesheet" href="css/category.css">
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>

<?php
	ob_start();
	session_start();
	include_once('admin/config/connect.php');
    include_once('templates/header/header.php');
    include_once('templates/home.php');
    include_once('templates/footer/footer.php');
?>

</body>
</html>
