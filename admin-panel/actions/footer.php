<?php

include('../../includes/connect.php');

$phone = isset($_POST['phone']) ? str_replace("'", "\'", $_POST['phone']) : '';
$email = isset($_POST['email']) ? str_replace("'", "\'", $_POST['email']) : '';
$gitHub = isset($_POST['gitHub']) ? str_replace("'", "\'", $_POST['gitHub']) : '';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : null;
$file_org_phone = $_FILES["logo"]["name"];
$file_tmp_phone = $_FILES["logo"]["tmp_name"];

if($_FILES["logo"]["size"] != 0){
    $logo= $database->upload_img($file_org_phone, $file_tmp_phone);	
} 

if (isset($_POST['add'])) {
    $insertEmployee = "INSERT INTO footer (`phone`, `email`, `logo`, `user_id`,`gitHub`) VALUES (:phone, :email, :logo, :user_id, :gitHub)";

    try {
       
        $stmt = $database->pdo->prepare($insertEmployee);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':logo', $logo, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':gitHub', $gitHub, PDO::PARAM_STR);
        
        $sqlSuccess = $stmt->execute();

       
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }
} elseif (isset($_POST['update'])) {
    $id = isset($_POST['primaryId']) ? $_POST['primaryId'] : '';

    // Update query
    $updateEmployee = "UPDATE footer SET phone = :phone, email = :email, logo = :logo, user_id = :user_id, gitHub = :gitHub WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($updateEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        if($_FILES["logo"]["size"] != 0){

        $stmt->bindParam(':logo', $logo, PDO::PARAM_STR);
        }
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':gitHub', $gitHub, PDO::PARAM_STR);


        $sqlSuccess = $stmt->execute();

       
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }
} elseif (isset($_POST['delete'])) {
    // Delete query
    $deleteEmployee = "DELETE FROM footer WHERE id = :id";

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
