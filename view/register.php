<script>
  function validateForm() {
    var username = document.getElementsByName("taikhoan")[0].value;
    var name = document.getElementsByName("usrname")[0].value;
    var password = document.getElementsByName("pwr")[0].value;
    var confirmPassword = document.getElementsByName("cpw")[0].value;

    var valid = true;

    // Clear previous error messages
    document.getElementById("username-error").innerText = "";
    document.getElementById("name-error").innerText = "";
    document.getElementById("password-error").innerText = "";
    document.getElementById("confirm-password-error").innerText = "";

    if (username.trim() === "") {
      document.getElementById("username-error").innerText = "Tên người dùng không được để trống.";
      valid = false;
    }

    if (name.trim() === "") {
      document.getElementById("name-error").innerText = "Tài khoản không được để trống.";
      valid = false;
    }

    if (password === "") {
      document.getElementById("password-error").innerText = "Mật khẩu không được để trống.";
      valid = false;
    }

    if (password !== confirmPassword) {
      document.getElementById("confirm-password-error").innerText = "Mật khẩu và xác nhận mật khẩu không khớp.";
      valid = false;
    }

    return valid;
  }
</script>


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
          <!-- <div class="user">
            <div class="info">
              <ul>
                <?php
                if (isset($_SESSION['name'])) {
                  if (pathinfo($_SESSION['img'], PATHINFO_EXTENSION) !== 'jpg') {
                    echo "<li ><a  class='imguser' href='index.php?page=info'><img src='./asset/img/" . $_SESSION['img'] . ".png' alt='' '></a></li>";
                  } else {
                    echo "<li ><a class='imguser' href='index.php?page=info'><img src='./asset/img/" . $_SESSION['img'] . ".jpg' alt='' '></a></li>";
                  }
                  echo "<li><a class='nameuser' href='index.php?page=info'>" . $_SESSION['name'] ?? "" . "</liclass=>";
                  echo "<li><a class='iconlogout' href='index.php?page=logout'>Logout</a></li>";
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
          </div> -->
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
      <div class="dangky">

        <form method="POST" action="index.php?page=login" onsubmit="return validateForm()">
          <label for="" class="head-dangky">Đăng ký</label>
          <label for="taikhoan">Tên</label>
          <input type="text" name="taikhoan" placeholder="Ten">
          <span id="username-error" class="error-message"></span>

          <label for="usrname">Tài khoản</label>
          <input type="text" name="usrname" placeholder="tai khoan">
          <span id="name-error" class="error-message"></span>

          <label for="pwr">Mật khẩu</label>
          <input type="password" name="pwr" placeholder="Mật khẩu">
          <span id="password-error" class="error-message"></span>

          <label for="cpw">Xác nhận mật khẩu</label>
          <input type="password" name="cpw" placeholder="Nhập lại mật khẩu" style="color:black;">
          <span id="confirm-password-error" class="error-message"></span>

          <button type="submit" name="btn_dangky" class="btnndangky">Đăng ký</button>
          <p class="link">You have an account<br>
            <a href="index.php?page=login" style="color:#fffffe">Đăng nhập</a> here
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