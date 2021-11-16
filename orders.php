<!DOCTYPE html>
<html lang="en">
    <?php
    session_start();
    include 'constants/header.php'; 
    $connection=mysqli_connect("localhost","root","","agrofine");
    if (isset($_POST['remove'])) {
        if ($_GET['action']=='remove') {
            foreach($_SESSION['cart'] as $key => $value){
                if ($value["itemid"]==$_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                    echo "<script>alert('Product has been removed')</script>";
                    echo "<script>window.location='orders.php'</script>";
                }
            }
        }
    }

    ?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.css" integrity="sha512-Q0DfJ+I5cbH4Wm20NlPZ/fENHil7k3ZgzI9b71LfQAB1IlM8Gt7aO7eOPX2QzYT+4fZaF6u1kSfZAHczl4r/9Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />    

    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
<body>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-7">
            <div class="shopping">
                <h6>My orders</h6>
                <hr>
                <?php
                $total=0;
                if (isset($_SESSION['cart'])) {
                    $itemid=array_column($_SESSION['cart'],'itemid');
                    $query="SELECT * FROM products";
                    $result=mysqli_query($connection,$query);
                    while ($row=mysqli_fetch_assoc($result)) {
                        foreach($itemid as $id){
                            if ($row['id']==$id) {
                                while ($row=mysqli_fetch_array($result)) {?>
                                <form method="post" action="orders.php?action=remove&id=<?=$row['id'] ?>">
                                <div class="border rounded">
                                    <div class="row bg-white">
                                        <div class="col-md-3">
                                        <img src="<?= $row['itemimg'] ?>">

                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="pt-2"><?=$row['itemname']; ?></h5>
                                            <small class="text-secondary">Seller: dailytuition</small><br>
                                            <span class="price"><?=($row['itemprice']);?></span></h5><br><br>
                                            <button type="submit" class="btn btn-warning">Save for later</button>
                                            <button type="submit" name="remove"  class="btn btn-danger">Remove</button>

                                        </div>

                                    </div>
                            
                                </div>


                                </form>
                               <?php }
                            }
                           
                        }
                    }
                    
                }else{
                    echo "<h5>You do not have any orders yet</h5>";
                }
                ?>
            </div>

        </div>
        <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
            <div class="pt-4">
                <h6>PRICE DETAILS</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                       <?php
                            if (isset($_SESSION['cart'])) {
                                $count_item=count($_SESSION['cart']);
                                echo "<h6>Price($count_item items)</h6>";
                            }else{
                                echo "<h6>Price(0 items)</h6>";
 
                            }
                       ?>
                       <h6>Delivery Charges</h6>
                       <hr>
                       <h6>Amount Payable</h6>

                    </div>
                    <div class="col-md-6">
                        <h6><?php echo number_format($total,2); ?></h6>
                        <h6 class="text-success">FREE</h6>
                        <hr>
                        <h6>Kshs</h6>
                        

                    </div>

                </div>
                
            </div>

        </div>
    </div>
</div>
    
  <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
require 'constants/footer.php';
 ?>

