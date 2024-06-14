<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);

    // Handle file upload
    $photo = 'default.png';
    if (!empty($_FILES['photo']['name'])) {
        $photo = time() . '_' . $_FILES['photo']['name'];
        move_uploaded_file($_FILES['photo']['tmp_name'], 'profil/' . $photo);
    }

    $sql = "INSERT INTO users (username, password, fullname, photo) VALUES ('$username', '$password', '$fullname', '$photo')";
    if (mysqli_query($conn, $sql)) {
        header("Location: login.php?register=success");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="register.css">

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
                <input type="text" class="input-pencarian" placeholder="Temukan Makanan ...">
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

        <div class="form-popup register-popup">
            <div class="form-box">
                <div class="form-details">
                    <img src="Gambar/logo_FoodExplore.png"class="logo-login">
                </div>
                <div class="form-content">
                    <p>Register</p>
                    <form method="POST" action="" enctype="multipart/form-data" class="kotak">
                        <div class="input-field">
                            <input type="text" name="username" class="isian" placeholder="Username" required> 
                        </div>

                        <div class="input-field">
                            <input type="password" name="password" class="isian" placeholder="Password" id="password2" required>
                            <img src="Gambar/eye-close.png" class="mata-pass" id="eyeicon2">
                        </div>

                        <div class="input-field">
                            <input type="text" name="fullname" class="isian" placeholder="Full Name" required> 
                        </div>

                        <div class="upload-foto">
                            <b>Upload Profil Pict:</b> <input type="file" name="photo">
                        </div>

                        <div class="tombol-login-container">
                            <button type="submit" class="tombol-login">Buat Akun</button>
                        </div>

                        <div class="bottom-link">
                            Sudah mempunyai akun?
                            <a href="login.php" class="buat-akun">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            let eyeicon2 = document.getElementById("eyeicon2");
            let password2 = document.getElementById("password2");

            eyeicon2.onclick = function() {
            if (password2.type == "password") {
                password2.type = "text";
                eyeicon2.src = "Gambar/eye-open.png";
            } else {
                password2.type = "password";
                eyeicon2.src = "Gambar/eye-close.png";
                }
            }
        </script>
    </body>
</html>