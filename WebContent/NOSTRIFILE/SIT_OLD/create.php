<!DOCTYPE html>
<?php
include ("DatabaseConnector.php");
session_start();
if ($_SESSION["id"]==NULL) {
    echo "<script type='text/javascript'>alert('Please, login before accessing this site\\n\\nSportInTouch Team');</script>";
    echo "<script language=\"javascript\">window.location.href = \"http://localhost/index.php\"</script>";
}

$resAth = getAthlete($_SESSION["id"]);

foreach ($resAth as $record){
    $name = $record["ath_firstname"] . " " . $record["ath_lastname"];
}

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script>
    
    $(document).ready(function (){
        $(document).on("change", "#refresh", function (){
            $.ajax({
                url : 'https://maps.googleapis.com/maps/api/geocode/json',
                type : 'GET',
                data : {
                    address : $.trim($("#street").val()+ ", " +$("#civicNumber").val()+ ", " +$("#cap").val()+ " " +$("#city").val() +", Italy"),
                    key : "AIzaSyA5fXucp3iRGGB_kfqYG3T2Ph-I4V2kUAc"
                },
                datatype : 'json',
                async : true,
                success : function(result) {
                    $("#lat").val(result["results"][0]["geometry"]["location"]["lat"]);
                    $("#lng").val(result["results"][0]["geometry"]["location"]["lng"]);
                }
            })
        });
    });

    </script>

    <link rel="stylesheet" href="global.css">
</head>

<body>
    <?php
    if(!empty($_POST) && !empty($_POST["title"])){
        
        
        insertIntoDatabase($_SESSION["id"], $_POST["title"], $_POST["activity"], $_POST["maxPart"], $_POST["street"], $_POST["civicNumber"], $_POST["city"], $_POST["cap"], $_POST["lat"], $_POST["lng"], $_POST["date"], $_POST["time"], $_POST["note"], $_POST["visibility"]);
    }
    ?>
    
    <div class="topnav" id="myTopnav">
        <a href="home.php">Home</a>
        <a href="explore.php">Explore</a>
        <a href="create.php">Create</a>
        <a href="activity.php">Activity</a>
        <a href="profile.php">Profile</a>
        <?php echo "<a href=\"profile.php\" id=\"userBar\" style=\"float: right;\">" . $name . "</a>"; ?>
    </div>

    
    <div class="panel panel-default" class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="width: 99%; margin: 10px auto;">
      <div class="panel-body">
        <form method="POST" action="create.php">

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center;">
                    <h1>You are creating a new event:
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="text-align: center; padding-bottom: 15px;"><small>A few more steps and you are done...</small></div>
                    </h1>
                </div>
            </div>
            
            <div class="row">
             <!-- Title -->
             <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7" style="margin-bottom: 3px;">
                <label>Title:</label>
                <input class="form-control" type="text" name="title" maxlength="45" required />
            </div>
            
            <!-- Activity type -->
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3" style="margin-bottom: 3px;">
                <label>Activity type:</label>
                <select name="activity" class="form-control">
                    <option selected>Running</option>
                    <option>Soccer</option>
                    <option>Volley</option>
                </select>
            </div>

            <!-- Max Participants -->
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="margin-bottom: 3px;">
                <label>Max Participants n°:</label> 
                <input class="form-control" type="number" name="maxPart" maxlength="11" required />
            </div>
        </div>
        
        <div class="row" id="refresh">
            <!-- Where -->
            <div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" style="margin-bottom: 3px;">
                <label>&emsp;Where:</label>
            </div> 
            <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5" style="margin-bottom: 3px;">
                <input class="form-control" type="text" name="street" id="street" maxlength="45" placeholder="Street" required />
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1" style="margin-bottom: 3px;">
                <input class="form-control" type="number" name="civicNumber" id="civicNumber" maxlength="8" placeholder="N°" />
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="margin-bottom: 3px;">
                <input class="form-control" type="text" name="city" id="city" maxlength="45" placeholder="City" required />
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="margin-bottom: 3px;">
                <input class="form-control" type="number" name="cap" id="cap" maxlength="5" placeholder="CAP" required />
            </div>
            
        </div>
        
        
        <div class="row">
         <!-- Date -->
         <div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-4 col-lg-2 col-lg-offset-4" style="margin-bottom: 3px;">
            <label>Date:</label>
            <input class="form-control" type="date" name="date" required />
        </div>
        
        <!-- Time -->
        <div class=" col-xs-12 col-sm-12 col-md-2 col-lg-2" style="margin-bottom: 3px;">
            <label>Time:</label>
            <input class="form-control" type="time" name="time" required />
        </div>            
    </div>
    
    
    <div class="row">
        <!-- Note -->
        <div class="col-xs-12 col-sm-12 col-sm-offset-2 col-md-7 col-md-offset-3 col-lg-7 col-lg-offset-3" >
            <label>Note (max 150):</label><br>
            <textarea class="form-control" name="note" id="note" placeholder="Insert note here.." rows="4" cols="100%" maxlength="150" style="margin-bottom: 3px; width: 100%;"></textarea>
        </div>
    </div>
    
    <!-- Visibility -->
    <div class="row" style="width: 615px;">   
        <div class="col-xs-5 col-xs-offset-2 col-sm-5 col-sm-offset-6 col-md-5 col-md-offset-7 col-lg-5 col-lg-offset-10" style="margin-bottom: 3px;">
            <label>Select visibility:</label>
            <input type="radio" name="visibility" value="public" checked /> Public
            <input type="radio" name="visibility" value="private" /> Private
        </div>
    </div>
    
    <!-- lat and lng -->
    <div class="row col-lg-12">
        <input type="text" name="lat" id="lat" hidden/>
        <input type="text" name="lng" id="lng" hidden/>
    </div>
    
    <div class="row" style="width: 10%; margin: auto;"> <!-- col-xs-offset-5  col-sm-offset-5 col-md-offset-5 col-lg-offset-5-->
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5" style="margin-bottom: 3px;">
           <button style="width: 70px;" type="submit" class="btn btn-primary">Create</button>
       </div>
   </div>
</form>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>