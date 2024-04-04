<?php
include('dbconn.php');

if(isset($_POST['submit']) && isset($_POST['action']) && $_POST['action'] === 'add') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date_pub = $_POST['date_pub'];
    $abstract = $_POST['abstract'];

    $sql = "INSERT INTO tblcapstone (title, author, date_published, abstract) VALUES (:title, :author, :date_pub, :abstract)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':date_pub', $date_pub);
    $stmt->bindParam(':abstract', $abstract);

    try {
        $stmt->execute();
        header("Location: index.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
