<?php
session_start();
$_SESSION['loggedin'] = ' ';
$errors = false;

// session_destroy();
// check the fact

if (isset($_POST['username']) && isset($_POST['password'])) {
    if ($_POST['username'] == "admin" && $_POST['password'] == '1234') {
        $_SESSION['loggedin'] = true;
    } else {
        $_SESSION['loggedin'] = false;
        $errors = true;
    }
}

if (isset($_POST['logout'])) {
    $_SESSION['loggedin'] = false;
    session_destroy();
}



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <h1 class="text-center">Login Form</h1>
    <?php
    if ($_SESSION['loggedin'] == true) { ?>
        <p class="text-center">Hello Admin, Welcome to your admin panel</p>
    <?php
    } else { ?>
        <p class="text-center">Hello, Welcome to my site</p>
    <?php
    }
    ?>
    <div class="container">
        <div class="row">
            <?php
            if ($_SESSION["loggedin"] == false) {
                if ($errors) {
                    echo "<strong>UserName and password didnot match</strong>";
                } ?>

                <form action="session_cookies.php" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">User name</label>
                        <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>

            <?php
            } else { ?>
                <form action="session_cookies.php" method="POST">
                    <input type="hidden" name="logout" value="1">
                    <button type="submit">Logout</button>

                </form>

            <?php

            }



            ?>

        </div>

    </div>

</body>

</html>