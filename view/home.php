<!-- main -->
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
    <!-- banner -->
    <div class="content">
      <div class="box-banner">
        <a href=""><img src="./asset/img/banner.png" alt=""></a>


        <div class="box-text-banner">
          <h1>Hi!</h1>
          <h1>Tiệm Len Ấm Xin Chào</h1>
          <a href="?page=showproduct">Mời bạn trải nghiệm tại đây </a>
        </div>


      </div>

    </div>
    <!-- end banner -->
    <!-- danh mục tổng -->
    <div class="content">
      <div class="place-main-home1">
        <div class="yarn">
          <div class="banner-yarn">
            <a href="">
              <?php

              $idbanner = 74;
              $banner = get_Banner($idbanner);
              foreach ($banner as $item) {
                echo '
                                <div class="image-banner">
                                    <img src="./asset/img/' . $item['image_banner'] . '.png" alt="">
                                </div>
                                
                                ';
              }
              ?>


            </a>

            <div class="text-banner-yarn">
              <?php
              $idcategories = 1;
              $categories = get_categories_home($idcategories);
              if ($categories) {
                $categoryname = $categories[0]['nameCategories'];
                echo
                '<h2><a href="?page=showproduct&categories=' . $idcategories . '">' . $categoryname . '</a></h2>
                    
                    ';
              }


              ?>

              <span>Đa dạng trang phục phụ kiện được làm từ Len đang chờ bạn khám phá.</span>
            </div>
          </div>
        </div>


        <div class="pattern">
          <div class="banner-pattern">

            <a href="">
              <?php

              $idbanner = 75;
              $banner = get_Banner($idbanner);
              foreach ($banner as $item) {
                echo '
                  <div class="image-banner">
                      <img src="./asset/img/' . $item['image_banner'] . '.png" alt="">
                  </div>
                  
                  ';
              }
              ?>
            </a>

            <div class="text-banner-yarn">
              <?php
              $idcategories = 6;
              $category = get_categories_home($idcategories);
              if (!empty($category)) {
                $categoryName = $category[0]['nameCategories'];

                echo '<h2><a href="?page=showproduct&categories=' . $idcategories . '">' . $categoryName . '</a></h2>';
              } else {
                echo '<p>No category found with this ID.</p>';
              }
              ?>
              <span>Đa dạng cuộn len và các dụng cụ đang chờ bạn khám phá.</span>
            </div>
          </div>
        </div>


      </div>
    </div>
    <!-- end danh mục tổng -->
    <!-- start banner 3 -->
    <div class="content">
      <div class="box-banner2">
        <a href=""><img src="./asset/img/banner4.png" alt=""></a>

        <div class="box-text-banner">
          <h1>Voucher đầy kho</h1>
          <a href="">Trải nghiệm ngay nào </a>
        </div>

      </div>
    </div>
    <!-- end banner 3 -->
    <!-- catagories -->
    <div class="content">
      <div class="place-danhmuc">
        <div class="h3-danhmuc">
          <h3>DANH MỤC SẢN PHẨM</h3>
        </div>
        <div class="box-danhmuc">
          <div class="box-danhmuc1">
            <?php
            $idbanner = 75;
            $banner = get_Banner($idbanner);
            foreach ($banner as $item) {
              echo '
       <img src="./asset/img/' . $item['image_banner'] . '.png" alt="">
       
       ';
            }

            $idcategories = 6;
            $categories = get_categories_home($idcategories);
            if ($categories) {
              $categoryname = $categories[0]['nameCategories'];
              echo
              '<a href="?page=showproduct&categories=' . $idcategories . '">
                <h1>' . $categoryname . '</h1>
              </a>
                     
                     ';
            }

            ?>


          </div>
          <div class="box-danhmuc1">
            <?php
            $idbanner = 76;
            $banner = get_Banner($idbanner);
            foreach ($banner as $item) {
              echo '
       <img src="./asset/img/' . $item['image_banner'] . '.png" alt="">
       
       ';
            }

            $idcategories = 1;
            $categories = get_categories_home($idcategories);
            if ($categories) {
              $categoryname = $categories[0]['nameCategories'];
              echo
              '<a href="?page=showproduct&categories=' . $idcategories . '">
                <h1>' . $categoryname . '</h1>
              </a>
                     
                     ';
            }

            ?>

          </div>
          <div class="box-danhmuc1">
            <?php
            $idbanner = 74;
            $banner = get_Banner($idbanner);
            foreach ($banner as $item) {
              echo '
       <img src="./asset/img/' . $item['image_banner'] . '.png" alt="">
       
       ';
            }

            $idcategories = 5;
            $categories = get_categories_home($idcategories);
            if ($categories) {
              $categoryname = $categories[0]['nameCategories'];
              echo
              '<a href="?page=showproduct&categories=' . $idcategories . '">
                <h1>' . $categoryname . '</h1>
              </a>
                     
                     ';
            }

            ?>

          </div>
        </div>
      </div>

    </div>
    <!-- end categories -->
    <!-- start place pattern -->
    <div class="content">
      <div class="place-product">
        <div class="heading-place-product">
          <div class="heading">

            <?php
            $id = 4;
            $products = get_product_bycategory($id);

            if ($products) {
              $categoryName =  $products[0]['category_name'];
              echo '<h2><a href="?page=showproduct&categories=' . $id . '">' . $categoryName . '</a></h2>';
            }
            ?>


          </div>
          <div class="more">
            <h2><a href="?page=showproduct&categories=<?php echo $id; ?>">Xem Thêm</a></h2>
          </div>
        </div>
        <div class="box-product-master">
          <?php
          if (!empty($products)) {
            foreach ($products as $product) {
              $saleoff = $product['status_sale'];
              $imagePath = './asset/img/' . $product['image'] . '.jpg';

              if (file_exists($imagePath)) {
                echo '
                    <div class="box-product">
                        ' . ($saleoff == 1 ? '<span class="sale-off-tag">Sale Off</span>' : '') . '
                        
                        <img src="' . htmlspecialchars($imagePath) . '" alt="">

                        <div class="content-box-product">
                            <h1 style="font-size:16px;"><strong>' . htmlspecialchars($product['name']) . '</strong></h1>
                            <span>' . htmlspecialchars($product['title']) . '</span>
                            <span>' . htmlspecialchars($product['price']) . '</span>
                        </div>
                        <a href="#" class="buy-now-button">Mua Ngay</a>
                    </div>
                    ';
              }
            }
          } else {
            echo '<p>No products found!</p>';
          }

          ?>
        </div>
      </div>
    </div>
    <!-- end pattern hot -->
    <!-- start len hot -->
    <div class="content">
      <div class="place-product">
        <div class="heading-place-product">
          <div class="heading">
            <?php
            $id = 1;

            $products = get_product_bycategory($id);

            if ($products) {
              $categoryName =  $products[0]['category_name'];
              echo '<h2><a href="?page=showproduct&categories=' . $id . '">' . $categoryName . '</a></h2>';
            }
            ?>

          </div>
          <div class="more">
            <h2><a href="?page=showproduct&categories=<?php echo  $id; ?>">Xem Thêm</a></h2>
          </div>
        </div>

        <div class="box-product-master">
          <?php
          if (!empty($products)) {
            foreach ($products as $product) {
              $saleoff = $product['status_sale'];
              $imagePath = './asset/img/' . $product['image'] . '.jpg';


              if (file_exists($imagePath)) {
                echo '
                    <div class="box-product">
                        ' . ($saleoff == 1 ? '<span class="sale-off-tag">Sale Off</span>' : '') . '
                         <img class="flag-off-tag" src="./asset/img/' . $product['country_name'] . '.jpg" alt="">
                        <img src="' . htmlspecialchars($imagePath) . '" alt="">

                        <div class="content-box-product">
                            <h1 style="font-size:16px;"><strong>' . htmlspecialchars($product['name']) . '</strong></h1>
                            <span>' . htmlspecialchars($product['title']) . '</span>
                            <span>' . htmlspecialchars($product['price']) . '</span>
                        </div>
                        <a href="#" class="buy-now-button">Mua Ngay</a>
                    </div>
                    ';
              }
            }
          } else {
            echo '<p>No products found!</p>';
          }
          ?>
        </div>


      </div>
    </div>
    <!-- end len hot -->
    <!-- start banner 3 -->
    <div class="content">
      <div class="box-banner3">
        <a href=""><img src="./asset/img/banner4.png" alt=""></a>


        <div class="box-text-banner">
          <h1>Hi!</h1>
          <a href="?product=showproduct">Mời Bạn Trải Nghiệm Tại Đây </a>
        </div>


      </div>
    </div>
    <!-- end banner 3 -->
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
<!-- end main -->