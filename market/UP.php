<?php
include ('config.php');
if (isset($_POST['up'])) {
    $ID=$_POST['id'];
    $NAME  =$_POST['fname'];
    $PRICE = $_POST['price'];
    $IMG   = $_FILES['image'];
    $IMAGE_LOCATION = $_FILES['image']['tmp_name'];
    $image_name     = $_FILES['image']['name'];
    $image_up       ="immm/".$image_name;
    $update  ="UPDATE shopme SET fname='$NAME',price='$PRICE',imgs='$image_up' WHERE id=$ID";
     mysqli_query($conn,$update);
     if(move_uploaded_file($IMAGE_LOCATION,'immm/'.$image_name)){
    
        echo "<script>alert('تم رفع الملف بنجاح')</script>";

     }else{        echo "<script>alert('تم رفع الملف بنجاح')</script>";

     }
     header('refresh:1; url=prod.php'); 
}



?>