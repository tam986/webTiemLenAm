<?php
function get_total()
{

  if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $total = 0;
    foreach ($_SESSION['cart'] as $item) {
      $thanhtien = $item['productTotal'];
      $total += $thanhtien;
    }
  } else $total = 0;
  return $total;
}
function insert_order_returnID($iduser, $total, $fullname, $email, $phone, $address)
{
  $sql = "INSERT INTO orders (user_id, total, name, phone, email, address, created_at, updated_at) 
            VALUES (?, ?, ?, ?, ?, ?, NOW(), NOW())";
  return pdo_execute_returnID($sql, $iduser, $total, $fullname, $email, $phone, $address);
}
function remove_order($idorders)
{
  $sql = "DELETE FROM orders WHERE id=?";
  return pdo_execute($sql, $idorders);
}
function insert_order_detail($idproduct, $idorder, $quantity, $price, $total)
{
  $sql = "INSERT INTO orderdetail (productDetail_id, order_id, quantity, price, total, created_at, update_at) 
            VALUES (?, ?, ?, ?, ?, NOW(), NOW())";
  pdo_execute($sql, $idproduct, $idorder, $quantity, $price, $total);
}
function update_qty($qty)
{
  $sql = "UPDATE orders SET quantity";
}
