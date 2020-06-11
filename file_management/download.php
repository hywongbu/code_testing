<?php

require 'includes/dbh.inc.php';

if (isset($_GET['id'])) {
	$fileId = $_GET['id'];
	// echo "$fileId";

	$sql = "SELECT * FROM files WHERE id = $fileId";

	$result = mysqli_query($conn, $sql);

	$file = mysqli_fetch_assoc($result);
	$filepath = 'uploads/' .$file['file_name'];
	
	if(file_exists($filepath)){
		header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['file_name']));
        readfile('uploads/' . $file['file_name']);
        exit();
	}
}


