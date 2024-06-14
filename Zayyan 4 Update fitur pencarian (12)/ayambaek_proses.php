<?php
session_start();
require_once "koneksi.php";

if (!isset($_POST['opinion'])) {
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}

$id_user = $_SESSION['id_user'];

// Ambil fullname dan photo dari tabel users berdasarkan id_user
$sql_user = "SELECT fullname, photo FROM users WHERE id_user = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $id_user);
$stmt_user->execute();
$result_user = $stmt_user->get_result();
$row_user = $result_user->fetch_assoc();
$fullname = $row_user['fullname'];
$photo = $row_user['photo'];
$stmt_user->close();

$sql ="INSERT INTO ayambaek (rating, review, tanggal, fullname, photo) VALUES (?, ?, NOW(), ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $_POST['rating'], $_POST['opinion'], $fullname, $photo);

if ($stmt->execute()) {
    header ("refresh:0.5;url=ayambaek_ulasan.php");
    echo "<p>Penilaian berhasil disimpan.</p>";
} else {
    echo "<p>Ups, data gagal disimpan :</p>";
}
$stmt->close();
$conn->close();
?>
