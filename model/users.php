<?php
function user_one($id)
{
  $sql = "SELECT * FROM user WHERE id = ?";
  return pdo_query_one($sql, $id);
}

function user_register($name, $email, $pass, $phone, $address, $image)
{
  $sql = "INSERT INTO user(name,email,pass,phone,address,img) 
        VALUES(?,?,?,?,?,?)";
  return pdo_execute($sql, $name, $email, $pass, $phone, $address, $image);
}

function user_edit($id, $name, $email, $address, $phone, $image)
{
  $sql = "UPDATE user SET uname = ?, email=?, address=?, phone=?, image=?
        WHERE id=?";
  return pdo_execute($sql, $name, $email, $address, $phone, $image, $id);
}
function user_change_pass($id, $new_pass)
{
  $sql = "UPDATE user SET pass = :new_pass WHERE user = :id";
  $params = array(':new_pass' => $new_pass, ':id' => $id);
  return pdo_execute($sql, $params);
}
function upload($file)
{
  if (isset($_FILES[$file])) {
    $dest = '../asset/img/' . basename($_FILES[$file]['name']);
    $files = $_FILES[$file]['tmp_name'];
    $err = $_FILES[$file]['error'];
    if ($err == 0 && move_uploaded_file($files, $dest)) {
      return basename($_FILES[$file]['name']);
    } else {
      return false;
    }
  }
  return false;
}
