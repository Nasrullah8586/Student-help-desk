<?php
include 'config.php';

// ইউজার ডিলিট
if(isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM users WHERE user_id='$id'");
    header("Location: users.php");
}

// ইউজার ইনসার্ট
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_user'])) {
    $student_id = $_POST['student_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $session = $_POST['session'];
    
    $sql = "INSERT INTO users (student_id, full_name, email, phone, department, session) 
            VALUES ('$student_id', '$full_name', '$email', '$phone', '$department', '$session')";
    
    if($conn->query($sql)) {
        header("Location: users.php");
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User List - Student Help Desk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>👥 User List</h1>
    
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="add_book.php">Add Book</a>
        <a href="requests.php">Requests</a>
        <a href="users.php">Users</a>
    </div>

    <h2>Add New User</h2>
    <form method="POST">
        <input type="text" name="student_id" placeholder="Student ID" required>
        <input type="text" name="full_name" placeholder="Full Name" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="text" name="phone" placeholder="Phone">
        <input type="text" name="department" placeholder="Department">
        <input type="text" name="session" placeholder="Session (e.g., 2022-23)">
        <button type="submit" name="add_user">Add User</button>
    </form>

    <?php if(isset($error)) echo "<div class='error'>$error</div>"; ?>

    <h2>All Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Student ID</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Session</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM users ORDER BY user_id DESC");
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['user_id']}</td>";
                echo "<td>{$row['student_id']}</td>";
                echo "<td>{$row['full_name']}</td>";
                echo "<td>{$row['email']}</td>";
                echo "<td>{$row['phone']}</td>";
                echo "<td>{$row['department']}</td>";
                echo "<td>{$row['session']}</td>";
                echo "<td>";
                echo "<a href='users.php?delete={$row['user_id']}' class='btn btn-delete' onclick='return confirm(\"Delete this user?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8' style='text-align:center'>No users found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>