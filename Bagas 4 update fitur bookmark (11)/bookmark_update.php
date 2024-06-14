<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

require_once "koneksi.php";

$id_user = $_SESSION['id_user'];
$warung_name = isset($_POST['warung_name']) ? $_POST['warung_name'] : '';
$warung_link = isset($_POST['warung_link']) ? $_POST['warung_link'] : '';
$warung_img = isset($_POST['warung_img']) ? $_POST['warung_img'] : '';
$liked = isset($_POST['liked']) ? $_POST['liked'] : 'false';

if ($liked === 'true') {
    // Tambahkan bookmark
    $stmt = $conn->prepare("INSERT INTO bookmarks (id_user, warung_name, warung_link, warung_img) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isss", $id_user, $warung_name, $warung_link, $warung_img);
} else {
    // Hapus bookmark
    $stmt = $conn->prepare("DELETE FROM bookmarks WHERE id_user = ? AND warung_name = ?");
    $stmt->bind_param("is", $id_user, $warung_name);
}

if ($stmt->execute()) {
    echo 'success';
} else {
    echo 'error';
}

$stmt->close();
$conn->close();
?>
