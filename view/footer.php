
<footer class="bg-dark text-white py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <div class="logo_footer">
                    <a href="#"><img src="./asset/img/logo.png" alt="Logo" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <h5>Danh Mục</h5>
                        <ul class="list-unstyled">
                            <li><a href="?page=" class="text-white">NÓN LEN</a></li>
                            <li><a href="#" class="text-white">ÁO UNISEX</a></li>
                            <li><a href="#" class="text-white">ÁO NAM</a></li>
                            <li><a href="#" class="text-white">ÁO NỮ</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>YARNS</h5>
                        <ul class="list-unstyled">
                            <li><a href="#" class="text-white">LEN TRÒN</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 mb-3">
                        <h5>BLOGS</h5>
                        <ul class="list-unstyled">
                            <li><a href="?page=blog" class="text-white">Bài viết về lông cừu</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center py-3 border-top border-secondary">
        <p class="mb-0">&copy; Design by NGUYEN DO THANH TAM @2024.</p>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
  document.querySelectorAll('.categories-list').forEach(item => {
    item.addEventListener('click', function() {
      document.querySelectorAll('.categories-list').forEach(el => el.classList.remove('active'));
      this.classList.add('active');
    });
  });

  function handleProductClick(productId) {
    window.location.href = `?page=showdetail&product=${productId}`;
  }

  function addToCart(productId) {

    const xhr = new XMLHttpRequest();
    xhr.open("POST", "cart.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        alert('Sản phẩm đã được thêm vào giỏ hàng!');
      }
    };
    xhr.send("product_id=" + productId);
  }
</script>

</section>
</body>

</html>