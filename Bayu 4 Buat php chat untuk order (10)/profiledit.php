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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mendapatkan data dari formulir
    $new_fullname = $_POST['fullname'];
    $new_username = $_POST['username'];
    $new_photo = $photo;  // Default photo

    // Menangani unggahan file foto baru
    if (!empty($_FILES['photo']['name'])) {
        $target_dir = "profil/";
        $imageFileType = strtolower(pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION));
        $new_photo = uniqid() . '.' . $imageFileType;  // Generate unique file name
        $target_file = $target_dir . $new_photo;
        $uploadOk = 1;
        
        // Cek apakah file gambar adalah gambar asli atau palsu
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Batasi jenis file
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Cek apakah $uploadOk di set ke 0 oleh error
        if ($uploadOk == 0) {
            echo "File tidak terunggah.";
        // Jika semua ok, coba unggah file
        } else {
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                // Delete old photo if it's not the default photo
                if ($photo != 'default.png' && file_exists($target_dir . $photo)) {
                    unlink($target_dir . $photo);
                }
            } else {
                echo "Ada kesalahan saat mengunggah file.";
                $new_photo = $photo;  // Revert to old photo if upload fails
            }
        }
    }

    // Update data pengguna di database
    $sql = "UPDATE users SET fullname = ?, username = ?, photo = ? WHERE id_user = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $new_fullname, $new_username, $new_photo, $id_user);
    if ($stmt->execute()) {
        header('Location: profil.php');  // Redirect ke halaman profil
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profiledit.css">
</head>
<body>
    <div class="container">
        <h1>Edit Profil</h1>
        <form action="profiledit.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="fullname">Fullname:</label>
                <input type="text" name="fullname" value="<?php echo htmlspecialchars($fullname); ?>" required>
            </div>
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" required>
            </div>
            <div class="form-group">
                <label for="photo">Photo:</label>
                <input type="file" name="photo">
                <img class="edit-foto" src="profil/<?php echo htmlspecialchars($photo); ?>" alt="Current Photo" width="100">
            </div>
            <button type="submit">Update</button>
        </form>
        <a href="profil.php" class="kembali-profil">Kembali ke Profil</a>
    </div>
</body>
</html>
