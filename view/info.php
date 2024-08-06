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
                if (isset($_SESSION['name']) && isset($_SESSION['user_id'])) {
                  $user_id = $_SESSION['user_id'];
                  $img_ext = pathinfo($_SESSION['img'], PATHINFO_EXTENSION) !== 'jpg' ? 'png' : 'jpg'; //
                  echo "<li><a class='imguser' href='index.php?page=info&id=$user_id'><img src='./asset/img/{$_SESSION['img']}.$img_ext' alt=''></a></li>";
                  echo "<li><a class='nameuser' href='index.php?page=info&id=$user_id'>" . $_SESSION['name'] . "</a></li>";
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
    <!-- start content info -->
    <div class="content">
      <div class="place-user">
        <div class="sidebar">
          <ul>
            <li><a href="index.php?page=info&section=user_info">Thông Tin Người Dùng</a></li>
            <li><a href="index.php?page=info&section=user_orders">Đơn Hàng Của Bạn</a></li>
            <li><a href="index.php?page=info&section=update_password">Thay Đổi Mật Khẩu</a></li>
          </ul>
        </div>
        <div class="screen" id="screen">
          <?php
          if (isset($_GET['section'])) {
            $section = $_GET['section'];
            if ($section == 'user_info') {
          ?>

              <form method="post" action="index.php?page=updateinfo">

                <img src="./asset/img/<?php echo $showinfo['image']; ?>.png" alt="">

                <label for="name">Name:</label>
                <label for=""><?php echo $showinfo['uname']; ?></label>

                <label for="email">Email:</label>
                <label for="email"><?php echo $showinfo['email']; ?></label>



                <label for="address">Address:</label>
                <label for="address"><?php echo $showinfo['address']; ?></label>


                <label for="phone">Phone:</label>
                <label for="phone"><?php echo $showinfo['phone']; ?></label>

                <button type="submit" name="update_info">Cập nhật thông tin </button>
              </form>

            <?php
            } elseif ($section == 'user_orders') {
            ?>
              <table>
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($orders as $order) { ?>
                    <tr>
                      <td><?php echo $order['id']; ?></td>
                      <td><?php echo $order['status']; ?></td>
                      <td>
                        <a href="cancel_order.php?id=<?php echo $order['id']; ?>">Cancel</a>
                        <a href="view_order.php?id=<?php echo $order['id']; ?>">View</a>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            <?php
            } elseif ($section == 'update_password') {
            ?>
              <form method="post" action="send_reset_email.php">
                <label for="email">Enter your email:</label>
                <input type="email" id="email" name="email" required>
                <button type="submit">Send Reset Code</button>
              </form>
          <?php
            } else {
              echo "Invalid section!";
            }
          } else {
            echo "Please select a section!";
          }
          ?>
        </div>
      </div>
    </div>
    <script>
      function loadContent(page) {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
          document.getElementById("screen").innerHTML = this.responseText;
        }
        xhttp.open("GET", page, true);
        xhttp.send();
      }
    </script>
    <!-- end content info -->
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