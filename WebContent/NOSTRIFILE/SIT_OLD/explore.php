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
    <title>Explore</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="global.css">
</head>

<body>
    
    <div class="topnav" id="myTopnav">
        <a href="home.php">Home</a>
        <a href="explore.php">Explore</a>
        <a href="create.php">Create</a>
        <a href="activity.php">Activity</a>
        <a href="profile.php">Profile</a>
        <?php echo "<a href=\"profile.php\" id=\"userBar\" style=\"float: right;\">" . $name . "</a>"; ?>
    </div>
    
    <div class="panel panel-default" class="col-xs-12" style="width: 99%; margin: 10px auto;">
      <div class="panel-body">
          
       
       <div class="row" style="margin: 0 auto; padding-top: 50px;">
        <form method="post" action="explore.php">
          
           <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
               <label>Search:</label>
               <input type="text" class="form-control" name="title" style="width: 100%; height: 30px;"/>
           </div>
           
           <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label>Activity type:</label>
            <select class="form-control" name="sport" style="width: 100%; height: 30px;">
                <option selected>-- No selection --</option>
                <option>Running</option>
                <option>Soccer</option>
                <option>Volley</option>
            </select>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label>Date:</label> 
            <input class="form-control" type="date" name="date" style="width: 100%; height: 30px;"/>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label>Time:</label> 
            <input class="form-control" type="time" name="time" style="width: 100%; height: 30px"/>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <label>City:</label> 
            <input class="form-control" type="text" name="city" maxlength="18" style="width: 100%; height: 30px"/>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
            <button type="submit" class="btn btn-primary" style="margin-top: 21px; width: 100%;">Filter</button>
        </div>
        
    </form>
</div>

<div class="row" style="padding-top: 50px">
   <div id="mybox" class="box col-md-5">

        <?php
        
        if(!empty($_POST)){
            $res = filterRetrieve($_POST["title"], $_POST["sport"], $_POST["date"], $_POST["time"], $_POST["city"]);
        } else {
            $res = retrieveFromDatabase();
        }
        
        $entered = false;
        foreach($res as $record){
            $entered = true;
            $event_id = $record["ev_id"];
            $title = $record["ev_title"];
            $sport = $record["ev_sport"];
            $date = $record["ev_date"];
            $time = $record["ev_time"];
            $city = $record["ev_city"];
            $street = $record["ev_street"];
            $civic_number = $record["ev_civic_number"];
            ?>  
            <div class="panel panel-default" onclick="location.href='event_details.php?id=<?= $event_id;?>'" >
               <div class="panel-body">
                <div class="row" style="text-align: center;">
                    <h4>Title: <?= $title ?><br>
                        <small style="text-align: center;">Activity type: <?=$sport ?></small><br>
                    </h4>
                </div>
                
                <div class="row" style="text-align: center;">
                    <h5>Where: <?= $street ?> <?= $civic_number ?>, <?= $city ?></h5>
                </div>
                
                <div class="row" style="text-align: center;">
                    <h5>When: <?= $date ?> at <?= $time ?></h5>
                </div>
            </div>
        </div>
        <?php   }  
        
        if ($entered==false) {
            ?>  
            <div class="panel panel-default">
               <div class="panel-body">
                <div class="row" style="text-align: center;">
                   <h4>No events available..</h4>
               </div>
               <div class="row" style="text-align: center;">
                <h5>Why don't you create a new one?</h5>
            </div>
            <div class="row" style="margin-left: 36%; margin-top: 10px;">
                <form action="create.php">
                    <button type="submit" class="btn btn-primary" style="width: 100%">Create event</button>
                </form>
            </div>
        </div>
    </div>
    <?php   }
    ?>
</div>

<div id="mapdiv" class="hidden-xs hidden-sm col-md-7">

    <div id="map" style="width: 100%; height: 535px; background: yellow;">

    <?php 
    
    echo "<script>
    
    
            //https://www.w3schools.com/graphics/google_maps_overlays.asp   
    function myMap() {
        var mapOptions = {
            center: new google.maps.LatLng(46.4919016, 11.3374781),
            zoom: 13,
            mapTypeId: google.maps.MapTypeId.RODAMAP
        };
        var map = new google.maps.Map(document.getElementById(\"map\"),
            mapOptions);
";

foreach($res as $result){
    $ev_lat = $result["ev_lat"];
    $ev_long = $result["ev_long"];

    if ($ev_lat != "" && $ev_long != "") {
        echo "
        var marker = new google.maps.Marker({
            position: {lat: ".$ev_lat.", lng: ".$ev_long."},
            map: map
        });
";
}

}

echo " }

</script>";

?>

</div>
</div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAk-G2a6-1Rrbj1Cf53ezq1AUcNj7xpESo&callback=myMap"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</div>
</div>
</body>

</html>