<?php

$SERVER = 'localhost';
$USERNAME = 'root';
$PASSWORD = '';
$DATABASE = 'real_home';

$connect = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE);

if (mysqli_connect_errno()) {
	die('<h3 style="color:red">Error connecting to database...</h3>');
}
?>