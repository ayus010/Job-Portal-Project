<?php
include "../includes/session.php";

if (isset($_POST['myPassword'])) {
  $email = $_SESSION['email'];
  $newPassword = $_POST['newPassword'];
  $password = password_hash($newPassword, PASSWORD_DEFAULT);

  $sql = "UPDATE users SET password = '$password' WHERE email = '$email'";
  $conn->query($sql);
}

if (isset($_POST['companyPassword'])) {
  $email = $_SESSION['email'];
  $newPassword = $_POST['newPassword'];
  $password = password_hash($newPassword, PASSWORD_DEFAULT);

  $sql = "UPDATE company SET password = '$password' WHERE email = '$email'";
  $conn->query($sql);
}

if (isset($_POST['aPassword'])) {
  $email = $_SESSION['email'];
  $newPassword = $_POST['newPassword'];
  $password = password_hash($newPassword, PASSWORD_DEFAULT);

  $sql = "UPDATE admin SET password = '$password' WHERE email = '$email'";
  $conn->query($sql);
}

// No echo before header!
header('Location: /Job-Portal-Project-PHP-MySql-CSS/index.php');
exit();
?>
