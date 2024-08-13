<?php
include_once "../model/connect.php";
function getAllOrders() {
    global $pdo;
    $sql = "SELECT * FROM orders";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getOrderDetailsByOrderId($orderId) {
    global $pdo;
    $sql = "SELECT * FROM orderdetail WHERE order_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$orderId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getCategories() {
    global $pdo;
    $sql = "SELECT * FROM categories";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getCountries() {
    global $pdo;
    $sql = "SELECT * FROM country";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getProducts() {
    global $pdo;
    $sql = "SELECT p.id, p.nameProduct, p.code, p.image, pd.price
            FROM products p
            LEFT JOIN productdetail pd ON p.id = pd.product_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductsByCategory($categoryId) {
    global $pdo;
    $sql = "SELECT p.id, p.nameProduct, p.code, p.image, pd.price
            FROM products p
            LEFT JOIN productdetail pd ON p.id = pd.product_id
            WHERE p.categories_id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$categoryId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function getProductById($id) {
    global $pdo;
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateProduct($id, $nameProduct, $categories_id, $title, $code, $description, $image = null) {
    global $pdo;
    
    $sql = "UPDATE products SET nameProduct = ?, categories_id = ?, title = ?, code = ?, description = ?";
    $params = [$nameProduct, $categories_id, $title, $code, $description];
    
    if ($image) {
        $sql .= ", image = ?";
        $params[] = $image;
    }
    
    $sql .= " WHERE id = ?";
    $params[] = $id;
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
}

function deleteProduct($id) {
    global $pdo;
    
    $sql = "SELECT image FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($product) {
        $imagePath = "../asset/img/" . $product['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

// Blog Functions
function getBlogs() {
    global $pdo;
    $sql = "SELECT * FROM blog ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getBlogById($id) {
    global $pdo;
    $sql = "SELECT * FROM blog WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function addBlog($title, $content, $image = null) {
    global $pdo;
    $sql = "INSERT INTO blog (title, content, image) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $content, $image]);
}

function updateBlog($id, $title, $content, $image = null) {
    global $pdo;
    $sql = "UPDATE blog SET title = ?, content = ?";
    $params = [$title, $content];
    
    if ($image) {
        $sql .= ", image = ?";
        $params[] = $image;
    }

    $sql .= " WHERE id = ?";
    $params[] = $id;
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
}
function deleteBlog($id) {
    global $pdo;
    $sql = "DELETE FROM blog WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);
}

// thống kê
function getProductStats() {
    global $pdo;

    $sql = "SELECT 
                COUNT(p.id) AS total_products,
                SUM(pd.soluongtonkho) AS total_stock_quantity,
                SUM(pd.price) AS total_price
            FROM products p
            JOIN productdetail pd ON p.id = pd.product_id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getProductCountByCategory() {
    global $pdo;

    $sql = "SELECT 
                c.nameCategories AS category_name,
                COUNT(p.id) AS product_count
            FROM categories c
            LEFT JOIN products p ON c.id = p.categories_id
            GROUP BY c.id, c.nameCategories";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getOrderCountByStatus() {
    global $pdo;

    $sql = "SELECT 
                status AS order_status, 
                COUNT(id) AS order_count
            FROM orders
            GROUP BY status";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getAllUsers() {
    global $pdo;
    $sql = "SELECT * FROM user";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
// function deleteUser($id) {
//     global $pdo;
    
//     $sql = "DELETE FROM user WHERE id = ?";
//     $stmt = $pdo->prepare($sql);
//     $stmt->execute([$id]);
// }


?>
