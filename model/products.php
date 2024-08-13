    <?php
    //  ham show san pham theo categories home
    function get_product_bycategory($cateid, $loaitruproduct = null)
    {
        $sql = "SELECT 
            p.nameProduct AS name, 
            p.id,
            p.image,
            pd.soluongtonkho AS sl,
            p.code AS product_code, 
            p.description AS des, 
            pd.price, 
            p.title as title,
            pd.country AS country_id, 
            p.status_sale,
            c.id AS idc,
            c.nameCategories AS category_name,
            co.nameCountry AS country_name
        FROM 
            products p
        JOIN 
            productDetail pd ON p.id = pd.product_id
        JOIN 
            categories c ON p.categories_id = c.id
        LEFT JOIN 
            country co ON pd.country = co.id
        WHERE 
            c.id = ?";


        if ($loaitruproduct !== null) {
            $sql .= " AND p.id != ?";
            $sql .= " LIMIT 4";
            return pdo_query($sql, $cateid, $loaitruproduct);
        } else {
            $sql .= " LIMIT 4";
            return pdo_query($sql, $cateid);
        }
    }

    // // hàm tính giảm giá
    // function tinhgiamgia($price, $discount, $roundto = 5000)
    // {
    //     $discount = $price - $price * ($discount / 100);
    //     $newprice = ceil($discount / $roundto) * $roundto;
    //     return $newprice;
    // }
    // lấy image
    function get_Banner($idbanner)
    {
        $sql = " SELECT image_banner FROM products where id = ?";
        return pdo_query($sql, $idbanner);
    }
    //  product detail
    function get_product_detail($product_id)
    {
        $sql = "SELECT 
                    p.nameProduct AS name, 
                    p.id,
                    p.image AS img, 
                    p.code AS product_code, 
                    p.description AS des, 
                    pd.price,
                    pd.soluongtonkho AS sl,
                    pd.soluongdaban AS sl_sold,
                    p.title as title,
                    pd.country AS country_id, 
                    p.status_sale,
                    c.nameCategories AS category,
                    co.nameCountry AS country_name
                FROM 
                    productdetail pd
                LEFT JOIN 
                    products p ON pd.product_id = p.id
                JOIN 
                    categories c ON p.categories_id = c.id
                LEFT JOIN 
                    country co ON pd.country = co.id
                WHERE 
                    pd.product_id = ?";
        return pdo_query_one($sql, $product_id);
    }
    //  saerch sarn pham và lấy sản phẩm khi nhaaso và từng danh mục
    function showsp($idcat, $kyw)
    {

        $sql = "SELECT 
            p.nameProduct AS name, 
            p.id,
            p.image, 
            p.code AS product_code, 
            p.description AS des,
            pd.price, 
            p.title as title,
            pd.country AS country_id, 
            p.status_sale, 
            c.nameCategories AS category_name,
            co.nameCountry AS country_name
        FROM 
            products p
        JOIN 
            productDetail pd ON p.id = pd.product_id
        JOIN 
            categories c ON p.categories_id = c.id
        LEFT JOIN 
            country co ON pd.country = co.id";
        $params = [];
        if ($idcat > 0) {
            $sql .= " WHERE c.id = ?";
            $params[] = $idcat;
        }

        if (!empty($kyw)) {
            $sql .= ($idcat > 0 ? " AND" : " WHERE") . " p.nameProduct LIKE ?";
            $params[] = "%$kyw%";
        }

        $sql .= " ORDER BY p.id DESC LIMIT 20";
        return pdo_query($sql, ...$params);
    }

    function product_featured()
    {
        $sql = "SELECT
        p.id AS id,
        pd.price AS price,
        p.nameProduct AS name,
        p.title AS title,
        p.image AS img,
        p.featured
            FROM
            products p
        JOIN 
                productdetail pd ON p.id = pd.product_id
            WHERE
            p.featured = 1
            order BY 
            p.id desc     
        ";

        return pdo_query($sql);
    }

    // lasasy danh mục theo sản phẩm ở trang detail
    function get_related_products($productId)
    {
        // Lấy danh mục của sản phẩm hiện tại
        $sql = "SELECT categories_id FROM products WHERE id = ?";
        $category = pdo_query_one($sql, $productId);

        // Kiểm tra xem có lấy được danh mục không
        if ($category) {
            // Gọi hàm lấy sản phẩm theo danh mục mà không loại trừ sản phẩm hiện tại
            $relatedProducts = get_product_bycategory($category['categories_id'], $productId);
            return $relatedProducts;
        } else {
            return [];
        }
    }
