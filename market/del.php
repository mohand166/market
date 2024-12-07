<?php

include("config.php");
if (isset($_GET['id'])) {
    $ID =$_GET['id'];
    mysqli_query($conn, "DELETE FROM mycar WHERE id=$ID");
    echo "<script>alert('Uploaded Done  ')</script>";
} else {
    echo "لم يتم توفير معرف ID في الرابط.";
}
header("location:user.php")
?>