<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="login">
        <div class="login-container">
            <form action="" method="post">
                <div>
                    <h1>Login <i class="fa-solid fa-circle-user"></i></h1>
                    <label for="nama"><i class="fa-solid fa-circle-user"></i> Username</label>
                    <input type="text" name="username" id="username" placeholder="Masukan Username" required>
                    <label for="password"><i class="fa-solid fa-lock"></i> Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukan Password" required>
                </div>
                <p>Don't have an account ?
                    <a href="register.php">Register In Here</a>
                </p>
                <input type="submit" name="simpan"><br>
                <?php

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    $conn = new mysqli("localhost", "root", "", "dashboard");

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT password FROM user WHERE username = ?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param("s", $username);

                    $stmt->execute();

                    $stmt->bind_result($hashedPassword);

                    if ($stmt->fetch()) {
                        if (password_verify($password, $hashedPassword)) {
                            $_SESSION['username'] = $username; // Simpan username di session
                            header("Location: dashboard.php");  // Arahkan ke halaman dashboard
                            exit();
                        } else {
                            echo "<span>Username atau Password salah!</span>";
                        }
                    } else {
                        echo "Username atau Password Salah";
                    }

                    $stmt->close();
                    $conn->close();
                }
                ?>

            </form>
        </div>
    </div>
    </div>
</body>

</html>