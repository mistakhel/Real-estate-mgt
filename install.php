<?php 
	require 'connect.php'; 
	$GLOBALS['connect'] = $connect;
?>
<!DOCTYPE html>
<html>
<head>
	<title>Installing Database Table</title>
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
</head>
<body>
<div class="">
	<div class="jumbotron">
		<h3 class="display-4 text-center">INSTALLING DATABASE TABLES</h3>
		<div class="text-center mt-5">
			<a href="?action=install" class="btn btn-lg btn-primary">Install</a>			
			<a href="?action=drop" class="btn btn-lg btn-secondary">Drop</a>
			<a href="./" class="btn btn-lg btn-success">Return</a>
		</div>
	</div>

<?php
	function successMessage($msg)
	{
		return '<div class="alert alert-success">'.$msg.'</div>';
	}

	function errorMessage($msg)
	{
		return '<div class="alert alert-danger">'.$msg.'</div>';
	}
?>

<?php
	function runInstall ()
	{
		$connect = $GLOBALS['connect'];

		// creating users table...
		$user_sql = '
		CREATE TABLE IF NOT EXISTS `users` (
			`id` INT UNSIGNED AUTO_INCREMENT,
			`first_name` VARCHAR(20) NOT NULL,
			`last_name` VARCHAR(20) NOT NULL,
			`gender` VARCHAR(10) NOT NULL,
			`phone` VARCHAR(20) NOT NULL,
			`email` VARCHAR(50) UNIQUE NOT NULL,
			`address` TEXT,
			`photo` VARCHAR(200),
			`password` VARCHAR(200) NOT NULL,
			`is_admin` BOOLEAN DEFAULT false,
			`is_agent` BOOLEAN DEFAULT false,
			`current_login` TIMESTAMP NULL DEFAULT NULL,
			`created_at` TIMESTAMP NULL DEFAULT NULL,
			`updated_at` TIMESTAMP NULL DEFAULT NULL,
			`last_login` TIMESTAMP NULL DEFAULT NULL,
			PRIMARY KEY(id)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;';

		if (mysqli_query($connect, $user_sql)) {
			echo successMessage('Users table successfully created!');
		} else {
			echo errorMessage('Users table not created or already exist');
		}

		// insert superadmin...
		$hashed_password = md5('password');
		$insert_admin_sql = "INSERT INTO `users` (`first_name`, `last_name`, `gender`, `phone`, `email`, `is_admin`, `is_agent`, `password`, `created_at`, `updated_at`)
		 VALUES 
		 ('admin', 'admin', 'male', '0901222334456', 'admin@email.com', '1','1','".$hashed_password."', NOW(), NOW())";

		 if (mysqli_query($connect, $insert_admin_sql)) {
		 	echo successMessage('super admin successfully inserted!');
		 } else {
		 	echo errorMessage('super admin not inserted!');
		 }

		 // create properties table...
		 $prop_sql = 'CREATE TABLE IF NOT EXISTS `properties` (
			`id` INT UNSIGNED AUTO_INCREMENT,
			`agent_id` INTEGER(11) NOT NULL,
			`buyer_id` INTEGER(11),
			`address` VARCHAR(200) NOT NULL,
			`state` VARCHAR(100) NOT NULL,
			`area` VARCHAR(100) NOT NULL,
			`photo` TEXT,
			`garages` INTEGER(10) NOT NULL,
			`bedrooms` INTEGER(10) NOT NULL,
			`bathrooms` INTEGER(10) NOT NULL,
			`purpose` VARCHAR(20) NOT NULL,
			`created_at` TIMESTAMP NULL DEFAULT NULL,
			`updated_at` TIMESTAMP NULL DEFAULT NULL,
			`time_bought` TIMESTAMP NULL DEFAULT NULL,
			PRIMARY KEY(`id`)		    
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;';

		if (mysqli_query($connect, $prop_sql)) {
		 	echo successMessage('properties table created!');
		 } else {
		 	echo errorMessage('properties table already exist or not created');
		 }

		 // adding froiegn keys to properties table...
		 $fk_prop_sql = '
		 ALTER TABLE properties ADD CONSTRAINT FK_agent FOREIGN KEY (agent_id) REFERENCES users(id)
		 ALTER TABLE properties ADD CONSTRAINT FK_buyer FOREIGN KEY (buyer_id) REFERENCES users(id)
		 '
		 ;

		 if (mysqli_query($connect, $prop_sql)) {
		 	echo successMessage('properties forign keys created!');
		 } else {
		 	echo errorMessage('properties  not created or already added');
		 }

		 // create messaging table...
		 
		 $enq_sql = 'CREATE TABLE IF NOT EXISTS `enquiries` (
			`id` INT UNSIGNED AUTO_INCREMENT,
			`agent_id` INTEGER(11) NOT NULL,
			`user_id` INTEGER(11),
			`property_id` INTEGER(11) NOT NULL,
			`email` VARCHAR(100),
			`name` VARCHAR(200),
			`question` TEXT NOT NULL,
			`response` TEXT,
			`created_at` TIMESTAMP,
			`updated_at` TIMESTAMP,
			`time_bought` TIMESTAMP,
			PRIMARY KEY(id)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;'; 

		if (mysqli_query($connect, $enq_sql)) {
		 	echo successMessage('Enquiries table created!');
		 } else {
		 	echo errorMessage('Enquiries  not created or already exist');
		 }

	}

	function runDrop ()
	{	
		$connect = $GLOBALS['connect'];

		$drop_user_query = 'DROP TABLE `users`';
		if (mysqli_query($connect, $drop_user_query)) {
			echo successMessage('users table successfully dropped!');
		} else {
			echo errorMessage('users table deleted or does not exist!');
		}

		$prop_drop_sql = 'DROP TABLE `properties`';
		if (mysqli_query($connect, $prop_drop_sql)) {
			echo successMessage('properties table successfully dropped!');
		} else {
			echo errorMessage('properties table deleted or does not exist!');
		}


		$enq_drop_sql = 'DROP TABLE `enquiries`';
		if (mysqli_query($connect, $enq_drop_sql)) {
			echo successMessage('Enquiries table successfully dropped!');
		} else {
			echo errorMessage('Enquiries table deleted or does not exist!');
		}

	}	
?>

<div class="container">
	<?php
		if (@$_GET['action'] == "install") {
			runInstall();
		}

		if (@$_GET['action'] == "drop") {
			runDrop();
		}
	?>
</div>


</div>
</body>
</html>