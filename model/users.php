<?php
function user_one($id)
{
  $sql = "SELECT * FROM user WHERE MaKhachHang=?";
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
  $sql = "UPDATE KhachHang SET name=?, email=?, address=?, phone=?, img=?
        WHERE user=?";
  return pdo_execute($sql, $name, $email, $address, $phone, $image, $id);
}
function user_change_pass($id, $new_pass)
{
  $sql = "UPDATE user SET pass = :new_pass WHERE user = :id";
  $params = array(':new_pass' => $new_pass, ':id' => $id);
  return pdo_execute($sql, $params);
}
