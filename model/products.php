    <?php
    //  ham show san pham theo categories home
    function get_product_bycategory($cateid)
    {
        $sql = "SELECT 
    p.nameProduct AS name, 
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
    country co ON pd.country = co.id
WHERE 
    c.id = ?
    order by p.id desc limit 4
";

        return pdo_query($sql,  $cateid);
    }



    // hàm tính giảm giá
    function tinhgiamgia($price, $discount, $roundto = 5000)
    {
        $discount = $price - $price * ($discount / 100);
        $newprice = ceil($discount / $roundto) * $roundto;
        return $newprice;
    }
    // lấy image
    function get_Banner($idbanner)
    {
        $sql = " SELECT image_banner FROM products where id = ?";
        return pdo_query($sql, $idbanner);
    }

    function get_product_detail()
    {
        $sql = "SELECT 
         p.nameProduct AS name, 
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
        product_detail pd
    LEFT JOIN 
        products p ON pd.cloth_id = p.id
    
    LEFT JOIN 
        country c ON pd.country_id = c.id
    WHERE 
        pd.product_id = ?";
        return pdo_query_one($sql);
    }
    // show sarn pham theo danh muc
    // function showsp($idcat)
    // {
    //     $sql = "SELECT * FROM products where 1";
    //     if ($idcat > 0) {
    //         $sql .= " AND categories_id=" . $idcat;
    //     }
    //     $sql .= " ORDER BY id desc limit 8";
    //     return pdo_query($sql);
    // }
    // update show san pham theo dtb product
    function showsp($idcat)
    {
        $sql = "SELECT 
                p.nameProduct AS name, 
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
        if ($idcat > 0) {
            $sql .= " WHERE c.id = ?";
            return pdo_query($sql, $idcat);
        }

        $sql .= " ORDER BY p.id DESC LIMIT 20";
        return pdo_query($sql);
    }
