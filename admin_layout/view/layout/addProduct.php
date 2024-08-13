<!-- view/layout/addProduct.php -->
<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed">
        <!-- Navbar code here -->
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Thêm Sản Phẩm</h4>
                        </div>
                        <div class="content">
                            <form action="admin.php?page=addProduct" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nameProduct">Tên sản phẩm:</label>
                                    <input type="text" class="form-control" id="nameProduct" name="nameProduct" required>
                                </div>
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
                                <div class="form-group">
                                    <label for="image">Hình ảnh:</label>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </div>
                                <div class="form-group">
                                    <label for="title">Tiêu đề:</label>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </div>
                                <div class="form-group">
                                    <label for="code">Mã sản phẩm:</label>
                                    <input type="text" class="form-control" id="code" name="code" required>
                                </div>
                                <div class="form-group">
                                    <label for="description">Mô tả:</label>
                                    <textarea class="form-control" id="description" name="description"></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Thêm sản phẩm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('addProductForm').addEventListener('submit', function(event) {
    const nameProduct = document.getElementById('nameProduct').value.trim();
    const categoriesId = document.getElementById('categories_id').value.trim();
    const image = document.getElementById('image').files.length;
    const title = document.getElementById('title').value.trim();
    const code = document.getElementById('code').value.trim();

    if (!nameProduct || !categoriesId || image === 0 || !title || !code) {
        alert('Vui lòng điền tất cả các trường yêu cầu.');
        event.preventDefault(); // Prevent form from submitting
    }
});
</script>