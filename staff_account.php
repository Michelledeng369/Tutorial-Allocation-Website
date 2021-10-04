<?php
include('db_conn.php'); //db connection



$salt = base64_encode(random_bytes(16));
$id=$_POST["idnumber"];
$password = crypt($_POST["password"], $salt);
$email=$_POST['email'];
$address=$_POST['address'];
$pnumber=$_POST['pnumber'];
$dob=$_POST['dob'];
$qualification=$_POST['qualification'];
$expertise=$_POST['expertise'];
$unavailability=$_POST['unavailability'];

$query="";
if (empty(trim($_POST["password"]))) {
    $query = "UPDATE users SET email = '".$email."', address = '".$address."',pnumber = '".$pnumber."',dob = '".$dob."',qualification = '".$qualification."',expertise = '".$expertise."',unavailability = '".$unavailability."' 
 WHERE idnumber = '".$id."' "; 
}
else {
    $query = "UPDATE users SET email = '".$email."', password = '".$password."',address = '".$address."',pnumber = '".$pnumber."',dob = '".$dob."',qualification = '".$qualification."',expertise = '".$expertise."',unavailability = '".$unavailability."'  
 WHERE idnumber = '".$id."' "; 
};

$result = $mysqli->query($query);



if($result){
	$res->update=true;
}else{
	$res->update=false;
}
echo json_encode($res);


?>