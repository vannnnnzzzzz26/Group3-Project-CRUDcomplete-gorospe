<?php
include('dbconn.php');


// Fetch capstone data based on the edit ID
$stmt = $conn->prepare("SELECT * FROM tblcapstone WHERE id=:edit_id");
$stmt->bindParam(':edit_id', $edit_id);
$stmt->execute();
$capstone = $stmt->fetch(PDO::FETCH_ASSOC);

// Handle form submission for editing
if(isset($_POST['submit']) && isset($_POST['action']) && $_POST['action'] === 'edit') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $date_pub = $_POST['date_pub'];
    $abstract = $_POST['abstract'];
    $id = $_POST['edit_id'];

    $sql = "UPDATE tblcapstone SET title=:title, author=:author, date_published=:date_pub, abstract=:abstract WHERE id=:id";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':date_pub', $date_pub);
    $stmt->bindParam(':abstract', $abstract);
    $stmt->bindParam(':id', $id);

    try {
        $stmt->execute();
        header("Location: index.php");
        exit;
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>