<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
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
     
     <?php if(isset($_SESSION["user_id"])) {
        echo "<li><a href=\"http://localhost/profile/open_profile\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#AAAAAA'\" onmouseout=\"this.style.color='#FFFFFF'\"><i class=\"glyphicon glyphicon-user\"></i>  <u>Profile</u></a></li>";
    }
      else {
        echo "<li><a href=\"http://localhost/login\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#AAAAAA'\" onmouseout=\"this.style.color='#FFFFFF'\">login  <i class=\"glyphicon glyphicon-log-in\"></i></a></li>";
      }
    ?>
     
      <li><a href="http://localhost/cart/open_cart" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'"><i class="glyphicon glyphicon-shopping-cart"></i></a></li>
    </ul>
  </div>
</nav>
<?php
        if (!empty($error)) {
            echo '<script language="javascript">';
            echo 'alert("'.$error.'")';
            echo '</script>';
        }
    ?>
  <div class="row" style="width: 23%; margin: 0 auto; margin-top: 20px;">
    <h1 style="text-align: center;"><?php echo $profile_data['customer_firstname'];
        echo "  " . $profile_data['customer_lastname'];?></h1>
    <div class="row" >
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <form action="http://localhost/profile/logout">
          <button type="submit" class="btn btn-primary" style="width: 100%;">Logout</button>
        </form>
      </div>
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <a href="http://localhost/profile/modify_password"><button type="submit" class="btn btn-primary" style="width: 150px;">Change Password</button></a>
      </div>
    </div>
  </div>
 
  <!-- Gray division bar -->
  <div class="row" style="margin: 0 auto; margin-top: 30px; width: 60%; border:1px solid #D7D7D7;">
  </div>
  
  <div class="row">
    <h6 style="text-align: center;">PAST ORDERS</h6>
  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>