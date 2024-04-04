<?php
include('dbconn.php');

// Fetch all capstones from the database
$stmt = $conn->prepare("SELECT * FROM tblcapstone");
$stmt->execute();
$capstones = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>