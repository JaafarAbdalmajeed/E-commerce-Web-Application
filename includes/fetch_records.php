<?php
include "connect.php";

$type = $_REQUEST['type'];
switch ($type){
case "List":
    $table=$_POST['Table'];
    $id = $_POST['id'];	
    $sql = "SELECT * FROM $table WHERE id = :id";
    break;

}
$stmt = $database->pdo->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode($row);

?>