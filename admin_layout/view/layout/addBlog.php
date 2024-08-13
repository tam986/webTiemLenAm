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
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Thêm Blog</h4>
                        </div>
                        <div class="content">
                        <form action="admin.php?page=addBlog" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Tiêu đề:</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Nội dung:</label>
                                <textarea name="content" id="content" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Hình ảnh:</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('addBlogForm').addEventListener('submit', function(event) {
    const title = document.getElementById('title').value.trim();
    const content = document.getElementById('content').value.trim();
    const image = document.getElementById('image').files.length;

    if (!title || !content || (image === 0)) {
        alert('Vui lòng điền tất cả các trường yêu cầu.');
        event.preventDefault(); // Prevent form from submitting
    }
});
</script>