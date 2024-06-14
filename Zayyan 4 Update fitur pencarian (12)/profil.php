<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

include 'koneksi.php';
$id_user = $_SESSION['id_user'];

// Mengambil data pengguna dari database
$sql = "SELECT fullname, photo, username FROM users WHERE id_user = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id_user);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$fullname = $row['fullname'];
$photo = $row['photo'] ? $row['photo'] : 'default.png';  // Default photo jika tidak ada
$username = $row['username'];
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profil.css">
</head>
<body>
    <div class="header">
        <img class="logoAplikasi" src="Gambar/logo_FoodExplore.png">
        <ul class="navigation">
            <li><a href="index.php" style="color: #B7B7B7;">Beranda</a></li>
            <li><a href="Warung.php" style="color: #B7B7B7;">Warung</a></li>
            <li><a href="Bookmark.php" style="color: #B7B7B7">Bookmark</a></li>
        </ul>
        <div class="search">
            <input type="text" placeholder="Temukan Makanan ...">
            <button class="search-button">
                <img src="Gambar/search-alt-2-regular-24.png" alt="Search">
            </button>
        </div>
        <a href="profil.php">
            <img class="profil" src="profil/<?php echo htmlspecialchars($photo); ?>" alt="Profile Picture">
        </a>
    </div>

    <div class="container">
        <div class="kiri">
            <div class="ubah-profil">
                <img src="Gambar/user keluar.png" class="gambar-ubahprofil">
                <p>Ubah Profil</p>
            </div>
            <div class="tombol-keluar">
                <img src="Gambar/logout.png" class="gambar-ubahprofil">
                <a href="logout.php" class="btn btn-danger btn-sm" style="text-decoration: none;"><p>Keluar</p></a>
            </div>
        </div>
        
        <div class="kanan">
            <div class="isi-kanan">
                <h1 class="judul">Profil Anda</h1>
                
                <div class="frame-inner"></div>
                
                <div class="border-profil">
                    <img src="profil/<?php echo htmlspecialchars($photo); ?>" class="foto-profil">
                        <p><a href="profiledit.php" class="tombol-unggah" style="text-decoration: none;">Edit Profil</a></p>
                    <div class="inputan">
                        <div class="nama">
                            <p>Fullname</p>
                            <input type="text" value="<?php echo htmlspecialchars($fullname); ?>" readonly>
                        </div>
                        <div class="nomor">
                            <p>Username</p>
                            <input type="text" value="<?php echo htmlspecialchars($username); ?>" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
