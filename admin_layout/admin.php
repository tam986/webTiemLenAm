<!-- admin.php -->
<?php
session_start();
include_once "model/connect.php";
include_once "controller/controller.php";

include 'view/layout/header.php';

if (!isset($_GET['page'])) {
    include 'view/layout/productStats.php'; // Hiển thị trang chính nếu không có tham số `page`
} else {
    switch ($_GET['page']) {
        case 'users':
          
            // Lấy danh sách người dùng từ controller
            $users = getAllUsers();
            include 'view/layout/usersList.php'; // Hiển thị danh sách người dùng
            break;
        // case 'deleteUser':
        //     $user_id = $_GET['id'];
                
        //     // Xóa người dùng
        //     deleteUser($user_id);
                
        //     // Chuyển hướng đến danh sách người dùng sau khi xóa thành công
        //     header("Location: admin.php?page=users");
        //     exit();
        //     break;
        case 'productcategories':
            include 'view/layout/productcategory.php';
            break;

        case 'products':
            // Lấy danh sách sản phẩm từ controller
            $products = getProducts();
            include 'view/layout/productList.php'; // Hiển thị danh sách sản phẩm
            break;

        case 'productLen':
            // Lấy danh sách sản phẩm thuộc category_id là 1 từ controller
            $products = getProductsByCategory(1);
            include 'view/layout/productLen.php'; // Hiển thị danh sách sản phẩm
            break;

        case 'productUnisex':
            // Lấy danh sách sản phẩm thuộc category_id là 2 từ controller
            $products = getProductsByCategory(2);
            include 'view/layout/productUnisex.php'; // Hiển thị danh sách sản phẩm
            break;

        case 'productwomenshirt':
            // Lấy danh sách sản phẩm thuộc category_id là 3 từ controller
            $products = getProductsByCategory(3);
            include 'view/layout/productWomenShirt.php'; // Hiển thị danh sách sản phẩm
            break;

        case 'productmenshirt':
            // Lấy danh sách sản phẩm thuộc category_id là 4 từ controller
            $products = getProductsByCategory(4);
            include 'view/layout/productMenShirt.php'; // Hiển thị danh sách sản phẩm
            break;

        case 'productbeanie':
            // Lấy danh sách sản phẩm thuộc category_id là 5 từ controller
            $products = getProductsByCategory(5);
            include 'view/layout/productBeanie.php'; // Hiển thị danh sách sản phẩm
            break;

        case 'productshawl':
            // Lấy danh sách sản phẩm thuộc category_id là 6 từ controller
            $products = getProductsByCategory(6);
            include 'view/layout/productShawl.php'; // Hiển thị danh sách sản phẩm
            break;

        case 'countries':
            // Lấy danh sách quốc gia từ controller
            $countries = getCountries();
            include 'view/layout/countriesList.php'; // Hiển thị danh sách quốc gia
            break;

        case 'categories':
            // Lấy danh sách danh mục từ controller
            $categories = getCategories();
            include 'view/layout/categoriesList.php'; // Hiển thị danh sách danh mục
            break;

        case 'ordercategories':
            include 'view/layout/orderCategories.php';
            break;

        case 'orders':
            // Lấy danh sách đơn hàng từ controller
            $orders = getAllOrders();
            include 'view/layout/ordersList.php'; // Hiển thị danh sách đơn hàng
            break;

        case 'orderDetails':
            $orderId = $_GET['id'];
            // Lấy chi tiết đơn hàng từ controller
            $orderDetails = getOrderDetailsByOrderId($orderId);
            include 'view/layout/orderDetails.php'; // Hiển thị chi tiết đơn hàng
            break;

        case 'blogList':
            // Lấy danh sách blog từ controller
            $blogs = getBlogs();
            include 'view/layout/blogList.php'; // Hiển thị danh sách blog
            break;

        case 'productStats':
            // Lấy thống kê sản phẩm từ controller
            $productStats = getProductStats();
            $categoryStats = getProductCountByCategory();
            $statusStats = getOrderCountByStatus();
            include 'view/layout/productStats.php'; // Hiển thị thống kê sản phẩm
            break;

        case 'addProduct':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Xử lý dữ liệu từ form
                $nameProduct = $_POST['nameProduct'];
                $categories_id = $_POST['categories_id'];
                $title = $_POST['title'];
                $code = $_POST['code'];
                $description = $_POST['description'];
                
                // Xử lý upload hình ảnh
                $image = $_FILES['image']['name'];
                $imageTemp = $_FILES['image']['tmp_name'];
                
                // Lưu hình ảnh vào thư mục
                $targetDir = "../asset/img/";
                move_uploaded_file($imageTemp, $targetDir . $image);
                
                // Thêm sản phẩm vào cơ sở dữ liệu
                $sql = "INSERT INTO products (categories_id, nameProduct, image, title, code, description) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$categories_id, $nameProduct, $image, $title, $code, $description]);
                
                // Chuyển hướng đến danh sách sản phẩm sau khi thêm thành công
                header("Location: admin.php?page=products");
                exit();
            }
            include 'view/layout/addProduct.php'; // Hiển thị form thêm sản phẩm
            break;

        case 'editProduct':
            $product_id = $_GET['id'];

            // Lấy thông tin sản phẩm và danh mục từ controller
            $product = getProductById($product_id);
            $categories = getCategories();

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                // Xử lý dữ liệu từ form
                $nameProduct = $_POST['nameProduct'];
                $categories_id = $_POST['categories_id'];
                $title = $_POST['title'];
                $code = $_POST['code'];
                $description = $_POST['description'];
                
                // Xử lý upload hình ảnh
                $image = $_FILES['image']['name'] ? $_FILES['image']['name'] : $product['image'];
                if ($_FILES['image']['name']) {
                    $imageTemp = $_FILES['image']['tmp_name'];
                    $targetDir = "../asset/img/";
                    move_uploaded_file($imageTemp, $targetDir . $image);
                }
                
                // Cập nhật sản phẩm
                updateProduct($product_id, $nameProduct, $categories_id, $title, $code, $description, $image);
                
                // Chuyển hướng đến danh sách sản phẩm sau khi cập nhật thành công
                header("Location: admin.php?page=products");
                exit();
            }
            
            include 'view/layout/editProduct.php'; // Hiển thị form chỉnh sửa sản phẩm
            break;

        case 'deleteProduct':
            $product_id = $_GET['id'];
            
            // Xóa sản phẩm
            deleteProduct($product_id);
            
            // Chuyển hướng đến danh sách sản phẩm sau khi xóa thành công
            header("Location: admin.php?page=products");
            exit();
            break;

        case 'addBlog':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = $_FILES['image']['name'];
                if ($image) {
                    $imageTemp = $_FILES['image']['tmp_name'];
                    $targetDir = "../asset/img/";
                    move_uploaded_file($imageTemp, $targetDir . $image);
                }
                addBlog($title, $content, $image);
                header("Location: admin.php?page=blogList");
                exit();
            }
            include 'view/layout/addBlog.php';
            break;

        case 'editBlog':
            $blog_id = $_GET['id'];
            $blog = getBlogById($blog_id);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $image = $_FILES['image']['name'];
                if ($image) {
                    $imageTemp = $_FILES['image']['tmp_name'];
                    $targetDir = "../asset/img/";
                    move_uploaded_file($imageTemp, $targetDir . $image);
                } else {
                    $image = $blog['image'];
                }
                updateBlog($blog_id, $title, $content, $image);
                header("Location: admin.php?page=blogList");
                exit();
            }
            include 'view/layout/editBlog.php';
            break;

        case 'deleteBlog':
            $blog_id = $_GET['id'];
            deleteBlog($blog_id);
            header("Location: admin.php?page=blogList");
            exit();
            break;

        
            
        case 'logout':
            session_unset();
            session_destroy();
            header("location: ../view/login.php");
            break;

        default:
            include 'view/layout/productStats.php'; // Hiển thị trang chính mặc định
            break;
    }
}

include 'view/layout/footer.php';
?>
