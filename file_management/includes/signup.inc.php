<!-- not showing to user, check correct input -->
<?php
	if(isset($_POST{'signup-submit'})){

		require 'dbh.inc.php';

		$username = $_POST['uid'];
		$email = $_POST['mail'];
		$password = $_POST['pwd'];
		$passwordRepeat = $_POST['pwd-repeat'];

		// missing any field
		if(empty($username) || empty($email) || empty($password) || empty($passwordRepeat)){
			header("Location: ../signup.php?error=emptyfield&uid=".$username."&mail=".$email);
			exit();
		}
		//invalid email or username
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invalidmailuid");
			exit();
		}
		//invalid email
		elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			header("Location: ../signup.php?error=invalidmail&uid=".$username);
			exit();
		}
		//invalid username
		elseif(!preg_match("/^[a-zA-z0-9]*$/", $username)){
			header("Location: ../signup.php?error=invaliduid&mail=".$email);
			exit();
		}
		//pwd != pwd-repeat
		elseif ($password !== $passwordRepeat) {
			header("Location: ../signup.php?error=passwordcheck&uid=".$username."&mail=.".$email);
			exit();		
		}
		//pass all test
		else{
			$sql = "SELECT uidUsers FROM users WHERE uidUsers=?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../signup.php?error=sqlerror");
				exit();
			}
			else {
				mysqli_stmt_bind_param($stmt, "s", $username);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0){
					header("Location: ../signup.php?error=usernametaken&uid=".$email);
					exit();
				}
				else{
					$sql ="INSERT INTO users(uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);
					if (!mysqli_stmt_prepare($stmt, $sql)) {
						header("Location: ../signup.php?error=sqlerror");
						exit();
					}
					else{
						$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
						mysqli_stmt_execute($stmt);
						header("Location: ../signup.php?signup=success");
						exit();
						
					}
				}
			}

		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}
	else{
		header("Location: ../index.php");
		exit();
	}
