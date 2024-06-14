<?php
function getWarungRating($conn, $warung_id, $table_name) {
    // Query untuk menghitung jumlah review dan rata-rata rating
    $sql = "SELECT COUNT(*) as review_count, AVG(rating) as avg_rating FROM $table_name WHERE warung_id = ?";
    $stmt = $conn->prepare($sql);
    
    // Periksa jika persiapan query gagal
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    
    // Bind parameter untuk query
    $stmt->bind_param("i", $warung_id);
    
    // Jalankan query
    $stmt->execute();
    
    // Ambil hasil query
    $result = $stmt->get_result();
    
    // Periksa jika eksekusi query gagal
    if ($result === false) {
        die("Execute failed: " . $stmt->error);
    }
    
    // Ambil baris hasil sebagai asosiatif array
    $row = $result->fetch_assoc();
    
    // Tutup statement
    $stmt->close();
    
    // Ambil nilai review_count dan avg_rating dari hasil query
    $review_count = $row['review_count'];
    $avg_rating = number_format($row['avg_rating'], 1); // Format rata-rata rating
    
    // Kembalikan array yang berisi review_count dan avg_rating
    return [$review_count, $avg_rating];
}
?>