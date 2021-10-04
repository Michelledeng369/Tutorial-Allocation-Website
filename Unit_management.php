<?php
include('db_conn.php'); //db connection
include("session.php");

$query = "SELECT * FROM users WHERE username='$session_user'";
$result = $mysqli->query($query);
$row=$result->fetch_array(MYSQLI_ASSOC);

//login is required
if (empty($session_user)){
     echo '<script>;alert("Login is required!");location.href="mainpage.php";</script>;';
 }
//only the access is 1 or 2 can user use this page
if($row['access']!='1' && $row['access']!='2') {
echo'<script language="JavaScript">;alert("You do not have accesss to this page!");location.href="./signin_success.php";</script>;';
die;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Account - Staff</title>
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
        <h2 align ="center">Unit Management / allocating teaching staff</h2><br>
           <form action="#" method="post">
            <h5>Available Lecturer</h5>
            <table class="table table-bordered table-striped" > 
                <tr>
                    <td>
                        <?php 
                        $query = "SELECT * FROM users where title like 'L%'";
                        $result =$mysqli->query($query);
                        while ($row =$result->fetch_array(MYSQLI_ASSOC)):
                            echo "$row[username]; ";
                        endwhile;
                        ?>
                    </td>
                </tr>
            </table>
        </form>

           <table class="table table-bordered table-striped" id="tableedit">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Unit Code</th>
                    <th>Unit Name</th>
                    <th>Semester</th>
                    <th>Campus</th>
                    <th>Coordinator</th>
                    <th>Lecturer</th>
                    <th>Time</th>
                    <th>Location</th>
                   <th>Consultation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  $query = "SELECT id, unit_code, unit_name, semester, campus, coordinator, lecturer, lecture_time, lec_location, consultation FROM units";
                  $result =$mysqli->query($query);
                    while ($row =$result->fetch_array(MYSQLI_ASSOC)):
                        echo "<tr>";
                        echo "<td>{$row['id']}</td>";
                        echo "<td>{$row['unit_code']}</td>";
                        echo "<td>{$row['unit_name']}</td>";
                        echo "<td>{$row['semester']}</td>"; 
                        echo "<td>{$row['campus']}</td>"; 
                        echo "<td>{$row['coordinator']}</td>"; 
                        echo "<td>{$row['lecturer']}</td>";
                        echo "<td>{$row['lecture_time']}</td>";
                        echo "<td>{$row['lec_location']}</td>";
                        echo "<td>{$row['consultation']}</td>";
                        echo "</tr>";
                    endwhile;
                ?>
            </tbody>
        </table>

        <a href="tutorial.php"><button type='button' class='btn btn-info' id='unit_code' style="float:right;">Allocating Tutorial</button></a><br><br>




        
    </div>
          </section>

    <footer>
            <div class="footer-content">
                <img src="./img/1.png" alt="" class="fimg"><br><br>
                <p>The University of DoWell in Wonderland (UDW) has started to build a Course Management System including a new tutorial allocation system. To increase the efficiency and the effectiveness of the enrolment process, the University has decided to develop a web site where the students, tutors and lecturers can use.</p>
            </div>
            
            <div class="footer-links">
                
                <a href="MasterPageforAcademicStaff.php">Master Staff</a>
                <a href="MasterPageforUnit.php">Master Unit</a>
                <a href="MyAccount.php">My Account</a>
                <a href="EnrolledStudent.php">Enrolled Student</a>
                <a href="Unit_management.php">Unit Management</a>
            </div>
            
            <div class="footer-copy">
                <br>
                <p>Copyright &copy; 2020.Company name All rights reserved.</p>
            </div>
        </footer>

<script>

$(document).ready(function () {
    $('#tableedit').Tabledit({
        url:'unit_edit.php',
        toolbarClass:'d-inline',
        deleteButton: false,
        buttons: {
             //edit button
           edit:{
                class:'btn btn-sm btn-light',
                html:'<span class="fas fa-pencil-alt"></span>',
                action:'edit'
            }
            
        },
        columns:{
            identifier:[0,'id'],
             //edit the choosen row with identifier
           editable:[[6, 'lecturer'],[7, 'lecture_time'],[8, 'lec_location'],[9, 'consultation']]
        }
       
    });
});
</script>
</body>
</html>