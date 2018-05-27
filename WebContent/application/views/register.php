<!DOCTYPE html>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="global.css">
</head>

<body>
    <?php
        if (!empty($error)) {
            echo '<script language="javascript">';
            echo 'alert("'.$error.'")';
            echo '</script>';
        }
    ?>

    <div class="panel panel-default" style="width: 400px; margin: 0 auto; margin-top: 10%;">
      <div class="panel-body">

        <form action="http://localhost/register/create_user" method="POST">

            <h2 style="text-align: center;">Welcome to AweSomeFit
                <small>Just one step more</small>
            </h2>

            <div class="row">
                <!-- First Name -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <input class="form-control" type="text" name="firstname" maxlength="20" placeholder="First name" style="width: 370px;" <?php echo (isset($firstname)) ? "value = \"".$firstname."\"":'';?> required/>
                </div>
            </div>
            
            <div class="row">

                <!-- Last Name -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <input class="form-control" type="text" name="lastname" maxlength="20" placeholder="Last name" style="width: 370px;" <?php echo (isset($lastname)) ? "value = \"".$lastname."\"":'';?> required/>
                </div>
            </div>
            
            <div class="row">

                <!-- Email -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <input class="form-control" type="email" name="email" maxlength="45" placeholder="E-mail" style="width: 370px;" <?php echo (isset($email)) ? "value = \"".$email."\"":'';?> required/>
                </div>
            </div>
            
            <div class="row">
                <!-- Password -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <input class="form-control" type="password" name="password" id="password" minlength="8" maxlength="20" placeholder="Password" style="width: 370px;" required/>
                </div>
            </div>
            
            <div class="row">
                <!-- Confirm Password -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-group">
                    <input class="form-control" type="password" name="cpassword" id="cpassword" minlength="8" maxlength="20" placeholder="Confirm password" style="width: 370px;" required/>
                </div>
            </div>
            
            
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
               <button type="submit" class="btn btn-primary" style="width: 150px;">Register</button>
            </div>
        </form>
        
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <a href="http://localhost/login">
             <button type="submit" class="btn btn-primary" style="width: 150px;">Back to Login</button>
         </a>
     </div>
 </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    
    var password = document.getElementById("password"),
        confirm_password = document.getElementById("cpassword");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

</script>
</body>

</html>
