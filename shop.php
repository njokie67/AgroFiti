<?php
session_start();
error_reporting(0);
include 'constants/header.php'; 
$connection=mysqli_connect("localhost","root","","agrofine");
if (isset($_POST['add'])) {
    if(isset($_SESSION['cart'])) {
        $session_array_id=array_column($_SESSION['cart'],"id");
        if (!in_array($_GET['id'],$session_array_id))  {
            $session_array=array(
                'id' => $_GET['id'],
                "itemname" => $_POST['itemname'], 
                "itemprice" => $_POST['itemprice'] 
            );
            $_SESSION['cart'][]=$session_array;        }

        
    }else{
        $session_array= array(
            'id' => $_GET['id'],
            "itemname" => $_POST['itemname'],
            "itemprice" => $_POST['itemprice'] 
        );
        $_SESSION['cart'][]=$session_array;
    }
  
}
?>
<!DOCTYPE html>
<html lang="en ">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.css" integrity="sha512-Q0DfJ+I5cbH4Wm20NlPZ/fENHil7k3ZgzI9b71LfQAB1IlM8Gt7aO7eOPX2QzYT+4fZaF6u1kSfZAHczl4r/9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />    

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<div class="container">
 <div class="col-md-12">
 <div class="row text-center py-5">
      <?php
       $query = "SELECT * FROM products";
       $result=mysqli_query($connection,$query);
      while ($row=mysqli_fetch_array($result)){?>
      <div class="col-md-3 col-sm-6 my-3 my-md-0">
          <form method="post" action="shop.php?id=<?=$row['id'] ?>">
          <div class="card shadow">    
              <div>
              <img src="<?= $row['itemimg'] ?>">
              </div>     
          
          <div class="card-body">
          <h5 class="card-title"><?=$row['itemname']; ?></h5>
          <h6>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="fas fa-star"></i>
            <i class="far fa-star"></i>
          </h6>
             <p class="card-text">example for some bit of motivation </p>
          <h5><small><s class="text-secondary"><?=$row['iteminitial']; ?></s></small>
          <span class="price"><?=number_format($row['itemprice'],2); ?></span></h5>
          <input type="hidden" name="itemname" value="<?= $row['itemname'] ?>">  
          <input type="hidden" name="itemprice" value="<?= $row['itemprice'] ?>"> 
 

          <button type="submit" class="btn btn-warning my-3" name="add">Add to Cart<i class="fas fa-shopping-cart"></i></button>
        </div>
      </div>
          
        
          </form>
      </div>
     <?php }
      ?>

 </div>
 </div>
 <div class="col-md-12">
     <div class="row">
 <h2 class="text-center">Ordered Items </h2>
     <?php
     $total=0;
    $output = "";
    $output .="
    <table class='table table-bordered table-striped'>
    <tr>
   
    <th>Item Name</th>
    <th>Item Price</th>
    <th>Total</th>
    <th>Action</th>
    </tr>
    ";	
    
   
  
    if (!empty($_SESSION['cart'])) {

        foreach ($_SESSION['cart'] as $key => $value) {
            $output .= "
            <tr>
            
            <td>".$value['itemname']."</td>
            <td>".$value['itemprice']."</td>
            <td>".number_format($value['itemprice'],2)."</td>
            <td>
            <a href='shop.php?action=remove&id=".$value['id']."'>
            <button class='btn btn-danger btn-block'>Remove</button></a>
            </td>
    
    
            </tr>
           
            
            
            ";   
            $total=$total + $value['itemprice'];    
         }
         $output .="
         <tr>
         <td colspan='1'> </td>
         <td><b>Total Price</b></td>
         <td>".number_format($total,2)."</td>
         
         </tr>
         <tr>
         <td colspan='4' class='text-center'>
         <a href='shop.php?action=removeall'>
         <button class='btn btn-block btn-warning'>Clear All</button>
         </a>
        </td></tr>
         
         ";
        
    }
    echo $output;
     ?>
     </div>
 </div>
</div>
<?php
if(isset($_GET['action'])){
    if($_GET['action'] == "removeall"){
        unset($_SESSION['cart']);
    }
    if ($_GET['action']=="remove") {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['id']==$_GET['id']) {
                unset($_SESSION['cart'][$key]);
            }
            
        }
       
    }
}
?>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

