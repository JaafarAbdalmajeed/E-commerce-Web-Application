<?php 

$host = 'localhost';
$dbname = 'e-commerce';
$user = 'root';
$password = '';
 try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
} catch (PDOException $e) {
   // echo "Connection failed: " . $e->getMessage();
}

/*
if($_POST){
echo "sdds";
function validate($data){
    $data=trim($data);
    $data=stripcslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}
$email=validate($_POST['email']);
$password=validate($_POST['password']);

if (empty($email) || empty($password)) {
    header("Location: checkout.php?error=Email and password are required");
    exit();
}else{
    //echo "valid input";
    header("Location: checkoutlog.php");
    $stm="SELECT * FROM customers WHERE email=? AND password=?";
    $sql=$pdo->prepare($stm);
    $sql->execute(array($email,$password));
    $control=$sql->fetch(PDO::FETCH_OBJ);
    if($control>0){
        header("Location: confirmation.php");
    }

}


}
else{
    

}

*/

if ($_SERVER["REQUEST_METHOD"] == "POST"  && isset($_POST['submit'])) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        if ($_POST['email'] == "" || $_POST['password'] == "") {
            header("Location: checkout.php?error=Email and password are required");
           // exit();
        } else {
            $email = strip_tags(trim($_POST['email']));
            $password = strip_tags(trim($_POST['password']));
            $stm = "SELECT * FROM customers WHERE email=? AND password=?";
            $sql = $pdo->prepare($stm);
            $sql->execute(array($email, $password));
            $control = $sql->fetch(PDO::FETCH_OBJ);
            if ($control) {
                header("Location: confirmation.php");
                exit();
            } else {
                header("Location: checkout.php?error=Email or password are not correct");
               // exit();
            }
        }
    }
}


?>