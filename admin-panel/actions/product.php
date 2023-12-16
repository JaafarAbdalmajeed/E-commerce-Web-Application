<?php

include('../../includes/connect.php');
$name = str_replace("'", "\'", $_POST['name']);
$user_id = $_SESSION['user_id'];

// Add the missing variables from the modal
$image = isset($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : null;
$file_tmp_name = isset($_FILES["image"]["tmp_name"]) ? $_FILES["image"]["tmp_name"] : null;
$stock_quantity = isset($_POST['stock_quantity']) ? $_POST['stock_quantity'] : null;
$price = isset($_POST['price']) ? $_POST['price'] : null;
$price_after_sale = isset($_POST['price_after_sale']) ? $_POST['price_after_sale'] : null;
$description = isset($_POST['description']) ? $_POST['description'] : null;
$is_on_sale = isset($_POST['is_on_sale']) ? 1 : 0; // Convert the checkbox value to 1 or 0
$category_id = isset($_POST['category_id']) ? $_POST['category_id'] : null;

$id = isset($_POST['id']) ? $_POST['id'] : null;
$file_org_name = $_FILES["image"]["name"];
$file_tmp_name = $_FILES["image"]["tmp_name"];

if ($_FILES["image"]["size"] != 0) {
    $image = $database->upload_img($file_org_name, $file_tmp_name);
}

if (isset($_POST['add'])) {
    $insertProduct = "INSERT INTO products (`name`, `user_id`, `image`, `stock_quantity`, `price`, `price_after_sale`, `description`, `is_on_sale`, `category_id`) 
                       VALUES (:name, :user_id, :image, :stock_quantity, :price, :price_after_sale, :description, :is_on_sale, :category_id)";
    try {
        $stmt = $database->pdo->prepare($insertProduct);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':stock_quantity', $stock_quantity, PDO::PARAM_INT);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':price_after_sale', $price_after_sale, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':is_on_sale', $is_on_sale, PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);

        $stmt->execute();

        echo "Product added successfully!";
        $_SESSION['success_add'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }

} elseif (isset($_POST['update'])) {
    $id = $_POST['primaryId'];

    // Update query
    $updateProduct = "UPDATE products 
                      SET name = :name, user_id = :user_id, image = :image, 
                          stock_quantity = :stock_quantity, price = :price, 
                          price_after_sale = :price_after_sale, description = :description, 
                          is_on_sale = :is_on_sale, category_id = :category_id 
                      WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($updateProduct);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        if($_FILES["image"]["size"] != 0){

            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
            }
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':stock_quantity', $stock_quantity, PDO::PARAM_INT);
        $stmt->bindParam(':price', $price, PDO::PARAM_STR);
        $stmt->bindParam(':price_after_sale', $price_after_sale, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':is_on_sale', $is_on_sale, PDO::PARAM_INT);
        $stmt->bindParam(':category_id', $category_id, PDO::PARAM_INT);

        $stmt->execute();

        echo "Product updated successfully!";
        $_SESSION['success_update'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }

} elseif (isset($_POST['delete'])) {
    // Delete query
    $deleteProduct = "DELETE FROM products WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($deleteProduct);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo "Product deleted successfully!";
        $_SESSION['success_delete'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }
}

// Close the connection
$database->pdo = null;

header("location:" . $_SERVER['HTTP_REFERER']);
?>
