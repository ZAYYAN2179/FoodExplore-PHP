<?php
include 'koneksi.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];

    $sql = "SELECT id_user, password FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['id_user'] = $row['id_user'];
            header('Location: index.php');
            exit();
        } else {
            $error = 'invalid';        
        }
    } else {
        $error = 'invalid';
    }

    if ($error) {
        header('Location: login.php?error=' . $error);
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="login.css">

        <script src="login.js"></script>
        <script>
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('register') && urlParams.get('register') === 'success') {
                alert('Registration successful! Please login.');
            }

            if (urlParams.has('error') && urlParams.get('error') === 'invalid') {
                alert('Invalid username or password');
            }
        }
        </script>
    </head>

    <body>
        <div class="header">
            <img class="logoAplikasi" src="Gambar/logo_FoodExplore.png">
            <ul class="navigation">
                <li><a class="active">Beranda</a></li>
                <li><a style="color: #B7B7B7" class="warung-button">Warung</a></li>
                <li><a style="color: #B7B7B7" class="bookmark-button">Bookmark</a></li>
            </ul>

            <div class="search">
                <input type="text" class="input-pencarian" placeholder="Cari nama warung...">
                <button class="search-button">
                    <img src="Gambar/search-alt-2-regular-24.png" alt="Search">
                </button>
            </div>

            <!-- <a href="profil.html"> -->
                <img class="profil" src="Gambar/user-circle-regular-24.png">
            <!-- </a> -->
        </div>

        <div class="main">
            <h1 class="judul">Selamat Datang</h1>
            <h3 class="subjudul">Temukan makanan yang anda inginkan!!!</h3>
            <h4 class="kalimat"><i>Tersedia berbagai informasi yang tersedia di dalamnya mengenai makanan yang menyediakan jasa pengiriman.</i></h4>
        </div>

            <img class="gambar" src="Gambar/mangkuk hitam2crop.png">
            <img class="gambar2" src="Gambar/mangkuk putihcrop.png">

        <div class="blur-bg-overlay"></div>

        <div class="form-popup login-popup">
            <div class="form-box">
                <div class="form-details">
                    <img src="Gambar/logo_FoodExplore.png"class="logo-login">
                </div>
                <div class="form-content">
                    <p>Login</p>
                    <form method="POST" action="" class="kotak">
                        <div class="input-field">
                            <input type="text" name="username" class="isian" placeholder="Username" required> 
                        </div>
                        <div class="input-field">
                            <input type="password" class="isian" name="password" placeholder="Password" id="password" required>
                            <img src="Gambar/eye-close.png" class="mata-pass" id="eyeicon">
                        </div>
                        <div class="tombol-login-container">
                            <button type="submit" class="tombol-login">Masuk</button>
                        </div>
                    </form>
                    <div class="bottom-link">
                        Belum mempunyai akun?
                        <a href="register.php" class="buat-akun">Buat akun</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            let eyeicon = document.getElementById("eyeicon");
            let password = document.getElementById("password");

            eyeicon.onclick = function() {
            if (password.type == "password") {
                password.type = "text";
                eyeicon.src = "Gambar/eye-open.png";
            } else {
                password.type = "password";
                eyeicon.src = "Gambar/eye-close.png";
                }
            }
        </script>
    </body>
</html>