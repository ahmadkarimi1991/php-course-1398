<?php
include('./contacts.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body>
    <div class="container mt-5">
        <div style="width: 300px; margin: auto">
                <form action="index2.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="firstname" placeholder="write your first name" class="form-control">
                        <span><?php echo $firstnameErr?></span>
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" placeholder="write your last name" class="form-control">
                        <span><?php echo $lastnameErr?></span>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="number" placeholder="write your number" class="form-control">
                        <span><?php echo $numberErr?></span>
                    </div>
                    <div class="form-group">
                        <input type="tel" name="email" placeholder="write your email" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">save</button>
                </form>
        </div>
    </div>
</body>
</html>