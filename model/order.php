<?php
function get_order()
{
  $sql = "SELECT * FROM `orders` WHERE 1";
  return pdo_query($sql);
}
function delete_order($ordercode)
{
  $sql = "DELETE FROM orders WHERE id = ?";
  pdo_execute($sql, $ordercode);
}
function delete_order_details($ordercode)
{
  $sql = "DELETE FROM orderdetail WHERE order_id = ?";
  pdo_execute($sql, $ordercode);
}
