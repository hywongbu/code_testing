<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>
	<header>
		<div>
			<a href="index.php">
    		<p>Home</p></a>
			<?php
				if (isset($_SESSION['userId'])) {
					echo '
						<form action="includes/logout.inc.php" method="post" align="right">
							<button type="submit" name="logout-submit">Logout</button>
						 </form>
						 ';
				}
				else {
					echo '
						<form action="includes/login.inc.php" method="post" align="right">
							<input type="text" name="mailuid" placeholder="username/email...">
							<input type="password" name="pwd" placeholder="password...">
							<button type="submit" name="login-submit">Login</button>
							<a href="signup.php">Signup</a>
						</form>
						';
				}
			?>
			
		</div>
	</header>
</body>
</html>