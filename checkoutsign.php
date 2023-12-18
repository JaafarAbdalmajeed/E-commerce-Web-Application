<?php
include('includes/connect.php');

if (isset($_POST['create'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $password = trim($_POST['password']);

    $confirm_password = trim($_POST['confirm_password']);

    if ($password !== $confirm_password) {
        header("Location: checkout.php?error=Passwords do not match");
        exit();
    }

    $checkQuery = "SELECT id FROM customers WHERE email=?";
    $checkStmt = $database->pdo->prepare($checkQuery);
    $checkStmt->execute([$email]);
    $existingUser = $checkStmt->fetchColumn();

    if ($existingUser) {
        header("Location: checkout.php?error=Email is already registered");
        exit();
    }

    $insertQuery = "INSERT INTO customers (name, email, phone, password, address) VALUES (?, ?, ?, ?, ?)";
    $insertStmt = $database->pdo->prepare($insertQuery);
    $insertStmt->execute([$name, $email, $phone, $password, $address]);

    // Redirect to a success page or login page
    header("Location: confirmation.php");
    exit();
} elseif (isset($_POST['order'])) {
    $customer_id = $_SESSION['customer_id'];

    $product = $database->getCol('cart', 'group_concat(productId)', 'customer_id', $customer_id);
    $qty = $database->getCol('cart', 'group_concat(qty)', 'customer_id', $customer_id);

    $sub_total = 0;
    $rowProduct = $database->get_SpecificList('cart', 'customer_id', $customer_id);
    foreach ($rowProduct as $value) {
        $sub_total += $database->getColumn('products', 'price', $value->productId) * $value->qty;
    }

    $date = date('Y-m-d');
    $insertQuery = "INSERT INTO orders (order_date, total_amount, customer_id, shipping, products_id, products_quantity) VALUES (?, ?, ?, ?, ?, ?)";
    $insertStmt = $database->pdo->prepare($insertQuery);
    $insertStmt->execute([$date, $sub_total, $customer_id, 2, $product, $qty]);

    // Redirect to a success page or login page
    header("Location: confirmation.php");
    exit();
}
?>
<!-- Rest of your HTML/PHP code -->
