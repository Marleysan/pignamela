<!DOCTYPE html>

<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cart</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <link rel="stylesheet" href="http://localhost/assets/css/global.css">
</head>

<body>
  
 <nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      </button>
    <a class="navbar-ASF" href="http://localhost/home">AweSomeFit</a>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-left">
        <li><a href="http://localhost/browse/openmen" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'">Men</a></li>
        <li><a href="http://localhost/browse/openwomen" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'">Women</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
     <?php 
        $sum = 0;
        if(isset($_SESSION["user_id"])) {
        echo "<li><a href=\"http://localhost/profile/open_profile\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#AAAAAA'\" onmouseout=\"this.style.color='#FFFFFF'\"><i class=\"glyphicon glyphicon-user\"></i>  Profile</a></li>";
    }
      else {
        echo "<li><a href=\"http://localhost/login\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#AAAAAA'\" onmouseout=\"this.style.color='#FFFFFF'\">login  <i class=\"glyphicon glyphicon-log-in\"></i></a></li>";
      }
    ?>
     
      <li><a href="http://localhost/cart/open_cart" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'"><i class="glyphicon glyphicon-shopping-cart"></i></a></li>
    </ul>
  </div>
</nav>
  
  <h1 style="text-align: center; color: #2F2F2F; margin: 50px;">shopping cart</h1>
  
  
  <?php foreach ($elements as $element): ?>
  
  <!-- qui dentro TODO fare i big lavorini -->
  <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 70%; margin: 10px auto;">
    <div class="panel-body" style="height: 110px;">
     
     <form action="http://localhost/cart/update_element/" method="POST">
     <img src="http://localhost/assets/img/products/<?php echo $element['product_id']; ?>.png" style="height: 80px;">
     <label style="margin: 30px;"><?php echo $element['product_name']; ?></label>
     <label style="margin: 30px;"><?php echo $element['detail_size']; ?></label>
     <label style="margin: 30px;"><?php echo $element['product_price']; ?></label>
     
     
     <input type="number" value="<?php echo $element['element_quantity']?>" style="float: right; width: 50px; margin: 30px;">
     <button type="submit" class="btn btn-primary" style="float: right; margin: 25px;">Update Quantity</button>
     </form> 
     
     <a href="http://localhost/cart/remove_element/<?php echo $element['element_detail_id']?>">
         <button class="btn btn-primary" style="float: right; margin: 25px;">Remove</button>
     </a>
     
        
    
     
   </div>
 </div>
  
  <?php 
    $sum += $element['product_price'] * $element['element_quantity'];
    
    endforeach; ?>
  
  
  
 
 
 
 
 
 <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 70%; margin: 10px auto;">
  <div class="panel-body">
   
   
    <label style="margin: 30px;">Subtotal</label>
    <label>€ <?php echo $sum?></label><br>
    <label style="margin-left: 30px;">Shipping</label>
    <label style="color: #35C94A">Free</label><br>
    <!-- mettere un if con soglia per free <label>€ 3.50</label><br> -->
    <label style="margin-left: 30px; color: #919191">Shipping is possible to an address of your chosing.</label><br>
    <label style="margin-left: 30px;">Total</label>
    <label>€ <?php echo $sum?></label><br>
    
  </div>
</div>

<a href="index.php"><label style="margin-left: 250px;">Continue shopping</label></a> <!-- TODO implementare -->
<a href="paymentConfirmation.php"><button type="submit" class="btn btn-primary" style="float: right; margin-right: 250px;">proceeed</button></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>