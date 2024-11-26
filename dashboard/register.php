<!DOCTYPE html>
<html lang="en">

<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Register User</title>
      <link rel="stylesheet" href="css/styles.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>

      <form action="" method="post">
            <h1>Registerasi</h1>
            <label for="username"><i class="fa-solid fa-user"></i> Username</label>
            <input type="text" name="username" placeholder="Username" required><br>
            <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
            <input type="password" name="password" placeholder="Password" required><br>
            <p>Already have an account ? <a href="login.php">Login</a></p>
            <input type="submit" name="simpan"><br>
            
            <?php
            include('koneksi.php');
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  $username = $_POST['username'];
                  $password = $_POST['password'];
                  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                  $conn = new mysqli("localhost", "root", "", "dashboard");
                  if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                  }
                  $sql = "INSERT INTO user (username, password) VALUES (?,?)";
                  $stmt = $conn->prepare($sql);
                  $stmt->bind_param("ss", $username, $hashedPassword);

                  if ($stmt->execute()) {
                        header('register.php');
                        echo "Akun berhasil dibuat";
                  } else {
                        echo "Gagal mendaftar: " . $stmt->error;
                  }
                  $stmt->close();
                  $conn->close();
            }
            ?>
      </form>
</body>

</html>