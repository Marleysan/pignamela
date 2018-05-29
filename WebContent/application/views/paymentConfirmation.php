<!DOCTYPE html>


<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Confirmation</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <link rel="stylesheet" href="global.css">
</head>

<body>
  
  <div class="topnav" id="myTopnav">
    <a href="http://localhost/browse/openmen">Men</a>
    <a href="http://localhost/browse/openwomen">Women</a>
    <a href="http://localhost/home">AweSomeFit</a>
    <a href="http://localhost/cart" style="float: right;"><i class="glyphicon glyphicon-shopping-cart"></i></a>
<?php if(isset($_SESSION["user_id"])) {
        echo "<a href=\"http://localhost/profile\" style=\"float: right;\">Profile</a>";
    }
      else {
        echo "<a href=\"http://localhost/login\" style=\"float: right;\">Login</a>";
      }
    ?>    <!-- <?php echo "<a href=\"profile\" id=\"userBar\" style=\"float: right;\">" . $name . "</a>"; ?> -->
  </div>
  
  
  <h1 style="text-align: center; color: #2F2F2F; margin: 50px;">Your order</h1>
  
  <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 70%; margin: 10px auto;">
    <div class="panel-body">
     
     <div class="row" style="margin: auto;">
       
       <input type="radio" name="address" checked> <b>Last used:</b> Via Druso, 5, Bolzano, 39100, Italy
       
     </div>
     
     
     <div class="row" style="margin: auto; margin-top: 5px;">
       <input type="radio" name="address"> New Address <br>
       
       <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" style="margin-bottom: 3px; margin-top: 5px;">
         <input class="form-control" type="text" name="street" id="street" maxlength="45" placeholder="Street" required />
       </div>
       
       <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1" style="margin-bottom: 3px; margin-top: 5px;">
         <input class="form-control" type="number" name="civicNumber" id="civicNumber" maxlength="8" placeholder="N°" />
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
 
 <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 70%; margin: 10px auto;">
  <div class="panel-body" style="height: 110px;">
   
   <img src="img/Knit.png" style="height: 80px;">
   <label style="margin: 30px;">Knit</label>
   <button type="submit" class="btn btn-primary" style="float: right; margin: 25px;">Remove</button>
   <label style="float: right; width: 50px; margin: 30px;">
    <b>Quantity:</b> X
  </label>
  
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

<!-- aggiungere un popup con il successo dell'ordine e poi va a index.php -->
<a href="index.php"><button type="submit" class="btn btn-primary" style="float: right; margin-right: 250px;">Confirm</button></a>

<a href="index.php"><button type="submit" class="btn btn-primary" style="float: right; margin-right: 25px;">Abort</button></a>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>