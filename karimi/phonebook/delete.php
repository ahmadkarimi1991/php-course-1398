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
$sql = "DELETE FROM contacts WHERE id=$id";

if (mysqli_query($conn, $sql)) {
	header('Location: /projects/List-contact1/');
	die();
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysql_close();

?>