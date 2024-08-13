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
                <a class="navbar-brand" href="#">Sửa Sản Phẩm</a>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Chỉnh Sửa Sản Phẩm</h4>
                        </div>
                        <div class="content">
                            <form action="admin.php?page=editProduct&id=<?php echo ($product_id); ?>" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tên Sản Phẩm</label>
                                            <input type="text" class="form-control" name="nameProduct" value="<?php echo ($product['nameProduct']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="categories_id">Danh mục:</label>
                                    <select class="form-control" id="categories_id" name="categories_id" required>
                                        <?php
                                        // Lấy danh sách danh mục từ cơ sở dữ liệu
                                        $categories = getCategories();
                                        foreach ($categories as $category) {
                                            echo "<option value='" . ($category['id']) . "'>" . ($category['nameCategories']) . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Tiêu Đề</label>
                                            <input type="text" class="form-control" name="title" value="<?php echo ($product['title']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mã Sản Phẩm</label>
                                            <input type="text" class="form-control" name="code" value="<?php echo ($product['code']); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Mô Tả</label>
                                            <textarea class="form-control" name="description"><?php echo ($product['description']); ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Hình Ảnh</label>
                                            <input type="file" name="image">
                                            <?php if ($product['image']): ?>
                                                <img src="../asset/img/<?php echo ($product['image']); ?>" style="width:100px;height:auto;" />
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-info btn-fill pull-right">Cập Nhật</button>
                                    <div class="clearfix"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

