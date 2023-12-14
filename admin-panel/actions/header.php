<?php

include('../../includes/connect.php');

$name = isset($_POST['name']) ? str_replace("'", "\'", $_POST['name']) : '';
$summary = isset($_POST['summary']) ? str_replace("'", "\'", $_POST['summary']) : '';
$job = isset($_POST['job']) ? str_replace("'", "\'", $_POST['job']) : '';
$profession = isset($_POST['profession']) ? str_replace("'", "\'", $_POST['profession']) : '';

$photoName = isset($_FILES["photo"]["name"]) ? $_FILES["photo"]["name"] : '';
// $photo = isset($_FILES["photo"]["tmp_name"]) ? file_get_contents($_FILES["photo"]["tmp_name"]) : '';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : null;
$file_org_name = $_FILES["photo"]["name"];
$file_tmp_name = $_FILES["photo"]["tmp_name"];

if($_FILES["photo"]["size"] != 0){
    $photo= $database->upload_img($file_org_name, $file_tmp_name);	
} 
$file_org_name_cv = $_FILES["cv"]["name"];
$file_tmp_name_cv = $_FILES["cv"]["tmp_name"];


if($_FILES["cv"]["size"] != 0){
    $cv= $database->upload_img($file_org_name_cv, $file_tmp_name_cv);	
} 
if (isset($_POST['add'])) {
    $insertEmployee = "INSERT INTO header (`name`, `summary`, `job`, `photo`, `user_id`,`profession`,`cv`) VALUES (:name, :summary, :job, :photo, :user_id, :profession, :cv)";

    try {
       
        $stmt = $database->pdo->prepare($insertEmployee);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':summary', $summary, PDO::PARAM_STR);
        $stmt->bindParam(':job', $job, PDO::PARAM_STR);
        $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':profession', $profession, PDO::PARAM_STR);
        $stmt->bindParam(':cv', $cv, PDO::PARAM_STR);

        $sqlSuccess = $stmt->execute();

        // if ($sqlSuccess) {
        //     // Move the uploaded file to a permanent location
            
        //     $uploadDir = '../img/';
        //     $uploadedFile = $uploadDir . basename($photoName);

        //     $fileMoveSuccess = move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadedFile);

        //     if ($fileMoveSuccess) {
        //         echo "Photo uploaded and employee added successfully!";
        //         $_SESSION['success_add'] = 1;
        //     } else {
        //         echo "Error moving the uploaded file.";
        //         $_SESSION['error'] = 1;
        //     }
        // } else {
        //     echo "Error adding employee. SQL Error: " . print_r($stmt->errorInfo(), true);
        //     $_SESSION['error'] = 1;
        // }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }
} elseif (isset($_POST['update'])) {
    $id = isset($_POST['primaryId']) ? $_POST['primaryId'] : '';

    // Update query
    $updateEmployee = "UPDATE header SET name = :name, summary = :summary, job = :job, photo = :photo, user_id = :user_id, profession = :profession, cv = :cv WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($updateEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':summary', $summary, PDO::PARAM_STR);
        $stmt->bindParam(':job', $job, PDO::PARAM_STR);
        if($_FILES["photo"]["size"] != 0){

        $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
        }
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':profession', $profession, PDO::PARAM_STR);
        if($_FILES["cv"]["size"] != 0){

        $stmt->bindParam(':cv', $cv, PDO::PARAM_STR);
        }

        $sqlSuccess = $stmt->execute();

        // if ($sqlSuccess) {
        //     // Move the uploaded file to a permanent location
        //     $uploadDir = '../img/';
        //     $uploadedFile = $uploadDir . basename($photoName);

        //     $fileMoveSuccess = move_uploaded_file($_FILES["photo"]["tmp_name"], $uploadedFile);

        //     if ($fileMoveSuccess) {
        //         echo "Photo uploaded and employee updated successfully!";
        //         $_SESSION['success_update'] = 1;
        //     } else {
        //         echo "Error moving the uploaded file.";
        //         $_SESSION['error'] = 1;
        //     }
        // } else {
        //     echo "Error updating employee. SQL Error: " . print_r($stmt->errorInfo(), true);
        //     $_SESSION['error'] = 1;
        // }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }
} elseif (isset($_POST['delete'])) {
    // Delete query
    $deleteEmployee = "DELETE FROM header WHERE id = :id";

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
