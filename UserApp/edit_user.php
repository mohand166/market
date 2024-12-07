<?php
include_once('db.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $con->prepare("SELECT * FROM users WHERE ID = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        die("User not found.");
    }
} else {
    die("Invalid request.");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $mobile = trim($_POST['mobile']);
    $password = trim($_POST['password']);

    if (empty($name) || empty($email) || empty($mobile) || empty($password)) {
        die("All fields are required.");
    }

    $stmt = $con->prepare("UPDATE users SET Name = ?, Email = ?, Mobile = ?, Password = ? WHERE ID = ?");
    $stmt->bind_param("ssssi", $name, $email, $mobile, $password, $id);

    if ($stmt->execute()) {
        header("Location: index.php?action=edit");
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
    <title>Edit User</title>
</head>
<body>
<div class="container">
    <div class="wrapper p-5 m-5">
        <h2>Edit User</h2>
        <form action="edit_user.php?id=<?php echo $id; ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user['Name']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['Email']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="mobile" class="form-label">Mobile</label>
                <input type="tel" class="form-control" id="mobile" name="mobile" value="<?php echo $user['Mobile']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $user['Password']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary" name="update" value="update">Update</button>
        </form>
    </div>
</div>
<script src="js/bootstrap.min.js"></script>
<script src="js/icons.js"></script>
<script>feather.replace();</script>
</body>
</html>
