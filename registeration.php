<?php
 	session_start();
	require 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<meta charset="UTF-8">
	<meta name="description" content="realHome Landing Page Template">
	<meta name="keywords" content="realHome, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.css"/>
	<link rel="stylesheet" href="css/style.css"/>

	<style type="text/css">
		body {
			background-image: url(img/bg.jpg); 
		}
		.login-row {
			margin-top:40px !important;
		}

	</style>
</head>

<body>

</body>
	<?php
		print_r($_SESSION);

		$_SESSION['old']['first_name'] = '';
		$_SESSION['old']['last_name'] = '';
		$_SESSION['old']['email'] = '';
		$_SESSION['old']['gender'] = '';


		$GLOBALS['connect'] = $connect;

		function showError($msg)
		{
			return '
			<div class="alert alert-danger alert-dismissible">'.$msg.'
				<button class="close" data-dismiss="alert"><span>&times;</span></button>
			</div>';
		}

		function registerUser()
		{
			$connect = $GLOBALS['connect'];

			$first_name = trim($_POST['first_name']);
			$last_name = trim($_POST['last_name']);
			$email = trim($_POST['email']);
			$password = $_POST['password'];
			$verify_password = $_POST['password'];
			$gender = $_POST['gender'];

			$_SESSION['old']['first_name'] = $first_name;
			$_SESSION['old']['last_name'] = $last_name;
			$_SESSION['old']['email'] = $email;
			$_SESSION['old']['gender'] = $gender;

			$hash_password = md5($password);


			$sql = "SELECT * FROM users WHERE email = '$email'";
			$query = mysqli_query($connect, $sql);
			$row = mysqli_num_rows($query);

			if($first_name == "") {
				echo showError('First Name is required!');
			} else if (strlen($first_name) < 3) {
				echo showError('First name should be up to 3 characters!');
			} else if ($last_name == "") {
				echo showError('Last Name is required!');
			} else if (strlen($last_name) < 3) {
				echo showError('Last name should be up to 3 characters!');
			} else if($email == "") {
				echo showError('Email field is required!');
			} else if ($gender == "") {
				echo showError('Gender is required!');
			} else if ($password == "") {
				echo showError('Passowrd is required!');
			} else if ($verify_password == "") {
				echo showError('Password verify field is required!');
			} else if (strlen($password) < 5) {
				echo showError('Password should be 5 characters or more!');
			} else if ($password != $verify_password) {
				echo showError('Password does not match!');
			} else if($row > 0) {
				echo showError('Email '.$email.' is already taken!');
			} else {
				$insert_sql = "INSERT INTO users (first_name, last_name, email, gender, password, created_at, updated_at, last_login, current_login)
				VALUES ('$first_name','$last_name','$email','$gender','$hash_password', NOW(), NOW(), NOW(), NOW())";

				if (mysqli_query($connect, $insert_sql)) {
					$last_id_sql = 'SELECT id FROM users ORDER BY id DESC LIMIT 1';
					$last_id_query = mysqli_query($connect, $last_id_sql);
					$last_id = mysqli_fetch_array($last_id_query);
					
					$_SESSION['user'] = $last_id;
					header("Location: account/");
					die();
				} else {
					echo showError('Sorry your registration failed! Kindly try again!');
				}
			}
		}
	?>
	<div class="container">
		<div class="imgcontainer">
	    <img src="img/logo.png" alt="logo" class="a.site">
	 	</div>
	 	
		<div class="row mt-4 login-row">
			<div class="offset-md-4 col-md-4">
				<form method="post" action="">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">
								<span class="fa fa-registered mr-2"></span>
								Registration Form
							</h4>
						</div>

						<div class="card-body">
							<?php
								if (isset($_POST['register'])) {
									registerUser();
								}
							?>
							<div class="form-group">
								<label for='name' >First Name*: </label> 
								<input type='text' class="form-control" name='first_name' id='first_name' value="<?= $_SESSION['old']['first_name']?>" maxlength="50" required />
							</div>

							<div class="form-group">
								<label for='name' >Last Name*: </label> 
								<input type='text' class="form-control" value="<?= $_SESSION['old']['last_name']?>" name='last_name' id='last_name' maxlength="50" required />
							</div>

							<div class="form-group">
								<label for="gender">Gender</label>							
								<input type="radio" name="gender" value="female" 
								<?php echo (($_SESSION['old']['gender'] == "female") ? 'checked':'' )?> > Female 
								<input type="radio" name="gender" value="male"
								<?php echo (($_SESSION['old']['gender'] == "male") ? 'checked':'' )?>>Male 
								<input type="radio" name="gender" value="other"
								<?php echo (($_SESSION['old']['gender'] == "other") ? 'checked':'' )?>>Other
							</div>

							<div class="form-group">
								<label for='email' >Email Address*: </label> 
								<input type='text' class="form-control" name='email' value="<?= $_SESSION['old']['email']?>" id='email' maxlength="50" required />
							</div>

							<div class="form-group">
								<label for="password">Password*</label>
								<input type='password' class="form-control" name='password' id='password' maxlength="50" required>
							</div>

							<div class="form-group">
								<label for="password">Verify Password*</label>
								<input type='password' class="form-control" name='password' id='password' maxlength="50" required>
							</div>

							<div class="card-footer">
							<button class="btn btn-lg
							 btn-block btn-primary" type="submit" name="register">Register</button>
							 <p>already a member ? <a href="login.php">Login</a></p>
							</div>
						</div>
				</form>
				
			</div>
		</div>
	</div>
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
	<script src="js/magnific-popup.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>

				
</html>