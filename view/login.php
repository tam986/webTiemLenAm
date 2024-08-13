<main class="home">
  <section class="place-main">
    <!-- header main -->
    <div class="content">
      <div class="header">
        <div class="logo">
          <a href=""><img src="./asset/img/logo.png" alt=""></a>
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
    <!-- banner -->
    <div class="box-banner">
      <img src="./asset/img/banner.png" alt="">
    </div>
    <!-- end banner -->
    <!-- start content main -->
    <div class="content">
      <div class="dangnhap" style="display: flex;justify-content:center;alight-items:center;">
        <form class="form-login" method="POST" action="index.php?page=login" style="width: 300px;display: flex;justify-content: center;align-items:center;
    flex-direction: column;
    background-color:#93BEBF;
    padding: 15px;
    border-radius:12px;
    gap:10px;">
          <label for="">Đăng nhập</label>
          <input type="text" name="uname" placeholder="tài khoản" style="padding: 10px;border-radius:6px;outline:none;border:none;width:calc(100% - 125px);">
          <input type="password" name="pw" placeholder="mật khẩu" style="width:calc(100% - 125px);padding: 10px;border-radius:6px;outline:none;border:none;">
          <!-- Use a submit button instead of a link for form submission -->
          <button type="submit" name="dangnhap" class="btnn" style="width:160px;high:50px;padding:5px;border-radius:4px;outline:none;border:none;">Login</button>
          <p class="link">Don't have an account?<br>
            <a href="index.php?page=register" style="color:#fffffe">Đăng ký</a> here
          </p>
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
  </section>
</main>