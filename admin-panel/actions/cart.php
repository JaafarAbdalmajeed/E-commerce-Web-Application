<?php

include('../../includes/connect.php');
$productId = str_replace("'", "\'", $_POST['productId']);
$qty = str_replace("'", "\'", $_POST['qty']);

$customer_id =  $_SESSION['customer_id'];


 

    $insertEmployee = "INSERT INTO cart (`productId`, `customer_id`, `qty`) VALUES (:productId, :customer_id, :qty)";
    try {
        $stmt = $database->pdo->prepare($insertEmployee);
        $stmt->bindParam(':productId', $productId, PDO::PARAM_STR);
        $stmt->bindParam(':qty', $qty, PDO::PARAM_STR);
        $stmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);

        $stmt->execute();

        $countProductsQuery = "SELECT COUNT(*) as total FROM cart WHERE customer_id = :customer_id";
        $countStmt = $database->pdo->prepare($countProductsQuery);
        $countStmt->bindParam(':customer_id', $customer_id, PDO::PARAM_INT);
        $countStmt->execute();
        $result = $countStmt->fetch(PDO::FETCH_ASSOC);
        echo json_encode($result['total']);

    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        
    }

$database->pdo = null;

?>
