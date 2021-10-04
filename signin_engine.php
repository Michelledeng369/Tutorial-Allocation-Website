<?php
//include the file session.php
include("session.php");
//include the file db_conn.php
include("db_conn.php");

//receive the username data from the form (in mainpage.php)
$id=$_POST['idnumber'];
//receive the password data from the form (in mainpage.php)
$password=$_POST['password'];

//query to check whether user's id is in the table (check whether the user has been signed up)
$query = "SELECT * FROM users WHERE idnumber='$id'";
//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);

//convert the result to array (the key of the array will be the column names of the table)
	$row=$result->fetch_array(MYSQLI_ASSOC);

//if the username from table is not same as the user's id from the form(from mainpage.php)
if($row['idnumber']!=$id || $id=="")
{
	//automatically go back to login form and pass the error message
	header('Location: ./mainpage.php?error=Do not have a record');
}
//if the username is same as the username data from the form(from mainpage.php) 
else {
	$hashed_password = crypt($password, $row['password'] );
	echo $hashed_password;
  if(hash_equals($row['password'], $hashed_password))  {

		//save the username in the session
		$session_user=$row['username'];
		$session_id=$row['idnumber'];

		$_SESSION['session_user']=$session_user;
		$_SESSION['session_id']=$session_id;
		//automatically go to signin_success.php
		header('Location: ./signin_success.php');
	
	}//if the password from table does not match with the password data from the login form
	else{

		//automatically go back to login form and pass the error message

		header('Location: ./mainpage.php?error=Wrong password');
	}
}	

?>
