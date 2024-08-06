<?php
session_start();
require_once 'connect.php';

if (isset($_POST['update_info'])) {
  $id = $_SESSION['user_id'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $image = $_POST['image'];

  user_edit($id, $name, $email, $address, $phone, $image);
  header("Location: ../index.php?page=info");
  exit();
}
function user_edit($id, $name, $email, $address, $phone, $image)
{
  $sql = "UPDATE user SET uname = ?, email=?, address=?, phone=?, image=?
        WHERE id=?";
  return pdo_execute($sql, $name, $email, $address, $phone, $image, $id);
}
