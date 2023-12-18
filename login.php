<?php
// Include the database connection file
include ('includes/connect.php');


// Your authentication script
$email = $_POST['email'];
$password = $_POST['password'];
$email = stripslashes($email);
$password = stripslashes($password);
$query = "SELECT * FROM customers WHERE password='$password' AND email='$email'";

if ( $database->check_existance($query)) {
    $row =  $database->get_record($query);
        // Set session variables and perform other actions
        $_SESSION['customer_id'] = $row['id'];

      

        header("location: index.php");
   
} else {
   
    header("location:login.html");
}
?>
