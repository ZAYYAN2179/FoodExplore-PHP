<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

require_once "koneksi.php";

$id_user = $_SESSION['id_user'];
$warung_name = isset($_GET['warung_name']) ? $_GET['warung_name'] : '';

$stmt_check = $conn->prepare("SELECT COUNT(*) as count FROM bookmarks WHERE id_user = ? AND warung_name = ?");
$stmt_check->bind_param("is", $id_user, $warung_name);
$stmt_check->execute();
$stmt_check->bind_result($count);
$stmt_check->fetch();
$stmt_check->close();

if ($count > 0) {
    echo 'true'; // Warung sudah di-bookmark
} else {
    echo 'false'; // Warung belum di-bookmark
}

$conn->close();
?>
