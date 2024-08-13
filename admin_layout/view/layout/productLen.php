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
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Danh mục cuộn len</h4>
                            <p class="category"></p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tên</th>
                                        <th>Mã</th>
                                        <th>Giá</th> <!-- Thêm cột Giá -->
                                        <th>Hình ảnh</th>
                                        <th>Chức năng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product): ?>
                                        <tr>
                                            <td><?php echo ($product['id']); ?></td>
                                            <td><?php echo ($product['nameProduct']); ?></td>
                                            <td><?php echo ($product['code']); ?></td>
                                            <td><?php echo ($product['price']); ?> <!-- Hiển thị giá sản phẩm --></td>
                                            <td>
                                                <?php 
                                                $imageName = ($product['image']);
                                                $possibleExtensions = ['jpg', 'jpeg', 'png', 'gif'];
                                                $imageFound = false;

                                                $imagePathWithoutExtension = "../asset/img/" . $imageName;
                                                if (file_exists($imagePathWithoutExtension)) {
                                                    $imagePath = $imagePathWithoutExtension;
                                                    $imageFound = true;
                                                }

                                                foreach ($possibleExtensions as $extension) {
                                                    $imagePathWithExtension = "../asset/img/" . $imageName . "." . $extension;
                                                    if (file_exists($imagePathWithExtension)) {
                                                        $imagePath = $imagePathWithExtension;
                                                        $imageFound = true;
                                                        break;
                                                    }
                                                }

                                                if ($imageFound): ?>
                                                    <img src="<?php echo $imagePath; ?>" alt="<?php echo ($product['nameProduct']); ?>" style="width:100px;height:auto;">
                                                <?php else: ?>
                                                    <p>Image not found</p>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="admin.php?page=editProduct&id=<?php echo ($product['id']); ?>" class="btn btn-warning">Sửa</a> |
                                                <a href="admin.php?page=deleteProduct&id=<?php echo ($product['id']); ?>" class="btn btn-danger" onclick="return confirmDelete()">Xóa</a>
                                                <script>
                                                function confirmDelete() {
                                                    return confirm("Bạn có chắc chắn muốn xóa sản phẩm này không?");
                                                }
                                                </script>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                <a href="admin.php?page=addProduct" class="btn btn-primary">Thêm Sản Phẩm</a>

                </div>
            </div>
        </div>
        
    </div>
</div>
