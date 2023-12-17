<?php

include('../../includes/connect.php');
$name = str_replace("'", "\'", $_POST['name']);

$user_id =  $_SESSION['user_id'];

$id = isset($_POST['primaryId']) ? $_POST['primaryId'] : null;
$file_org_name = $_FILES["image"]["name"];
$file_tmp_name = $_FILES["image"]["tmp_name"];

 
if (isset($_POST['add'])) {
    if($_FILES["image"]["size"] != 0){
        $image= $database->upload_img($file_org_name, $file_tmp_name);	
    }
    $insertEmployee = "INSERT INTO categories (`name`, `user_id`, `image`) VALUES (:name, :user_id, :image)";
    try {
        $stmt = $database->pdo->prepare($insertEmployee);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmt->execute();

        echo "Added successfully!";
        $_SESSION['success_add'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }

} elseif (isset($_POST['update'])) {
// echo $id;
// die;
    // Update query
    $updateEmployee = "UPDATE categories SET name = :name, user_id = :user_id WHERE id = :id";

    if($_FILES["image"]["size"] != 0){
        $image= $database->upload_img($file_org_name, $file_tmp_name);	
        $updateEmployee = "UPDATE categories SET name = :name, user_id = :user_id, image = :image WHERE id = :id";

    }
    try {
        $stmt = $database->pdo->prepare($updateEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        if($_FILES["image"]["size"] != 0){

            $stmt->bindParam(':image', $image, PDO::PARAM_STR);
            }
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

        $stmt->execute();
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        echo "Updated successfully!";
        $_SESSION['success_update'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }
// die;

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
