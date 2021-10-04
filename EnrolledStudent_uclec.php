<?php
include('db_conn.php'); //db connection
include("session.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Enrolled Student Details</title>
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
                <br><h5>Enrolled Unit Student Details</h5>

                    <table class="table table-bordered table-striped" id="tableedit">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Username</th>
                                <th>Unit Code</th>
                                <th>Lecture Time</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM unitenroll where lecturer='$session_user'";
                            $result =$mysqli->query($query);
                            while ($row =$result->fetch_array(MYSQLI_ASSOC)):
                                echo "<tr>";
                                echo "<td>{$row['idnumber']}</td>";
                                echo "<td>{$row['username']}</td>";
                                echo "<td>{$row['unit_code']}</td>";
                                echo "<td>{$row['lecture_time']}</td>";
                                echo "<td>{$row['lec_location']}</td>";
                                echo "</tr>";
                                endwhile;
                            ?>
                        </tbody>
                    </table>

                    
                <br><h5>Enrolled Tutorial Student Details</h5>
                    <table class="table table-bordered table-striped" id="tableedit">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Username</th>
                                <th>Unit Code</th>
                                <th>Tutorial Time</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tutorialenroll where tutor='$session_user'";
                            $result =$mysqli->query($query);
                            while ($row =$result->fetch_array(MYSQLI_ASSOC)):
                                echo "<tr>";
                                echo "<td>{$row['idnumber']}</td>";
                                echo "<td>{$row['username']}</td>";
                                echo "<td>{$row['unit_code']}</td>";
                                echo "<td>{$row['time']}</td>"; 
                                echo "<td>{$row['tlocation']}</td>";
                                echo "</tr>";
                            endwhile;
                            ?>
                        </tbody>
                    </table>
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



</script>
</body>
</html>