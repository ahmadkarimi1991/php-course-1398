<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
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
	</style>
</head>
<body>

	<?php 
		$firstname_err = $lastname_err = $phone_number_err = "";
		$firstname = $lastname = $phone_number = "";

		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["firstname"])) {
				$firstname_err = "please insert your firstname";
			}else{
				$firstname = $_POST["firstname"];
			}

			if (empty($_POST["lastname"])) {
				$lastname_err = "please insert your lastname";
			}else{
				$lastname = $_POST["lastname"];
			}

			if (empty($_POST["phoneNumber"])) {
				$phone_number_err = "please insert your phone number";
			}else{
				$phone_number = $_POST["phoneNumber"];
			}
		}
		

		function make_valid($val){
			$val = trim($val);
			$val = stripcslashes($val);
			$val = htmlspecialchars($val);

			return $val;
		}

		function save_contact($firstname, $lastname, $phone_number){
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$host = "localhost:3307";
				$username = "root";
				$password = "";
				$db_name = "contacts";
				$firstname = make_valid($firstname);
				$lastname = make_valid($lastname);
				$phone_number = make_valid($phone_number);
				$id = rand(0,1000000000);
				$sql = "INSERT INTO phone_numbers VALUES($id, '$firstname', '$lastname', $phone_number)";

				$con = mysqli_connect($host, $username, $password, $db_name);

				if ($con) {
					if ($firstname && $lastname && $phone_number) {
								if (mysqli_query($con,$sql)) {
							header("Location: show-contacts.php");
						}else{
							echo mysqli_error($con). "s";
						}
					}	
					
				}else{
					die("mysql err: " . mysqli_connect_error());
				}
				mysqli_close($con);

				
			}

		}

		save_contact($firstname, $lastname, $phone_number);

	 ?>
	<div class="container">
		<div class="row">
			<div class="form-parent">
				<div class="title"><h4>contacts</h4></div>
				<form action="<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method= "post">
					<div class="form-group">
						<label for="">
						<input type="text" placeholder="firstname" name="firstname" class="form-control"><span class="error form">* <?php echo  $firstname_err;?></span>
						</label>
					</div>
					<div class="form-group">
						<label for="">
						<input type="text" placeholder="lastname" name="lastname" class="form-control"><span class="error form">* <?php echo $lastname_err; ?></span>
						</label>
					</div>
					<div class="form-group">
						<label for="">
						<input type="text" placeholder="phone number" name="phoneNumber" class="form-control"><span class="error form">* <?php echo $phone_number_err; ?></span>
						</label>
					</div>
					<button type="submit" class="submit btn btn-primary">submit</button>
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>