<?php
include('db_conn.php'); //db connection
include("session.php");

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
        <h2 align ="center">Tutorial Management</h2>
            <form action="#" method="post">
            <h5>Available Tutor</h5>
            <table class="table table-bordered table-striped" > 
                <tr>
                    <td>
                        <?php 
                        $query = "SELECT * FROM users where title like '%Tutor%'";
                        $result =$mysqli->query($query);
                        while ($row =$result->fetch_array(MYSQLI_ASSOC)):
                            echo "$row[username]; ";
                        endwhile;
                        ?>
                    </td>
                </tr>
            </table>
        </form>
        <br>

        <div class="input-group md-form form-sm form-1 pl-0">
            <div class="input-group-prepend">
                <span class="btn btn-secondary" id="basic-text1"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
            </div>
            <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search" name="search_text" id="search_text">
        </div>
        <br>
        <div id="result"></div>


        <button type="button" style="float:right" class="btn btn-primary btn-md" style="float:right" data-toggle="modal" data-target="#Modal" data-whatever="@mdo">Add New Tutorial</button><br><br><br>
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Tutorial</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validate();">
                                        <p>
                                            <label style="font-weight: 600">Unit Code</label>
                                            <input class="form-control" type ="text" id="unitcode" name="unitcode">
                                        </p>
                                        <p>
                                            <label style="font-weight: 600">Tutor</label>
                                            <input class="form-control" type ="text" id="tutor" name="tutor">
                                        </p>
                                        <p>
                                            <label style="font-weight: 600">Time</label>
                                            <input class="form-control" type ="text" id="time" name="time">
                                        </p>
                                        <p>
                                            <label style="font-weight: 600">Location</label>
                                            <input class="form-control" type ="text" id="location" name="location">
                                        </p>
                                        <p>
                                            <label style="font-weight: 600">Max number</label>
                                            <input class="form-control" type ="text" id="maxnumber" name="maxnumber">
                                        </p>

                                        <p>
                                            <input type ="submit" name="submit" class="btn btn-info" value="Add">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </p>
                                    </form>
                                    <?php
                                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                                        $unitcode=$_POST['unitcode'];
                                        $tutor=$_POST['tutor'];
                                        $time=$_POST['time'];
                                        $location=$_POST['location'];
                                        $maxnumber=$_POST['maxnumber'];
                                        

                                        $query="INSERT INTO `tutorial`(`unitcode`,`tutor`,`time`,`location`,`maxnumber`)VALUES('$unitcode','$tutor','$time','$location','$maxnumber')";
                                        $result=$mysqli->query($query);
                                        if($result){
                                            echo '<meta http-equiv="refresh" content="0">';
                                        }else{
                                            echo "Add failed";
                                        }
                                        $mysqli->close();
                                    }
                                    ?>
                    </div>
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
$(document).ready(function(){

    load_data();

    function load_data(query){

        $.ajax({
            url:"filter.php",
            method:"POST",
            data:{query:query},
            success:function(data)
            {
                $('#result').html(data);
            }
        });
    }

    $('#search_text').keyup(function(){

        var search = $(this).val();
        if(search != ''){
            load_data(search);
        }
        else{
            load_data();
        }
    });
});

</script>
</body>
</html>