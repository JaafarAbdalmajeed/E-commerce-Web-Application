<?php

include('../../includes/connect.php');
$job = str_replace("'", "\'", $_POST['job']);
$employer = str_replace("'", "\'", $_POST['employer']);
$start_date = str_replace("'", "\'", $_POST['start_date']);
$end_date = str_replace("'", "\'", $_POST['end_date']);

$user_id =  $_SESSION['user_id'];

$id = isset($_POST['id']) ? $_POST['id'] : null;

if (isset($_POST['add'])) {
    $insertEmployee = "INSERT INTO experience (`job`, `employer`, `start_date`, `end_date`, `user_id`) VALUES (:job, :employer, :start_date, :end_date, :user_id)";
    try {
        $stmt = $database->pdo->prepare($insertEmployee);
        $stmt->bindParam(':job', $job, PDO::PARAM_STR);
        $stmt->bindParam(':employer', $employer, PDO::PARAM_STR);
        $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $end_date, PDO::PARAM_STR);

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

    // Update query
    $updateEmployee = "UPDATE experience SET job = :job, employer = :employer, start_date = :start_date, end_date = :end_date, user_id = :user_id WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($updateEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':job', $job, PDO::PARAM_STR);
        $stmt->bindParam(':employer', $employer, PDO::PARAM_STR);
        $stmt->bindParam(':start_date', $start_date, PDO::PARAM_STR);
        $stmt->bindParam(':end_date', $end_date, PDO::PARAM_STR);

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
    $deleteEmployee = "DELETE FROM experience WHERE id = :id";

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
