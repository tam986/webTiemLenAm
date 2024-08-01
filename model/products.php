    <?php

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
        pd.id,
        pd.price,
        pd.total,
        pd.qty,
        cl.id,
        cl.name,
        cl.description,
        cl.code,
        y.id,
        y.name,
        y.description,
        y.code,
        y.country,
        c.name
    FROM 
        product_detail pd
    LEFT JOIN 
        cloth cl ON pd.cloth_id = cl.id
    LEFT JOIN 
        yarn y ON pd.yarn_id = y.id
    LEFT JOIN 
        country c ON pd.country_id = c.id
    WHERE 
        pd.yarn_id = ? OR pd.cloth_id = ?;";
        return pdo_query_one($sql);
    }
