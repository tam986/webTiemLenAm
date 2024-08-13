<?php
if (!empty($_SESSION['cart']) && (count($_SESSION['cart']) > 0)) {
  $html_checkout = '';
  $i = 0;
  $tong = 0;
  foreach ($_SESSION['cart'] as $item) {
    $id = $item['idproduct'];
    $img = $item['image'];
    $name = $item['nameproduct'];
    $price = $item['price'];
    $quantity = $item['soluong'];
    $thanhtien = $item['productTotal'];
    $tong += $thanhtien;

    $html_checkout .=
      '
          <div class="order-item">
            <img src="./asset/img/' . $img . '.jpg" alt="Product Image">
            <span>' . $name . '</span>
            <span>' . $quantity . '</span>
            <span>' . number_format($price, 0, ',', '.')  . '</span>
          </div>
    
    ';
  }
  $total = '<div class="total">
  <span>Tổng cộng</span>
  <span>' .  number_format($tong, 0, ',', '.') . ' VND</span>
    </div>';
}
?>

<main class="home">
  <section class="place-main">
    <!-- header main -->
    <div class="content">
      <div class="header">
        <div class="logo">
          <a href="index.php"><img src="./asset/img/logo.png" alt=""></a>
        </div>
        <nav>
          <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php?page=showproduct">Sản phẩm</a></li>
            <li><a href="index.php?page=blog">Blog</a></li>
          </ul>
        </nav>
        <div class="textheader">
          <div class="search-container">
            <form action="index.php?page=showproduct" method="post">
              <input type="text" name="kyw" class="search-input" placeholder="Tìm kiếm...">
              <input class="timkiem" type="submit" name="timkiem" value="Tìm kiếm">
            </form>
          </div>
          <div class="cart">
            <a href="index.php?page=cart"><i class="fas fa-cart-plus"></i></a>
          </div>
          <div class="user">
            <div class="info">
              <ul>
                <?php
                // var_dump($_SESSION['user']);
                if (isset($_SESSION['user'])) {
                  $user_id = $_SESSION['user']['id'];
                  $img_ext = pathinfo($_SESSION['user']['image'], PATHINFO_EXTENSION) !== 'jpg' ? 'png' : 'jpg'; //
                  echo "<li><a class='imguser' href='index.php?page=info&id=$user_id'><img src='./asset/img/{$_SESSION['user']['image']}.$img_ext' alt=''></a></li>";
                  echo "<li><a class='nameuser' href='index.php?page=info&id=$user_id'>" . $_SESSION['user']['uname'] . "</a></li>";
                  echo "<li><a class='iconlogout' href='index.php?page=logout'>logout</a></li>";
                } else {
                  echo "
                <div class='login-logout'>
                    <ul>
                        <li><a href='index.php?page=login'>Login</a></li>
                        <li>/</li>
                        <li><a href='index.php?page=register'>Register</a></li>
                    </ul>
                </div>
                ";
                }
                ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end header main -->
    <!-- banner -->
    <div class="box-banner">
      <img src="./asset/img/banner.png" alt="">
    </div>
    <!-- end banner -->
    <!-- start content main -->
    <div class="content">
      <div class="place-checkout">
        <div class="left-checkout">
          <div class="logo">
            <h1>Tiệm Len Ấm</h1>
          </div>
          <h2>Thông tin nhận hàng</h2>
          <form class="infouser" method="POST" action="index.php?page=checkout">
            <div class="form-checkout">
              <label for="nameuser">Tên đăng nhập</label>
              <input type="text" name="fullname" id="nameuser" value="<?php echo $_SESSION['user']['uname'] ?>">
              <label for="nameuser">Họ và tên</label>
              <input type="text" name="username" id="nameuser">

              <label for="address">Địa chỉ người nhận</label>
              <input type="text" name="address" id="address">

              <label for="phone">Số điện thoại</label>
              <input type="text" name="phone" id="phone">

              <label for="email">Email</label>
              <input type="text" name="email" id="email">
            </div>
            <div class="right-checkout">
              <h1>Đơn Hàng</h1>
              <?= $html_checkout ?>
              <?= $total ?>
              <button class="checkout-button" name="btn_order">Hoàn Tất Thanh Toán</button>
            </div>
          </form>
        </div>

      </div>
    </div>
    <!-- end content main -->


    <!-- end content main -->

    <!-- start footer main -->
    <div class="footer--main">
      <div class="content">
        <div class="loiich">
          <div class="loiich1">
            <a href="">
              <i class="fas fa-shipping-fast"></i>
              <span>Giao Hàng và Đổi trả</span>
            </a>

          </div>
          <div class="loiich2">
            <a href="">
              <i class="fas fa-comments"></i>
              <span>Liên Lạc với chúng tôi</span>
            </a>

          </div>
          <div class="loiich3">
            <a href="">
              <i class="fas fa-map-marker"></i>
              <span>Địa chỉ cửa hàng</span>
            </a>

          </div>
          <div class="loiich4">
            <a href="">
              <i class="fas fa-gift"></i>
              <span>Voucher</span>
            </a>

          </div>
        </div>
      </div>
    </div>

  </section>
</main>