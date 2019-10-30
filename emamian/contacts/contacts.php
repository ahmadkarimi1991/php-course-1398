<?php

$firstnameErr = "";
$lastnameErr = "";
$numberErr = "";
$emailErr = "";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contacts";


if(isset($_POST['submit'])){
    $lastname = '';
    $firstname = '';
    $number = '';
    $email ='';
    
    if(isset($_POST['firstname']) && $_POST['firstname']){
        $firstname = $_POST['firstname'];
    }else{
        $firstnameerr = "first name is required";
    }

    if(isset($_POST['lastname']) && $_POST['lastname']){
        $lastname = $_POST['lastname'];
    }else{
        $lastnameErr = "last name is required";
    }

    if(isset($_POST['number']) && $_POST['number']){
        $number = $_POST['number'];
    }else{
        $numberErr = "number is required";
    }

    if(isset($_POST['email']) && $_POST['email']){
        $email = $_POST['email'];
    }
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if(!$firstnameErr && !$lastnameErr && !$numberErr){
        
        $sql = "INSERT INTO contacts (first_name, last_name, number, email)
        VALUES ('$firstname', '$lastname', '$number', '$email')";
        
        if ($conn->query($sql) === TRUE) {
            header('Location: http://localhost/projects/test/contacts_list.php');
           // echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}


?>