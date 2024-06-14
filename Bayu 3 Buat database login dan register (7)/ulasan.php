<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px auto;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 18px;
            border: 2px solid #0056b3;
            text-align: center;
            max-width: 200px;
        }
        .button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .button:active {
            transform: translateY(1px);
        }
        .reviews-container {
            display: flex;
            flex-direction: column;
            gap: 20px; /* Jarak antar kotak */
            margin: 100px 0;
            align-items: center;
        }
        .review-box {
            background-color: #D9D9D9;
            width: 100%;
            height: 100px;
            max-width: 700px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            position: relative;
        }
        .review-content {
            flex: 1;
        }
        .review-title {
            font-weight: bold;
        }
        .review-date {
            position: absolute;
            bottom: 10px;
            left: 10px;
            font-size: 12px;
            color: #555;
        }
        .star-rating-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 150px;
        }
        .star-rating {
            display: inline-block;
        }
        .star-rating .star {
            font-size: 30px;
            color: #FA601F; /* Warna bintang (kuning) */
        }
        .star-rating .star-empty {
            font-size: 30px;
            color: #f2f2f2; /* Warna bintang kosong (abu-abu) */
        }
        .back-button {
            position: absolute;
            top: 29px;
            left: 20px;
            width: 40px;
            height: 40px;
        }
        .back-text {
            position: absolute;
            top: 10px;
            left: 70px;
            font-size: 18px;
            font-weight: bold;
        }
        .empty-message {
            text-align: center;
            margin-top: 20px;
            color: #555;
        }
    </style>
</head>
<body>
    <a href="./HTML/Menu.html">
    <img class="back-button" src="Gambar/tombol kembali.png" alt="Back Button">
    </a>
    <div class="back-text">
        <h2>kembali</h2>
    </div>
    <?php
    require_once "koneksi.php";

    $sql = "SELECT * FROM reviews ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn)); // menampilkan pesan kesalahan jika query gagal
    }

    if (mysqli_num_rows($result) > 0) {
    ?>
        <div class="reviews-container">
            <?php
            while ($row = mysqli_fetch_array($result)) {
                $rating = (int)$row['rating'];
                $starFull = str_repeat('<span class="star">&#9733;</span>', $rating);
                $starEmpty = str_repeat('<span class="star-empty">&#9733;</span>', 5 - $rating);
            ?>
                <div class="review-box">
                    <div class="review-content">
                        <div class="review-title"><b><?php echo $row['review']; ?></b></div>
                        <div class="review-date"><?php echo $row['tanggal']; ?></div>
                    </div>
                    <div class="star-rating-container">
                        <div class="star-rating">
                            <?php echo $starFull . $starEmpty; ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    <?php
    } else {
        echo '<div class="empty-message">Data tabel ulasan kosong</div>';
    }
    ?>
</body>
</html>
