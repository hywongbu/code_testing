<?php
	require "header.php";
?>

<main>
	<h1>Signup</h1>
	<?php
		if(isset($_GET["error"])){
			if ($_GET["error"] == "emptyfields") {
				echo '<p>some field is missing</p>';
			}
			elseif ($_GET["error"] == "invalidmailuid") {
				echo '<p>invalid email address or username</p>';
			}
			elseif ($_GET["error"] == "invalidmail") {
				echo '<p>invalid email address</p>';
			}
			elseif ($_GET["error"] == "invaliduid") {
				echo '<p>invalid username</p>';
			}
			elseif ($_GET["error"] == "passwordcheck") {
				echo '<p>those passwords did not match</p>';
			}
			elseif ($_GET["error"] == "usernametaken") {
				echo '<p>the username is taken</p>';
			}
		}
		elseif (isset($_GET['signup'])) {
			if($_GET['signup'] == "success"){
				echo '<p>your account is created</p>';
			}
		}
	?>
	<form action="includes/signup.inc.php" method="post">
		<input type="text" name="uid" placeholder="Username">
		<input type="text" name="mail" placeholder="Email">
		<input type="password" name="pwd" placeholder="Password">
		<input type="password" name="pwd-repeat" placeholder="Repeat password">
		<button type="submit" name="signup-submit">Signup</button>
	</form>
</main>

<?php
	require "footer.php";
?>