<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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

    <?php
        if (!empty($error)) {
            echo '<script language="javascript">';
            echo 'alert("'.$error.'")';
            echo '</script>';
        }
    ?>

    <div class="panel panel-default" style="width: 300px; margin: 10% auto;">
      <div class="panel-body">
        <form action="http://localhost/Login/do_login" method="POST">

            <!-- Title -->
            <div class="row" style="padding-bottom: 20px; margin: 0 auto;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 style="text-align: center;">AweSomeFit</h1>
                </div>
            </div>
            
            <!-- Username -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 10px">
                    <input class="form-control" type="text" name="email" placeholder="E-mail" style="width: 275px" <?php echo (isset($email)) ? "value = \"".$email."\"":'';?> required/>
                </div>
            </div>

            <!-- Password -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 10px">
                    <input class="form-control" type="password" name="password" placeholder="Password" style="width:275px" minlength=8 required/>
                </div>
            </div>

            <div class="row" >
                <!-- Login -->
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 10px">
                    <button type="submit" class="btn btn-primary" style="width:275px">Login</button>
                </div>
            </div>
        </form>
        
        <div class="row" style="width: 500px; margin-left: 39%;">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h4> or </h4>
            </div>
        </div>

        <div class="row" style="padding: 10px">
            <a href="http://localhost/register">
                <button type="submit" class="btn btn-primary" style="width:275px">Register</button>
            </a>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
