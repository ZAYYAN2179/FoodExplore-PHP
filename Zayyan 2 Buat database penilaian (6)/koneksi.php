<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "rating_db";

$conn = mysqli_connect($host, $user, $pass, $db);
if (!$conn) {
    die ("Database error!");
}
?>