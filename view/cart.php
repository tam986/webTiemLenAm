<?php
if (!empty($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
  $html_showcart = '';
  $i = 0;
  $tong = 0;
  foreach ($_SESSION['cart'] as $item) {
    $id = $item['idproduct'];
    $img = $item['image'];
    $name = $item['nameproduct'];
    $price = $item['price'];
    $quantity = intval($item['soluong']);
    $thanhtien = $item['productTotal'];
    $tong += $thanhtien;

    $html_showcart .= '
        <tr>
          <td><img src="./asset/img/' . $img . '.jpg" alt="Product Image" class="product-image" width="80px"></td>
          <td>' . $name . '</td>
          <td>' . $price . '</td>
          <td><input type="number" name="quantity[' . $i . ']" value="' . $quantity . '" min="1" /></td>
          <td>' . $thanhtien . '</td>
          <td style="text-align:center;"> 
            <a href="index.php?page=cart&ind=' . $i . '" class="delete-button"><i class="fa-solid fa-trash"></i></a>
          </td>
        </tr>
      ';
    $i++;
  }

  $order_info = '
  <div class="order-item">
    <div class="left-order">
      <span>Name</span>
      <span>Số Lượng</span>
      <span>Giá</span>
    </div>
    <div class="right-order">
      <span>' . $name . '</span>
      <span id="order-quantity-' . $i . '">' . $quantity . '</span> <!-- Thêm ID vào đây -->
      <span>' . $thanhtien . '</span>
    </div>
  </div>
  <div class="checkout">
    <div class="total">
      <span>Thành tiền</span>
      <span id="order-total">' . $tong . '</span>
    </div>
    <a href="index.php?page=checkout">
    <button class="checkout-button">Thanh Toán</button>
    </a>
  </div>
';
} else {
  $html_showcart = '<tr><td colspan="6" class="empty-cart-message">Bạn chưa có sản phẩm trong giỏ hàng</td></tr>';
  $order_info = '';
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

    <div class="content">
      <div class="container">
        <div class="cart-section">
          <div class="heading">
            <h1>Giỏ hàng</h1>
          </div>
          <div class="cart-detail">
            <table class="cart-table">
              <thead>
                <tr>
                  <th>Hình Ảnh</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Giá</th>
                  <th>Số Lượng</th>
                  <th>Thành tiền</th>
                  <th>Thao Tác</th>
                </tr>
              </thead>
              <tbody>
                <?= $html_showcart ?>
              </tbody>
            </table>
            <?php if (!empty($_SESSION['cart'])) : ?>
              <a href="index.php?page=cart&delall=1" class="deleteall">Xóa Tất Cả</a>
            <?php endif; ?>
            <a href="index.php?page=showproduct" class="btn-muahang">Tiếp Tục Mua hàng</a>
          </div>
        </div>
        <?php if (!empty($_SESSION['cart'])) : ?>
          <div class="order-section">
            <div class="heading">
              <h1>Đơn Hàng</h1>
            </div>
            <div class="order-info">
              <?= $order_info ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <!-- end content main -->

    <!-- start footer main -->
    <div class="footer--main">
      <div class="content">
        <!-- footer content remains unchanged -->
      </div>
    </div>
    <!-- end footer main -->
    <script>
      // Lắng nghe sự kiện thay đổi trên tất cả các input số lượng
      document.querySelectorAll('input[name^="quantity"]').forEach(function(input) {
        input.addEventListener('change', function() {
          var quantity = input.value;
          var formQuantityInput = input; // Giả sử bạn muốn cập nhật cùng input hoặc có thể dùng form khác để cập nhật
          formQuantityInput.value = quantity;
        });
      });

      // Hàm kiểm tra số lượng trước khi submit form
      function validateQuantity() {
        var isValid = true;
        document.querySelectorAll('input[name^="quantity"]').forEach(function(input) {
          var quantity = input.value;
          if (quantity < 1) {
            alert('Số lượng không hợp lệ. Vui lòng nhập số lượng lớn hơn 0.');
            isValid = false;
          }
        });
        return isValid;
      }
    </script>

  </section>
</main>