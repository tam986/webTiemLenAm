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
            <a href=""><i class="fas fa-cart-plus"></i></a>
          </div>
          <div class="user">
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
          </div>
        </div>
      </div>
    </div>
    <!-- end header main -->

    <!-- start content main -->
    <div class="content">
      <div class="place-detail">
        <div class="right-detail">
          <img src="./asset/img/yarn1.jpg" alt="">
          <div class="des">
            <h2>Product Description</h2>
            <p></p>
          </div>
        </div>
        <div class="left-detail">
          <h1>Name</h1>
          <p>title</p>
          <span>price</span>
          <input type="number" name="" id="">
          <a href="">add to cart</a>

        </div>
      </div>
    </div>

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