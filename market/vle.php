<?php
include ("config.php");
 $ID = $_GET["id"];
 $re = mysqli_query($conn,"SELECT * FROM shopme WHERE id=$ID");
 $dataa = mysqli_fetch_array($re);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
<style>

    input{
    display: none;
    box-shadow: 1px 1px 10px wheat; 
width: 400px;
    }
    #inbb{
      box-shadow: 1px 1px 10px wheat; 
      width: 400px;


    }
</style>

</head>
<body>

   <div class = "foo">
   <form action="car.php" method="post" enctype="multipart/form-data">

      <h1>Confirm</h1>
   <input type="text" id="inbb" name="id" value='<?php echo $dataa['id'] ?>'>
   <br>
     <input type="text"  name="fname" value='<?php echo $dataa['fname'] ?>'>
     <br>
     <input type="text" name= "price" value="<?php echo $dataa['price'] ?>">
     <br>
     <input type="file" id="file" name="image"   style="display: none;" value="<?php echo $dataa['imgs'] ?>">    <!-- الكود ده بيحذف علامه رفع ملف-->

     <button type="submit" name="mcar">تاكيد الشراء </button>
     <br>     <br>
     <br>

     <a href="user.php"> Return To Main</a>
</form>
    

   </div>

</body>
</html>