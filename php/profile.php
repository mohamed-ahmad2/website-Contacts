<?php
require_once "connect.php";
session_start();

if (isset($_POST['btn'])) {
    $flagError = false;
    if (empty($_POST['username'])) {
        $_SESSION['errorU'] = "The username is required";
        $flagError = true;
    } else {
        $_SESSION['errorU'] = "";
    }

    if (empty($_POST['email'])) {
        $_SESSION['errorE'] = "The email is required";
        $flagError = true;
    } else {
        $_SESSION['errorE'] = "";
    }

    if (empty($_POST['birthday'])) {
        $_SESSION['errorB'] = "The birthday is required";
        $flagError = true;
    } else {
        $_SESSION['errorB'] = "";
    }

    if ($flagError) {
        header("Location: ../profile.php");
        exit();
    }

    $user_id = $_SESSION['id']; 
    if (empty($user_id)) {
        $_SESSION['error'] = "User ID is not set.";
        header("Location: ../profile.php");
        exit();
    }

    $name = htmlspecialchars(trim($_POST['username']));
    $email = htmlspecialchars(trim($_POST['email']));
    $day = htmlspecialchars(trim($_POST['birthday']));
    $gen = htmlspecialchars(trim($_POST['gender']));

    try {
        $update = $conn->prepare("UPDATE user SET userName = :name, email = :email, birthday = :day, gender = :gen WHERE iduser = :id");
        $update->bindParam(':name', $name);
        $update->bindParam(':email', $email);
        $update->bindParam(':day', $day);
        $update->bindParam(':gen', $gen);
        $update->bindParam(':id', $user_id);
        $update->execute();

        $_SESSION['username'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['birthday'] = $day;
        $_SESSION['gender'] = $gen;

        header("Location: ../profile.php");
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
