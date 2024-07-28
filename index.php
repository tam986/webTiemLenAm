<?php
ob_start();
session_start();
// include_once "model/connect.php";
// include_once "controller/catagories.php";
// include_once "controller/product.php";


// pdo_get_connection();

include_once 'view/header.php';
if (!isset($_GET['page'])) {
  // $category = get_categoriesID($id);
  // $subcategory = get_subcategories($subid);
  // $products = get_product();
  include "view/home.php";
} else {
  switch ($_GET['page']) {
    case 'home':
      include "view/home.php";
      break;
      // case 'automoto':
      //   include "view/automoto.php";
      //   break;
    case 'detail':
      include "view/detail.php";
      break;

    case 'tinhcam':

      break;

    case 'kinhdi':

      break;
    case 'hanhdong':

      break;

    default:
      include "view/404.php";
      break;
  }
}

include_once 'view/footer.php';
ob_end_flush();
