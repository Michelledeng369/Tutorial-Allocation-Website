<?php
include('db_conn.php'); //db connection
include("session.php");


$query = "SELECT * FROM users WHERE username='$session_user'";
$result = $mysqli->query($query);
$row=$result->fetch_array(MYSQLI_ASSOC);

if (empty($session_user)){
     echo '<script>;alert("Login is required!");location.href="mainpage.php";</script>;';
 }


if($row['access']=='1') {
echo'<script language="JavaScript">location.href="./EnrolledStudent_dc.php";</script>;';
} else if($row['access']=='5') {
	echo'<script language="JavaScript">;alert("You do not have accesss to this page!");location.href="./signin_success.php";</script>;';
}else if($row['access']=='4' ) {
	echo'<script language="JavaScript">location.href="./EnrolledStudent_tutor.php";</script>;';
}else {
	echo'<script language="JavaScript">location.href="./EnrolledStudent_uclec.php";</script>;';

}
?>
