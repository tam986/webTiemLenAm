<!-- productStats.php -->
<?php
// Thực hiện lấy dữ liệu từ các hàm
$productStats = getProductStats();
$categoryStats = getProductCountByCategory();
$orderStatusStats = getOrderCountByStatus();
$statusStats = getOrderCountByStatus();
$statusMap = [
    // mảng ánh xạ các mã trạng thái đơn hàng
    0 => 'Đang chờ xử lý',
    1 => 'Đã mua',
    2 => 'Đã hủy'
];
?>
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

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Thông kê tổng quan</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="alert alert-info">
                                        <h4>Tổng số sản phẩm</h4>
                                        <p><?php echo number_format($productStats['total_products']); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="alert alert-success">
                                        <h4>Tổng số lượng hàng tồn kho</h4>
                                        <p><?php echo number_format($productStats['total_stock_quantity']); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="alert alert-warning">
                                        <h4>Tổng giá sản phẩm</h4>
                                        <p><?php echo number_format($productStats['total_price'], 2); ?> VND</p>
                                    </div>
                                </div>
                            </div>

                            <h4 class="title">Số lượng đơn hàng theo trạng thái</h4>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Trạng thái đơn hàng</th>
                                        <th>Số lượng đơn hàng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($statusStats as $status) : ?>
                                        <tr>
                                            <td><?php echo ($statusMap[$status['order_status']]); ?></td>
                                            <td><?php echo ($status['order_count']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                            <h4 class="title">Số lượng sản phẩm theo danh mục</h4>
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Tên danh mục</th>
                                        <th>Số lượng sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($categoryStats as $category) : ?>
                                        <tr>
                                            <td><?php echo ($category['category_name']); ?></td>
                                            <td><?php echo ($category['product_count']); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
