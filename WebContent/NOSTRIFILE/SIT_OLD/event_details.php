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

if (!empty($_POST) && !empty($_POST["ev_id"])){
    // mettere lo user giusto
    participateToEvent($_POST["ev_id"], $_SESSION["id"]);
    
    $res = getEvent($_POST["ev_id"]);
    
    foreach($res as $record){
        $creator = getAthlete($record["ev_creator_id"]);
        $rate = getAthleteAvgRate($record["ev_creator_id"]);
        
        foreach($creator as $record2){
            $creatorName = $record2["ath_firstname"];
            $creatorSurname = $record2["ath_lastname"];
        }
        
        $ev_id = $record["ev_id"];
        $title = $record["ev_title"];
        $sport = $record["ev_sport"];
        $maxPart = $record["ev_max_partic"];
        $date = $record["ev_date"];
        $time = $record["ev_time"];
        $city = $record["ev_city"];
        $street = $record["ev_street"];
        $note = $record["ev_note"];
        $civic_number = $record["ev_civic_number"];
        
        $currentPartic = getNrParticipants($ev_id);
    }
}


if(!empty($_GET)){
    $res = getEvent($_GET["id"]);
    
    foreach($res as $record){
        $creator = getAthlete($record["ev_creator_id"]);
        $rate = getAthleteAvgRate($record["ev_creator_id"]);
        
        foreach($creator as $record2){
            $creatorName = $record2["ath_firstname"];
            $creatorSurname = $record2["ath_lastname"];
        }
        
        $ev_id = $record["ev_id"];
        $title = $record["ev_title"];
        $sport = $record["ev_sport"];
        $maxPart = $record["ev_max_partic"];
        $date = $record["ev_date"];
        $time = $record["ev_time"];
        $city = $record["ev_city"];
        $street = $record["ev_street"];
        $civic_number = $record["ev_civic_number"];
        $note = $record["ev_note"];
        $currentPartic = getNrParticipants($ev_id);
    }
    
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event Details</title>
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


    <?php if ($note != "") { ?>
    <div class="panel panel-default" style="width: 70%; height: 485px; margin: 0 auto; margin-top: 10px;">
     <?php } else { ?>
     
     <div class="panel panel-default" style="width: 70%; height: 365px; margin: 0 auto; margin-top: 10px;">
       <?php } ?>
       <div class="panel-body">
        
           <div class="row" style="text-align: center;">
            <h1>Event details</h1>
        </div>

        <div class="row" style="text-align: center; margin-top: 10px;">
            <h4>Title: <?= $title ?><br>
                <small style="text-align: center;">Activity type: <?=$sport ?></small><br>
                <small>Creator: <?= $creatorName ?> <?= $creatorSurname ?>
                    <?php
                    if ($rate != ""){
                        ?>
                        - Rate: <?= $rate ?>/5
                        <?php } ?>
                    </small>
                </h4>
            </div>
            
            <div class="row" style="text-align: center;">
                <h5>Where: <?= $street ?> <?= $civic_number ?>, <?= $city ?></h5>
            </div>
            
            <div class="row" style="text-align: center;">
                <h5>When: <?= $date ?> at <?= $time ?></h5>
            </div>
            
            <div class="row" style="text-align: center;">
                <h5>Current n° of participants: <?= $currentPartic ?>/<small><?= $maxPart ?></small></h5>
            </div>
            
            <?php if ($note != "") { ?>
            <div class="row" style="width: 40%; margin: 0 auto;">
                <h5>Note:</h5>
                <textarea class="form-control" rows="4" cols=100% readonly>"<?= $note ?>"</textarea>
            </div>
            <?php } ?>
            
            <div class="row" style="margin-left: 46%; margin-top: 20px;">
                <form method="POST" action="event_details.php">
                   <input type="text" name="ev_id" value="<?= $ev_id ?>" hidden/>
                   <button type="submit" class="btn btn-primary" style="width: 80px;">Join</button>
               </form>
           </div>
       </div>
   </div>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>