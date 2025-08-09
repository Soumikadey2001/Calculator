<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Student Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Student List</h2>
    <a href="add.php" class="btn btn-primary mb-3">Add New Student</a>
    <table class="table table-bordered">
        <tr>
            <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Course</th><th>Actions</th>
        </tr>
        <?php
        // DB থেকে সব রো পাচ্ছি
        $result = $conn->query("SELECT * FROM students");
        if($result && $result->num_rows > 0){
            while($row = $result->fetch_assoc()):
        ?>
        <tr>
            <td><?= htmlspecialchars($row['id']); ?></td>
            <td><?= htmlspecialchars($row['name']); ?></td>
            <td><?= htmlspecialchars($row['email']); ?></td>
            <td><?= htmlspecialchars($row['phone']); ?></td>
            <td><?= htmlspecialchars($row['course']); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php
            endwhile;
        } else {
            echo "<tr><td colspan='6' class='text-center'>No students found</td></tr>";
        }
        ?>
    </table>
</div>
</body>
</html>