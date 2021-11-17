<?php
session_start();
?>

<style>
  .nav-item span{
    display: flex;
    place-items: center;
    /* padding-left: 11px; */
  }
</style>

<nav class="navbar navbar-expand-lg sticky-top bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">
        <h3 class="text-warning">AgroFiti</h3>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CONTACTS</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.php">SHOP</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link" href="weather.php">WEATHER</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">CHATROOM</a>
        </li>
        
        
        <?php
        if(isset($_SESSION['username'])){
            
          echo "
          <li class='nav-item dropdown'>
          <span>
          <i class='fas fa-user-circle' style='color:white; margin:5px;'></i>
          <a class='nav-link dropdown-toggle' href='#' id='navbarDropDown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>" .$_SESSION['username']. " </a>
          <ul class='dropdown-menu' aria-labelledby='navbarDropdown'>
              
              <li><a class='dropdown-item' href='logout.php'>Log Out</a></li>
            </ul>
          </span>
          </li>
          ";
          
        }
        else{
            echo '
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              ACCOUNT
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="login.php">LOGIN</a></li>
              <li><a class="dropdown-item" href="register.php">MY ACCOUNT</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="shop.php">orders</a></li>
            </ul>
          </li>
  
            
            ';
        }
        ?>
       

        
        </li>
      
  </div>
</nav>