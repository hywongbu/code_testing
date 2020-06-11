<?php

require 'includes/dbh.inc.php';

// Get filename from the database
$sql = "SELECT * FROM files ORDER BY uploaded_on DESC";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
	header("Location: ../index.php?error=listfilesqlerror");
	exit();
}
else{
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if($result->num_rows > 0){
		$files = array();
		while($row = $result->fetch_assoc()){
			array_push($files, $row);
		?>
		<tr>
			<td><?php echo $row['file_name'] ?></td>
			<td><?php echo $row['uploaded_on'] ?></td>
			<td>
				<a href="download.php?id=<?php echo($row['id']) ?>">Download</a>
				<br />
				<a href="delete.php?id=<?php echo($row['id']) ?>">Delete</a>
			</td> 
			<?php
		}
	}
	else{ ?>
	    <p>No file(s) found...</p>
	<?php } 
}
?>
