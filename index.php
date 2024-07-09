<?php
require_once "php/connect.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="icon/index/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="icon/index/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="icon/index/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="icon/index/favicon-16x16.png">
    <link rel="manifest" href="icon/index/site.webmanifest">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">

    <title>contacts</title>
    <style>

    </style>
</head>

<body>
    <div class="contair loginCon">

        <form action="php/login.php" method="post">
            <div class="login">
                <h1>User Login</h1>
                <input type="text" name="user" placeholder="enter the username">
                <span class="error"></span>
                <input type="password" name="pass" placeholder="enter the password">
                <span class="error"></span>
                <span class="notFind">
                    <?php if (isset($_SESSION['Error'])) {
                        echo $_SESSION['Error'];
                        unset($_SESSION['Error']);
                    } else {
                        echo "";
                    }; ?>
                </span>
                
                <button type="submit" name="btn">Login</button>
                <p>or</p>
                <a href="register.php" rel="noopener noreferrer">Register</a>
            </div>
        </form>
    </div>
    <script src="js/login.js"></script>
</body>

</html>
<?php
$conn = null;
