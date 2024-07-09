<?php
require_once "php/connect.php";
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:index.php');
    exit();
}
$user_id = $_SESSION['id'];
$query = $conn->prepare("SELECT idcontact,contactName, numberOfPhone FROM contacts JOIN usercontacts 
                        ON UhasId = :iduser AND idcontact = ChasId");
$query->bindParam(':iduser', $user_id);
$query->execute();

$show = $query->fetchAll(PDO::FETCH_BOTH);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>services</title>
    <!-- <link rel="preload" href="image/night.jpg" as="image"> -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/services.css">
</head>

<body>
    <header>
        <h1>services</h1>
    </header>
    <main>
        <nav>
            <a href="home.php" rel="noopener noreferrer">Home</a>
            <a href="profile.php" rel="noopener noreferrer">profile</a>
            <a href="logOut.php" rel="noopener noreferrer">log out</a>
        </nav>

        <div class="conForms">
            <form action="php/services.php" method="post" class="form1">
                <h2>Add Contacts:</h2>
                <label>Name:</label>
                <input type="text" name="name" placeholder="enter the name">
                <span class="error">
                    <?php echo isset($_SESSION['nameEr']) ? $_SESSION['nameEr'] : ""; ?>
                </span>
                <label>Number:</label>
                <input type="number" name="num" placeholder="enter the number">
                <span class="error">
                    <?php echo isset($_SESSION['numEr']) ? $_SESSION['numEr'] : ""; ?>
                </span>
                <button type="submit" name="add">Add</button>
            </form>

            <form action="php/services.php" method="post" class="form2">
                <h2>Update And Delete:</h2>
                <span class="error">
                    <?php echo isset($_SESSION['Er']) ? $_SESSION['Er'] : ""; ?>
                </span>
                <table>
                    <thead>
                        <tr>
                            <th>Check</th>
                            <th>Count</th>
                            <th>Name</th>
                            <th>Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 0;
                        foreach ($show as $row) {
                            echo "  
                                        <tr>
                                            <td>
                                                <input type=\"checkbox\" name=\"CheckDeletes[]\" value=\"" . htmlspecialchars(trim($row['idcontact'])) . "\">
                                            </td>
                                            <td>" . ++$count . "</td>
                                            <td>
                                                <input type=\"text\" name=\"conName[" . htmlspecialchars(trim($row['idcontact'])) . "]\" value=\"" . htmlspecialchars(trim($row['contactName'])) . "\">
                                            </td>
                                            <td>
                                                <input type=\"text\" name=\"conNum[" . htmlspecialchars(trim($row['idcontact'])) . "]\" value=\"" . htmlspecialchars(trim($row['numberOfPhone'])) . "\">
                                            </td>
                                        </tr>
                                ";
                        }
                        ?>

                    </tbody>
                </table>
                <div class="buttons">
                    <button type="submit" name="delete">Delete</button>
                    <button type="submit" name="update">Save Changes</button>
                </div>

            </form>
        </div>
    </main>
    <script src="js/serv.js"></script>
</body>

</html>