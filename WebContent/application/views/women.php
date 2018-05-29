<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Men</title>
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
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
        <img src="http://localhost/assets/img/Women.png" style="width: 100%;" alt="men_cover">
    </div>

    <div class="row" style="margin-top: 425px; margin-left: auto; margin-right: auto;">
        <form method="post" action="men.php">
          
         <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
          
            <select class="form-control" name="sport" style="width: 100%; height: 30px;">
                <option selected>-- Category --</option>
                <option>Pants</option>
                <option>Shirts</option>
                <option>Sunglasses</option>
            </select>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <select class="form-control" style="width: 100%; height: 30px;">
                <option selected>-- Color --</option>
                <option>Black</option>
                <option>Blue</option>
                <option>Gray</option>
                <option>Green</option>
                <option>Red</option>
                <option>Rose</option>
                <option>White</option>
                <option>Yellow</option>
            </select>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <select class="form-control" name="sport" style="width: 100%; height: 30px;">
                <option selected>-- Season --</option>
                <option>Spring</option>
                <option>Summer</option>
                <option>Autumn</option>
                <option>Winter</option>
            </select>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <select class="form-control" name="sport" style="width: 100%; height: 30px;">
                <option selected>-- Prize --</option>
                <option><10</option>
                <option>10 - 20</option>
                <option>20 - 30</option>
                <option>30 - 40</option>
                <option>>40</option>
            </select>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <button type="submit" class="btn btn-primary" style="width: 100%;">Filter</button>
        </div>
        
    </form>
</div>

<div class="row">
    
    <?php foreach ($products as $product_item): ?>
       <a href = "http://localhost/browse/visualize/<?php echo $product_item['product_id']; ?>">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin: 10px;">
           <img src="http://localhost/assets/img/products/<?php echo $product_item['product_id']; ?>.png" style="width: 100%;" alt="knit"><br>
           
            <label><?php echo $product_item['product_name']; ?></label>
            <label style="float: right;"><?php echo $product_item['product_price']; ?></label>
            
        </div>
    </a>
    <?php endforeach; ?>
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>