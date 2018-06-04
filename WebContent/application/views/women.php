<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Women</title>
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
        <li><a href="http://localhost/browse/openwomen" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'"><u>Women</u></a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
     <?php if(isset($_SESSION["user_id"])) {
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
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center" style="margin-bottom: 10px;">
        <img src="http://localhost/assets/img/Women.png" style="width: 100%;" alt="women_cover">
    </div>

    <div class="row" style="margin-left: auto; margin-right: auto; margin-bottom: 10px;">
        <form action="http://localhost/browse/filterwomen"  method="POST">
          
         <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
          
            <select class="form-control" name="type" style="width: 100%; height: 30px;">
               <!-- TODO mettere un metodo che non sdoppia i product type se ci sono più products dello stesso type -->
                <option selected>-- Category --</option>
                 <?php 
                foreach ($allproducts as $product): //TODO fare group by che non mi ripete due volte un cappello se ci sono due cappelli
                echo "<option>" . $product['product_type'] . "</option>";
                endforeach;?>
            </select>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <select class="form-control" name="season" style="width: 100%; height: 30px;">
                <option selected>-- Season --</option>
                <option>Spring/Summer</option>
                <option>Fall/Winter</option>
            </select>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <select class="form-control" name="price" style="width: 100%; height: 30px;">
                <option selected>-- Prize --</option>
                <!-- se cambi questi valori poi non va nulla -->
                <option>0 - 50</option>
                <option>50 - 100</option>
                <option>100 - 200</option>
                <option>200+</option>
            </select>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <button type="submit" class="btn btn-primary" style="width: 100%;">Filter</button>
        </div>
        
    </form>
</div>

<div class="row" style="margin-left: 6%; margin-right: auto;">
    
    <?php foreach ($products as $product_item): ?>
       <a href = "http://localhost/browse/visualize/<?php echo $product_item['product_id']; ?>">
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="margin: 10px;">
           <img src="http://localhost/assets/img/products/<?php echo $product_item['product_id']; ?>.png" style="width: 100%;" alt=""><br>
           
            <label><?php echo $product_item['product_name']; ?></label>
            <label style="float: right;">€ <?php echo $product_item['product_price']; ?></label>
            
        </div>
    </a>
    <?php endforeach; ?>
    <?php if (!$products) {
        echo "No products found"; //TODO
    } ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
