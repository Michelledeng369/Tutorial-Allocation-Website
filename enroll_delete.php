<?php  
$connect = mysqli_connect('localhost', 'dengm', '448185', 'dengm');

$input = filter_input_array(INPUT_POST);

//Delete the choosen row.

if($input["action"] === 'delete')
{
 $query = "
 DELETE FROM unitenroll 
 WHERE id = '".$input["id"]."'
 ";
 mysqli_query($connect, $query);
}

echo json_encode($input);

?>