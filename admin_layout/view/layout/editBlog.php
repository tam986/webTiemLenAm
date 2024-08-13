<!-- view/layout/addProduct.php -->
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
    </nav>
    <div class="container">
    <h1>Chỉnh sửa Blog</h1>
    <form action="admin.php?page=editBlog&id=<?php echo ($blog['id']); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Tiêu đề:</label>
            <input type="text" name="title" id="title" class="form-control" value="<?php echo ($blog['title']); ?>" required>
        </div>
        <div class="form-group">
            <label for="content">Nội dung:</label>
            <textarea name="content" id="content" class="form-control" rows="5" required><?php echo ($blog['content']); ?></textarea>
        </div>
        <div class="form-group">
            <label for="image">Hình ảnh:</label>
            <input type="file" name="image" id="image" class="form-control">
            <?php if ($blog['image']): ?>
                <img src="../asset/img/<?php echo ($blog['image']); ?>" alt="<?php echo ($blog['title']); ?>" style="width:100px;height:auto;">
            <?php endif; ?>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
</div>
</div>
<script>
