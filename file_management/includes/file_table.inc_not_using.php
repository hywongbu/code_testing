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
			<h1 align="center">File system</h1>
			<div align="right">
				
			</div>
			<div id="folder_table" class="table-responsive">
				

			</div>

		</div>
		
	</body>
</html>

<script>

$(document).ready(function(){

	load_folder_list();

	function load_folder_list(){
		var action = "fetch";

		$.ajax({
			url : "action.php",
			method:"POST",
			data:{action:action},
			success:function(data){
				$('#folder_table').html(data);
			}
		})
	}
});

</script>