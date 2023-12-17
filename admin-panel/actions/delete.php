<?php
include('../../includes/connect.php');

$id =$_POST['id'];
// var_dump($id);
// die;
$tbl =$_POST['table_name'];
if(isset($_POST['delete'])) {
    $deleteEmployee = "DELETE FROM $tbl WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($deleteEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        echo " Deleted successfully!";
        $_SESSION['success_delete'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }
}
header('location: '.$_SERVER['HTTP_REFERER']);

?>