<?php 
$connection=mysqli_connect("localhost","root","","agrofine");
//this implies that the connection configuration is imported here

if (isset($_POST['register'])){
  //isset-> if the submit button is run or is active, it does a post function

  $firstname= $_POST['firstname'];
  $secondname= $_POST['secondname'];
  $username= $_POST['username'];
  $email= $_POST['email'];
  $password= $_POST['password'];
  $cpassword=$_POST['cpassword'];
  $hash=md5($password);

  
//checking email existence
$sql = "SELECT * FROM credentials WHERE email='$email'";

     $result = mysqli_query($connection,$sql);

     if(mysqli_num_rows($result)>0)
     {
        $existserr = "There is already a user with that email address!";
     }
     else{
      if ($password === $cpassword){
          //if there is a match in the password field,we should run a sql query to add them to the db
      
          $register_query = "INSERT INTO credentials (firstname,secondname,username, email,password) VALUES ('$firstname','$secondname','$username','$email','$hash')";
      
          $addition= mysqli_query($connection,$register_query);
      
          if($addition){
            header("location:login.php");

          }else{
           $regerr ="Data not entered correctly";
          }
      
      
        }else{
          $passworderr = "Password did not match!";
        }
      }
     
      
       
     }





?>

<!DOCTYPE html>
<html lang="en">
    <?php
    include 'constants/header.php'; 
    ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="jquery-3.6.0.js"></script>
<style>
    body{
        background-image: url("two.jpg");
        background-repeat: no-repeat;
        background-size: cover;
    }
    body::after{
    content: "";
    width: 100%;
    height: 100%;
    position:absolute;
    top: 0;
    left:0;
    background-color: rgba(21, 20, 51, 0.6);
    z-index: -1;
 }
  .form-control:focus{
    outline: none!important;
    box-shadow: none!important;
  }
 .card{
    background-color: #ffffff78;
 }
 .form-control,.form-control:focus{
    background:none!important;
 }
 .btn-change{
    background-color: #343a40;
    color: white;

 }
 .btn-change:hover{
    background-color: black;
    color: #ffc107;
 }
 a{
     color: black;
 }
 a:hover{
     color:  #fff;
 }
</style>
</head>

<body>
<div class="container mt-2 mb-2">
    <div class="card mx-auto" style="width: 25rem">
        <div class="card-header bg-dark text-center rounded-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" fill="currentColor" class="bi bi-person-circle " viewBox="0 0 16 16">
         <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
             <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
        </svg>
            <h5 class="text-white ">Register</h5>

        </div>
        <div class="card-body text-black">
        <?php
      //if a certain error exists,it should echo the error
      if(isset($passworderr)){
        echo $passworderr;
      }
      if(isset($existserr)){
        echo $existserr;
      }
      
      if(isset($regerr)){
        echo $regerr;
      }
      ?>
            <form action="register.php" method="post">
            <div class="form-floating mb-2">
                <input type="text" name="firstname" id="first" required placeholder="Enter first name" class="form-control border-0 border-bottom border-dark rounded-0">
                <label for="first" class="form-label">FirstName</label>
            </div>
            <div class="form-floating mb-2">
            <input type="text" name="secondname" id="second" required placeholder="Enter second name" class="form-control border-0 border-bottom border-dark rounded-0">
            <label for="second" class="form-label">SecondName</label>

            </div>
            <div class="form-floating mb-2">
            <input type="text" name="username" id="username" required placeholder="Enter user name" class="form-control border-0 border-bottom border-dark rounded-0">
            <label for="username" class="form-label">UserName</label>

            </div>
            <div class="form-floating mb-2">
            <input type="email" name="email" id="email" required placeholder="Enter email address" class="form-control border-0 border-bottom border-dark rounded-0">
            <label for="email" class="form-label">Email Address</label>

            </div>
            <div class="form-floating mb-2">
            <input type="password" name="password" id="password" required placeholder="Enter password" class="form-control border-0 border-bottom border-dark rounded-0">
            <label for="password" class="form-label">Password</label>


            </div>
            <div class="form-floating mb-2">
            <input type="password" name="cpassword" id="cpassword" required placeholder="Confirm Password" class="form-control border-0 border-bottom border-dark rounded-0">
            <label for="password" class="form-label">Confirm Password</label>
            </div>
            <div class="text-center">
                <input type="submit" id="register" value="Register" name="register" class="btn btn-dark btn-change mx-auto">
            </div>
            <div class="text-center">
                <p>Already have an Account? <a href="login.php">Login Here</a>
</p>

            </div>

            </form>
            
        </div>
    </div>

</div>
   
</body>
<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="js/bootstrap.bundle.min.js"></script>
</html>
<?php
require 'constants/footer.php';
 ?>