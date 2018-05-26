<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Article</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="http://localhost/assets/css/global.css">
</head>

<body>
    
<div class="topnav" id="myTopnav">
    <a href="http://localhost/browse/openmen">Men</a>
    <a href="http://localhost/browse/openwomen">Women</a>
    <a href="http://localhost/home">AweSomeFit</a>
    <input type="text" class="form-control" name="search" style="width: 200px; height: 30px;" placeholder="search"/>
    <a href="http://localhost/cart" style="float: right;">cart</a>
    <?php if(isset($_SESSION["user_id"])) {
        echo "<a href=\"http://localhost/profile/open_profile\" style=\"float: right;\">Profile</a>";
    }
      else {
        echo "<a href=\"http://localhost/login\" style=\"float: right;\">Login</a>";
      }
    ?>
  </div>
   
   <?php foreach ($products as $product_item): ?>
       
        <div class="row" style="margin-left: 200px; margin-right: 200px; margin-top: 15px; text-align: center; background-color: #EFEFEF;">
         
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="float: left;">
           <img src="http://localhost/assets/img/products/<?php echo $product_item['product_id']; ?>.png" style="width: 50%; float: " alt="knit">
           </div>
           
           
           <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="float: right; margin-right:50px;">
            <h1><?php echo $product_item['product_name']; ?>
            <br><small><?php echo '€ ' . $product_item['product_price']; ?></small></h1>
            </div>
            
           <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="float: right; text-align: center;">
            
              <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
               <select class="form-control" name="size" style="width: 40%; height: 30px;">
                <option selected>-- Size --</option>
                <option>XS</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
            </select>
            </div>
            
            <div>
            <label style="margin-left: 2px;">Quantity: X</label>
        </div>
      
       <div style="width: 100px;">
        
         <a href="http://localhost/cart"><button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button></a>
    
           </div>
            </div>
        
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="float: right; margin-right:80px;"><h3>Description</h3><label style="margin-top: 0px; color: gray;"><?php echo $product_item['product_description']; ?></label>
            </div>
            
        </div>
    <?php endforeach; ?>
    
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>