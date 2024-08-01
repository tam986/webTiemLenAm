<?php
// hàm lấy tất cả danh mục với cột parent id là null
function get_all_categories()
{
  $sql = "SELECT * FROM categories WHERE parent_id IS NULL";
  return pdo_query($sql);
}
// Hàm lấy các danh mục con theo parent_id
function get_categoriesID($parent_id)
{
  $sql = "SELECT * FROM categories WHERE parent_id = 2";
  return pdo_query($sql, $parent_id);
}
function get_categories_name($idcategories)
{
  $sql = "SELECT * FROM categories where id=?";
  return pdo_query($sql, $idcategories);
}
