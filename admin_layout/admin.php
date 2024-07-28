<?php
ob_start();
session_start();
include_once "../model/connect.php";
include_once "../controller/catagories.php";
include_once "../controller/product.php";


pdo_get_connection();

include 'view/layout/header.php';
if (!isset($_GET['page'])) {
    //
    include 'view/layout/home.php';
} else {

    switch ($_GET['page']) {
        case 'product':
            $products = get_productFull();
            include 'view/layout/productview.php';
            break;
        case 'categories':
            $catagoriesFull = get_categories();
            include 'view/layout/catagories.php';
            break;
        case 'detail':
            $catagoriesFull = get_categories();
            include 'view/layout/catagories.php';
            break;
        default:
            //
            include 'view/layout/home.php';
            break;
    }
}

include 'view/layout/footer.php';
