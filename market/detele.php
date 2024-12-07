<?php
include ('config.php');


 $ID = $_GET['id'];


mysqli_query($conn,"DELETE FROM shopme WHERE id=$ID");

header('location: prod.php');


?>