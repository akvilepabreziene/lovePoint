<?php


//getAllProducts() returns all products

function getAllProducts($qty = 999999) {
    $sql = "SELECT * FROM products LIMIT $qty";
    $allProducts = mysqli_query(getConnect(), $sql);

    return $allProducts;
}

// Function returns recent products
function getNewProducts($qty = 999999) {
    $sql = "SELECT * FROM products ORDER BY id DESC LIMIT $qty";
    $newProducts = mysqli_query(getConnect(), $sql);

    return $newProducts;
}


// Return one product by id
// Return an array
function getProduct($id) {
    $sql = "SELECT * FROM products WHERE id = '$id' ";
    $productObject = mysqli_query(getConnect(), $sql);
    $product = mysqli_fetch_assoc($productObject);

    return $product;
}

// Return one product by category
// Return an array
function getProductsByCategory($category) {
    $sql = "SELECT * FROM products WHERE category_id = '$category' ";
    $products = mysqli_query(getConnect(), $sql);
   

    return $products;
}

// Function creates a new product to database
function createProduct($title, $product_code, $price, $material, $description, $category_id, $quantity) {

    $title = htmlspecialchars($title, ENT_QUOTES);
    $product_code = htmlspecialchars($product_code, ENT_QUOTES);
    $price = htmlspecialchars($price, ENT_QUOTES);
    $material = htmlspecialchars($material, ENT_QUOTES);
    $description = htmlspecialchars($description, ENT_QUOTES);
    $category_id = htmlspecialchars($category_id, ENT_QUOTES);
    $quantity = htmlspecialchars($quantity, ENT_QUOTES);

    $sql = "INSERT INTO products VALUES (NULL, '$title', '$product_code', $price, '$material', '$description', $category_id, $quantity)";

    $insertNewProduct = mysqli_query(getConnect(), $sql);

    if (!$insertNewProduct && DEBUG_MODE > 0 ) {
        echo "ERROR: nepavyko sukurti naujo producto!!! <br>";
    }
}

// Function deletes product by id
function deleteProduct($id) {
    $sql = "DELETE FROM products WHERE id = '$id' ";
    $deleteProduct = mysqli_query(getConnect(), $sql);

    if (!$deleteProduct && DEBUG_MODE > 0 ) {
        echo "ERROR: nepavyko ištrinti produkto!!! <br>";

}
}

// Function updates product features
function updateProduct($id, $title, $product_code, $price, $material, $description, $category_id, $quantity) {

    $title = htmlspecialchars($title, ENT_QUOTES);
    $product_code = htmlspecialchars($product_code, ENT_QUOTES);
    $price = htmlspecialchars($price, ENT_QUOTES);
    $material = htmlspecialchars($material, ENT_QUOTES);
    $description = htmlspecialchars($description, ENT_QUOTES);
    $category_id = htmlspecialchars($category_id, ENT_QUOTES);
    $quantity = htmlspecialchars($quantity, ENT_QUOTES);

    $sql = "UPDATE products SET title = '$title', product_code = '$product_code', price = $price, material = '$material', description = '$description', category_id = $category_id, quantity = $quantity WHERE id = $id LIMIT 1";

    $insertNewProduct = mysqli_query(getConnect(), $sql);

    if (!$insertNewProduct && DEBUG_MODE > 0 ) {
        echo "ERROR: nepavyko sukurti naujo producto!!! <br>";
    }
}

// updateProduct(14, 'Svajonių siekimas', '00008', 12, 'Linas, akmuo, plunksnos', 'Pati gražiausia sapnų gaudyklė', 1, 7);