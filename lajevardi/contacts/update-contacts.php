<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>update contacts</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<style>
		.form-parent{
			margin: 30px auto;
			border: 1px solid #d2d8de;
			border-radius: 10px;
			padding: 40px;
		}
		.error{
			color: red;
			
		} 
		.title{
			text-align: center;
		}		
		form{
			display: flex;
			flex-direction: column;
		}
	</style>
</head>
<body>
	<?php 

		function make_valid($val){
			$val = trim($val);
			$val = stripcslashes($val);
			$val = htmlspecialchars($val);

			return $val;
		}

		$firstname = $lastname = $firstname_err = $lastname_err = "";
		$username = "root";
		$password = "";
		$host = "localhost:3307";
		$db_name = "contacts";
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$changed_firstname = make_valid($_POST["changed_firstname"]);
			$changed_lastname = make_valid($_POST["changed_lastname"]);
			$changed_phone_number = make_valid($_POST["changed_phone_number"]);

			if (empty($_POST["firstname"])) {
				$firstname_err = "please insert the firstname";
			}else{
				$firstname = make_valid($_POST["firstname"]);
			}

			if (empty($_POST["lastname"])) {
				$lastname_err = "please insert the lastname";
			}else{
				$lastname = make_valid($_POST["lastname"]);
			}
		}

		$con = mysqli_connect($host, $username, $password, $db_name);

		if ($con) {
			if ($firstname && $lastname && $changed_phone_number && $changed_lastname && $changed_firstname) {
				$sql = "UPDATE phone_numbers SET last_name = '$changed_lastname', first_name = '$changed_firstname', phone_number = $changed_phone_number WHERE last_name = '$lastname' AND first_name = '$firstname'";
				if (mysqli_query($con, $sql)) {
					header("Location: show-contacts.php");
				}else{
					echo mysqli_error($con). "s";
				}
				

			}
		}

	?>
	<div class="container">
		<div class="row">
			<div class="form-parent">
				<div class="title"><h4>update contacts</h4></div>
				<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post">
					<div class="form-group form-input">
						<label for="">
						<input type="text" placeholder="firstname" name="firstname" class="form-control"><span class="error form">* <?php echo  $firstname_err;?></span>
						</label>
					</div>
					<div class="form-group form-input">
						<label for="">
						<input type="text" placeholder="lastname" name="lastname" class="form-control"><span class="error form">* <?php echo  $lastname_err;?></span>
						</label>
					</div>
					<div class="form-group">
						<label for="">
						<input type="text" placeholder="replaced firstname" name="changed_firstname" class="form-control">
						</label>
					</div>
					<div class="form-group">
						<label for="">
						<input type="text" placeholder="replaced lastname" name="changed_lastname" class="form-control">
						</label>
					</div>
					<div class="form-group">
						<label for="">
						<input type="text" placeholder="phone number" name="changed_phone_number" class="form-control">
						</label>
					</div>
					<button type="submit" class="submit btn btn-primary">submit</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>