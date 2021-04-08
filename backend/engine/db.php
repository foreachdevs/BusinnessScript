<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbna = "foreach";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbna", $user, $pass);
    $conn->exec("set names utf8");
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Bağlantı Sorunu : " . $e->getMessage();
}
?>