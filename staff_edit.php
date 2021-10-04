<?php  
//action.php
$connect = mysqli_connect('localhost', 'dengm', '448185', 'dengm');

$input = filter_input_array(INPUT_POST);

$title = mysqli_real_escape_string($connect, $input["title"]);

//edit function
if($input["action"] === 'edit')
{
 $query = "
 UPDATE users 
 SET title = '".$title."'
 WHERE id = '".$input["id"]."'
 ";

 mysqli_query($connect, $query);

}

//delete function
if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM users 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>