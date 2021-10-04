<?php  
//action.php
$connect = mysqli_connect('localhost', 'dengm', '448185', 'dengm');

$input = filter_input_array(INPUT_POST);

$lecturer = mysqli_real_escape_string($connect, $input["lecturer"]);
$lecture_time = mysqli_real_escape_string($connect, $input["lecture_time"]);
$lec_location = mysqli_real_escape_string($connect, $input["lec_location"]);
$consultation = mysqli_real_escape_string($connect, $input["consultation"]);

//edit function
if($input["action"] === 'edit')
{
 $query = "
 UPDATE units 
 SET 
 lecturer = '".$lecturer."',
 lecture_time = '".$lecture_time."',
 lec_location = '".$lec_location."',
 consultation = '".$consultation."'

 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}



echo json_encode($input);

?>