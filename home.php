<?php
    session_start();
    if(isset($_SESSION['username'])){
        $user = $_SESSION['username'];
        unset($_SESSION['Error']);
    }else{
        $user= "Guest";
    }

    if(!isset($_SESSION['login'])){
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
    <link rel="icon" href="image/contact.png" type="image/png">
    <link rel="preload" href="image/night.jpg" as="image">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>Contacts Manager</title>
</head>
<body>
    
    <header class="wait">
        <div class="container">
            <img src="image/contact.png" alt="img1" title="logo" />
            <h1 title="Contacts Manager">Contacts Manager</h1>
            <div class="list" title="list">
                <span class="icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <nav>
                    <ul>
                        <li><a href="services.php" rel="noopener noreferrer">services</a></li>
                        <li><a href="profile.php" rel="noopener noreferrer">portfolio</a></li>
                        <li><a href="#about" rel="noopener noreferrer">about us</a></li>
                        <li><a href="logOut.php" rel="noopener noreferrer">log out</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="wait">
        <section class="welcome">
            <h2>Hello <?php echo $user; ?></h2>
        </section>
        <section class="description" id="about">
            <p>This website is a "Contacts Manager" that allows users to manage their contact list easily and
                efficiently.</p>
            <p>The site offers comprehensive services such as adding, deleting, and editing contact, helping users to
                organize their contact information effectively.</p>
        </section>
        <footer>
            <p>Made By:Mohamed Ahmad</p>
            <span>
                <p>contact us: </p>
                <a href="amohamedahmad68@gmail.com" target="_blank" rel="noopener noreferrer">Gmail</a>
                <a href="https://github.com/mohamed-ahmad2" target="_blank" rel="noopener noreferrer">github</a>
            </span>
        </footer>
    </main>
</body>
</html>
