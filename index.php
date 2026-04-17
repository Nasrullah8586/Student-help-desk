<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Help Desk - Book Bank</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <h1>Student Help Desk - Book Bank</h1>
    
    <<div class="nav">
        <a href="index.php">Home</a>
        <a href="add_book.php">Add New Book</a>
        <a href="requests.php">Request List</a>
        <a href="users.php">Users</a>
    </div>

    <div class="search-box">
        <form method="GET">
            <input type="text" name="search" placeholder="Search by book title or author..." 
                   value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <h2>Available Books</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Title</th>
                <th>Author</th>
                <th>Edition</th>
                <th>Course Code</th>
                <th>Condition</th>
                <th>Donor Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        if($search != '') {
            $sql = "SELECT books.*, users.full_name as donor_name 
                    FROM books 
                    JOIN users ON books.donor_id = users.user_id 
                    WHERE books.book_title LIKE '%$search%' 
                    OR books.author LIKE '%$search%'";
        } else {
            $sql = "SELECT books.*, users.full_name as donor_name 
                    FROM books 
                    JOIN users ON books.donor_id = users.user_id 
                    ORDER BY books.created_at DESC";
        }
        
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>{$row['book_id']}</td>";
                echo "<td>{$row['book_title']}</td>";
                echo "<td>{$row['author']}</td>";
                echo "<td>{$row['edition']}</td>";
                echo "<td>{$row['course_code']}</td>";
                echo "<td>{$row['book_condition']}</td>";
                echo "<td>{$row['donor_name']}</td>";
                echo "<td>{$row['status']}</td>";
                echo "<td>";
                if($row['status'] == 'available') {
                    echo "<a href='request_book.php?id={$row['book_id']}' class='btn btn-request'>Request</a>";
                }
                echo "<a href='edit_book.php?id={$row['book_id']}' class='btn btn-edit'>Edit</a>";
                echo "<a href='delete_book.php?id={$row['book_id']}' class='btn btn-delete' onclick='return confirm(\"Delete this book?\")'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9' style='text-align:center'>No books found</td></tr>";
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>