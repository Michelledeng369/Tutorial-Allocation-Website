<?php

include('db_conn.php'); //db connection
include("session.php");


if (isset($_POST['enrolAction'])) {
    $studentid = $_POST['studentid'];
    $studentname = $_POST['studentname'];
    $unit = $_POST['unit'];
    $name = $_POST['name'];
    $lecture_time = $_POST['lecture_time'];
    $lec_location = $_POST['lec_location'];
    $lecturer = $_POST['lecturer'];
    $coordinator = $_POST['coordinator'];
    $semester = $_POST['semester'];
    $campus = $_POST['campus'];
    
    $query = "SELECT * from unitenroll where unit_code =  '$unit' AND idnumber = '$studentid'";
    $result=$mysqli->query($query);

//judge if the this unit have been enrolled or not
if($result->num_rows>0)
{
  $res->exist=true; 
}
else{
    $query = "INSERT INTO `unitenroll` (`idnumber`, `username`, `unit_code`, `unit_name`, `lecture_time`, `lec_location`,`lecturer`, `coordinator`,`semester`, `campus`) VALUES ('$studentid','$studentname','$unit','$name','$lecture_time','$lec_location','$lecturer','$coordinator','$semester','$campus')";
    $result=$mysqli->query($query);
    $res->exist=false; 
    $mysqli->close();
}
}
echo json_encode($res);
 ?>