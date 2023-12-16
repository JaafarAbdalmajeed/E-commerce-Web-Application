<?php

$host = 'localhost';
$dbname = 'e-commerce';
$user = 'root';
$password = '';
 try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
   // echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

   
    if ($password !== $confirm_password) {
        header("Location: signup.php?error=Passwords do not match");
        exit();
    }

    
    $checkQuery = "SELECT id FROM customers WHERE email=?";
    $checkStmt = $pdo->prepare($checkQuery);
    $checkStmt->execute([$email]);
    $existingUser = $checkStmt->fetchColumn();

    if ($existingUser) {
        header("Location: signup.php?error=Email is already registered");
        exit();
    }

    
    $insertQuery = "INSERT INTO customers (name, email, phone, password) VALUES (?, ?, ?, ?)";
    $insertStmt = $pdo->prepare($insertQuery);
    $insertStmt->execute([$name, $email, $phone, $password]);

    // Redirect to a success page or login page
    header("Location: confirmation.php");
    exit();
}

?>
?>