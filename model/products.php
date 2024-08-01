<?php




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
    $sql = "SELECT img FROM productimage WHERE clothid IS NULL AND lenid IS NULL and id =?";
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
