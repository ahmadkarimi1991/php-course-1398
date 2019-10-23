<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Prime Check</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body class="d-flex flex-column">
    <header class="mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <h3 class="title">Prime Check</h3>
            </div>
        </div>
    </header>
    <div class="container flex-grow-1">
        <div class="row justify-content-center align-items-center">
            <form class="mb-4" method="POST">
                <div class="form-group">
                    <label for="EnterYourNumber">Enter a Number:</label>
                    <input class="form-control" type="text" name="input" id="EnterYourNumber">
                </div>
                <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
            </form>
            <?php
            if ($_POST) {
                $input = $_POST['input'];
                for ($i = 2; $i < $input; $i++) {
                    if ($input % $i == 0) {
                        $value = true;
                    }
                }
                if (isset($value) && $value) {
                    echo '
                    <div class="container">
                    <div class="row justify-content-center">
                    <div class="alert alert-danger text-center is-prime-alert" role="alert">The Number <b>
                    ' . $input . '
                    </b> is not prime
                    </div>
                    </div>
                    </div>
                    ';
                } else {
                    echo '
                    <div class="container">
                    <div class="row justify-content-center">
                    <div class="alert alert-success text-center is-prime-alert" role="alert">The Number <b>
                    ' . $input . '
                    </b> is prime
                    </div>
                    </div>
                    </div>
                    ';
                }
            }
            ?>
        </div>
    </div>
    <footer class="mt-3">
        <div class="container">
            <div class="row justify-content-center">
                <p class="copyright">© 2019 - Prime Check. All Rights Reserved.</p>
            </div>
        </div>
    </footer>
</body>

</html>