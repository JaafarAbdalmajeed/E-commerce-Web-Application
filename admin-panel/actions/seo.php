<?php

include('../../includes/connect.php');
$title = str_replace("'", "\'", $_POST['title']);
$email = str_replace("'", "\'", $_POST['email']);
$description = str_replace("'", "\'", $_POST['description']);
$keywords = str_replace("'", "\'", $_POST['keywords']);
$tags = str_replace("'", "\'", $_POST['tags']);
$linkedin = str_replace("'", "\'", $_POST['linkedin']);
$profession = str_replace("'", "\'", $_POST['profession']);
$author = str_replace("'", "\'", $_POST['author']);
$twitter = str_replace("'", "\'", $_POST['twitter']);
$user_id=$_SESSION['user_id'];
$id = isset($_POST['id']) ? $_POST['id'] : null;
// echo $twitter;
// die;
if (isset($_POST['add'])) {
    $insertEmployee = "INSERT INTO user_meta_tags (`title`, `email`, `description`, `keywords`, `tags`, `linkedin`, `profession`, `author`,`twitter`,`user_id`) VALUES (:title, :email, :description, :keywords, :tags, :linkedin, :profession, :author,:twitter,:user_id)";
    try {
        $stmt = $database->pdo->prepare($insertEmployee);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':keywords', $keywords, PDO::PARAM_STR);
        $stmt->bindParam(':tags', $tags, PDO::PARAM_STR);
        $stmt->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
        $stmt->bindParam(':profession', $profession, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->bindParam(':twitter', $twitter, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        
        $stmt->execute();

        echo "Added successfully!";
        $_SESSION['success_add'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }

} elseif (isset($_POST['update'])) {
    $id = $_POST['primaryId'];

    // Update query
    $updateEmployee = "UPDATE user_meta_tags SET title = :title, email = :email, description = :description, keywords = :keywords, tags = :tags, linkedin = :linkedin, profession = :profession, author = :author, twitter= :twitter, user_id= :user_id WHERE id = :id";

    try {
        $stmt = $database->pdo->prepare($updateEmployee);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':title', $title, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->bindParam(':keywords', $keywords, PDO::PARAM_STR);
        $stmt->bindParam(':tags', $tags, PDO::PARAM_STR);
        $stmt->bindParam(':linkedin', $linkedin, PDO::PARAM_STR);
        $stmt->bindParam(':profession', $profession, PDO::PARAM_STR);
        $stmt->bindParam(':author', $author, PDO::PARAM_STR);
        $stmt->bindParam(':twitter', $twitter, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_STR);

        $stmt->execute();

        echo "Updated successfully!";
        $_SESSION['success_update'] = 1;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        $_SESSION['error'] = 1;
    }

} elseif (isset($_POST['delete'])) {
    // Delete query
    $deleteEmployee = "DELETE FROM user_meta_tags WHERE id = :id";

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
