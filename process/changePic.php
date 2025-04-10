<?php
include "../includes/session.php";
include "../includes/conn.php"; // make sure this is included

function updateProfilePicture($table, $postKey) {
  if (isset($_POST[$postKey])) {
    $email = $_SESSION['email'] ?? null;
    if (!$email) return;

    $profile_pic = $_FILES['picture']['name'];

    $hash = md5($email);
    $filename = $hash . basename($profile_pic);
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/Job-Portal-Project-PHP-MySql-CSS/assets/images/";

    if ($profile_pic != '') {
      if (move_uploaded_file($_FILES['picture']['tmp_name'], $target_dir . $filename)) {
        global $conn;
        $sql = "UPDATE $table SET profile_pic = '$filename' WHERE email = '$email'";
        if ($conn->query($sql)) {
          echo "Profile picture updated!";
        } else {
          echo "SQL Error: " . $conn->error;
        }
      } else {
        echo "Upload failed!";
      }
    }
  }
}

updateProfilePicture("users", "myPic");
updateProfilePicture("company", "companyPic");
updateProfilePicture("admin", "aPic");

header("Location: /Job-Portal-Project-PHP-MySql-CSS/dashboard/editProfile.php");
exit();
?>
