<?php
include 'config.php';
$book_id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $requester_id = $_POST['requester_id'];
    $return_date = $_POST['return_date'];
    
    $sql = "INSERT INTO book_requests (book_id, requester_id, return_date) 
            VALUES ('$book_id', '$requester_id', '$return_date')";
    
    if($conn->query($sql)) {
        $conn->query("UPDATE books SET status='borrowed' WHERE book_id='$book_id'");
        header("Location: index.php?msg=request_sent");
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
    <title>Request Book</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Request Book</h1>
    <div class="nav">
        <a href="index.php">Back to Home</a>
    </div>
    
    <form method="POST">
        <label>Your Name:</label>
        <select name="requester_id" required>
            <option value="">Select Your Name</option>
            <?php while($user = $users->fetch_assoc()): ?>
            <option value="<?php echo $user['user_id']; ?>">
                <?php echo $user['full_name']; ?>
            </option>
            <?php endwhile; ?>
        </select>
        
        <label>Return Date:</label>
        <input type="date" name="return_date" required>
        
        <button type="submit">Send Request</button>
    </form>
</div>
</body>
</html>