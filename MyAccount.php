
<?php
include('db_conn.php'); //db connection
include("session.php");

$query = "SELECT*FROM units";
$result =$mysqli->query($query);

$query = "SELECT * FROM users WHERE username='$session_user'";
$result = $mysqli->query($query);
$row=$result->fetch_array(MYSQLI_ASSOC);

if (empty($session_user)){
     echo '<script>;alert("Login is required!");location.href="tute7_main.php";</script>;';
 }

//judge the user's identity according to access
if($row['access']!='5') {
	//if the user is not student, then go to the staff account page
echo'<script language="JavaScript">location.href="./useraccount_staff.php";</script>;';
} else {

	//if the user is student, then go to the student account page
	echo'<script language="JavaScript">location.href="./useraccount_student.php";</script>;';
}
?>
