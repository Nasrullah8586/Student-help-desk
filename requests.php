<?php
include 'config.php';

if(isset($_GET['approve'])) {
    $id = $_GET['approve'];
    $conn->query("UPDATE book_requests SET status='approved' WHERE request_id='$id'");
    header("Location: requests.php");
}

if(isset($_GET['return'])) {
    $id = $_GET['return'];
    $conn->query("UPDATE book_requests SET status='returned' WHERE request_id='$id'");
    
    $req = $conn->query("SELECT book_id FROM book_requests WHERE request_id='$id'");
    $row = $req->fetch_assoc();
    $conn->query("UPDATE books SET status='available' WHERE book_id='{$row['book_id']}'");
    header("Location: requests.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Request List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Book Request List</h1>
    <div class="nav">
        <a href="index.php">Home</a>
        <a href="add_book.php">Add Book</a>
        <a href="requests.php">Requests</a>
        <a href="users.php">Users</a>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>Book Title</th>
                <th>Requester Name</th>
                <th>Request Date</th>
                <th>Return Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT br.*, b.book_title, u.full_name as requester_name 
                FROM book_requests br
                JOIN books b ON br.book_id = b.book_id
                JOIN users u ON br.requester_id = u.user_id
                ORDER BY br.request_date DESC";
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['book_title']}</td>";
                echo "<td>{$row['requester_name']}</td>";
                echo "<td>{$row['request_date']}</td>";
                echo "<td>{$row['return_date']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>";
                if($row['status'] == 'pending') {
                    echo "<a href='requests.php?approve={$row['request_id']}' class='btn btn-approve'>Approve</a>";
                }
                if($row['status'] == 'approved') {
                    echo "<a href='requests.php?return={$row['request_id']}' class='btn btn-return'>Return</a>";
                }
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' style='text-align:center'>No requests found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>