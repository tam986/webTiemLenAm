<!-- home.php -->
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
<!--  -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Danh sách Blog</h4>
                                <p class="category"></p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tiêu đề</th>
                                            <th>Content</th>
                                            <th>Ngày tạo</th>
                                            <th>Hình ảnh</th>
                                            <th>Chức năng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($blogs as $blog): ?>
                                            <tr>
                                                <td><?php echo ($blog['id']); ?></td>
                                                <td><?php echo ($blog['title']); ?></td>
                                                <td><?php echo ($blog['content']); ?></td>
                                                <td><?php echo ($blog['created_at']); ?></td>
                                                <td>
                                                    <?php if ($blog['image']): ?>
                                                        <img src="../asset/img/<?php echo ($blog['image']); ?>" alt="<?php echo ($blog['title']); ?>" style="width:100px;height:auto;">
                                                    <?php else: ?>
                                                        <p>Không có hình ảnh</p>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="admin.php?page=editBlog&id=<?php echo ($blog['id']); ?>" class="btn btn-warning">Sửa</a> |
                                                    <a href="admin.php?page=deleteBlog&id=<?php echo ($blog['id']); ?>" class="btn btn-danger " onclick="return confirmDelete()">Xóa</a>
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
                            <a href="admin.php?page=addBlog" class="btn btn-primary">Thêm Blog</a>

                        </div>
            </div>
