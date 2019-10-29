<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cteate contact</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
    <?php
        $conn = mysqli_connect("localhost", "root", "", "contacts");

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    ?>
</head>

<body class="d-flex flex-column">
    <header class="mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="title">Cteate contact</h3>
            </div>
        </div>
    </header>
    <?php
        $name = $email = $phone = "";
        $fullnameErr = $emailErr = $phoneErr = "";
        $AddToDB = true;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["fullname"])) {
                $fullnameErr = "* Full Name is required";
                $AddToDB = false;
            } else {
                $name = check_input($_POST["fullname"]);
            }
            
            if (empty($_POST["email"])) {
                $emailErr = "* Email is required";
                $AddToDB = false;
            } else {
                $email = check_input($_POST["email"]);
            }

            if (empty($_POST["phone"])) {
                $phoneErr = "* Phone is required";
                $AddToDB = false;
            } else {
                $phone = check_input($_POST["phone"]);
            }

            if ($AddToDB) {
                $sql = "INSERT INTO contacts_info (fullname, email, phone)
                VALUES ('$name', '$email', '$phone')";
                
                if (mysqli_query($conn, $sql)){
                    header("Location: index.php");
                }

                else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }
        }

        function check_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        mysqli_close($conn);
    ?>
    <div class="container flex-grow-1">
        <div class="row justify-content-center">
            <form class="mb-4" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="FullName">Full Name:</label>
                    <input class="form-control" type="text" name="fullname" id="FullName">
                    <span class="error"><?php echo $fullnameErr;?></span>
                </div>
                <div class="form-group">
                    <label for="Email">Email:</label>
                    <input class="form-control" type="email" name="email" id="Email">
                    <span class="error"><?php echo $emailErr;?></span>
                </div>
                <div class="form-group">
                    <label for="Phone">Phone Number:</label>
                    <input class="form-control" type="tel" name="phone" id="Phone">
                    <span class="error"><?php echo $phoneErr;?></span>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Add</button>
            </form>
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