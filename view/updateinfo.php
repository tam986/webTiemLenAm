<?php
if (!$_SESSION['user']['id']) {
  header("Location: index.php?page=login");
  exit();
}
$user_id = $_SESSION['user']['id'];
$showinfo = user_one($user_id);
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
    <div class="content">
      <div class="place-updateinfo">
        <h1>Cập nhật thông tin</h1>
        <form method="post" action="index.php?page=updateinfo" class="updateinfo" onsubmit="return confirmUpdate()">
          <img src="./asset/img/<?php echo $showinfo['image']; ?>.png" alt="">

          <label for="name">Name:</label>
          <label type="text" name="name"><?php echo $showinfo['uname']; ?></label>

          <label for="email">Email:</label>
          <input type="email" name="email" value="<?php echo $showinfo['email']; ?>" required>

          <label for="address">Address:</label>
          <input type="text" name="address" value="<?php echo $showinfo['address']; ?>" required>

          <label for="phone">Phone:</label>
          <input type="text" name="phone" value="<?php echo $showinfo['phone']; ?>" required>

          <label for="image">Image:</label>
          <input type="file" name="image" value="<?php echo $showinfo['image']; ?>" required>

          <button type="submit" name="update_info">Cập nhật thông tin</button>
        </form>
      </div>

    </div>
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
    <script>
      function confirmUpdate(event) {
        event.preventDefault();
        var userConfirmed = confirm("Bạn có chắc chắn muốn lưu thay đổi không?");
        if (userConfirmed) {
          document.getElementById("updateForm").submit();
        }
      }
    </script>
  </section>
</main>