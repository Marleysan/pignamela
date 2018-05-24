<!DOCTYPE html>


<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cart</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <link rel="stylesheet" href="global.css">
</head>

<body>
  
  <div class="topnav" id="myTopnav">
    <a href="men.php">Men</a>
    <a href="women.php">Women</a>
    <a href="index.php">AweSomeFit</a>
    <input type="text" class="form-control" name="search" style="width: 200px; height: 30px;" placeholder="search"/>
    <a href="cart.php" style="float: right;">cart</a>
    <a href="profile.php" style="float: right;">Profile</a>
    <!-- <?php echo "<a href=\"profile.php\" id=\"userBar\" style=\"float: right;\">" . $name . "</a>"; ?> -->
  </div>
  
  <h1 style="text-align: center; color: #2F2F2F; margin: 50px;">shopping cart</h1>
  
  <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 70%; margin: 10px auto;">
    <div class="panel-body" style="height: 110px;">
     
     <img src="img/Knit.png" style="height: 80px;">
     <label style="margin: 30px;">Knit</label>
     <button type="submit" class="btn btn-primary" style="float: right; margin: 25px;">Remove</button>
     <input type="number" style="float: right; width: 50px; margin: 30px;">
     
   </div>
 </div>
 
 <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 70%; margin: 10px auto;">
  <div class="panel-body">
   
   
    <label style="margin: 30px;">Subtotal</label>
    <label>€ xxx.xx</label><br>
    <label style="margin-left: 30px;">Shipping</label>
    <label style="color: #35C94A">Free</label><br>
    <!-- mettere un if con soglia per free <label>€ 3.50</label><br> -->
    <label style="margin-left: 30px; color: #919191">Shipping is possible to an address of your chosing.</label><br>
    <label style="margin-left: 30px;">Total</label>
    <label>€ xxx.xx</label><br>
    
  </div>
</div>

<a href="index.php"><label style="margin-left: 250px;">Continue shopping</label></a>
<a href="paymentConfirmation.php"><button type="submit" class="btn btn-primary" style="float: right; margin-right: 250px;">proceeed</button></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>