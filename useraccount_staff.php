
<?php
include('db_conn.php'); //db connection
include("session.php");

$query = "SELECT * FROM users WHERE idnumber = '".$_SESSION['session_id']."'";
                  $result =$mysqli->query($query);
                $row =$result->fetch_array(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User Account - Student</title>
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
        <h2 align ="center">Change Your Details</h2>
        <div class="row">
            <div class="col-sm-4" style="margin: 0 auto; text-align: center;">
                <div class="panel-body">
                    <form role="form" onsubmit="return validate();"   >
                        <div class="form-group" >
                            <label for="idnumber">ID:</label> 
                            <input type="text" class="form-control" id="idnumber" name="idnumber" value="<?php echo $row['idnumber']; ?>" readonly>
                        </div>
                        <div class="form-group" >
                            <label for="email">E-mail:</label> 
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $row['email']; ?>" pattern="([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)">
                        </div>
                        <div class="form-group">
                            <label for="password">Change password:</label>
                            <input type="password" class="form-control" id="password" name="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^])[A-Za-z\d!@#$%^]{6,12}$">
                        </div>
                        <div class="form-group">
                            <label for="repassword">Confirm password:</label>
                            <input type="password" class="form-control" id="repassword" name="repassword" >
                        </div>
                        <div class="form-group">
                            <label for="address">Address:</label>
                            <input type="text" class="form-control" id="address" name="address" value="<?php echo $row['address']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="qualification">Qualification:</label>
                            <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo $row['qualification']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="expertise">Expertise:</label>
                            <input type="text" class="form-control" id="expertise" name="expertise" value="<?php echo $row['expertise']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="pnumber">Phone number:</label>
                            <input type="text" class="form-control" id="pnumber" name="pnumber" value="<?php echo $row['pnumber']; ?>">
                        </div>
                        <div class="form-group">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" class="form-control" id="dob" name="dob" value="<?php echo $row['dob']; ?>">
                        </div>
                        <div class="form-group">
                                <button type="submit" name="change" id="submit" class="btn btn-warning text-white">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-sm-2" >
                <div class="panel-body"></div>
            </div>

            <div class="col-sm-5" >
                <div class="panel-body">
                    <br><h5>Your Lecture Timetable</h5>

                    <table class="table table-bordered table-striped" id="tableedit">
                        <thead>
                            <tr>
                                <th>Unit Code</th>
                                <th>Unit Name</th>
                                <th>Lecture Time</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $Query = "SELECT * FROM units where lecturer='$session_user'";
                            $rest =$mysqli->Query($Query);
                            while ($row_unit =$rest->fetch_array(MYSQLI_ASSOC)):
                                echo "<tr>";
                                echo "<td>{$row_unit['unit_code']}</td>";
                                echo "<td>{$row_unit['unit_name']}</td>";
                                echo "<td>{$row_unit['lecture_time']}</td>";
                                echo "<td>{$row_unit['lec_location']}</td>";
                                echo "</tr>";
                                endwhile;
                            ?>
                        </tbody>
                    </table>

                    <br><h5>Your Tutorial Timetable</h5>
                    <table class="table table-bordered table-striped" id="tableedit">
                        <thead>
                            <tr>
                                <th>Unit Code</th>
                                
                                <th>Tutorial Time</th>
                                <th>Location</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tutorial WHERE tutor='$session_user'";
                            $result =$mysqli->query($query);
                            while ($row =$result->fetch_array(MYSQLI_ASSOC)):
                                echo "<tr>";
                                echo "<td>{$row['unitcode']}</td>";
                                
                                echo "<td>{$row['time']}</td>"; 
                                echo "<td>{$row['location']}</td>";
                                echo "</tr>";
                            endwhile;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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
//confirm the changed password
function validate() {
        if ( $("#password").val() !== $("#repassword").val()) {
            alert("Password do not match.");
            
            return false;
        }
var idnumber=$("#idnumber").val().trim();
     var email = $("#email").val().trim();
     var password = $("#password").val().trim();
     var address = $("#address").val().trim();
     var qualification = $("#qualification").val().trim();
     var expertise = $("#expertise").val().trim();

     var pnumber = $("#pnumber").val().trim();
     var dob = $("#dob").val().trim();

$.post("student_account.php", {
    idnumber:idnumber,
            email:email,
            password:password,
            address:address,
            qualification:qualification,
            expertise:expertise,
            pnumber:pnumber,
            dob:dob
        }, function(data) {
            if(data.update){
                alert('Update successfully');
            }else{
                alert('Update failure');
            }
        },'json');
return false;
    }
    
</script>
</body>
</html>