<?php

include('../../includes/connect.php');

$name = isset($_POST['name']) ? str_replace("'", "\'", $_POST['name']) : '';
$description = isset($_POST['description']) ? str_replace("'", "\'", $_POST['description']) : '';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : null;
$file_org_name = $_FILES["image"]["name"];
$file_tmp_name = $_FILES["image"]["tmp_name"];

if($_FILES["image"]["size"] != 0){
    $image= $database->upload_img($file_org_name, $file_tmp_name);	
} 

if (isset($_POST['add'])) {
    $insertEmployee = "INSERT INTO projects (`name`, `description`, `image`, `user_id`) VALUES (:name, :description, :image, :user_id)";

    try {
       
        $stmt = $database->pdo->prepare($insertEmployee);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        
        $sqlSuccess = $stmt->execute();

       
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }
} elseif (isset($_POST['update'])) {
    $id = isset($_POST['primaryId']) ? $_POST['primaryId'] : '';

    // Update query
    $updateEmployee = "UPDATE projects SET name = :name, description = :description, image = :image, user_id = :user_id WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($updateEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        if($_FILES["image"]["size"] != 0){

        $stmt->bindParam(':image', $image, PDO::PARAM_STR);
        }
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        

        $sqlSuccess = $stmt->execute();

       
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }
} elseif (isset($_POST['delete'])) {
    // Delete query
    $deleteEmployee = "DELETE FROM projects WHERE id = :id";

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
// die;
// Close the connection
$database->pdo = null;
header("location:" . $_SERVER['HTTP_REFERER']);
?>
