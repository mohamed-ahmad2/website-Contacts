<?php
require_once 'config.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "connect<br><br>";
} catch (PDOException $e) {
    echo "faild".$e->getMessage();
}