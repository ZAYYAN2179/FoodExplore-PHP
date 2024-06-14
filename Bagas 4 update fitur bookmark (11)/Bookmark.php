<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

include 'koneksi.php'; // Pastikan file koneksi database Anda sudah benar
$id_user = $_SESSION['id_user'];

// Mengambil data profil pengguna dari database
$sql = "SELECT photo FROM users WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$photo = $row['photo'] ? $row['photo'] : 'default.png';  // Gunakan 'default.png' jika tidak ada foto

// Fetch bookmarks
$sql = "SELECT warung_id, warung_name, warung_link, warung_img FROM bookmarks WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();
$bookmarks = [];
while ($row = $result->fetch_assoc()) {
    $bookmarks[] = $row;
}
$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Bookmark.css">
    <script src="gambar.js"></script>
</head>
<body>
    <div class="header">
        <img class="logoAplikasi" src="Gambar/logo_FoodExplore.png">
        <ul class="navigation">
            <li><a href="index.php" style="color: #B7B7B7">Beranda</a></li>
            <li><a href="Warung.php" style="color: #B7B7B7">Warung</a></li>
            <li><a class="active">Bookmark</a></li>
        </ul>
        <div class="search">
            <a href="Warung.php">
                <input type="text" placeholder="Cari nama warung...">
            </a>
            <button class="search-button">
                <img src="Gambar/search-alt-2-regular-24.png" alt="Search">
            </button>
        </div>
        <a href="profil.php">
            <img class="profil" src="profil/<?php echo htmlspecialchars($photo); ?>" alt="Profile Picture" style="width: 50px; height: 50px;">
        </a>
    </div>

    <div class="main">
        <h2 class="bookmark">Bookmark</h2>

        <div class="macam-warung">
            <?php foreach ($bookmarks as $bookmark): ?>
                <div class="warung" id="bookmark_<?php echo $bookmark['warung_id']; ?>">
                    <img src="<?php echo htmlspecialchars($bookmark['warung_img']); ?>" class="gambar-warung" onclick="openModal(this)">
                    <h1 class="title-warung"><?php echo htmlspecialchars($bookmark['warung_name']); ?></h1>
                    <a href="<?php echo htmlspecialchars($bookmark['warung_link']); ?>" class="menu" style="text-decoration: none;"><b>Menu</b></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div id="modal" class="modal">
        <span class="close" onclick="closeModal()">&times;</span>
        <img class="modal-content" id="modalImage">
    </div>

    <div class="footer">
        <div class="footer-kiri">
            <h3 class="judul">Tentang Kami</h3>
            <p class="isi">Sebuah website yang bertujuan memberikan informasi untuk mempermudah pencarian makanan dengan jasa pengiriman yang dikhususkan bagi anak asrama Telkom University. Fitur - fitur yang terdapat di website Food Explore yaitu pencarian makanan yang menyediakan jasa pengiriman, penilaian, dan ulasan.</p>
        </div>
        <div class="footer-kanan">
            <h3 Class="kontak">Kontak Kami</h3>
            <div class="wa">
                <img src="Gambar/whatsapps.png">
                <h4 class="nomor">082141676046</h4>
            </div>
            <div class="ig">
                <img src="Gambar/instagram-logo-24.png">
                <h4 class="nama-ig">food.explore_</h4>
            </div>
        </div>
        <div class="cr">Created by Katokama Team | 2024</div>
    </div>
</body>
</html>
