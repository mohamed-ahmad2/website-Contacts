<?php
require_once "php/connect.php";
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/profile.css">
    <title>profile</title>
</head>

<body>
    <header>
        <h1>Profile</h1>
    </header>
    <main>
        <nav>
            <a href="home.php" rel="noopener noreferrer">Home</a>
            <a href="services.php" rel="noopener noreferrer">services</a>
            <a href="logOut.php" rel="noopener noreferrer">log out</a>
        </nav>
        <form action="php/profile.php" method="post">
            <label for="username">User Name:</label>
            <input type="text" value="<?php echo $_SESSION['username']; ?>" name="username">
            <span class="error">
                <?php echo isset($_SESSION['errorU']) ? $_SESSION['errorU'] : ""; ?>
            </span>

            <label for="email">Email:</label>
            <input type="email" value="<?php echo $_SESSION['email']; ?>" name="email">
            <span class="error">
                <?php echo isset($_SESSION['errorE']) ? $_SESSION['errorE'] : ""; ?>
            </span>

            <label for="birthday">Birthday:</label>
            <input type="date" id="birthday" value="<?php echo $_SESSION['birthday']; ?>" name="birthday">
            <span class="error">
                <?php echo isset($_SESSION['errorB']) ? $_SESSION['errorB'] : ""; ?>
            </span>

            <label for="gender">Gender:</label>
            <select name="gender" id="gender" class="gender" title="choose your gender">
                <option value="m" <?php if ($_SESSION['gender'] == 'm') {
                                        echo "selected";
                                    } ?>>Man</option>

                <option value="f" <?php if ($_SESSION['gender'] == 'f') {
                                        echo "selected";
                                    } ?>>Female</option>
            </select>

            <button name="btn">Save Changes</button>
        </form>
    </main>

    <script src="js/profile.js"></script>

</body>

</html>