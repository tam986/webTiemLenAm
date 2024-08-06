<?php
ob_start();
session_start();
include_once "model/connect.php";
include_once "model/categories.php";
include_once "model/products.php";
include_once "model/users.php";

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
      if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login");
        exit();
      }
      $user_id = isset($_GET['id']) ? intval($_GET['id']) : $_SESSION['user_id'];
      $showinfo = user_one($user_id);
      // if (isset($_SESSION['user_id'])) {
      //   $user_id = $_SESSION['user_id'];
      //   $user_info = user_one($user_id);
      // }
      include "view/home.php";
      break;
    case 'detail':
      include "view/detail.php";
      break;
    case 'showproduct':
      if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
        $kyw = $_POST['kyw'];
      } else {
        $kyw = "";
      }
      if (isset($_GET['categories']) && ($_GET['categories'] > 0)) {
        $iddm = $_GET['categories'];
      } else {
        $iddm = 0;
      }
      $dssp = showsp($iddm, $kyw);
      $categories = get_all_danhmuc();
      $ranksp = product_featured();
      include "view/showproduct.php";
      break;
    case 'showdetail':
      if (isset($_GET['product']) && ($_GET['product'] > 0)) {
        $idsp = intval($_GET['product']);
        $product = get_product_detail($idsp);
        include "view/showdetail.php";
      } else {
        $idsp = 0;
        header("location: index.php");
      }
      break;
    case 'blog':
      include "view/blog.php";
      break;
    case 'showcart':
      break;
    case 'showcartDetail':
      break;
      // info
    case 'info':
      if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login");
        exit();
      }
      $user_id = isset($_GET['id']) ? intval($_GET['id']) : $_SESSION['user_id'];
      $showinfo = user_one($user_id);
      include "view/info.php";
      break;
      //update information 
    case 'updateinfo':
      if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?page=login");
        exit();
      }
      $user_id = $_SESSION['user_id'];
      $showinfo = user_one($user_id);
      include "view/updateinfo.php";
      break;
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
      // Default case or show an error
      echo "Page not found.";
      break;
  }
}

include_once 'view/footer.php';
ob_end_flush();
