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
        <!-- start product hot -->
        <div class="product-show">
          <div class="content">
            <div class="place-product">
              <div class="box-product-master">
                <?php
                if (!empty($dssp)) {
                  foreach ($dssp as $product) {
                    $saleoff = $product['status_sale'];
                    $imagePath = './asset/img/' . $product['image'] . '.jpg';
                    $img = $product['image'];
                    $name = $product['name'];
                    $productid = $product['id'];
                    $price = $product['price'];


                    echo '
                        <div class="box-product-pageProduct" onclick="handleProductClick(' . $product['id'] . ')">
                            ' . ($saleoff == 1 ? '<span class="sale-off-tag">Sale Off</span>' : '') . '
                            <img src="' . $imagePath . '" alt="">
                            <div class="content-box-product">
                                <h1><strong>' . $product['name'] . '</strong></h1>
                                <span>' . $product['title'] . '</span>
                                <span>' . number_format($product['price'])  . ' VND</span>
                            </div>
                          <form method="post" class="button-container" action="index.php?page=addcart">
                            <input type="hidden" name="id" value="' . $productid . '" >
                            <input type="hidden" name="name" value="' .  $name . '" >
                            <input type="hidden" name="image" value="' .  $product['image'] . '" >
                            <input type="hidden" name="price" value="' . $product['price'] . '" >
                            <input type="hidden" name="soluong" value="1" >
                            <button type="submit" class="buy-now-button" name="btncart">Đặt Hàng</button>
                            <button type="submit" name="btncart" class="add-to-cart-button" onclick="event.stopPropagation(); addToCart(' . $productid . ');">Thêm Vào Giỏ Hàng</button>
                          </form>
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

          <!-- end products  -->

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