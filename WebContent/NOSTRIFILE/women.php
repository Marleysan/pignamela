<!DOCTYPE html>


<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Men</title>
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
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
        <img src="img/Women.png" style="width: 100%;" alt="men_cover">
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
            <select class="form-control" name="sport" style="width: 100%; height: 30px;">
                <option selected>-- Size --</option>
                <option>XS</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
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
    
    <!-- Di questi ne vengono creati dinamicamente uno per ogni articolo nel DB -->
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin: 10px;">
        <img src="img/Knit.png" style="width: 100%;" alt="knit"><br>
        <label>Knit</label>
        <label style="float: right;">€ 99.95</label>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin: 10px;">
        <img src="img/Sunglasses.png" style="width: 100%;" alt="knit"><br>
        <label>Sunglasses</label>
        <label style="float: right;">€ 129.95</label>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin: 10px;">
        <img src="img/sweatpants.png" style="width: 100%;" alt="knit"><br>
        <label>Sweatpants</label>
        <label style="float: right;">€ 89.95</label>
    </div>
    
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>