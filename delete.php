<?php
include('dbconn.php');

if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM tblcapstone WHERE id=:id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    try {
        $stmt->execute();
        header("Location: index.php");
        exit;
    } catch(PDOException $e) {
        echo "Error deleting record: " . $e->getMessage();
    }
}
?>
