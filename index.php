<?php
include("config.php");

if (isset($_POST["submit"])) {
    $name =  $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $img = $_FILES['img']['name'];
 
    
  
    move_uploaded_file($_FILES['img']['tmp_name'], "upload/" . $img);

    $sql = "INSERT INTO students (name, age, email, img) VALUES ('$name', '$age', '$email', '$img')";

    if (mysqli_query($conn, $sql)) {
        echo "Record added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<h1>Add Student Data</h1>
<a href="show.php" class="btn btn-warning">View Records</a>

<form action="index.php" method="POST" enctype="multipart/form-data">
    <label for="name">Name:</label>
    <input type="text" name="name" required><br><br>

    <label for="age">Age:</label>
    <input type="number" name="age" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" required><br><br>

    <label for="img">Image:</label>
    <input type="file" name="img" required><br><br>

    <button type="submit" name="submit">Submit</button>
</form>

</body>
</html>
