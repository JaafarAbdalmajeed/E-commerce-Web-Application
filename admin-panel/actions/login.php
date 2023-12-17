<?php
// Include the database connection file
include ('../../includes/connect.php');


// Your authentication script
$username = $_POST['username'];
$password = $_POST['password'];
$username = stripslashes($username);
$password = stripslashes($password);
$pass =  crypt($password, 'Portfolio');
$query = "SELECT * FROM users WHERE password='$pass' AND username='$username'";

if ( $database->check_existance($query)) {
    $row =  $database->get_record($query);
        // Set session variables and perform other actions
        $_SESSION['user_id'] = $row['id'];

        $_SESSION['name'] = $row['name'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['roleId'] = $row['role_id'];
        $_SESSION['in_login'] = 1;

      

        header("location: ../index.php");
   
} else {
    $_SESSION['no_user'] = 1;
    header("location:../login.php");
}
?>
