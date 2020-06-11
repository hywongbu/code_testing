<?php
	require "header.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>file table</title>
		<script src="//ajax.googleapis.com/ajax/libs"></script>

		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	</head>
	<body>
		<div class="container">
			<?php
				if (isset($_SESSION['userId'])) {
					echo '<p>You are now logged in</p>';
					?>
					<h1 align="center">File system</h1>

					<form action="upload.php" method="POST" enctype="multipart/form-data" align="right	">
						Select File to upload
						<br />
						<input type="file" name="file">
						<button type="submit" name="submit">UPLOAD</button>
					</form>

					<table class="table table-bordered">
						<thread>
							<tr>
								<th>File name</th>
								<th>Uploaded on</th>
								<th>Action</th>
							</tr>
						</thread>
						<tbody>
							<?php
								require_once "list_file.php";
							?>
						</tbody>
					</table>
					<?php
				}
				else{
					echo '<p>You are logged out</p>';
				}
			?>


		</div>
		
	</body>
</html>


<?php
	require "footer.php";
?>