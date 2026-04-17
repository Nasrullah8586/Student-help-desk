<?php
include 'config.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $donor_id = $_POST['donor_id'];
    $book_title = $_POST['book_title'];
    $author = $_POST['author'];
    $edition = $_POST['edition'];
    $course_code = $_POST['course_code'];
    $book_condition = $_POST['book_condition'];
    
    $sql = "INSERT INTO books (donor_id, book_title, author, edition, course_code, book_condition) 
            VALUES ('$donor_id', '$book_title', '$author', '$edition', '$course_code', '$book_condition')";
    
    if($conn->query($sql)) {
        header("Location: index.php?msg=success");
    } else {
        echo "Error: " . $conn->error;
    }
}

$users = $conn->query("SELECT user_id, full_name FROM users");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Add New Book</h1>
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="add_book.php">Add Book</a>
        <a href="requests.php">Requests</a>
        <a href="users.php">Users</a>
    </div>
    
    <form method="POST">
        <label>Donor Name:</label>
        <select name="donor_id" required>
            <option value="">Select Donor</option>
            <?php while($user = $users->fetch_assoc()): ?>
            <option value="<?php echo $user['user_id']; ?>">
                <?php echo $user['full_name']; ?>
            </option>
            <?php endwhile; ?>
        </select>
        
        <label>Book Title:</label>
        <input type="text" name="book_title" required>
        
        <label>Author:</label>
        <input type="text" name="author">
        
        <label>Edition:</label>
        <input type="text" name="edition">
        
        <label>Course Code:</label>
        <input type="text" name="course_code">
        
        <label>Condition:</label>
        <select name="book_condition">
            <option value="new">New</option>
            <option value="good">Good</option>
            <option value="average">Average</option>
            <option value="old">Old</option>
        </select>
        
        <button type="submit">Add Book</button>
    </form>
</div>
</body>
</html>