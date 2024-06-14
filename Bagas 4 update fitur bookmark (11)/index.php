<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

include 'koneksi.php';
$id_user = $_SESSION['id_user'];

// Mengambil nama lengkap dan foto profil pengguna dari database
$sql = "SELECT fullname, photo FROM users WHERE id_user = $id_user";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$fullname = $row['fullname'];
$photo = $row['photo'] ? $row['photo'] : 'default.png';  // Untuk user yang belum upload foto
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Beranda.css">
    </head>
    <body>
        <div class="header">
            <img class="logoAplikasi" src="Gambar/logo_FoodExplore.png">
            <ul class="navigation">
                <li><a class="active">Beranda</a></li>
                <li><a href="Warung.php" style="color: #B7B7B7">Warung</a></li>
                <li><a href="Bookmark.php" style="color: #B7B7B7">Bookmark</a></li>
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
            <h1 class="judul">Selamat Datang</h1>
            <h3 class="subjudul">Temukan makanan yang anda inginkan!!!</h3>
            <h4 class="kalimat"><i>Tersedia berbagai informasi yang tersedia di dalamnya mengenai makanan yang menyediakan jasa pengiriman.</i></h4>
        </div>

        <img class="gambar" src="Gambar/mangkuk hitam2crop.png">
        <img class="gambar2" src="Gambar/mangkuk putihcrop.png">
    </body>
</html>
