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

	<div class="topnav" id="myTopnav">
    <a href="http://localhost/browse/openmen">Men</a>
    <a href="http://localhost/browse/openwomen">Women</a>
    <a href="http://localhost/home" style="margin-left: 25%;">AweSomeFit</a> <!-- display: flex; justify-content: center -->
    <a href="http://localhost/cart" style="float: right;"><i class="glyphicon glyphicon-shopping-cart"></i></a>
    
<?php if(isset($_SESSION["user_id"])) {
        echo "<a href=\"http://localhost/profile/open_profile\" style=\"float: right;\">Profile</a>";
    }
      else {
        echo "<a href=\"http://localhost/login\" style=\"float: right;\">Login</a>";
      }
    ?>
    
  </div>
    <form action="http://localhost/register/change_password" method="POST">

  <div class="row" style="width: 23%; margin: 0 auto; margin-top: 20px;">
   <label name="firstname" hidden><?php echo $profile_data['costumer_firstname'];?></label>
   <label name="lastname" hidden><?php echo $profile_data['costumer_lastname'];?></label>
    <h1 style="text-align: center;"><?php echo $profile_data['costumer_firstname'];
        echo "  " . $profile_data['costumer_lastname'];?></h1>
    <div class="row" > <!--style="width:85%; margin:0 auto;">-->
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center;">
          <button type="submit" class="btn btn-primary" style="width: 50%;">Save</button>
      </div>
    </div>
  </div>

  <!-- Gray division bar -->
  <div class="row" style="margin: 0 auto; margin-top: 30px; width: 60%; border:1px solid #D7D7D7;">
  </div>
  
  <div class="row">
    <h6 style="text-align: center;">PERSONAL INFORMATION</h6>
  </div>

  <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 70%; margin: 10px auto;">
    <div class="panel-body">
      <form method="POST" action="create.php">
   
   <div class="row">
         
         <h3 style="text-align: center;">Change your password:
             <br><small>Remember that regularly changing your password enhence your profile security,</small><br><small> thus protecting your personal data!!</small></h3>
          </div>
   
   <div class="row" style="margin-top: 15px;">
    <!-- Password -->
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form-group">
     <label>Password:</label>
     <input class="form-control" type="password" name="password" minlength="8" maxlength="20" placeholder="Password" style="width: 370px;" required/>
   </div>
 
  <!-- Confirm Password -->
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form-group">
   <label>Confirm Password:</label>
   <input class="form-control" type="password" name="cpassword" minlength="8" maxlength="20" placeholder="Confirm password" style="width: 370px;" required/>
 </div>
 </div>
</form>
</div>
</div>
    </form>
   
    </body>
</html>
