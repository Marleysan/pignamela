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
  
  leaveEvent($_POST["ev_id"], $_SESSION["id"]);
  
}

if (!empty($_POST) && !empty($_POST["hidden_event_id"])){
  rateEvent($_SESSION["id"], $_POST["hidden_event_id"], $_POST["rate"]);
}

$rate = getAthleteAvgRate($_SESSION["id"]);
?>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
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
		<!-- 
		<a href="javascript:void(0);" class="icon"
		onclick="myFunction()">&#9776;</a> -->
	</div>

	<div class="row" style="width: 23%; margin: 0 auto; margin-top: 20px;">
		<h1 style="text-align: center;"><?php echo $name; ?>
      <?php
      if ($rate != ""){
        ?>
        <br><small style="text-align: center;">Your rate: <?= $rate ?>/5</small>
        <?php } ?>
      </h1>
      <form action="index.php">
       <div class="row" style="width:85%; margin:0 auto;">
        <button type="submit" class="btn btn-primary" style="width: 100%;">Logout</button>
      </div>
    </form>
  </div>

  <div class="row" style="margin: 0 auto; margin-top: 30px; width: 60%; border:1px solid #D7D7D7;">
  </div>

  <div class="row" style="width: 100%; margin: 0 auto;">
   <div class="hidden-xs hidden-sm col-md-6">
    <h6 style="text-align: center;">PAST ACTIVITIES</h6>
  </div>
  <div class="col-md-6">
    <h6 style="text-align: center;">FUTURE ACTIVITIES</h6>
  </div>
</div>

<div class="row">
	
	<!-- past -->
	<div class="hidden-xs hidden-sm col-md-6">
   <?php   
   $res = getPastPartEvents($_SESSION["id"]);
      
   foreach($res as $record){
    $event_id = $record["ev_id"];
    $title = $record["ev_title"];
    $sport = $record["ev_sport"];
    $date = $record["ev_date"];
    $time = $record["ev_time"];
    $city = $record["ev_city"];
    $street = $record["ev_street"];
    $civic_number = $record["ev_civic_number"];
    $creator = $record["ev_creator_id"];
    
    $rate2 = getRateByParticipant($_SESSION["id"], $event_id)
    ?>  
    <div class="panel panel-default" style="width: 80%; height: 200px; margin: 0 auto; margin-top: 10px; margin-bottom: 10px;">
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
      
      <div class="row" style="text-align: center;">
        <?php
        if ($rate2 == "" && $creator != $_SESSION["id"]){
          ?>
          <form method="POST" action="profile.php">
            <div class="col-md-6">
              <select class="form-control" name="rate" style="margin-left: 82%; width: 60px;">
                <option>1</option>
                <option>2</option>
                <option selected>3</option>
                <option>4</option>
                <option>5</option>
              </select>
              <input type="text" name="hidden_event_id" value="<?= $event_id ?>" hidden />
            </div>
            <div class="col-md-6">
             <button type="submit" class="btn btn-primary" style="width: 60px;">Rate</button>
           </div>
         </form>
         
         <?php } else {
          if ($creator == $_SESSION["id"]){ ?>
          <div class="row" style="text-align: center;">
            <h5>You created this event!</h5>
          </div>
          <?php } else { ?>
          <div class="row" style="text-align: center;">
            <h5>Your rate was: <?= $rate2 ?>/5</h5>
          </div>
          <?php }} ?>
        </div>
      </div>
    </div>
    <?php   } ?>
  </div>

  <div class="col-md-6">
    <?php   
    $res = getFuturePartEvents($_SESSION["id"]);
    
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
      <div class="panel panel-default" style="width: 80%; height: 200px; margin: 0 auto; margin-top: 10px; margin-bottom: 10px;">
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
        
        <div class="row" style="width: 30%; margin: 0 auto;">
         <form method="POST" action="profile.php">
          <input type="text" name="ev_id" value="<?= $event_id ?>" hidden />
          <button type="submit" class="btn btn-primary" style="width: 100%;">Leave</button>
        </form>
      </div>
      
    </div>
  </div>
  <?php   } ?>
</div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>