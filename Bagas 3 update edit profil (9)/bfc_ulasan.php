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
            gap: 20px;
            margin: 100px 0;
            align-items: center;
        }
        .review-box {
            background-color: #D9D9D9;
            width: 100%;
            height: 120px;
            max-width: 700px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 10px;
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
        .review-user {
            font-size: 14px;
            color: #555;
            margin-top: 5px;
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
            margin-top: 90px;
        }
        .star-rating {
            display: inline-block;
        }
        .star-rating .star {
            font-size: 30px;
            color: #FA601F;
        }
        .star-rating .star-empty {
            font-size: 30px;
            color: #f2f2f2;
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
        .review-photo {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 10px;
            object-fit: cover;
        }
        .review-header {
            display: flex;
            align-items: center;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <a href="bfc.php">
        <img class="back-button" src="Gambar/tombol kembali.png" alt="Back Button">
    </a>
    <div class="back-text">
        <h2>kembali</h2>
    </div>
    <?php
    require_once "koneksi.php";

    $sql = "SELECT * FROM bfc ORDER BY id DESC";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Error: " . mysqli_error($conn));
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
                        <div class="review-header">
                            <?php if ($row['photo']) { ?>
                                <img src="profil/<?php echo htmlspecialchars($row['photo']); ?>" alt="User Photo" class="review-photo">
                            <?php } ?>
                            <div>
                                <div class="review-title"><?php echo htmlspecialchars($row['review']); ?></div>
                                <div class="review-user">by <?php echo htmlspecialchars($row['fullname']); ?></div>
                            </div>
                        </div>
                        <div class="review-date"><?php echo htmlspecialchars($row['tanggal']); ?></div>
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
