<?php
require_once "connect.php";
session_start();
$_SESSION['Error'] = '';
$_SESSION['username'] = "";
$_SESSION['email'] = "";
$_SESSION['birthday'] = "";
$_SESSION['gender'] = "";

if (isset($_POST['btn'])) {
    if (!empty(trim($_POST['user'])) && !empty(trim($_POST['pass']))) {
        $username = htmlspecialchars(trim($_POST['user']));
        $password = htmlspecialchars(trim($_POST['pass']));

        $check = $conn->prepare("SELECT * FROM user WHERE userName=:user");
        $check->bindParam(':user', $username);
        $check->execute();

        $row = $check->fetch(PDO::FETCH_BOTH);
        if ($check->rowCount() > 0) {
            if (password_verify($password, $row['hash'])) {
                $_SESSION['username'] = $row['userName'];
                $_SESSION['login'] = true;
                $_SESSION['id'] = $row['iduser'];
                $_SESSION['email'] = $row['email'];
                $_SESSION['birthday'] = $row['birthday'];
                $_SESSION['gender'] = $row['gender'];

                
                header('Location:../home.php');
                exit();
            }
        }
        $_SESSION['Error']  = "the username or password is incorrect";
        header('Location:../index.php');
        exit();
    }
}
