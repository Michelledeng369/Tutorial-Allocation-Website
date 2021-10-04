<?php  
//action.php
$connect = mysqli_connect('localhost', 'dengm', '448185', 'dengm');

$input = filter_input_array(INPUT_POST);

$unit_code = mysqli_real_escape_string($connect, $input["unit_code"]);
$unit_name = mysqli_real_escape_string($connect, $input["unit_name"]);
$coordinator = mysqli_real_escape_string($connect, $input["coordinator"]);
$semester = mysqli_real_escape_string($connect, $input["semester"]);
$campus = mysqli_real_escape_string($connect, $input["campus"]);
$description = mysqli_real_escape_string($connect, $input["description"]);

//Edit the choosen row.
if($input["action"] === 'edit')
{
 $query = "
 UPDATE units 
 SET unit_code = '".$unit_code."', 
 unit_name = '".$unit_name."',
 coordinator = '".$coordinator."',
 semester = '".$semester."',
 campus = '".$campus."',
 description = '".$description."'
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}
//Delete the choosen row.
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM units 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>