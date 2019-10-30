<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "phonebook";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id'];
$sql = "SELECT * FROM contacts WHERE id=$id";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	$contact = mysqli_fetch_assoc($result);
} else {
	header('Location: /projects/List-contact1/');
	die();
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Phonebook | Create</title>
    <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap/css/bootstrap.min.css">
</head>
<body class="pt-5">
	<div class="container">
		<div class="card">
			<div class="card-body">
		        <form method="POST" action="number.php">
		        	<input type="hidden" name="id" value="<?php echo $contact['id'] ?>">
		        	<div class="form-group">
			            <label for="name">Name</label>
		                <input class="form-control" type="text" id="name" name="name" placeholder="Name" value="<?php echo $contact['name'] ?>">
		        	</div>
		        	<div class="form-group">
			            <label for="mobile">Mobile</label>
		                <input class="form-control" type="text" name="mobile" id="mobile" placeholder="Mobile" value="<?php echo $contact['mobile'] ?>">
		        	</div>
		        	<div class="form-group">
			            <label for="email">Email</label>
		                <input class="form-control" type="text" name="email" id="email" placeholder="Email" value="<?php echo $contact['email'] ?>">
		        	</div>
		            <button type="submit" class="btn btn-primary btn-block">Edit Contact</button>
		        </form>
			</div>
		</div>
	</div>
</body>
</html>