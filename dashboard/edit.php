<?php
// Memulai koneksi ke database
include('koneksi.php');

// Mengecek apakah 'id' ada di URL
if (isset($_GET['id'])) {
      // Mengambil id dari URL
      $id = $_GET['id'];

      // Query untuk mengambil data berdasarkan id
      $stmt = $conn->prepare("SELECT username, password FROM user WHERE id = ?");
      $stmt->bind_param("i", $id); // 'i' untuk integer
      $stmt->execute();
      $result = $stmt->get_result();

      // Mengecek apakah data ditemukan
      if ($result->num_rows > 0) {
            // Ambil data pengguna dari database
            $row = $result->fetch_assoc();
      } else {
            // Jika data tidak ditemukan
            echo "User not found!";
            exit;
      }

      // Menutup statement
      $stmt->close();
} else {
      // Jika tidak ada id di URL
      echo "ID not provided.";
      exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Edit User</title>
      <link rel="stylesheet" href="styles.css">
</head>

<body>

      <!-- Form untuk mengedit data pengguna -->

      <form action="update_user.php" method="post">
            <h2>Edit User</h2>
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($row['username']); ?>" required>
            <br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($row['password']); ?>" readonly required>
            <br>

            <input type="submit" value="Update">
      </form>

</body>

</html>