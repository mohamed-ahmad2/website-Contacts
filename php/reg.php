<?php
require_once "connect.php";
session_start();
$_SESSION['Error'] = '';

if (isset($_POST['btn'])) {
    if (!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['pass']) && !empty($_POST['month']) && !empty($_POST['day']) && !empty($_POST['year']) && !empty($_POST['gender'])) {
        if (filter_var((trim($_POST['email'])), FILTER_VALIDATE_EMAIL)) {
            $username = htmlspecialchars(trim($_POST['username']));
            $email = filter_var(htmlspecialchars(trim($_POST['email'])), FILTER_SANITIZE_EMAIL);
            $password = password_hash(htmlspecialchars(trim($_POST['pass'])), PASSWORD_DEFAULT);
            $month = htmlspecialchars(trim($_POST['month']));
            $day = htmlspecialchars(trim($_POST['day']));
            $year = htmlspecialchars(trim($_POST['year']));
            $date = $year . '-' . $month . '-' . $day;
            $gender = htmlspecialchars(trim($_POST['gender']));

            $check = $conn->prepare("SELECT * FROM user WHERE userName=:user");
            $check->bindParam(':user', $username);
            $check->execute();

            $auto = $conn->prepare("SELECT * FROM user");
            $auto->execute();

            if (!($auto->rowCount() > 0)) {
                $INC = $conn->prepare("ALTER TABLE user AUTO_INCREMENT = 1");
                $INC->execute();
            }

            if ($check->rowCount() > 0) {
                $_SESSION['Error'] = "The username has already been registered";
                header('Location:../register.php');
                exit();
            } else {
                $USER = $conn->prepare('INSERT INTO user(userName, email, hash, birthday, gender)
                                        VALUES(:user, :email, :pass, :date, :gender)');
                $USER->bindParam(':user', $username);
                $USER->bindParam(':email', $email);
                $USER->bindParam(':pass', $password);
                $USER->bindParam(':date', $date);
                $USER->bindParam(':gender', $gender);
                $USER->execute();

                $_SESSION['login'] = true;
                $_SESSION['id'] = $conn->lastInsertId();
                $_SESSION['username'] = $username;
                $_SESSION['email'] = $email;
                $_SESSION['birthday'] = $date;
                $_SESSION['gender'] = $gender;
                header('Location:../home.php');
                exit();
            }
        }
    }
}
