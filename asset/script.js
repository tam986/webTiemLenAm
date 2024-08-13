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
  xhr.open("POST", "add_to_cart.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      alert('Sản phẩm đã được thêm vào giỏ hàng!');
    }
  };
  xhr.send(`product_id=${productId}`);
}
