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
      <!-- banner -->
      <div class="box-banner">
        <img src="./asset/img/banner.png" alt="">
      </div>
      <!-- end banner -->
      <!-- start content main -->
      <div class="content">
        <div class="place-detail">
          <?php
          if ($product) {
            $img = $product['img'];
            $name = $product['name'];
            $productid = $product['id'];
            $price = $product['price'];

            echo '
          <div class="right-detail">
            <div class="place-img-detail">
              <img src="./asset/img/' .  $product['img'] . '.jpg" alt="">
              <div class="des">
                <h2>Mô tả</h2>
                <em>' .  $product['des'] . '</em>
              </div>
            </div>
          </div>
          <div class="left-detail">
            <h1>' .  $product['name'] . '</h1>
            <div class="title-detail">
              <span>' .  $product['title'] . '</span>
            </div>
            <div class="price-detail">
              <span>' . number_format($product['price'])  . ' VND</span>
            </div>
            <div class="addtocart">
    <input type="number" name="soluong" id="quantity" value="1">
    
    <form method="post" class="button-container" action="index.php?page=addcart" onsubmit="return validateQuantity();">
        <input type="hidden" name="id" value="' . $productid . '">
        <input type="hidden" name="name" value="' . $name . '">
        <input type="hidden" name="image" value="' . $product['img'] . '">
        <input type="hidden" name="price" value="' . $product['price'] . '">
        <input type="hidden" id="form-quantity" name="soluong" value="1">
        
        <button type="submit" class="buy-now-button" name="btncart">Đặt Hàng</button>
        <button type="submit" name="btncart" class="add-to-cart-button" onclick="event.stopPropagation();">Thêm Vào Giỏ Hàng</button>
    </form>
</div>
              <h1>Thông tin sản phẩm</h1>
            <div class="infoproduct">
                <div class="content-infoproduct">
                <span>Danh mục: ' . $product['category'] . '</span>
                <span>Mã sản phẩm: ' . $product['product_code'] . '</span>
                <span>Số lượng đã bán: ' . $product['sl_sold'] . ' </span>
                <span></span>
                </div>
            </div>
          </div>
            ';
          }
          ?>
        </div>
        <h1>Sản phẩm liên quan</h1>
        <div class="place-product">
          <div class="box-product-master">
            <?php
            if (!empty($relatedProducts)) {
              foreach ($relatedProducts as $product) {
                $saleoff = $product['status_sale'];
                $imagePath = './asset/img/' . $product['image'] . '.jpg';

                echo '
                          <div class="box-product-pageProduct" onclick="handleProductClick(' . $product['id'] . ')">
                              ' . ($saleoff == 1 ? '<span class="sale-off-tag">Sale Off</span>' : '') . '
                              <img src="' . $imagePath . '" alt="">
                              <div class="content-box-product">
                                  <h1><strong>' . $product['name'] . '</strong></h1>
                                  <span>' . $product['title'] . '</span>
                                  <span>' . number_format($product['price'])  . ' VND</span>
                              </div>
                            <div class="button-container">
                                <a href="index.php?page=cart&products=' . $product['id'] . '" class="buy-now-button" onclick="event.stopPropagation();">Mua Ngay</a>
                                <button class="add-to-cart-button" onclick="event.stopPropagation(); addToCart(' . $product['id'] . ');">Thêm Vào Giỏ Hàng</button>
                            </div>
                          </div>
                      
                      ';
              }
            } else {
              echo '<p>No products found!</p>';
            }
            ?>
          </div>
          <?php
          if (!empty($relatedProducts)) {
            echo '<a class="all" href="?page=showproduct&categories=' . $relatedProducts[0]['idc'] . '">--Xem tất cả--</a>';
          }
          ?>
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
      <script>
        // cập nhật giá trị truyefn vào số lượng
        document.querySelectorAll('.button-container button').forEach(function(button) {
          button.addEventListener('click', function() {
            var quantity = document.getElementById('quantity').value;
            document.getElementById('form-quantity').value = quantity;
          });
        });

        function validateQuantity() {
          var quantity = document.getElementById('quantity').value;
          if (quantity < 1) {
            alert('Số lượng không hợp lệ. Vui lòng nhập số lượng lớn hơn 0.');
            return false;
          }
          return true;
        }
      </script>
    </section>
  </main>