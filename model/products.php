    <?php
    //  ham show san pham theo categories home
    function get_product_bycategory($cateid)
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

    function get_product_detail($product_id)
    {
        $sql = "SELECT 
                    p.nameProduct AS name, 
                    p.image, 
                    p.code AS product_code, 
                    p.description AS des, 
                    pd.price,
                    pd.soluongtonkho,
                    p.title as title,
                    pd.country AS country_id, 
                    p.status_sale, 
                    co.nameCountry AS country_name
                FROM 
                    productdetail pd
                LEFT JOIN 
                    products p ON pd.product_id = p.id
                LEFT JOIN 
                    country co ON pd.country = co.id
                WHERE 
                    pd.product_id = ?";
        return pdo_query_one($sql, $product_id);
    }
    //  saerch sarn pham
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
