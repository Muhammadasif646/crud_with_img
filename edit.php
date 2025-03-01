<?php
include("config.php");
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $que = "SELECT * FROM `students` WHERE id=$id";
    $res = mysqli_query($conn, $que);
    $row = mysqli_fetch_assoc($res);
}
if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    $qu = "UPDATE `students` SET `name`='$name', `age`='$age', `email`='$email' WHERE id=$id";
    $res = mysqli_query($conn, $qu);
    if ($res) {
        header("Location: show.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Data</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<h1>Edit Student Data</h1>
<a href="index.php" class="btn btn-warning">View Records</a>
<form action="" method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>

    <label for="age">Age:</label>
    <input type="number" name="age" value="<?php echo $row['age']; ?>" required><br><br>

    <label for="email">Email:</label>
    <input type="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>

    <button type="submit" name="submit">Submit</button>
</form>
</body>
</html>
