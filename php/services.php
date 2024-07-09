<?php
require_once "connect.php";
session_start();

if (isset($_POST['add'])) {
    $flagError = false;
    if (empty($_POST['name'])) {
        $_SESSION['nameEr'] = "the name is required";
        $flagError = true;
    } else {
        $_SESSION['nameEr'] = "";
    }

    if (empty($_POST['num'])) {
        $_SESSION['numEr'] = "the number is required";
        $flagError = true;
    } else {
        $_SESSION['numEr'] = "";
    }

    if ($flagError) {
        header("Location:../services.php");
        exit();
    }

    $auto = $conn->prepare("SELECT * FROM contacts");
    $auto->execute();

    if (!($auto->rowCount() > 0)) {
        $INC = $conn->prepare("ALTER TABLE contacts AUTO_INCREMENT = 1");
        $INC->execute();
    }

    $user_id = $_SESSION['id'];

    $name = htmlspecialchars(trim($_POST['name']));
    $num = htmlspecialchars(trim($_POST['num']));

    $IncCon = $conn->prepare("INSERT INTO contacts(contactName, numberOfPhone)
                            VALUES(:name, :num)");
    $IncCon->bindParam(':name', $name);
    $IncCon->bindParam(':num', $num);
    $IncCon->execute();
    $con_id = $conn->lastInsertId();

    $ConUser = $conn->prepare("INSERT INTO usercontacts(UhasId, ChasId)
                            VALUES(:Uid, :Cid)");
    $ConUser->bindParam(':Uid', $user_id);
    $ConUser->bindParam(':Cid', $con_id);
    $ConUser->execute();

    header('Location:../services.php');
    exit();
}



if (isset($_POST['delete'])) {
    if (empty($_POST['CheckDeletes'])) {
        $_SESSION['Er'] = "Please select contacts to delete";
        header("Location: ../services.php");
        exit();
    } else {
        $_SESSION['Er'] = "";
    }

    $user_id = $_SESSION['id'];
    $CheckDeletes = $_POST['CheckDeletes'];
    $placeholders = implode(',', array_fill(0, count($CheckDeletes), '?'));


    $deleteCon = $conn->prepare("DELETE FROM usercontacts WHERE ChasId IN ($placeholders) AND UhasId = ?");
    foreach ($CheckDeletes as $indx => $id) {
        $deleteCon->bindValue($indx + 1, $id);
    }
    $deleteCon->bindValue(count($CheckDeletes) + 1, $user_id);
    $deleteCon->execute();


    $deleteCon = $conn->prepare("DELETE FROM contacts WHERE idcontact IN ($placeholders)");
    foreach ($CheckDeletes as $indx => $id) {
        $deleteCon->bindValue($indx + 1, $id);
    }
    $deleteCon->execute();

    header("Location:../services.php");
    exit();
}

if (isset($_POST['update'])) {
    $flagError = false;

    foreach ($_POST['conName'] as $id => $name) {
        if (empty($name) || empty($_POST['conNum'][$id])) {
            $_SESSION['Er'] = "Please enter the name and number to update";
            $flagError = true;
            break;
        }
    }

    if ($flagError) {
        header("Location: ../services.php");
        exit();
    } else {
        $_SESSION['Er'] = "";
    }

    foreach ($_POST['conName'] as $id => $name) {
        if (!empty($_POST['conNum'][$id])) {
            $num = htmlspecialchars(trim($_POST['conNum'][$id]));
            $name = htmlspecialchars(trim($name));

            $updateCon = $conn->prepare("UPDATE contacts SET contactName = :name, numberOfPhone = :num WHERE idcontact = :id");
            $updateCon->bindValue(':name', $name);
            $updateCon->bindValue(':num', $num);
            $updateCon->bindValue(':id', $id);
            $updateCon->execute();
        }
    }

    header("Location:../services.php");
    exit();
}
