<?php
ob_start();
session_start();
include_once "model/connect.php";
include_once "model/catagories.php";
include_once "model/products.php";


pdo_get_connection();

include_once 'view/header.php';
if (!isset($_GET['page'])) {
  $idcategories = isset($_GET['id']) ? $_GET['id'] : null;
  $idbanner = isset($_GET['idbanner']) ? $_GET['idbanner'] : null;
  $categories = get_categories_home($idcategories);
  $banner = get_Banner($idbanner);
  $id = "";
  $products = get_product_bycategory($id);
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
      $categories = get_all_danhmuc();
      if (isset($_GET['categories']) && ($_GET['categories'] > 0)) {
        $iddm = $_GET['categories'];
      } else {
        $iddm = 0;
      }
      $dssp = showsp($iddm);
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
    case 'info':
      include "view/info.php";
      break;
    case 'login':
      include_once "model/m_login.php";
      header("Location: ./view/login.php");
      break;
    case 'logout':
      // Hủy tất cả các biến session
      session_unset();
      // Hủy session
      session_destroy();
      // Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính của trang web
      header('Location:index.php');
      break;
    default:

      break;
  }
}

include_once 'view/footer.php';
ob_end_flush();
