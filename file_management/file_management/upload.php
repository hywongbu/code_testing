<?php

require'includes/dbh.inc.php';

	if(isset($_POST['submit'])){
		$statusMsg = '';
		$file = $_FILES['file'];
		// print_r($file);
		$fileName = $file['name'];
		$fileTmpName = $file['tmp_name'];
		$fileSize = $file['size'];
		$fileError = $file['error'];
		
		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed = array('jpg', 'jpeg', 'png', 'txt', 'pdf'); //allow certain type of file

		if (in_array($fileActualExt, $allowed)) {
			if ($fileError === 0) {
				if($fileSize < 10000) {//10Mb
					$fileDestination = 'uploads/'.$fileName;
					if(move_uploaded_file($fileTmpName, $fileDestination)){
						$insert = $conn->query("INSERT into files (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
			            if($insert){
			                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
			            }else{
			                $statusMsg = "File upload failed, please try again.";
			            } 
						header("Location: index.php?uploadsuccess");
					}
					else{
						$statusMsg = "Error in uploading the file.";
					}
				} 
				else {
					$statusMsg = "File too big";
				}
			}
			else{
				$statusMsg = "Error in uploading the file.";
			}
		}
		else{
			$statusMsg = "File type not allowed.";
		}
		echo $statusMsg;
	}
	else{
		header("Location: index.php");
	}