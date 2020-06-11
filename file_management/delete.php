<?php

require 'includes/dbh.inc.php';
require 'header.php';

if (isset($_GET['id'])) {
	$fileId = $_GET['id'];
	$sql = "DELETE FROM files WHERE id=$fileId";

	if ($conn->query($sql) === TRUE) {
	  echo "Record deleted successfully";
	} else {
	  echo "Error deleting record: " . $conn->error;
	}
}