<?php
session_start();
if (!isset($_SESSION['id_user'])) {
    header('Location: login.php');
    exit();
}

require_once "koneksi.php";
require_once "tampil_rating.php";

$warung_id = isset($_GET['warung_id']) ? $_GET['warung_id'] : 0; // Ambil dari parameter GET jika tersedia
$warung_name = 'IcaFood'; // Nama warung

list($review_count, $avg_rating) = getWarungRating($conn, $warung_id, 'reviews');

$conn->close();

?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Menu.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Menu.css">
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

        <img src="Gambar/ica food.jpg" class="gambar-menu">

        <h2 class="ulasan-pembeli">Ulasan Pembeli</h2>

        <div class="nilai">
            <img src="Gambar/Star 1.png">
            <h4>
                <span style="font-size: 45px;"><?php echo $avg_rating; ?></span>
                <span style="color: rgb(125, 125, 125); font-size: 20px;">/ 5.0</span>
            </h4>
        </div>

        <h4 class="penilaian"><?php echo $review_count; ?> rating . <?php echo $review_count; ?> ulasan</h4>

        <a href="ulasan.php">
            <h4 class="ulasan">Lihat semua ulasan</h4>
        </a>

        <div class="tombol-fitur">
        <?php
        $nomor_telepon = "6281214482074";

        $pesan_awal = "Halo, saya tertarik dengan produk Anda.";

        $pesan_awal_encoded = urlencode($pesan_awal);

        $tautan_whatsapp = "https://wa.me/$nomor_telepon?text=$pesan_awal_encoded";
        ?>
        <a onclick="window.open('<?php echo $tautan_whatsapp; ?>', '_blank')"><b>Chat untuk order</b></a>

        </div>
        
        <a href="penilaian.php" style="text-decoration: none;">
            <div class="tombol-fitur">
                <b style="font-size: 18px;">Berikan Penilaian Anda</b>
            </div>
        </a>    
    </div>

    <div class="right">
        <div class="list-menu">
            <h1 class="judul">Ica Food</h1>

            <div class="jam-buka">
                <h3>Jam operasional 08.00 - 17.00</h3>
                
                <img id="heartImg" src="Gambar/heart.png" class="like" onclick="toggleLike('IcaFood', 'Menu.php?warung_id=<?php echo $warung_id; ?>', 'Gambar/ica food.jpg')" data-liked="false">
            </div>

            <div class="daftar-makanan">
                <h3>Menu</h3>
                <p>Ayam Katsu 
                 ...................................................................................................................  18k</p>
                <p>Ayam Kuluyuk
                 ...............................................................................................................  18k</p>
                <p>Steak Ayam
                ....................................................................................................................  18k</p>
                <p>Ayam Giling
                 ...................................................................................................................  18k</p>  
                <p>Ayam Saus Padang
                 ........................................................................................................ 18k</p>
                <p>Steak kakap
                 ....................................................................................................................  20k</p>
                <p>Kakap Kuluyuk
                 ..............................................................................................................  20k</p>
                <p>Cumi Goreng saus tiram
                 ................................................................................................  22k</p>
                <p>Cumi Saus padang
                 .........................................................................................................  22k</p>
                <p>Udang Crispy
                 .................................................................................................................  22k</p>
                <p>Teh Pucuk 350 ml
                 ............................................................................................................  4k</p>
                <p>Aqua 600 ml
                 .................................................................................................................... 4k</p>
                <p>Aqua 1500 ml
                 .................................................................................................................. 6k</p>
            </div>
        </div>
    </div>
</body>
</html>
