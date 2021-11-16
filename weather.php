<!DOCTYPE html>
<html lang="en">
<?php
    include 'constants/header.php'; 
    ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.css" integrity="sha512-Q0DfJ+I5cbH4Wm20NlPZ/fENHil7k3ZgzI9b71LfQAB1IlM8Gt7aO7eOPX2QzYT+4fZaF6u1kSfZAHczl4r/9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />    

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/westyle.css">


    
    <script src="weather.js" defer></script>
    <style>
    body{
        background-image: url("uploads/pic.png");
        background-repeat: no-repeat;
        background-size: cover;
    }
      
    </style>
</head>

<body>
    <div class="card mx-auto mt-5">
        <div class="search">
            <input type="text" name="" class="search-bar" placeholder="Search Area" id="">
            <button class="srch"><i class="fas fa-search"></i></button>
        </div>
        <div class="weather loading">
            <h2 class="city text-white">Weather in Thika</h2>
            <div class="temp">21°C</div>
            <div class="flex">
            <img src="" alt="" class="icon">
            <div class="description">Rainy</div>

            </div>
            
            <div class="humidity">Humidity 60%</div>
            <div class="wind">Wind Speed: 6.2 km/h</div>
        </div>
    </div> <br><br>
    
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
require 'constants/footer.php';
 ?>
