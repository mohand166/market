<?php

include ('config.php');
if (isset($_POST['mcar'])) {

    $NAME  =$_POST['fname'];
    $PRICE = $_POST['price'];
    $IMG   = $_FILES['image'];
    $IMAGE_LOCATION = $_FILES['image']['tmp_name'];
    $image_name     = $_FILES['image']['name'];
    $image_up       ="immm/".$image_name;
    $mycar        = "INSERT INTO mycar (fname,price,imgs) VALUES ('$NAME','$PRICE','$image_up')";
     mysqli_query($conn,$mycar);

     if(move_uploaded_file($IMAGE_LOCATION,'immm/'.$image_name)){
        echo "<script>alert('Product Added To Cart ')</script>";

     }else{        echo "<script>alert('Product Added To Cart ')</script>";

     }
    
     header('refresh:2; url=mycar.php'); 

}




?>