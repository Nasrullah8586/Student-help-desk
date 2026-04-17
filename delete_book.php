<?php
include 'config.php';
$id = $_GET['id'];

$sql = "DELETE FROM books WHERE book_id='$id'";

if($conn->query($sql)) {
    header("Location: index.php");
} else {
    echo "Error: " . $conn->error;
}
?>