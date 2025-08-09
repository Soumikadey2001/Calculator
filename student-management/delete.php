<?php
include 'db.php';

if(!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];
$sql = "DELETE FROM students WHERE id=$id";
if($conn->query($sql) === TRUE){
    header("Location: index.php");
    exit;
} else {
    echo "Error deleting record: " . $conn->error;
}
?>