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
    <title>Activity</title>
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

 <?php   
 $res = getActivity();
 
 foreach($res as $record){
    $event_id = $record["ev_id"];
    $title = $record["ev_title"];
    $sport = $record["ev_sport"];
    $date = $record["ev_date"];
    $time = $record["ev_time"];
    $city = $record["ev_city"];
    $street = $record["ev_street"];
    $civic_number = $record["ev_civic_number"];
    ?>  
    <div class="panel panel-default" style="width: 75%; height: 170px; margin: 0 auto; margin-top: 10px; margin-bottom: 10px;">
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
<?php   } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>