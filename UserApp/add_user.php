<?php
include_once('db.php'); 
$name = $email = $mobile = $password = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($email) || empty($mobile) || empty($password)) {
        die("All fields are required.");
    }

    $stmt = $con->prepare("INSERT INTO users (Name, Email, Password, Mobile) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $name, $email, $password, $mobile);

    if ($stmt->execute()) {
        header("Location: index.php?action=add");
        exit();
    } else {
        die("Error: " . $stmt->error);
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Add User</title>
</head>
<body>
<div class="container">
    <div class="wrapper p-5 m-5">
        <div class="d-flex p-2 justify-content-between">
            <h2>Add User</h2>
            <a href="index.php"><i data-feather="corner-down-left"></i></a>
        </div>
        <form action="add_user.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Enter your mobile">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="btn btn-primary" name="save" value="save">Save</button>
        </form>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/icons.js"></script>
<script>feather.replace();</script>
</body>
</html>
