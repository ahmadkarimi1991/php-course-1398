<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>show contacts</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>

	</style>

</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<?php 

		function show_contacts(){
			$host = "localhost:3307";
			$user = "root";
			$password = "";
			$db_name = "contacts";
			$con = mysqli_connect($host, $user, $password, $db_name);
			$sql = "SELECT * FROM phone_numbers";

			if (!$con) {
				die(mysqli_connect_error());
			}
			$result = mysqli_query($con, $sql);
			mysqli_close($con);

			return $result;
		}

	?>
	<table class="table table-striped">
		<tr>
			<th>firstname</th>
			<th>lastname</th>
			<th>phone number</th>
		</tr>
		<?php 
			$result = show_contacts();
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>" .$row['first_name']."</td><td>".$row['last_name']."</td><td>".$row['phone_number']."</td></tr>";
				}
			}else{
				echo "0 results";
			}


		 ?>
	</table>

		</div>
	</div>
</body>
</html>