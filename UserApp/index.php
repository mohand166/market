<?php
include_once('db.php'); 

if (isset($_GET['action'], $_GET['id']) && $_GET['action'] === 'del') {
    $id = intval($_GET['id']);
    $stmt = $con->prepare("DELETE FROM users WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?action=del");
        exit();
    } else {
        die("Error: " . $stmt->error);
    }
    $stmt->close();
}

$all_users = $con->query("SELECT ID, Name, Email, Mobile FROM users");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/toastr.css">
    <title>Users</title>
</head>
<body>
<div class="container">
    <div class="wrapper p-5 m-5">
        <div class="d-flex p-2 justify-content-between mb-2">
            <h2>All Users</h2>
            <a href="add_user.php"><i data-feather="user-plus"></i></a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $all_users->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $user['ID']; ?></td>
                    <td><?php echo $user['Name']; ?></td>
                    <td><?php echo $user['Email']; ?></td>
                    <td><?php echo $user['Mobile']; ?></td>
                    <td>
                        <div class="d-flex justify-content-evenly">
                            <i class="text-danger" data-feather="trash-2" onclick="confirmDelete(<?php echo $user['ID']; ?>);"></i>
                            <a href="edit_user.php?id=<?php echo $user['ID']; ?>"><i class="text-success" data-feather="edit"></i></a>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script src="js/jquery.js"></script>
<script src="js/toastr.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/icons.js"></script>
<script src="js/main.js"></script>
<script>
    feather.replace();
    function confirmDelete(id) {
        if (confirm("Are you sure you want to delete this user?")) {
            window.location.href = "index.php?action=del&id=" + id;
        }
    }

    <?php if (isset($_GET['action'])): ?>
        <?php if ($_GET['action'] == 'add'): ?>
            showAddNotification();
        <?php elseif ($_GET['action'] == 'del'): ?>
            showDeleteNotification();
        <?php endif; ?>
    <?php endif; ?>
</script>
</body>
</html>
