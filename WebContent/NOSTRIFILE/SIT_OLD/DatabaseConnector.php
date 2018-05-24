<?php
$servername = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "sit";
$successfulLogin = false;

function login($username, $password) {
    global $servername, $dbuser, $dbpass, $dbname, $successfulLogin, $creator_id;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    
    $md5pass = md5($password);
    
    $sql = "SELECT ath_id FROM athletes WHERE (ath_username = '$username' OR ath_email = '$username') AND ath_password = '$md5pass' LIMIT 1;";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $successfulLogin = true;
        while ($row = $result->fetch_assoc()) {
            $_SESSION["id"] = $row["ath_id"];
        }
    }
    else {
        require_once($_SERVER['DOCUMENT_ROOT'].'/index.php');
        echo "<script type='text/javascript'>alert('Wrong username or password\\nPlease try again');</script>";
    }
    $conn->close();
    
    if ($successfulLogin == true) {
        setSuccessfulLoginFalse();
        echo "<script language=\"javascript\">window.location.href = \"http://localhost/home.php\"</script>";
    }
}

function setSuccessfulLoginFalse(){
    global $successfulLogin;
    $successfulLogin = false;
}

function createUser($firstname, $lastname, $email, $username, $password) {
    global $servername, $dbuser, $dbpass, $dbname;
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    
    $sql = "SELECT ath_username FROM athletes WHERE ath_username='$username'";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        echo "<script type='text/javascript'>alert('Username already exists\\nSorry, but this username is already taken by another athlete.\\nPlease choose another one');</script>";
        return;
    }

    $md5pass = md5($password);
    
    $sql = "INSERT INTO athletes (ath_firstname, ath_lastname, ath_email, ath_username, ath_password) VALUES ('$firstname', '$lastname', '$email','$username','$md5pass');";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Registration Successfull\\nYou are now registered in SportInTouch!');</script>";
        login($username, $password);
    } else {
        echo "<script type='text/javascript'>alert('Error: " .$conn->error. "');</script>";
    }
    $conn->close();
}


function insertIntoDatabase($athlete_id, $title, $activity, $maxPart, $street, $civicNumber, $city, $cap, $lat, $lng, $date, $time, $note, $visibility){
    
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    
    $visibilityValue;
    
    if ($visibility == "public"){
        $visibilityValue = 0;
    } else {
        $visibilityValue = 1;
    }
    
    if ($civicNumber == ""){
        $civicNumber = 1;
    }
    
    //Check if event is in the past
    $sql_now = "SELECT CURDATE() as \"date\", CURTIME() as \"time\";";
    
    $result_now = $conn->query($sql_now);
    
    if ($result_now->num_rows > 0) {
        while ($row = $result_now->fetch_assoc()) {
            $curdate = $row["date"];
            $curtime = $row["time"];
        }
    }
    else {
        echo "<script type='text/javascript'>alert('Something went wrong...\\nPlease, try again.');</script>";
        return;
    }
    
    if (($date<$curdate) || ($date==$curdate && $time<$curtime)) {
        echo "<script type='text/javascript'>alert('Event not created\\nPlease, choose a date that is not in the past.');</script>";
        return;
    }
    
    $isIdValid = false;
    while ($isIdValid == false) {
        $valid_id = rand(0, 999999999);
        $event_by_id = "SELECT ev_id FROM events WHERE ev_id=".$valid_id.";";

        $result_event = $conn->query($event_by_id);

        if (!($result_event->num_rows > 0)) {
            $isIdValid=true;
        }
    }
    
    $sql = "INSERT INTO events VALUES ($valid_id, $athlete_id,'$title','$activity', $maxPart, '$date','$time','$street', $civicNumber, '$city', $cap, $lat, $lng, $visibilityValue, '$note');";
    
    if ($conn->query($sql) === TRUE){
        $sqlParticipates = "INSERT INTO participates VALUES ($valid_id, $athlete_id, NULL)";
        $conn->query($sqlParticipates);
        if ($visibilityValue==0) {
            echo "<script type='text/javascript'>alert('Congratulations!\\nYou\'ve just created a new event');</script>";
        }
        else {
            echo "<script type='text/javascript'>alert('Congratulations!\\nYou\'ve just created a new event!\\nIf you want to share your private event with your friends, please use the following url:\\n\"http://localhost/event_details.php?id=".$valid_id."\"');</script>";
        }
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong...\\nPlease, try again.');</script>";
    }
    $conn->close();
}

function getActivity(){
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    $sql_now = "SELECT CURDATE() as \"date\", CURTIME() as \"time\";";
    
    $result_now = $conn->query($sql_now);
    
    if ($result_now->num_rows > 0) {
        while ($row = $result_now->fetch_assoc()) {
            $curdate = $row["date"];
            $curtime = $row["time"];
        }
    }
    else {
        echo "<script type='text/javascript'>alert('Something went wrong...\\nPlease, try again.');</script>";
        return;
    }
    
    $select = "SELECT ev_id, ev_creator_id, ev_title, ev_sport, ev_max_partic, ev_date, DATE_FORMAT(ev_time, '%H:%i') as ev_time, ev_street, ev_civic_number, ev_city, ev_zip, ev_lat, ev_long, ev_visibility, ev_note";
    
    $sql = $select." FROM events WHERE ((ev_date<'".$curdate."') OR (ev_date='".$curdate."' AND ev_time<'".$curtime."')) AND ev_visibility=0 ORDER BY ev_date DESC, ev_time DESC;";
    
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return array();
    }
}


function retrieveFromDatabase(){
    
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    $sql_now = "SELECT CURDATE() as \"date\", CURTIME() as \"time\";";
    
    $result_now = $conn->query($sql_now);
    
    if ($result_now->num_rows > 0) {
        while ($row = $result_now->fetch_assoc()) {
            $curdate = $row["date"];
            $curtime = $row["time"];
        }
    }
    else {
        echo "<script type='text/javascript'>alert('Something went wrong...\\nPlease, try again.');</script>";
        return;
    }
    
    $select = "SELECT ev_id, ev_creator_id, ev_title, ev_sport, ev_max_partic, ev_date, DATE_FORMAT(ev_time, '%H:%i') as ev_time, ev_street, ev_civic_number, ev_city, ev_zip, ev_lat, ev_long, ev_visibility, ev_note";
    
    $sql = $select." FROM events WHERE ((ev_date>'".$curdate."') OR (ev_date='".$curdate."' AND ev_time>='".$curtime."')) AND ev_visibility=0 ORDER BY ev_date, ev_time;";
    
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result->num_rows > 0) {
        return availableEvents($result);
    } else {
        return array();
    }

}

function filterRetrieve($title, $activity, $date, $time, $city){
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    
    $sql_now = "SELECT CURDATE() as \"date\", CURTIME() as \"time\";";
    
    $result_now = $conn->query($sql_now);
    
    if ($result_now->num_rows > 0) {
        while ($row = $result_now->fetch_assoc()) {
            $curdate = $row["date"];
            $curtime = $row["time"];
        }
    }
    else {
        echo "<script type='text/javascript'>alert('Something went wrong...\\nPlease, try again.');</script>";
        return;
    }
    
    $select = "SELECT ev_id, ev_creator_id, ev_title, ev_sport, ev_max_partic, ev_date, DATE_FORMAT(ev_time, '%H:%i') as ev_time, ev_street, ev_civic_number, ev_city, ev_zip, ev_lat, ev_long, ev_visibility, ev_note";
    
    $sql = $select." FROM events";
    
    if ($title == "" && $activity == "-- No selection --" && $date == "" && $time == "" && $city == ""){
        $sql = $sql." WHERE (ev_date>'".$curdate."') OR (ev_date='".$curdate."' AND ev_time>='".$curtime."') ORDER BY ev_date, ev_time;";
    } else {
        $sql = $sql . " WHERE ";
        if ($title != ""){
            $sql = $sql." ev_title LIKE \"%".$title."%\"";
        }
        
        if ($activity != "-- No selection --"){
            if ($title != ""){
                $sql = $sql." AND ";
            }
            $sql = $sql." ev_sport LIKE \"".$activity."\"";
        }
        
        if ($title != "" || $activity != "-- No selection --") {
            $sql = $sql." AND ";
        }
        
        if ($date!=""){
            if ($date<$curdate) {
                echo "<script type='text/javascript'>alert('Input filter wrong\\nThe date specified is in the past');</script>";
                return retrieveFromDatabase();
            }
            
            if ($time!="") {    //date yes, time yes
                if ($date==$curdate && $time<$curtime) {
                    echo "<script type='text/javascript'>alert('Input filter wrong\\nThe date and time specified is in the past');</script>";
                    return retrieveFromDatabase();
                }
                $sql = $sql." ev_date >= \"".$date."\" AND ev_time >= \"".$time.":00\"";
            }
            else {              //date yes, time no
                if ($date==$curdate) {
                    $sql = $sql." ((ev_date>'".$curdate."') OR (ev_date='".$curdate."' AND ev_time>='".$curtime."'))";
                }
                else {
                    $sql = $sql." ev_date>='".$date."'";
                }
            }
        }
        else {
            if ($time!="") {    //date no, time yes
                $sql = $sql." ev_date >= \"".$curdate."\" AND ev_time >= \"".$time.":00\""; 
            }
            else {              //date no, time no
                $sql = $sql." ((ev_date>'".$curdate."') OR (ev_date='".$curdate."' AND ev_time>='".$curtime."'))";
            }
            
        }        
        
        if ($city != ""){
            $sql = $sql." AND ev_city LIKE \"".$city."\"";
        }
        
        $sql = $sql." AND ev_visibility=0 ORDER BY ev_date, ev_time;";
    }
    
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result->num_rows > 0) {
        return availableEvents($result);
    } else {
        return array();
    }
    
}

function availableEvents ($events) {
    $avEvents = array();
    foreach ($events as $event) {
        $partic = getNrParticipants($event["ev_id"]);
        if ($partic < $event["ev_max_partic"]) {
            array_push($avEvents, $event);
        }
    }
    return $avEvents;
}

function getEvent($id){
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    
    $select = "SELECT ev_id, ev_creator_id, ev_title, ev_sport, ev_max_partic, ev_date, DATE_FORMAT(ev_time, '%H:%i') as ev_time, ev_street, ev_civic_number, ev_city, ev_zip, ev_lat, ev_long, ev_visibility, ev_note";
    
    $sql = $select." FROM events WHERE ev_id LIKE \"".$id."\" LIMIT 1;";
    
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return array();
    }
}

function getAthlete($id){
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    
    $sql = "SELECT * FROM athletes WHERE ath_id LIKE \"".$id."\" LIMIT 1;";
    
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return array();
    }
}

function participateToEvent($ev_id, $user_id) {
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    
    //Check if event was already done
    $sql_now = "SELECT CURDATE() as \"date\", CURTIME() as \"time\";";
    
    $result_now = $conn->query($sql_now);
    
    if ($result_now->num_rows > 0) {
        while ($row = $result_now->fetch_assoc()) {
            $curdate = $row["date"];
            $curtime = $row["time"];
        }
    }
    else {
        echo "<script type='text/javascript'>alert('Something went wrong...\\nPlease, try again.');</script>";
        return;
    }
    
    $event_info = getEvent($ev_id);
    while ($row = $event_info->fetch_assoc()) {
        $ev_date = $row["ev_date"];
        $ev_time = $row["ev_time"];
    }
    
    if (($ev_date<$curdate) || ($ev_date==$curdate && $ev_time<$curtime)) {
        echo "<script type='text/javascript'>alert('You cannot join this event\\nEvent already past.');</script>";
        return;
    }
    
    //Check if event is already full
    if (empty(availableEvents($event_info))) {
        echo "<script type='text/javascript'>alert('You cannot join this event\\nSorry, the event is full');</script>";
        return;
    }  
    
    $sql = "INSERT INTO participates VALUES (".$ev_id.",".$user_id.", NULL);";
    
    if ($conn->query($sql) === TRUE){
        echo "<script type='text/javascript'>alert('Congratulations!\\nYou have joined the event!');</script>";
    } else {
        echo "<script type='text/javascript'>alert('You are already participating\\nIf you want to leave, please visit your profile page');</script>";
    }
    $conn->close();
}

function leaveEvent($ev_id, $user_id){
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    
    $sql = "DELETE FROM participates WHERE par_event_id = ".$ev_id." AND par_partecipant_id = ".$user_id.";";
    
    if ($conn->query($sql) === TRUE){
        echo "<script type='text/javascript'>alert('Successfull leave\\nYou have left the event.');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Notice:\\nYou are already not participating');</script>";
    }
    $conn->close();
}

function getNrParticipants($ev_id){
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    
    $sql = "SELECT COUNT(*) AS \"count\" FROM participates WHERE par_event_id LIKE " . $ev_id . " GROUP BY par_event_id LIMIT 1;";
    
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result->num_rows > 0) {
        foreach($result as $number){
            $count = $number["count"];
        }
        return $count;
    } else {
        return 0;
    }
}

function getPastPartEvents($user_id) {
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    $sql_now = "SELECT CURDATE() as \"date\", CURTIME() as \"time\";";
    
    $result_now = $conn->query($sql_now);
    
    if ($result_now->num_rows > 0) {
        while ($row = $result_now->fetch_assoc()) {
            $curdate = $row["date"];
            $curtime = $row["time"];
        }
    }
    else {
        echo "<script type='text/javascript'>alert('Something went wrong...\\nPlease, try again.');</script>";
        return;
    }
    
    $select = "SELECT ev_id, ev_creator_id, ev_title, ev_sport, ev_max_partic, ev_date, DATE_FORMAT(ev_time, '%H:%i') as ev_time, ev_street, ev_civic_number, ev_city, ev_zip, ev_lat, ev_long, ev_visibility, ev_note, par_event_id, par_partecipant_id, par_rate";
    
    $sql = $select." FROM participates, events WHERE participates.par_event_id=events.ev_id AND par_partecipant_id=".$user_id." AND ((ev_date<'".$curdate."') OR (ev_date='".$curdate."' AND ev_time<'".$curtime."')) ORDER BY ev_date DESC, ev_time DESC";
    
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return array();
    }
}

function getFuturePartEvents($user_id) {
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    $sql_now = "SELECT CURDATE() as \"date\", CURTIME() as \"time\";";
    
    $result_now = $conn->query($sql_now);
    
    if ($result_now->num_rows > 0) {
        while ($row = $result_now->fetch_assoc()) {
            $curdate = $row["date"];
            $curtime = $row["time"];
        }
    }
    else {
        echo "<script type='text/javascript'>alert('Something went wrong...\\nPlease, try again.');</script>";
        return;
    }
    
    $select = "SELECT ev_id, ev_creator_id, ev_title, ev_sport, ev_max_partic, ev_date, DATE_FORMAT(ev_time, '%H:%i') as ev_time, ev_street, ev_civic_number, ev_city, ev_zip, ev_lat, ev_long, ev_visibility, ev_note, par_event_id, par_partecipant_id, par_rate";
    
    $sql = $select." FROM participates, events WHERE participates.par_event_id=events.ev_id AND par_partecipant_id=".$user_id." AND ((ev_date>'".$curdate."') OR (ev_date='".$curdate."' AND ev_time>'".$curtime."')) ORDER BY ev_date, ev_time";
    
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result->num_rows > 0) {
        return $result;
    } else {
        return array();
    }
}

function rateEvent($user_id, $event_id, $rate) {
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    $sql = "UPDATE participates SET par_rate=".$rate." WHERE par_event_id=".$event_id." AND par_partecipant_id=".$user_id.";";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script type='text/javascript'>alert('Thank you for your contribution!\\nYour rate has been successfully saved');</script>";
    } else {
        echo "<script type='text/javascript'>alert('Error: " .$conn->error. "');</script>";
    }
    $conn->close();
}

function getAthleteAvgRate($user_id) {
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    
    $sql = "SELECT ROUND(AVG(par_rate),1) as \"rate\" FROM participates, events WHERE events.ev_id = participates.par_event_id AND events.ev_creator_id=".$user_id.";";
    
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rate = $row["rate"];
        }
        return $rate;
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong...\\nPlease, try again.');</script>";
    }
}

function getRateByParticipant($user_id, $event_id) {
    global $servername, $dbuser, $dbpass, $dbname;
    
    $conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
    
    $sql = "SELECT ROUND(AVG(par_rate),0) as \"rate\" FROM participates WHERE par_event_id = ".$event_id." AND par_partecipant_id = ".$user_id.";";
    
    $result = $conn->query($sql);
    $conn->close();
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $rate = $row["rate"];
        }
        return $rate;
    } else {
        echo "<script type='text/javascript'>alert('Something went wrong...\\nPlease, try again.');</script>";
    }
}
?>
