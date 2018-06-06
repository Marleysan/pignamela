<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Article</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/global.css">
</head>

<body>
    
<nav class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>   
    <a class="navbar-ASF" href="<?php echo base_url(); ?>home">AweSomeFit</a>
  </div>
  <div class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-left">
        <li><a href="<?php echo base_url(); ?>browse/openmen" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'">Men</a></li>
        <li><a href="<?php echo base_url(); ?>browse/openwomen" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'">Women</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
     
     <?php
        if(isset($_SESSION["user_id"])) {
        echo "<li><a href=\"".base_url()."profile/open_profile\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#AAAAAA'\" onmouseout=\"this.style.color='#FFFFFF'\"><i class=\"glyphicon glyphicon-user\"></i>  Profile</a></li>";
    }
      else {
        echo "<li><a href=\"".base_url()."login\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#AAAAAA'\" onmouseout=\"this.style.color='#FFFFFF'\">login  <i class=\"glyphicon glyphicon-log-in\"></i></a></li>";
      }
    ?>
     
      <li><a href="<?php echo base_url(); ?>cart/open_cart" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'"><i class="glyphicon glyphicon-shopping-cart"></i></a></li>
    </ul>
  </div>
</nav>
   
   <?php foreach ($products as $product_item): ?>
       
        <div class="row" style="margin-left: 200px; margin-right: 200px; margin-top: 15px; text-align: center; background-color: #EFEFEF;">
         
          <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="float: left;">
           <img src="<?php echo base_url(); ?>assets/img/products/<?php echo $product_item['product_id']; ?>.png" style="width: 50%; float: ">
           </div>
           
           
           <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="float: right; margin-right:50px;">
            <h1><?php echo $product_item['product_name']; ?>
            <br><small><?php echo '€ ' . $product_item['product_price']; ?></small></h1>
            </div>
            <form action="<?php echo base_url(); ?>cart/add_to_cart/<?php echo $product_item['product_id']; ?>" method="POST">
           <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="float: right; text-align: center;">
            
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
              
              <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                  
               <select class="form-control" name="size" style="width: 100%; height: 30px;" onchange="setQuantity(this)">
                <option selected>-- Size --</option> 
                <?php 
                foreach ($details as $detail_item):
                    echo "<option>" . $detail_item['detail_size'] . "</option>";
                endforeach;?>
                
                </select>
              </div>
            
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                
            <a href="<?php echo base_url(); ?>cart">
            <button type="submit" class="btn btn-primary" style="width: 100%;">Add to Cart</button>
            </a>
            </div>
            </div>
            
            
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="float: right; margin-right:50px;">
            <label id="quantity" style="margin: 15px;">N° of available items: undefined</label>
            </div>
            </div>
            </form>
            
        
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="float: right; margin-right:80px;"><h3><u>Description</u></h3><label style="margin-top: 0px; color: gray;"><?php echo $product_item['product_description']; ?></label>
            </div>
            
        </div>
    <?php endforeach; ?>
   
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <script>
        
        var quantities = new Array();
        
       <?php foreach ($details as $detail_item): ?>
        quantities['<?php echo $detail_item['detail_size'] ?>'] = <?php echo $detail_item['detail_quantity'] ?>           
        <?php  endforeach;?>
            
        function setQuantity(selectObject) {
            document.getElementById("quantity").innerHTML = "N° of available items: " + quantities[selectObject.value];
        }

    </script>
</body>

</html>