<?php
// Memulai koneksi ke database
include('koneksi.php');

// Mengecek apakah data dikirimkan melalui POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data yang dikirimkan
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memperbarui data pengguna
    $stmt = $conn->prepare("UPDATE user SET username = ?, password = ? WHERE id = ?");
    $stmt->bind_param("ssi", $username, $password, $id); // 'ssi' artinya string, string, integer

    // Menjalankan query
    if ($stmt->execute()) {
        echo "User data updated successfully.";
        header('location:user.php');
    } else {
        echo "Failed to update user data.";
    }

    // Menutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>
