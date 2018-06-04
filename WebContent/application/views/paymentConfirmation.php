<!DOCTYPE html>


<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Confirmation</title>
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
  
  <h1 style="text-align: center; color: #2F2F2F; margin: 50px;">Your order</h1>
  
  <form action="http://localhost/cart/proceed_order" method="post">
  
  <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 80%; margin: 10px auto;">
    <div class="panel-body">
     
     <div class="row" style="margin: auto;">
       
       <?php 
         if ($address != FALSE){
             echo "<input type=\"radio\" id=\"old\" name=\"address\" onchange = \"setRadio()\"> <b>Last used:</b> ";
             echo $address['address_street'] . ", " . $address['address_civic_number'] . ", " . $address['address_city'] . ", " . $address['address_zip'] . ", " . $address['address_state'];
         }
         ?>
       
     </div>
     
     <div class="row" style="margin: auto; margin-top: 5px;">
       <input type="radio" name="address" id="new" onchange = "setRadio()" checked> New Address <br>
       
       <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" style="margin-bottom: 3px; margin-top: 5px;">
         <input class="form-control" type="text" name="street" id="street" maxlength="45" placeholder="Street" required />
       </div>
       
       <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1" style="margin-bottom: 3px; margin-top: 5px;">
         <input class="form-control" type="number" min='1' name="civicNumber" id="civicNumber" maxlength="8" placeholder="N°" required/>
       </div>
       
       <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="margin-bottom: 3px; margin-top: 5px;">
         <input class="form-control" type="text" name="city" id="city" maxlength="45" placeholder="City" required />
       </div>
       
       <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="margin-bottom: 3px; margin-top: 5px;">
         <input class="form-control" type="number" name="cap" id="cap" maxlength="5" placeholder="CAP" required />
       </div>
       
       <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="margin-bottom: 3px; margin-top: 5px;">
         <input class="form-control" type="text" name="state" id="state" maxlength="45" placeholder="State" required />
       </div>
       
     </div>
   </div>
 </div>
 
 <?php foreach ($elements as $element): ?>
  
  <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 80%; margin: 10px auto;">
    <div class="panel-body" style="height: 110px;">
     
     
     <img src="http://localhost/assets/img/products/<?php echo $element['product_id']; ?>.png" style="height: 80px;">
     <label style="margin: 30px;"><?php echo $element['product_name']; ?></label>
     <label style="margin: 30px;">Size: <?php echo $element['detail_size']; ?></label>
     <label style="margin: 30px;">€ <?php echo $element['product_price']; ?></label>
     
     <label style="margin: 30px;"><b>Quantity: </b><?php echo $element['element_quantity']; ?></label>

     <?php
        if ($element['detail_quantity'] < $element['element_quantity']) {
            echo "<label style=\"margin: 30px; color:red;\">Attention: only ".$element['detail_quantity']." available</label>";
        }
     ?>
     
     <a href="http://localhost/cart/remove_element/<?php echo $element['element_detail_id']?>">
        <button class="btn btn-primary" style="float: right; margin: 25px;">Remove</button>
     </a>
     
   </div>
 </div>
  
  <?php 
    $sum += $element['product_price'] * $element['element_quantity'];
    endforeach; ?>
  
<div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 80%; margin: 10px auto;">
  <div class="panel-body">
   
   
    <label style="margin: 30px;">Subtotal</label>
    <label>€ <?php echo $sum?></label><br>
    <label style="margin-left: 30px;">Shipping</label>
    <label style="color: #35C94A">Free</label><br>
    <label style="margin-left: 30px; color: #919191">Shipping is possible to an address of your chosing.</label><br>
    <label style="margin-left: 30px;">Total</label>
    <label>€ <?php echo $sum?></label><br>
    
  </div>
</div>

<!-- aggiungere un popup con il successo dell'ordine e poi va a index.php -->
<button type="submit" class="btn btn-primary" style="float: right;    margin-right: 145px;">Confirm</button>
</form>

<a href="http://localhost/cart/open_cart"><button type="submit" class="btn btn-primary" style="float: right; margin-right: 25px;">Abort</button></a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>
   function setRadio(){
       if (document.getElementById("old").checked == true){
            
           document.getElementById("street").value = "";
           document.getElementById("civicNumber").value = "";
           document.getElementById("city").value = "";
           document.getElementById("cap").value = "";
           document.getElementById("state").value = "";
           
           document.getElementById("street").disabled = true;
           document.getElementById("civicNumber").disabled = true;
           document.getElementById("city").disabled = true;
           document.getElementById("cap").disabled = true;
           document.getElementById("state").disabled = true;
           
           document.getElementById("street").required = false;
           document.getElementById("civicNumber").required = false;
           document.getElementById("city").required = false;
           document.getElementById("cap").required = false;
           document.getElementById("state").required = false;
           
       } else {
           document.getElementById("street").disabled = false;
           document.getElementById("civicNumber").disabled = false;
           document.getElementById("city").disabled = false;
           document.getElementById("cap").disabled = false;
           document.getElementById("state").disabled = false;
           
           document.getElementById("street").required = true;
           document.getElementById("civicNumber").required = true;
           document.getElementById("city").required = true;
           document.getElementById("cap").required = true;
           document.getElementById("state").required = true;
           
       }
       
   }
    </script>

</body>

</html>