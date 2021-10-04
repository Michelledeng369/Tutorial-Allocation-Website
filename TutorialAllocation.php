<?php
include('db_conn.php'); //db connection
include("session.php");

//select data according to the login user
$query = "SELECT * FROM users WHERE username='$session_user'";
$result = $mysqli->query($query);
$row=$result->fetch_array(MYSQLI_ASSOC);

//no access to this page without login
if (empty($session_user)){
     echo '<script>;alert("Login is required!");location.href="mainpage.php";</script>;';
 }

//only the access is 5 can user use this page
if($row['access']!='5') {
echo'<script language="JavaScript">;alert("You do not have accesss to this page!");location.href="./signin_success.php";</script>;';
die;
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Enrolment Management</title>
     <!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Link to use icon-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- add library-->
    <script src="jquery.tabledit.min.js"></script>
    <link rel="stylesheet" href="css/unit.css" />


</head>
    
<body>
    <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="signin_success.php">University of DoWell</a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#main-navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="main-navigation">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="UnitDetail.php">Unit Detail</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="UnitEnrolment.php">Unit Enrolment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="TutorialAllocation.php">Tutotial Allocate</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Timetable.php">MyTimetable</a>
                    </li>
                </ul>
                <div class="button navbar-right">
                    <a href="signout.php"><button class="btn btn-success btn-md">Log Out</button></a>
                </div>
            </div>
        </nav>
<section class="main">
    <div class ="container">
        <h2 align ="center">Welcome, <?php echo $session_user;?>, Enroll Your Tutorial!</h2>

        <a href="./signin_success.php">Back to Main</a>

        <table class="table table-bordered table-striped" id="tableedit">
            <thead>
                <tr>
                    <th>Unit Code</th>
                    <th>Tutor</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th></th>
                </tr>
                <tbody>
                    <?php

                    //choose data from database and insert them in to table
                    $Query = "SELECT tutorial.id, unitcode, tutor, time, location FROM unitenroll, tutorial WHERE unitenroll.unit_code=tutorial.unitcode && `idnumber`='$session_id'";
                    $result_units = $mysqli->query($Query);
                    
                    $Query = "SELECT * FROM `users` WHERE `idnumber`='$session_id'";
                    $result = $mysqli->query($Query);
                    while ($data = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                        //define user id and name
                        $user_id = $data['idnumber']; 
                        $user_name = $data['username']; 
                    }

                    while ($rows_units = mysqli_fetch_array($result_units)) {
                        //define unit code,tutor,time,lacation
                        $id = $rows_units['id'];
                        $code = $rows_units['unitcode'];
                        $tutor = $rows_units['tutor'];
                        $time = $rows_units['time'];
                        $tlocation = $rows_units['location'];

                    $Query = "SELECT * FROM `unitenroll`  ";
                    $result = $mysqli->query($Query);
                    ?>

              <tr>
                <td><?php echo $rows_units['unitcode']; ?></td>
                <td><?php echo $rows_units['tutor']; ?></td>                
                <td><?php echo $rows_units['time']; ?></td>
                <td><?php echo $rows_units['location']; ?></td>
                <div>
                    <td>
                        <?php 
                        
                        echo '<input class="m" value="' . $id . '" hidden>';
                       
                        echo '<input class="x" value="' . $user_id . '" hidden>';
                        echo '<input class="n" value="' . $user_name . '" hidden>';
                        echo '<input class="y" value="' . $tutor . '" hidden>';
                        echo '<input class="z" value="' . $time . '" hidden>';
                        echo '<input class="l" value="' . $tlocation . '" hidden>';

                        echo '<button type="button" class="enrol btn btn-success btn-sm btn-block" value="' . $code . ' ">Enroll</button>';

                        ?>
                    </td>
                </div>
              </tr>
            <?php }
            ?>
          </tbody>
        </table>

        <a href="manage_tutorial.php"><button type='button' class='btn btn-info' id='unit_code' style="float:right;">Manage My Tutorial</button></a><br><br>


    </div>
          </section>

    <footer>
            <div class="footer-content">
                <img src="./img/1.png" alt="" class="fimg"><br><br>
                <p>The University of DoWell in Wonderland (UDW) has started to build a Course Management System including a new tutorial allocation system. To increase the efficiency and the effectiveness of the enrolment process, the University has decided to develop a web site where the students, tutors and lecturers can use.</p>
            </div>
            
            <div class="footer-links">
                
                <a href="MasterPageforAcademicStaff.php">Staff Allocation</a>
                <a href="MasterPageforUnit.php">Unit Management</a>
                <a href="MyAccount.php">My Account</a>
                <a href="EnrolledStudent.php">Enrolled Student</a>
                <a href="Unit_management.php">Unit Allocation</a>
            </div>
            
            <div class="footer-copy">
                <br>
                <p>Copyright &copy; 2020.Company name All rights reserved.</p>
            </div>
        </footer>

<script>


// enrol to a unit
    $('.enrol').click(function() {
        var id = $(this).siblings('.m').val();
        var unit = $(this).val();
        var studentid = $(this).siblings('.x').val();
        var studentname = $(this).siblings('.n').val();
        var tutor = $(this).siblings('.y').val();
        var time = $(this).siblings('.z').val();
        var tlocation = $(this).siblings('.l').val();

        var enrolAction = 'enrolAction';
        $.post('tutorial_enroll.php', {
            id:id,
            studentid: studentid,
            studentname: studentname,
            unit: unit,
            tutor: tutor,
            time: time,
            tlocation: tlocation,

            enrolAction: enrolAction
        },function(data){
          if(data.exist){
            alert('This tutorial HAVE been enrolled!');
          }else{
            alert('Successfully enroled!');
          }
        },'json');
    });


</script>
</body>
</html>