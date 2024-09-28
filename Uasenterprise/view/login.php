<?php
session_start();
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $email = $conn->real_escape_string($_POST['email']);
  $password = $conn->real_escape_string($_POST['password']);

  $sql = "SELECT id, password FROM users WHERE email = '$email'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
      $_SESSION['user_id'] = $row['id'];
      echo "<script>
              alert('Login berhasil');
              window.location.href = '../indexcopy.html';
            </script>";
    } else {
      echo "<script>
              alert('Password salah');
              window.location.href = 'login.html';
            </script>";
    }
  } else {
    echo "<script>
            alert('Email tidak ditemukan');
            window.location.href = 'login.html';
          </script>";
  }
}

$conn->close();
?>
