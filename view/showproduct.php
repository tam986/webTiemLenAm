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
              <h1>Danh mục</h1>
              <nav>
                <ul>
                  <li>
                    <h2><a href="">Cuộn len</a></h2>
                  </li>
                  <li class="id2">
                    <h2>
                      <a href="">
                        Trang phục và phụ kiện được làm từ len
                      </a>
                    </h2>
                    <ul id="subnav">
                      <li><a href="index.php?page=product&categories=unisex"><i class="fa-solid fa-caret-right"></i> Unisex</a></li>
                      <li><a href="index.php?page=product&categories=non"><i class="fa-solid fa-caret-right"></i> Nón</a></li>
                      <li><a href="index.php?page=product&categories=aonam"><i class="fa-solid fa-caret-right"></i> Áo Nam</a></li>
                      <li><a href="index.php?page=product&categories=aonu"><i class="fa-solid fa-caret-right"></i> Áo Nữ</a></li>
                      <li><a href="index.php?page=product&categories=aochoang"><i class="fa-solid fa-caret-right"></i> Áo Choàng</a></li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
            <!-- end categories product -->
          </div>
          <div class="price">
            <label for="priceRange">Giá sản phẩm:</label>
            <input type="range" id="priceRange" min="0" max="1000" value="0" step="50" oninput="updatePriceDisplay(value)">
            <span id="priceDisplay">0 VND</span>
          </div>
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
              <div class="heading-place-product">
                <div class="heading">
                  <h1><a href="">Trang Phục và phụ kiện</a></h1>
                </div>
              </div>
              <div class="box-product-master">
                <div class="box-product-pageProduct">
                  <span class="sale-off-tag">Sale Off</span>
                  <img class="flag-off-tag" src="./img/canada.jpg" alt="">
                  <img src="./img/hat1.jpg" alt="">
                  <div class="content-box-product">
                    <h1><strong>Name</strong></h1>
                    <span>Nón</span>
                    <span>300.000 VND</span>
                  </div>
                  <a class="buy-now-button">Mua Ngay</a>
                </div>
              </div>
            </div>
          </div>
          <!-- end cloth  -->
          <!-- len -->
          <div class="content">
            <div class="place-product">
              <div class="heading-place-product">
                <div class="heading">
                  <h1><a href="">Len</a></h1>
                </div>

              </div>
              <div class="box-product-master">
                <div class="box-product-pageProduct">
                  <span class="sale-off-tag">Sale Off</span>
                  <img class="flag-off-tag" src="./img/us.jpg" alt="">
                  <img src="./img/pattern1.jpg" alt="">
                  <div class="content-box-product">
                    <h1><strong>Name</strong></h1>
                    <h2>Len 2</h2>
                    <h3>300.000 VND</h3>
                  </div>
                  <button class="buy-now-button">Mua Ngay</button>
                </div>
                <div class="box-product-pageProduct">
                  <span class="sale-off-tag">Sale Off</span>
                  <img class="flag-off-tag" src="./img/us.jpg" alt="">
                  <img src="./img/pattern1.jpg" alt="">
                  <div class="content-box-product">
                    <h1><strong>Name</strong></h1>
                    <h2>Len 2</h2>
                    <h3>300.000 VND</h3>
                  </div>
                  <button class="buy-now-button">Mua Ngay</button>
                </div>
                <div class="box-product-pageProduct">
                  <span class="sale-off-tag">Sale Off</span>
                  <img class="flag-off-tag" src="./img/us.jpg" alt="">
                  <img src="./img/pattern1.jpg" alt="">
                  <div class="content-box-product">
                    <h1><strong>Name</strong></h1>
                    <h2>Len 2</h2>
                    <h3>300.000 VND</h3>
                  </div>
                  <button class="buy-now-button">Mua Ngay</button>
                </div>
              </div>
            </div>
          </div>
          <!-- end len -->
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