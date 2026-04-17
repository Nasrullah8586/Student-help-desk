<?php
include 'config.php';
$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $course_code = $_POST['course_code'];
    $book_condition = $_POST['book_condition'];
    
    $sql = "UPDATE books SET book_title='$book_title', author='$author', 
            edition='$edition', course_code='$course_code', book_condition='$book_condition' 
            WHERE book_id='$id'";
    
    if($conn->query($sql)) {
        header("Location: index.php");
    }
}

$result = $conn->query("SELECT * FROM books WHERE book_id='$id'");
$book = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Edit Book</h1>
    <div class="nav">
        <a href="index.php">Back to Home</a>
    </div>
    
    <form method="POST">
        <label>Book Title:</label>
        <input type="text" name="book_title" value="<?php echo $book['book_title']; ?>" required>
        
        <label>Author:</label>
        <input type="text" name="author" value="<?php echo $book['author']; ?>">
        
        <label>Edition:</label>
        <input type="text" name="edition" value="<?php echo $book['edition']; ?>">
        
        <label>Course Code:</label>
        <input type="text" name="course_code" value="<?php echo $book['course_code']; ?>">
        
        <label>Condition:</label>
        <select name="book_condition">
            <option value="new" <?php echo $book['book_condition']=='new'?'selected':''; ?>>New</option>
            <option value="good" <?php echo $book['book_condition']=='good'?'selected':''; ?>>Good</option>
            <option value="average" <?php echo $book['book_condition']=='average'?'selected':''; ?>>Average</option>
            <option value="old" <?php echo $book['book_condition']=='old'?'selected':''; ?>>Old</option>
        </select>
        
        <button type="submit">Update Book</button>
    </form>
</div>
</body>
</html>