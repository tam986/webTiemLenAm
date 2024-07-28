<div class="main-panel">
  <nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Danh mục</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-left">
          <li>
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-dashboard"></i>
              <p class="hidden-lg hidden-md">Dashboard</p>
            </a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-globe"></i>
              <b class="caret hidden-sm hidden-xs"></b>
              <span class="notification hidden-sm hidden-xs">0</span>
              <p class="hidden-lg hidden-md">
                5 Notifications
                <b class="caret"></b>
              </p>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Notification 1</a></li>
              <li><a href="#">Notification 2</a></li>
              <li><a href="#">Notification 3</a></li>
              <li><a href="#">Notification 4</a></li>
              <li><a href="#">Another notification</a></li>
            </ul>
          </li>
          <li>
            <a href="">
              <i class="fa fa-search"></i>
              <p class="hidden-lg hidden-md">Search</p>
            </a>
          </li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="#">
              <p>Đăng xuất</p>
            </a>
          </li>
          <li class="separator hidden-lg hidden-md"></li>
        </ul>
      </div>
    </div>
  </nav>
  <!--  -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="header">
              <h4 class="title">Danh mục các sản phẩm</h4>
              <p class="category"></p>
            </div>
            <div class="content table-responsive table-full-width">
              <table class="table table-hover table-striped">
                <thead>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Code</th>
                  <th>price</th>
                  <th>Description</th>
                  <th>discount</th>
                  <th>quantity</th>
                  <th>Hot</th>
                  <th>Featured</th>
                  <th>Status</th>
                  <th>Chức năng</th>
                </thead>
                <tbody>
                  <?php
                  foreach ($products as $product) {
                    echo '
                    <tr>
                    <td>' . $product['id'] . '</td>
                    <td>' . $product['nameProduct'] . '</td>
                    <td>' . $product['code'] . '</td>
                    <td>' . $product['price'] . '</td>
                    <td>' . $product['description'] . '</td>
                    <td>' . $product['price_discount'] . '</td>
                    <td>' . $product['quantity'] . '</td>
                    <td>' . $product['featured'] . '</td>
                    <td>' . $product['hot_product'] . '</td>
                    <td>' . $product['status_sale'] . '</td>
                    <td><a href="">Sửa</a> | <a href="">Xóa</a></td>
                  </tr>';
                  }

                  ?>
                </tbody>
              </table>

            </div>
          </div>
        </div>