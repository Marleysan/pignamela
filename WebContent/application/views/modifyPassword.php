<!DOCTYPE html>
 
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
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
     
     <?php if(isset($_SESSION["user_id"])) {
        echo "<li><a href=\"".base_url()."profile/open_profile\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#AAAAAA'\" onmouseout=\"this.style.color='#FFFFFF'\"><i class=\"glyphicon glyphicon-user\"></i>  <u>Profile</u></a></li>";
    }
      else {
        echo "<li><a href=\"".base_url()."login\" style=\"color: #FFFFFF;\" onmouseover=\"this.style.color='#AAAAAA'\" onmouseout=\"this.style.color='#FFFFFF'\">login  <i class=\"glyphicon glyphicon-log-in\"></i></a></li>";
      }
    ?>
     
      <li><a href="<?php echo base_url(); ?>cart/open_cart" style="color: #FFFFFF;" onmouseover="this.style.color='#AAAAAA'" onmouseout="this.style.color='#FFFFFF'"><i class="glyphicon glyphicon-shopping-cart"></i></a></li>
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
   <form action="<?php echo base_url(); ?>modifypassword/update_password" method="POST">

  <div class="row" style="width: 23%; margin: 0 auto; margin-top: 20px;">
   
    <h1 style="text-align: center;"><?php echo $profile_data['customer_firstname'];
        echo "  " . $profile_data['customer_lastname'];?></h1>
    <div class="row" >
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
         <a  href="<?php echo base_url(); ?>profile/open_profile">
          <input type="button" class="btn btn-primary" value="Discard changes" />
        </a>
      </div>
      
      <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <button type="submit" class="btn btn-primary" style="width: 100%;">Save</button>
      </div>
    </div>
  </div>

  <!-- Gray division bar -->
  <div class="row" style="margin: 0 auto; margin-top: 30px; width: 60%; border:1px solid #D7D7D7;">
  </div>
  
  <div class="row">
    <h6 style="text-align: center;">PERSONAL INFORMATION</h6>
  </div>

  <div class="panel panel-default" style="width: 70%; margin: 10px auto;">
    <div class="panel-body">
   
   <div class="row">
         
         <h3 style="text-align: center;">Change your password:
             <br><small>Remember that regularly changing your password enhence your profile security,</small><br><small> thus protecting your personal data!</small></h3>
          </div>
   <div class="row" style="margin-top: 15px;">
    <!-- Password -->
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form-group">
     <label>Prior Password:</label>
     <input class="form-control" type="password" name="oldpassword" minlength="8" maxlength="20" placeholder="Password" required/>
   </div>
    </div>
   <div class="row" style="margin-top: 15px;">
  
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form-group">
     <label>Password:</label>
     <input class="form-control" type="password" name="password" id="password" minlength="8" maxlength="20" placeholder="Password" required/>
   </div>
 
  <!-- Confirm Password -->
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 form-group">
   <label>Confirm Password:</label>
   <input class="form-control" type="password" name="cpassword" id="cpassword" minlength="8" maxlength="20" placeholder="Confirm password" required/>
 </div>
 </div>
</div>
</div>
</form>
   
   
   
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
    
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("cpassword");

    function validatePassword(){
        console.log("partito validate password");

      if(password.value != confirm_password.value) {
          password.setCustomValidity('');
          confirm_password.setCustomValidity("Passwords Don't Match");
      } else if (!(regex.test(password.value))) {
          console.log(password.value);
          password.setCustomValidity("Password must contain at least eight characters, one uppercase letter, one lowercase letter and one number");
          confirm_password.setCustomValidity('');
      } else {
          password.setCustomValidity('');
          confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onchange = validatePassword;
    password.onkeyup = validatePassword;
    confirm_password.onkeyup = validatePassword;

</script>
    </body>
</html>
