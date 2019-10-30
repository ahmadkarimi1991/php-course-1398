<?php
$name   = $_POST['name'];
$mobile = $_POST['mobile'];
$email  = $_POST['email'];


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

$sql = "INSERT INTO contacts (name, mobile, email) VALUES ('$name', '$mobile', '$email')";

if (mysqli_query($conn, $sql)) {
	header('Location: /projects/List-contact1/');
	die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>