<?php


function get_categories_home($idcategories)
{

  $sql = "SELECT * FROM categories where id =?";


  return pdo_query($sql, $idcategories);


  // if (!empty($result)) {

  //   return $result[0];
  // } else {

  //   return [];
  // }
}
