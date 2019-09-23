<?php
require '../controller.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>
		<?php
		if (isset($pageTitle)) {
			echo  $pageTitle . ' | Real Home';
		} else {
			echo 'Real Home';
		}
		?>
	</title>
	<meta charset="UTF-8">
	<meta name="description" content="realHome Landing Page Template">
	<meta name="keywords" content="realHome, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->
	<link href="img/favicon.ico" rel="shortcut icon" />

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../css/datatables.min.css" />
	<link rel="stylesheet" href="../css/font-awesome.min.css" />
	<link rel="stylesheet" href="../css/animate.css" />
	<link rel="stylesheet" href="../css/owl.carousel.css" />
	<link rel="stylesheet" href="../css/sweetalert.css" />
	<link rel="stylesheet" href="../css/account.css" />

	<script src="../js/jquery-3.2.1.min.js"></script>
	<script src="../js/account.control.js"></script>
</head>

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<div class="sidenav">
		<div class="pl-3 mb-3">
			<h3 class="my-3 text-primary">
				<i class="fa fa-industry mr-1"></i>
				Real Estate
			</h3>
		</div>
		<br>
		<ul>
			<li>
				<a href="./" id="dashboard">Dashboard</a>
			</li>
			<li>
				<a href="users.php" id="users">Users</a>
			</li>
			<li>
				<a href="">Agent</a>
			</li>
			<li>
				<a href="properties.php" id="properties">Properties</a>
			</li>
			<li>
				<a href="">Messages</a>
			</li>
			<li>
				<a href="">Log out</a>
			</li>
		</ul>
	</div>

	<div class="main-content">
		<nav class="navbar navbar-expand-sm topnav">
			<a class="navbar-brand" href="javascript:void(0)">
				<i class="fa fa-navicon sidenav-toggler"></i>
			</a>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="javascript:void(0)">Link</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="javascript:void(0)">Link</a>
				</li>
			</ul>
		</nav>

		<!-- </div> -->