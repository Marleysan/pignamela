<!DOCTYPE html>


<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Home</title>
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
  
  <div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">

      <a href="men.php">
        <button id="eyewear_button" style="background-image: url('img/Eyewear.png'); width: 100%; height: 600px;"></button>
      </a>
    </div>
    
    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
      <a href="women.php">
        <button id="promotion_button" style="background-image: url('img/Promotions.png'); width: 100%; height: 600px;"></button>
      </a>
    </div>

  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>