<?php
include('db_conn.php'); //db connection


//random salt
$salt = base64_encode(random_bytes(16));
$idnumber=$_POST["idnumber"];
//crypt password by random salt
$password = crypt($_POST["password"], $salt);
$email=$_POST['email'];
$address=$_POST['address'];
$pnumber=$_POST['pnumber'];
$dob=$_POST['dob'];

$query="";
//password will no be changed if user do not change it
if (empty(trim($_POST["password"]))) {
    $query = "UPDATE users SET email = '".$email."', address = '".$address."',pnumber = '".$pnumber."',dob = '".$dob."' 
 WHERE idnumber = '".$idnumber."' "; 
}
else {
    $query = "UPDATE users SET email = '".$email."', password = '".$password."',address = '".$address."',pnumber = '".$pnumber."',dob = '".$dob."' 
 WHERE idnumber = '".$idnumber."' ";
};

$result = $mysqli->query($query);



if($result){
	$res->update=true;
}else{
	$res->update=false;
}
echo json_encode($res);
?>