<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

require_once "koneksi.php";
require_once "tampil_rating.php";

$warung_id = isset($_GET['warung_id']) ? $_GET['warung_id'] : 0; // Ambil dari parameter GET jika tersedia
$warung_name = 'MasJono'; // Nama warung

// Panggil fungsi untuk tabel masjono
list($review_count, $avg_rating) = getWarungRating($conn, $warung_id, $warung_name);

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Menu.css">
    <title>Detail Warung - Masjono</title>
<script>
    window.onload = function() {
        var heartImg = document.getElementById('heartImg');
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'bookmark_cek.php?warung_name=<?php echo $warung_name; ?>', true);
        xhr.onload = function () {
            if (xhr.status == 200) {
                var response = xhr.responseText.trim();
                if (response === 'true') {
                    heartImg.src = 'Gambar/heart-red.png';
                    heartImg.setAttribute('data-liked', 'true');
                } else {
                    heartImg.src = 'Gambar/heart.png';
                    heartImg.setAttribute('data-liked', 'false');
                }
            }
        };
        xhr.send();
    };
    function toggleLike(warungName, warungLink, warungImg) {
        var heartImg = document.getElementById('heartImg');
        var liked = heartImg.getAttribute('data-liked') === 'true';
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'bookmark_update.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            console.log(xhr.responseText);
            if (xhr.responseText.trim() === 'success') {
                if (liked) {
                    heartImg.src = 'Gambar/heart.png';
                    heartImg.setAttribute('data-liked', 'false');
                } else {
                    heartImg.src = 'Gambar/heart-red.png';
                    heartImg.setAttribute('data-liked', 'true');
                }
            }
        };
        xhr.send('warung_name=' + encodeURIComponent(warungName) + '&liked=' + (liked ? 'false' : 'true') + '&warung_link=' + encodeURIComponent(warungLink) + '&warung_img=' + encodeURIComponent(warungImg));
    }
</script>
</head>
<body>
    <div class="left">
        <div class="tombol-kembali">
            <a href="Warung.php" class="link-kembali">
                <img src="Gambar/tombol kembali.png">
                <h2 class="title-kembali">Kembali</h2>
            </a>
        </div>

        <img src="Gambar/kremes.jpg" class="gambar-menu">

        <h2 class="ulasan-pembeli">Ulasan Pembeli</h2>

        <div class="nilai">
            <img src="Gambar/Star 1.png">
            <h4>
                <span style="font-size: 45px;"><?php echo $avg_rating; ?></span>
                <span style="color: rgb(125, 125, 125); font-size: 20px;">/ 5.0</span>
            </h4>
        </div>

        <h4 class="penilaian"><?php echo $review_count; ?> rating . <?php echo $review_count; ?> ulasan</h4>

        <a href="masjono_ulasan.php">
            <h4 class="ulasan">Lihat semua ulasan</h4>
        </a>

        <div class="tombol-fitur">
       
        <a><b>Chat untuk order</b></a>

        </div>
        
        <a href="masjono_penilaian.php" style="text-decoration: none;">
            <div class="tombol-fitur">
                <b style="font-size: 18px;">Berikan Penilaian Anda</b>
            </div>
        </a>    
    </div>

    <div class="right">
        <div class="list-menu">
            <h1 class="judul">Kremes Mas Jono</h1>

            <div class="jam-buka">
                <h3>Jam operasional 08.00 - 20.00</h3>
                <img id="heartImg" src="Gambar/heart.png" class="like" onclick="toggleLike('MasJono', 'masjono.php?warung_id=<?php echo $warung_id; ?>', 'Gambar/kremes.jpg')" data-liked="false">
            </div>

            <div class="daftar-makanan">
                <h3>Menu</h3>
                <p>Ayam Kremes
                 ................................................................................................................ 12k</p>
                <p> Nasi Ayam Kremes
                 ........................................................................................................ 16k</p>
                <p>Paket Nasi Ayam Kremes
                .............................................................................................. 19k</p>
                <p>Paket Komplit Ayam Kremes
                 ........................................................................................ 20k</p>  
                <p>Ayam Gledek
                 ................................................................................................................. 12k</p>
                <p>Nasi Ayam Gledek
                 ......................................................................................................... 16k</p>
                <p>Paket Nasi Ayam Gledek
                 ............................................................................................... 19k</p>
                <p>Paket Komplit Ayam Gledek
                 ......................................................................................... 20k</p>
                <p>Ayam Bakar Madu
                 ........................................................................................................ 13k</p>
                <p>Nasi Ayam Bakar Madu
                 ................................................................................................ 17k</p>
                <p>Teh 
                 ................................................................................................................................... 3k</p>
                <p>Air mineral
                 ....................................................................................................................... 4k</p>
                <p>Nutrisari
                 ........................................................................................................................... 5k</p>
            </div>
        </div>
    </div>
</body>
</html>
