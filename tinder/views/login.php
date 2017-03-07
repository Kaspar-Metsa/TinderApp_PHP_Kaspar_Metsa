<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../../favicon.ico">

		<title>Sign in</title>

		<!-- Bootstrap core CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">

		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">



		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>

	<body>

		<div class="container">
			<br>
			<br>
			<br>
			<div class="row">
				<div class="col-md-4">&nbsp;</div>
				<div class="col-md-4">
					<form class="form-signin" method="post">
						<h2 class="form-signin-heading text-center">Sign In</h2>
						<div class="form-group">
							<label for="username" class="sr-only">Username</label>
							<input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus value="<?php echo isset($username)?$username:''; ?>">
						</div>
						<div class="form-group">
							<label for="inputPassword" class="sr-only">Password</label>
							<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
						</div>
						<!-- <div class="checkbox">
							<label>
								<input type="checkbox" value="remember-me"> Remember me
							</label>
						</div> -->
						<p class="text-danger"><?php if (isset($errors['login'])) echo $errors['login']; ?></p>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button><br>
						<p>Not have an account yet. <a href="register.php">Register here.</a></p>
					</form>
				</div>
				<div class="col-md-4">&nbsp;</div>
			</div>
		</div> <!-- /container -->


		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
		<script src="js/ie10-viewport-bug-workaround.js"></script>
	</body>
</html>
