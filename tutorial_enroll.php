<?php

include('db_conn.php'); //db connection
include("session.php");


if (isset($_POST['enrolAction'])) {
	$id = $_POST['id'];
    $studentid = $_POST['studentid'];
    $studentname = $_POST['studentname'];
    $unit = $_POST['unit'];
    $tutor = $_POST['tutor'];
    $time = $_POST['time'];
    $tlocation = $_POST['tlocation'];
    
    $query = "SELECT * from tutorialenroll where tid =  '$id' AND idnumber = '$studentid'";
    $result=$mysqli->query($query);

//judge if the data of selected unit have been update to database
if($result->num_rows>0)
{
  $res->exist=true; 
}
else{
    $query = "INSERT INTO `tutorialenroll` (`tid`,`idnumber`, `username`, `unit_code`, `tutor`, `time`, `tlocation`) VALUES ('$id','$studentid','$studentname','$unit','$tutor','$time','$tlocation')";
    $result=$mysqli->query($query);
    $res->exist=false; 
    $mysqli->close();
}
}
echo json_encode($res);
 ?>