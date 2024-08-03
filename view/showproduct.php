<main class="home">
  <section class="place-main">
    <!-- header main -->
    <div class="content">
      <div class="header">
        <div class="logo">

          <a href=""><img src="./asset/img/logo.png" alt=""></a>

        </div>
        <div class="textheader">
          <div class="search-container">
            <input type="text" class="search-input" placeholder="Tìm kiếm...">
            <button class="search-button">
              <i class="fas fa-search"></i>
            </button>
          </div>
          <div class="cart">
            <a href=""><i class="fas fa-cart-plus"></i></a>
          </div>
        </div>
      </div>
    </div>
    <!-- end header main -->
    <!-- start content main -->
    <div class="content">
      <section class="place-showProduct">
        <div class="nav-bar">
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
              <div class="boxProductRate">
                <div class="boxProductRate-left">
                  <img src="./img/hat1.jpg" alt="">
                </div>
                <div class="boxProductRate-right">
                  <span>Name</span>
                  <span>Title</span>
                  <span class="priceRate">Price</span>
                </div>
              </div>
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
                                ' . ($countryrole  ? '<img class="flag-off-tag" src="./asset/img/' . htmlspecialchars($countryname) . '.jpg" alt="">' : '') . '
                                ' . ($saleoff == 1 ? '<span class="sale-off-tag">Sale Off</span>' : '') . '
                                <img src="' . htmlspecialchars($imagePath) . '" alt="">
                                <div class="content-box-product">
                                    <h1><strong>' . htmlspecialchars($product['name']) . '</strong></h1>
                                    <span>' . htmlspecialchars($product['title']) . '</span>
                                    <span>' . htmlspecialchars($product['price']) . ' VND</span>
                                </div>
                                <a href="#" class="buy-now-button">Mua Ngay</a>
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