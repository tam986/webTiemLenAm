<?php
session_start();
ob_start();
include_once "connect.php";

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
        $_SESSION['user_id'] = $user['id'];
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


// if (isset($_POST['name']) && isset($_POST['pw'])) {
//   $username = $_POST['name'];
//   $password = $_POST['pw'];


//   $sql = "SELECT id, uname, pass, image, role FROM user WHERE uname = ?";

//   try {

//     $user = pdo_query_one($sql, $username);

//     if ($user && password_verify($password, $user['pass'])) {

//       $_SESSION['user_id'] = $user['id'];
//       $_SESSION['name'] = $user['uname'];
//       $_SESSION['img'] = $user['image'];

//       if ($user['role'] == 1) {
//         header('Location: ../admin_layout/admin.php');
//       } else {
//         header('Location: ../index.php');
//       }
//       exit;
//     } else {
//       echo "Invalid username or password!";
//     }
//   } catch (PDOException $e) {
//     echo "An error occurred: " . $e->getMessage();
//   }
// }
