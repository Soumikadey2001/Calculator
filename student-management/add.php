<?php include 'db.php'; ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ইনপুট সুরক্ষিতভাবে নেয়া (basic escaping)
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $course = $conn->real_escape_string($_POST["course"]);

    // ইনসার্ট করে
    $sql = "INSERT INTO students (name, email, phone, course) VALUES ('$name', '$email', '$phone', '$course')";
    if($conn->query($sql) === TRUE){
        header("Location: index.php");
        exit; // header পরে exit দেওয়া ভালো প্রব্লেম এড়াতে
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add Student</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Add New Student</h2>
    <form method="POST">
        <input type="text" name="name" placeholder="Name" class="form-control mb-2" required>
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <input type="text" name="phone" placeholder="Phone" class="form-control mb-2" required>
        <input type="text" name="course" placeholder="Course" class="form-control mb-2" required>
        <button type="submit" class="btn btn-success">Add Student</button>
    </form>
</div>
</body>
</html>