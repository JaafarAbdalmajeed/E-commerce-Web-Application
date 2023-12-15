<?php
include ("globals.php");

// Database credentials
$host = 'localhost';
$dbname = 'e-commerce';
$user = 'root';
$password = '';
session_start();

class Database
{
    public $pdo;

    public function __construct($host, $dbname, $user, $password)
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function getColumn($tbl, $col, $id)
    {
        $query = "SELECT $col as col FROM $tbl WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row['col'];
    }

    public function getTableList($tbl)
    {
        $array = array();
        $query = "SELECT * FROM $tbl ORDER BY id DESC";
        $stmt = $this->pdo->query($query);

        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            $array[] = $row;
        }

        return $array;
    }
    public function get_info($table,$id) {
    
        $query = "SELECT * from $table where id = :id";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
        return $row;
    }
    public function check_existance($sql) {
    
        try {
            $stmt =  $this->pdo->prepare($sql);
            $stmt->execute();
            $num_rows = $stmt->rowCount();
    
            return ($num_rows == 0) ? false : true;
        } catch (PDOException $e) {
            // Handle the exception as needed, for example, log or display an error message
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
    
    public function get_record($sql) {
        global $database; // Assuming $database is an instance of your Database class
    
        try {
            $stmt =  $this->pdo->prepare($sql);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
            return $row;
        } catch (PDOException $e) {
            // Handle the exception as needed, for example, log or display an error message
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
    public function upload_img($file_org_name, $file_tmp_name)
    {
        $target_dir = PROJECT_ROOT . "img/";
        $file_name = basename($file_org_name);
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $target_file_name = uniqid(PROJECT_NAME, true) . '.' . $ext;
        $target_file = $target_dir . $target_file_name;

        move_uploaded_file($file_tmp_name, $target_file);
        return $target_file_name;
    }
    public function get_file_extension($file_org_name)
    {
        $file_name = basename($file_org_name);
        $ext = pathinfo($file_name, PATHINFO_EXTENSION);

        if ($ext == 'pdf') {
            return "pdf.png";
        }

        if ($ext == 'docx' || $ext == 'doc') {
            return "word.png";
        }

        if ($ext == 'xlsx' || $ext == 'xls') {
            return "excel.png";
        }

        if ($ext == 'png' || $ext == 'jpg' || $ext == 'jpeg' || $ext == 'gif') {
            return $file_org_name;
        }
    }
    public function get_SpecificList($tbl, $colWhere, $value)
{
    $array = array();
    $check = $this->pdo->query("SHOW COLUMNS FROM $tbl LIKE 'isDeleted'");
    $exists = ($check->rowCount()) ? " AND isDeleted IN (0, 1) " : "";
    $query = "SELECT * FROM $tbl WHERE $colWhere = :value $exists";
    
    try {
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
            $array[] = $row;
        }
    } catch (PDOException $e) {
        // Handle the exception as needed, for example, log or display an error message
        echo "Error: " . $e->getMessage();
    }

    

    return $array;
}

    public function getProduct() {

        $query = "SELECT * from products";
    
        $statementProducts = $this->pdo->prepare($query);
        $statementProducts->execute();
    
        $resultsProduct = $statementProducts->fetchAll(PDO::FETCH_ASSOC);
    
        return $resultsProduct;
    }

}
// Example usage
$database = new Database('localhost', 'e-commerce', 'root', '');

// $id = 1;
// $columnValue = $database->getColumn('your_table', 'your_column', $id);
// echo "Column Value: $columnValue";

// $tableList = $database->getTableList('your_table');
// print_r($tableList);

// Example usage of upload_img function
// $file_org_name = $_FILES["file"]["name"];
// $file_tmp_name = $_FILES["file"]["tmp_name"];
// $uploadedFileName = $database->upload_img($file_org_name, $file_tmp_name);
// echo "Uploaded File Name: $uploadedFileName";

// Example usage of get_file_extension function
// $file_org_name = "example.pdf";
// $fileExtension = $database->get_file_extension($file_org_name);
// echo "File Extension: $fileExtension";
?>
