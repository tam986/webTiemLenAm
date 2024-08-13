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
                    <th>Total</th>
                    <th>Address</th>
                    <th>Creat at</th>
                    <th>Status</th>
                    <th>Thời gian xác nhận</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $showorder = get_order();
                  foreach ($showorder as $order) {
                    $order_date = new DateTime($order['created_at']);
                    $current_date = new DateTime();
                    $interval = $current_date->diff($order_date);
                    $days_passed = $interval->days;
                    $time_remaining = max(0, (2 * 24 * 60 * 60) - ($interval->days * 24 * 60 * 60 + $interval->h * 60 * 60 + $interval->i * 60 + $interval->s));

                    echo '<tr>
                        <td>' . $order['id'] . '</td>
                        <td>' . $order['total'] . '</td>
                        <td>' . $order['address'] . '</td>
                        <td>' . $order['created_at'] . '</td>
                        <td>' . ($order['status'] == 0 ? 'Đã đặt hàng' : 'Đã xử lý | Đang giao hàng') . '</td>
                        <td id="countdown-' . $order['id'] . '"></td> 
                        <td id="actions-' . $order['id'] . '">
                            <a style="text-decoration: none; background-color:#93BEBF; padding:10px; border-radius:6px;color:#fff" href="index.php?page=info&section=user_orders&ordercode=' . $order['id'] . '" data-time-remaining="' . $time_remaining . '" id="cancel-link-' . $order['id'] . '">Hủy Đơn</a>
                        </td>
                      </tr>';
                  }

                  ?>
                </tbody>

              </table>
            <?php
            } elseif ($section == 'update_password') {
            ?>
              <form action="change_password.php" method="post">
                <label for="current_password">Mật khẩu hiện tại</label>
                <input type="password" name="current_password" id="current_password" required>

                <label for="new_password">Mật khẩu mới</label>
                <input type="password" name="new_password" id="new_password" required>

                <label for="confirm_password">Xác nhận mật khẩu mới</label>
                <input type="password" name="confirm_password" id="confirm_password" required>

                <button type="submit" name="change_password">Thay Đổi Mật Khẩu</button>
              </form>
          <?php
            } else {
              echo "Invalid section!";
            }
          } else {

            echo '  <form method="post" action="index.php?page=updateinfo">

            <img src="./asset/img/' . $showinfo['image'] . '.png" alt="">

            <label for="name">Name:</label>
            <label for="">' . $showinfo['uname'] . '</label>

            <label for="email">Email:</label>
            <label for="email">' . $showinfo['email'] . '</label>



            <label for="address">Address:</label>
            <label for="address">' . $showinfo['address'] . '</label>


            <label for="phone">Phone:</label>
            <label for="phone">' . $showinfo['phone'] . '</label>

            <button type="submit" name="update_info">Cập nhật thông tin </button>
          </form>
          ';
          }
          ?>
        </div>
      </div>
    </div>
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
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      var cancelLinks = document.querySelectorAll('a[id^="cancel-link-"]');
      cancelLinks.forEach(function(link) {
        var timeRemaining = parseInt(link.getAttribute('data-time-remaining'), 10);
        var countdownCell = document.getElementById('countdown-' + link.id.split('-')[2]);

        function updateCountdown() {
          if (timeRemaining > 0) {
            var hours = Math.floor(timeRemaining / 3600);
            var minutes = Math.floor((timeRemaining % 3600) / 60);
            var seconds = timeRemaining % 60;

            countdownCell.textContent = hours + "h " + minutes + "m " + seconds + "s";

            timeRemaining--;
          } else {
            link.style.display = 'none';
            link.closest('td').innerHTML = 'Đã đóng hàng';
            countdownCell.textContent = 'Hết thời gian hủy';
          }
        }
        updateCountdown();
        setInterval(updateCountdown, 1000); // Cập nhật mỗi giây
        // Thêm hộp thoại cảnh báo khi người dùng nhấn "Hủy Đơn"
        link.addEventListener('click', function(event) {
          event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết
          var confirmCancel = confirm("Bạn có chắc muốn hủy đơn hàng này không?");
          if (confirmCancel) {
            window.location.href = link.href; // Chuyển hướng đến trang hủy đơn hàng nếu người dùng chọn "Yes"
          }
        });
      });
    });
  </script>
</main>