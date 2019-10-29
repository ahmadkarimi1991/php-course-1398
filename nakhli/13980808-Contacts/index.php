<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nakhli Contacts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="d-flex flex-column">
    <header class="mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="title">Nakhli Contacts</h3>
            </div>
        </div>
    </header>
    <div class="container flex-grow-1">
        <div class="row">
            <a href="create-contact.php" class="btn btn-outline-success mb-3">+ Create contact</a>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "contacts";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }  
                
                $sql = "SELECT id, fullname, email, phone FROM contacts_info";
                $result = mysqli_query($conn, $sql);

            ?>
            <table class="table table-striped table-hover table-responsive-md">
                <thead>
                    <tr class="table-success">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone Number</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $counter = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                    <th scope="row"><?php echo $counter++?></th>
                    <td><?php echo $row["fullname"]?></td>
                    <td><?php echo $row["email"]?></td>
                    <td><?php echo $row["phone"]?></td>
                    </tr>
                    <?php
                        }
                    } else {
                        echo "
                        <tr>
                        <td>0 result</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                        ";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer class="mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <p class="copyright">© 2019 - Nakhli Contacts. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>