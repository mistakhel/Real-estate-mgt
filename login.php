<?php
	session_start();
 	include('connect.php') ;
 	$_SESSION['old']['email'] = '';

 	// redirect logged in user back to their dashboard...
 	if (isset($_SESSION['admin']) OR isset($_SESSION['user'])) {
 		header("Location: account/");
 		die();
 	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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
			margin-top:150px !important;
		}

	</style>
</head>
<body>
	<?php
		$GLOBALS['connect'] = $connect;
		function showError ($msg)
		{
			return '
			<div class="alert alert-danger alert-dismissible">'.$msg.'
				<button class="close" data-dismiss="alert"><span>&times;</span></button>
			</div>';
		}

		function logUserIn()
		{
			$connect = $GLOBALS['connect'];
			$email = trim($_POST['email']);
			$password = trim($_POST['password']);

			$_SESSION['old']['email'] = $email;

			
			$password_hash = md5($password);

			$check_sql = "SELECT * FROM users WHERE email='$email' AND  password='$password_hash'";
			$query = mysqli_query($connect, $check_sql);
			$rows = mysqli_num_rows($query);
			
			if ($rows > 0) {
				$data = mysqli_fetch_assoc($query);
				$admin_status = $data['is_admin'];
				$agent_status = $data['is_agent'];
				$user_id = $data['id'];
				print_r($data);
		

				if ($admin_status == 1) {
					 $_SESSION['admin'] = $user_id ;
				} else if ($agent_status == 1) {
					$_SESSION['agent'] = $user_id;
				} else {
					$_SESSION['user'] = $user_id;
				}
				// // redirect to account...
				header("Location: account/");
				die();
			}
			echo showError('Wrong email or password!');
		}
	?>
	<div class="container">
		<div class="imgcontainer">
	    <img src="img/logo.png" alt="logo" class="logo">
	 	</div>
		<div class="row mt-5 login-row">
			<div class="offset-md-4 col-md-4">
				<form method="post" action="">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">
								<span class="fa fa-key mr-2 background-image:img/logo.ong" ></span>
								User Login
							</h4>
						</div>
						<div class="card-body">
							<?php
								if (isset($_POST['login'])) {
									logUserIn();
								}
							  ?>
							<div class="form-group">
								<label>Email</label>
								<input type="email" class="form-control" name="email" value="<?php echo $_SESSION['old']['email'];?>"  required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" required>
							</div>
						</div>
						<div class="card-footer">
							<button class="btn btn-lg
							 btn-block btn-primary" type="submit" name="login">Login</button>
							 <p>not yet a member ? <a href="registeration.php"><b>Register</b></a></p>
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