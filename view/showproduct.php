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
      <section class="place-showProduct">
        <div class="nav-bar">
          <div class="search">
            <form action="index.php?page=showproduct&categories=" method="post">
              <input type="text" name="kyw">
              <input type="submit" name="timmkiem" class="timkiem" value="Tìm kiếm">
            </form>
          </div>
          <!-- start categories product -->
          <div class="categories">
            <div class="placeCategory">
              <h1><a href="?page=showproduct&categories=">Tất cả</a></h1>
              <nav>
                <ul>
                  <?php
                  if ($categories) {
                    foreach ($categories as $dm) {
                      echo '  <li class="categories-list" >
                          <h2><a href="?page=showproduct&categories=' . $dm['id'] . '">' . $dm['nameCategories']  . '</a></h2>
                        </li>
                        ';
                    }
                  }
                  ?>

                </ul>
              </nav>
            </div>
            <!-- end categories product -->
          </div>
          <!-- <div class="price">
            <div class="placerange">
              <p>
                <label for="amount">Lọc theo giá: </label>
                <input type="text" id="amount" readonly="" style="border:0; color:#f6931f; font-weight:bold;">
              </p>
              <div id="slider-range"></div>
            </div>

            <label for="priceRange">Giá sản phẩm:</label>
            <input type="range" id="priceRange" min="0" max="1000" value="0" step="50" oninput="updatePriceDisplay(value)">
            <span id="priceDisplay">0 VND</span>
          </div> -->
          <div class="rank">
            <h1>Top rate product</h1>
            <div class="productRate">

              <?php
              if ($ranksp) {
                foreach ($ranksp as $item) {
                  echo
                  '
                    <div class="boxProductRate">
                          <div class="boxProductRate-left">
                           <a href="index.php?page=showdetail&product=' . $item['id'] . '"> <img src="./asset/img/' . $item['img'] . '.jpg" alt=""></a>
                          </div>
                          <div class="boxProductRate-right">
                            <span>' . $item['name'] . '</span>
                            <span>' . $item['title'] . '</span>
                            <span class="priceRate">' . number_format($item['price']) . '</span>
                          </div>
                    </div>
                  ';
                }
              }


              ?>

            </div>
          </div>
        </div>
        <!-- end categories -->
        <!-- start place pattern hot -->
        <div class="product-show">
          <!-- product cloth -->
          <div class="content">
            <div class="place-product">
              <div class="box-product-master">
                <?php
                if (!empty($dssp)) {
                  foreach ($dssp as $product) {
                    $saleoff = $product['status_sale'];
                    $countryname = $product['country_name'];
                    $countryrole = $product['country_id'];
                    $imagePath = './asset/img/' . $product['image'] . '.jpg';

                    echo '
                            <div class="box-product-pageProduct">
                                
                                ' . ($saleoff == 1 ? '<span class="sale-off-tag">Sale Off</span>' : '') . '
                                <img src="' . $imagePath . '" alt="">
                                <div class="content-box-product">
                                    <h1><strong>' . $product['name'] . '</strong></h1>
                                    <span>' . $product['title'] . '</span>
                                    <span>' . number_format($product['price'])  . ' VND</span>
                                </div>
                                <a href="?page=showdetail&product=' . $product['id'] . '" class="product-link">  
                          <div class="overlay">
                              <div class="button-container">
                                  <span class="buy-now-button">Mua Ngay</span>
                                  <span class="add-to-cart-button">Thêm Vào Giỏ Hàng</span>
                              </div>
                          </div>
                        </a>
                            </div>
                         
                    ';
                  }
                } else {
                  echo '<p>No products found!</p>';
                }
                ?>

              </div>
            </div>
          </div>
          <!-- end cloth  -->

        </div>
      </section>
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