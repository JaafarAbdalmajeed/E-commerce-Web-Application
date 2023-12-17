<?php

include('../../includes/connect.php');
$name = str_replace("'", "\'", $_POST['name']);
$email = str_replace("'", "\'", $_POST['email']);
$username = str_replace("'", "\'", $_POST['username']);
$password = crypt($_POST['password'], 'Portfolio');
$role_id = str_replace("'", "\'", $_POST['role_id']);

$id = isset($_POST['id']) ? $_POST['id'] : null;

if (isset($_POST['add'])) {
    $insertEmployee = "INSERT INTO users (`name`, `email`, `username`, `password`, `role_id`) VALUES (:name, :email, :username, :password, :role_id)";
    try {
        $stmt = $database->pdo->prepare($insertEmployee);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':role_id', $role_id, PDO::PARAM_STR);

        $stmt->execute();

        echo "Employee added successfully!";
        $_SESSION['success_add'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }

} elseif (isset($_POST['update'])) {
    $id = $_POST['primaryId'];

    // Update query
    $updateEmployee = "UPDATE users SET name = :name, email = :email, username = :username, role_id = :role_id WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($updateEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':role_id', $role_id, PDO::PARAM_STR);

        $stmt->execute();

        echo "Employee updated successfully!";
        $_SESSION['success_update'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }

} elseif (isset($_POST['delete'])) {
    // Delete query
    $deleteEmployee = "DELETE FROM users WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($deleteEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo "Employee deleted successfully!";
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
