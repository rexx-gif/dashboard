<?php 
include ('koneksi.php');

if (isset($_GET['id'])){
      $id = $_GET['id'];

      $sql = "DELETE FROM user WHERE id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("i", $id);

      if ($stmt->execute()){
      echo "Data berhasil di hapus dari list";
      header('location:user.php');
      }else{
            echo "Data gagal dihapus!".$stmt->error;
      }
}
?>