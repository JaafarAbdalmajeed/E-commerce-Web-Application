<?php
include "../includes/connect.php";
if(session_destroy()) // Destroying All Sessions
{
    header("Location:login.php"); // Redirecting To Home Page
}
?>