<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Dashboard</title>
      <link rel="stylesheet" href="css/dashboard.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
      <html>
</head>
<body>
      <div class="left-dashboard">
            <h1>Dashboard</h1>
            <div class="nav">
                  <ul>
                        <li><a href="#home">Home <i class="fa-solid fa-house"></i></a></li>
                        <li><a href="#about">About <i class="fa-solid fa-circle-info"></i></a></li>
                        <li><a href="user.php">List Database User <i class="fa-solid fa-list-ul"></i></a></li>
                        <li><a href="register.php">Register <i class="fa-solid fa-registered"></i></a></li>
                        <li><a href="login.php">Logout <i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i></a></li>
                  </ul>
            </div>
      </div>
      <div class="tabel">
            <div class="section profile" id="profile">
                  <table cellspacing="0">
                        <tr>
                              <th colspan="7">
                                    <section id="home">
                                          <?php
                                          session_start();  
                                          
                                          if (!isset($_SESSION['username'])) {
                                                header("Location: login.php"); 
                                                exit();
                                          }
                                          
                                          echo "Welcome to Dashboard " . $_SESSION['username'] ;
                                          ?>
                              </th>
                        </tr>
                  </table>
                  </section>
            </div>
      </div>
</body>

</html>