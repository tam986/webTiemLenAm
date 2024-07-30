<?php
ob_start();
session_start();
include_once "model/connect.php";
include_once "controller/catagories.php";
include_once "controller/product.php";


pdo_get_connection();

include_once 'view/header.php';
if (!isset($_GET['page'])) {

  include "view/home.php";
} else {
  switch ($_GET['page']) {
    case 'home':
      include "view/home.php";
      break;
    case 'detail':
      include "view/detail.php";
      break;

    case 'showproduct':

      include "view/showproduct.php";
      break;

    case 'showdetail':
      break;
    case 'blog':

      break;
    case 'showcart':
      break;
    case 'showcartDetail':
      break;
    default:

      break;
  }
}

include_once 'view/footer.php';
ob_end_flush();
