<?php
session_start();
ob_start();
require_once 'connect.php';

if (isset($_POST['name']) && isset($_POST['pw'])) {
  $username = $_POST['name'];
  $password = $_POST['pw'];


  $sql = "SELECT * FROM user WHERE uname = ? AND pass = ?";

  try {

    $user = pdo_query_one($sql, $username, $password);


    if ($user && $password === $user['pass']) {
      if ($user['role'] == 1) {

        header('Location: ../admin_layout/admin.php');
      } else {

        $_SESSION['name'] = $user['uname'];
        $_SESSION['img'] = $user['image'];
        header('Location: ../index.php');
      }
      exit;
    } else {

      echo "Invalid username or password!";
    }
  } catch (PDOException $e) {

    echo "An error occurred: " . $e->getMessage();
  }
}
