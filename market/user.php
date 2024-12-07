<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Jaro:opsz@6..72&family=Oswald:wght@200..700&family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">

   
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&family=Parkinsans:wght@300..800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   <style>

.card{
    float: right;
    margin-top: 10px;
    padding: 5px;
    margin-left: 10px;
}
.card img{
    width: 100%;
    height: 200px;
}
.navbarc{
    color:red;
    margin: 10px;
    padding: 5px;
}



   </style>
</head>
<body>
<nav class = "navbar navbar-red bg-dark">
    <a class="navbarc" href="mycar.php">mycar</a>
</nav>
<h1 class="p">All Products Are Available </h1>

<?php
include ('config.php');
$reback= mysqli_query($conn ,"SELECT * FROM shopme");
while($row = mysqli_fetch_array($reback)){
    echo"
    
    <center>

    <main>
    
    <div class='card' style='width: 18rem;'>
    <img src='$row[imgs]' class='card-img-top'>
      <div class='card-body'>
        <h5 class='card-title'>$row[fname]</h5>
        <p class='card-text'>$row[price]</p>
        <a href='vle.php? id=$row[id]' class='btn btn-success'>Add Product To</a>
    
    </div>
    </div>
    
    
    </main>
    </center>";
    }


?>
 




</body>
</html>