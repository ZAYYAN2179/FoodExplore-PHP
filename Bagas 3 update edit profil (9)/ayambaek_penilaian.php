<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>From Reviews</title>
</head>
<body>
    <header>
    <a href="ayambaek.php">
    <img class="tombol-kembali" alt="tombol kembali" src="Gambar/tombol kembali.png"/>
    </a>
    <h2 class="kembali">kembali</h2>
    </header>
    <div class="wrapper">
        <h1>Berikan Penilaian</h1>
        <form action="ayambaek_proses.php" method="POST">
            <div class="rating">
                <input type="number" name="rating" hidden>
                <i class='bx bx-star star' style="--i: 0;"></i>
                <i class='bx bx-star star' style="--i: 1;"></i>
                <i class='bx bx-star star' style="--i: 2;"></i>
                <i class='bx bx-star star' style="--i: 3;"></i>
                <i class='bx bx-star star' style="--i: 4;"></i>
            </div>
            <h1>Berikan Ulasan</h1>
            <textarea name="opinion" cols="30" rows="5" placeholder="Masukan ulasan anda disini"></textarea>
            <div class="btn-group">
                <button type="submit" class="btn submit">Kirim</button>
            </div>
        </form>
    </div>
    

    <script src="script.js"></script>

</body>
</html>