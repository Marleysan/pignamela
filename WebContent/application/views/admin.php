<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
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

    <div class="panel panel-default" style="width: 300px; margin: 10% auto;">
      <div class="panel-body">
        <form action="http://localhost/Admin/do_login" method="POST">

            <!-- Title -->
            <div class="row" style="padding-bottom: 20px; margin: 0 auto;">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1 style="text-align: center;">AweSomeFit
                        <small>AdminPanel</small>
                    </h1>
                </div>
            </div>
            
            <!-- Username -->
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 10px">
                    <input class="form-control" type="text" name="username" placeholder="Username" style="width: 275px" required/>
                </div>
            </div>

            <div class="row">
                <!-- Password -->
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
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
