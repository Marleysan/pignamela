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
    <!--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>-->    
    <a class="navbar-ASF" href="http://localhost/home">AweSomeFit</a>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-left">
        <li><a href="http://localhost/browse/openmen" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'">Men</a></li>
        <li><a href="http://localhost/browse/openwomen" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'">Women</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
     <?php if(isset($_SESSION["user_id"])) {
        echo "<li><a href=\"http://localhost/profile/open_profile\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#AAAAAA'\" onmouseout=\"this.style.color='#FFFFFF'\">Profile</a></li>";
    }
      else {
        echo "<li><a href=\"http://localhost/login\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#AAAAAA'\" onmouseout=\"this.style.color='#FFFFFF'\">Login</a></li>";
      }
    ?>
     
      <li><a href="http://localhost/cart" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'"><i class="glyphicon glyphicon-shopping-cart"></i></a></li>
    </ul>
  </div>
</nav>
  
  <h1 style="text-align: center; color: #2F2F2F; margin: 50px;">shopping cart</h1>
  
  
  <?php foreach ($cart_elements as $element): ?>
  
  <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 70%; margin: 10px auto;">
    <div class="panel-body" style="height: 110px;">
     
     <img src="assets/img/Knit.png" style="height: 80px;">
     <label style="margin: 30px;">Knit</label>
     <button type="submit" class="btn btn-primary" style="float: right; margin: 25px;">Remove</button>
     <input type="number" style="float: right; width: 50px; margin: 30px;">
     
   </div>
 </div>
  
  <?php endforeach; ?>
  
  
  
 
 
 
 
 
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