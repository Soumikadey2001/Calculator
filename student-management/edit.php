<?php include 'db.php'; ?>

<?php
if(!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id']; 


$student = $conn->query("SELECT * FROM students WHERE id = $id")->fetch_assoc();

if (!$student) {
    echo "Student not found";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $course = $conn->real_escape_string($_POST["course"]);

    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone', course='$course' WHERE id=$id";
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Edit Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Student</h2>
    <form method="POST">
        <input type="text" name="name" value="<?= htmlspecialchars($student['name']); ?>" class="form-control mb-2" required>
        <input type="email" name="email" value="<?= htmlspecialchars($student['email']); ?>" class="form-control mb-2" required>
        <input type="text" name="phone" value="<?= htmlspecialchars($student['phone']); ?>" class="form-control mb-2" required>
        <input type="text" name="course" value="<?= htmlspecialchars($student['course']); ?>" class="form-control mb-2" required>
        <button type="submit" class="btn btn-warning">Update Student</button>
    </form>
</div>
</body>

</html>
