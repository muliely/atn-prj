<?php
$currency = '&#8377; '; //Currency Character or code

$db_username = 'dbuser';
$db_password = 'dbPass@123';
$db_name = 'online';
$db_host = 'db';

				
//connect to MySql						
$connect = new mysqli($db_host, $db_username, $db_password,$db_name);						
if ($connect->connect_error) {
    die('Error : ('. $connect->connect_errno .') '. $connect->connect_error);
}
?>