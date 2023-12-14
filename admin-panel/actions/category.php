<?php

include('../../includes/connect.php');
$name = str_replace("'", "\'", $_POST['name']);

$user_id =  $_SESSION['user_id'];

$id = isset($_POST['id']) ? $_POST['id'] : null;

if (isset($_POST['add'])) {
    $insertEmployee = "INSERT INTO categories (`name`, `user_id`) VALUES (:name, :user_id)";
    try {
        $stmt = $database->pdo->prepare($insertEmployee);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
       
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmt->execute();

        echo "Employee added successfully!";
        $_SESSION['success_add'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }

} elseif (isset($_POST['update'])) {
    $id = $_POST['primaryId'];
// echo $id;
// die;
    // Update query
    $updateEmployee = "UPDATE categories SET name = :name, user_id = :user_id WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($updateEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
       
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        $stmt->execute();

        echo "Employee updated successfully!";
        $_SESSION['success_update'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }

} elseif (isset($_POST['delete'])) {
    // Delete query
    $deleteEmployee = "DELETE FROM categories WHERE id = :id";

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
