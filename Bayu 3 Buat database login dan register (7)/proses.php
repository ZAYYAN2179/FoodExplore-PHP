<?php
require_once "koneksi.php";

if (!isset($_POST['opinion'])) {
    echo "<p>Isian tidak boleh kosong.</p>";
    exit();
}

$sql ="INSERT INTO reviews (rating, review, tanggal) VALUES ('$_POST[rating]', '$_POST[opinion]', NOW())";
if (mysqli_query($conn, $sql)) {
    header ("refresh:1;url=ulasan.php");
    echo "<p>Data berhasil disimpan.</p>";
}
else {
    echo "<p>Ups, data gagal disimpan :</p>";
}

?>