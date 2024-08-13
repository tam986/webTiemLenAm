<?php
session_start();
ob_start();
if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}
include_once "model/connect.php";
include_once "model/categories.php";
include_once "model/products.php";
include_once "model/users.php";
include_once "model/carts.php";
include_once "model/order.php";
include_once "model/blogs.php";

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

      include "view/home.php";
      break;
    case 'showproduct':
      include_once 'view/header.php';
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
      include_once 'view/footer.php';
      break;
    case 'showdetail':
      include_once 'view/header.php';
      if (isset($_POST['soluong']) && ($_POST['soluong'] != [])) {
        $cart = $_POST['soluong'];
      } else {
        $cart = [];
      }
      if (isset($_GET['product']) && ($_GET['product'] > 0)) {
        $idsp = intval($_GET['product']);
        $product = get_product_detail($idsp);
        if ($product) {
          $relatedProducts = get_related_products($idsp);
          include "view/showdetail.php";
        } else {
          echo "<p>Product not found.</p>";
        }
      } else {
        header("location: index.php");
      }
      include_once 'view/footer.php';
      break;
    case 'blog':
      $blogs = getBlogs();
      include "view/blog.php";
      break;
    case 'cart':
      if (isset($_GET['ind']) && ($_GET['ind'] >= 0)) {
        array_splice($_SESSION['cart'], $_GET['ind'], 1);
        header('Location: index.php?page=cart');
      }
      if (isset($_GET['delall']) && ($_GET['delall'] == 1)) {
        $_SESSION['cart'] = "";
        header('Location: index.php?page=cart');
      }
      include "view/cart.php";
      break;
    case 'addcart':
      if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btncart'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $img = $_POST['image'];
        $price = $_POST['price'];
        $quantity = intval($_POST['soluong']); // Chuyển số lượng về dạng số nguyên
        $thanhtien = $price * $quantity;
        $checksl = false;

        // Tìm sản phẩm để cập nhật số lượng
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
          foreach ($_SESSION['cart'] as $i => $spp) {
            if ($spp['idproduct'] == $id) {
              // Cập nhật số lượng trong giỏ hàng
              $_SESSION['cart'][$i]['soluong'] += $quantity;
              $_SESSION['cart'][$i]['productTotal'] = $_SESSION['cart'][$i]['soluong'] * $price;
              $checksl = true;
              break;
            }
          }
        }

        // Nếu sản phẩm không có trong giỏ hàng, thêm mới
        if (!$checksl) {
          $spp = [
            'idproduct' => $id,
            'nameproduct' => $name,
            'image' => $img,
            'price' => $price,
            'soluong' => $quantity,
            'productTotal' => $thanhtien
          ];
          $_SESSION['cart'][] = $spp;
        }

        header('Location: index.php?page=cart');
      }

      break;
    case 'checkout':
      $idorder = 0;
      if (isset($_POST['btn_order'])) {
        // lấy dữ  liệu cần thiêt cho đơn hàng
        $fullname = $_POST['fullname'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $pass = rand(100000, 999999);
        $image = "";
        // đăng ký tài khoản ==> get last id
        if (!isset($_SESSION['user'])) {
          $iduser = insert_user_returnID($fullname, $email, $pass, $phone, $address, $image, $username);
        } else {
          $iduser = $_SESSION['user']['id'];
        }
        // tạo đơn hàng với id user
        // $iduser/ form/ tổng tiền giỏ hàng/
        $total = get_total();
        //lấy dữ lieju cẩn thiết
        $idorder = insert_order_returnID($iduser, $total, $fullname, $email,  $phone, $address);
        foreach ($_SESSION['cart'] as $item) {
          $idproduct = $item['idproduct'];
          $quantity = $item['soluongproduct'];
          $price = $item['price'];
          $productTotal = $item['productTotal'];

          insert_order_detail($idproduct, $idorder, $quantity, $price, $productTotal);
        }

        // Xóa giỏ hàng sau khi hoàn tất đặt hàng
        $_SESSION['cart'] = [];
        // Chuyển hướng đến trang xác nhận đơn hàng hoặc trang chủ
        header('Location: index.php');
        exit();
      }
      include_once 'view/header.php';
      include "view/checkout.php";
      include_once 'view/footer.php';
      break;
      // info
    case 'info':
      if (!isset($_SESSION['user']['id'])) {
        header("Location: index.php?page=login");
        exit();
      }
      $user_id = isset($_GET['id']) ? intval($_GET['id']) : $_SESSION['user']['id'];
      $showinfo = user_one($user_id);
      $showorder = get_order();
      if (isset($_GET['ordercode']) && isset($_GET['ordercode']) > 0) {
        $ordercode = $_GET['ordercode'];
        delete_order_details($ordercode);
        delete_order($ordercode);
        header("Location: index.php?page=info&section=user_orders");
        // exit();
      }

      include "view/info.php";
      break;
      //update information 
    case 'updateinfo':
      if (isset($_POST['update_info'])) {
        if (!isset($_SESSION['user']['id'])) {
          header("Location: index.php?page=login");
          exit();
        } else {
          $user_id = $_SESSION['user']['id'];
          $showinfo = user_one($user_id);
          include "view/updateinfo.php";
        }
      }

      break;
    case 'login':
      include_once 'view/header.php';
      if (isset($_POST['dangnhap'])) {
        if (isset($_POST['uname']) && isset($_POST['pw'])) {
          $username = $_POST['uname'];
          $password = $_POST['pw'];
          $result = login_role($username, $password);
          if (!empty($result)) {
            $_SESSION['user'] = $result[0];
            if ($_SESSION['user']['role'] == 1) {
              header('Location: ./admin_layout/admin.php');
              exit();
            } else {
              header('Location: index.php');
              exit();
            }
          } else {
            $error = "Invalid username or password";
          }
        }
      }

      include "view/login.php";
      include_once 'view/footer.php';
      break;
    case 'register':
      if (isset($_POST['btn_dangky'])) {
        $name = $_POST['taikhoan'];
        $uname = $_POST['usrname'];
        $pw = $_POST['pwr'];
        $cpw = $_POST['cpw'];
        $email = "";
        $phone = "";
        $address = "";
        $image = "";
        if ($pw !== $cpw) {
          $error = "Passwords do not match.";
        } else {
          try {
            $checkuser = user_one($id);
            if ($checkuser) {
            }
            $insert = user_register($name, $email, $pw, $phone, $address, $image, $uname);
            if ($insert) {
              header("Location: ./view/login.php");
              exit();
            } else {
              $error = "Registration failed. Please try again.";
            }
          } catch (Exception $e) {
            $error = "Registration error: " . $e->getMessage();
          }
        }
      }

      include "view/register.php";
      break;



    case 'logout':
      // Hủy tất cả các biến session
      session_unset();
      // Hủy session
      session_destroy();
      // Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính của trang web
      header('Location: index.php');
      break;
    default:
      // Default case or show an error
      echo "Page not found.";
      break;
  }
}

include_once 'view/footer.php';
ob_end_flush();
