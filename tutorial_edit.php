<?php  
//action.php
$connect = mysqli_connect('localhost', 'dengm', '448185', 'dengm');

$input = filter_input_array(INPUT_POST);

$tutor = mysqli_real_escape_string($connect, $input["tutor"]);
$time = mysqli_real_escape_string($connect, $input["time"]);
$location = mysqli_real_escape_string($connect, $input["location"]);
$maxnumber = mysqli_real_escape_string($connect, $input["maxnumber"]);

//edit function
if($input["action"] === 'edit')
{
 $query = "
 UPDATE tutorial 
 SET 
 tutor = '".$tutor."',
 time = '".$time."',
 location = '".$location."',
 maxnumber = '".$maxnumber."'

 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}

//delete function
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM tutorial 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}


echo json_encode($input);

?>