<?php
function get_productFull()
{
    return pdo_query("SELECT * FROM product ORDER BY id ASC");
}

function get_product()
{
    $sql = "
        SELECT 
            p.id AS product_id,
            p.nameProduct,
            p.price,
            p.description,
            p.quantity,
            pi.path AS image_path
        FROM 
            product p
        LEFT JOIN 
            product_image pi ON p.id = pi.product_id
        GROUP BY 
            p.id
        ORDER BY 
            p.nameProduct ASC;
    ";
    return pdo_query($sql);
}
