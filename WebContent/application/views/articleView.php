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
    <a href="http://localhost/profile" style="float: right;">Profile</a>
    <!-- <?php echo "<a href=\"profile\" id=\"userBar\" style=\"float: right;\">" . $name . "</a>"; ?> -->
  </div>
   
   <?php foreach ($products as $product_item): ?>
       <a href = "http://localhost/browse/visualize/<?php echo $product_item['product_id']; ?>">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin: 10px;">
           <img src="http://localhost/assets/img/products/<?php echo $product_item['product_id']; ?>.png" style="width: 100%;" alt="knit"><br>
           
            <label><?php echo $product_item['product_name']; ?></label>
            <label style="float: right;"><?php echo $product_item['product_price']; ?></label>
            <label><?php echo $product_item['product_description']; ?></label>
            
        </div>
    <?php endforeach; ?>
    
    <form action="http://localhost/cart">
         <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
    </form>
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>