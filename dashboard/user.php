<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>List User Database</title>
      <link rel="stylesheet" href="tabel.css">
</head>
<body>
      <?php 
      // Menghubungkan ke database
      include('koneksi.php');

      // Query untuk mengambil semua data dari tabel users
      $sql = "SELECT * FROM user";
      $result = $conn->query($sql);

      // Mengecek apakah ada hasil yang ditemukan
      if ($result->num_rows > 0) {
            $_SESSION['username']="Login Berhasil";
            $_SESSION['username']=$username;
            header("Location: dashboard.php");
      ?>
      
      <table border="1" solid black>
            <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Hapus</th>
                  <th>Edit</th>
                  <th>Back</th>
            </tr>
      
      <?php
            // Menampilkan setiap baris data
            while ($row = $result->fetch_assoc()) {
      ?>
            <tr>
                  <td><?php echo htmlspecialchars($row["username"]); ?></td>
                  <td><?php echo htmlspecialchars($row["password"]); ?></td>
                  <td><a href="hapus.php?id=<?php echo $row['id'];?>">Hapus</a></td>
                  <td><a href="edit.php?id=<?php echo $row['id'];?>">Edit</a></td>
                  <td><a href="dashboard.php">Back to Dashboard</a></td>
                  
            </tr>
      <?php 
            }
      } else {
            echo "Tidak ada data yang ditemukan.";
      }

      // Menutup koneksi database
      $conn->close();
      ?>
      </table>
</body>
</html>
