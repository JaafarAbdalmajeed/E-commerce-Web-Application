<?php

include('../../includes/connect.php');

$summary = isset($_POST['summary']) ? str_replace("'", "\'", $_POST['summary']) : '';
$skills = isset($_POST['skills']) ? str_replace("'", "\'", $_POST['skills']) : '';
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
$id = isset($_POST['id']) ? $_POST['id'] : null;
$file_org_name = $_FILES["photo"]["name"];
$file_tmp_name = $_FILES["photo"]["tmp_name"];

if($_FILES["photo"]["size"] != 0){
    $photo= $database->upload_img($file_org_name, $file_tmp_name);	
} 

if (isset($_POST['add'])) {
    $insertEmployee = "INSERT INTO about ( `summary`, `photo`, `user_id`) VALUES (:summary, :photo, :user_id)";

    try {
       
        $stmt = $database->pdo->prepare($insertEmployee);
        $stmt->bindParam(':summary', $summary, PDO::PARAM_STR);
        $stmt->bindParam(':photo', $photo, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
       

        $sqlSuccess = $stmt->execute();
        $lastInsertedId = $database->pdo->lastInsertId();
        if ($sqlSuccess) {
            // Insert the skills related to the about section
            $insertEmployeeSkills = "INSERT INTO skills ( `name`, `related_id`) VALUES (:name, :related_id)";
            $stmt = $database->pdo->prepare($insertEmployeeSkills);
            foreach ($skills as $skill) {
                // Bind parameters
                $stmt->bindParam(':name', $skill, PDO::PARAM_STR);
                $stmt->bindParam(':related_id', $lastInsertedId, PDO::PARAM_INT);
            
                // Execute the query
                $stmt->execute();
            }
          
        } else {
            echo "Error adding employee. SQL Error: " . print_r($stmt->errorInfo(), true);
            $_SESSION['error'] = 1;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }
} elseif (isset($_POST['update'])) {
    $id = isset($_POST['primaryId']) ? $_POST['primaryId'] : '';

    // Update query
    $updateEmployee = "UPDATE about SET name = :name, summary = :summary, job = :job, photo = :photo, user_id = :user_id, profession = :profession, cv = :cv WHERE id = :id";

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
    $deleteEmployee = "DELETE FROM about WHERE id = :id";

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
