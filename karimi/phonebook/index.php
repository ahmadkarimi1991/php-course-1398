<?php
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "phonebook";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql      = "SELECT id, name, mobile, email FROM contacts";
$result   = mysqli_query($conn, $sql);
$contacts = [];

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $contacts[] = $row;
    }
} else {
    echo "0 results";
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>BBC</title>
    <link rel="stylesheet" type="text/css" href="assets/vendors/bootstrap/css/bootstrap.min.css">
</head>
<body class="pt-5">
    <div class="container">
        <div class="mb-3">
            <a href="create.php" class="btn btn-sm btn-success">Create Contact</a>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-body">
                        <table class="table table-striped table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Mobile</th>
                                    <th>Email</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contacts as $contact) :?>
                                    <tr>
                                        <td><?php echo $contact['id'] ?></td>
                                        <td><?php echo $contact['name'] ?></td>
                                        <td><?php echo $contact['mobile'] ?></td>
                                        <td><?php echo $contact['email'] ?></td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $contact['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                        </td>
                                        <td>
                                            <a href="delete.php?id=<?php echo $contact['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>