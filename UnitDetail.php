<?php
include('db_conn.php'); //db connection
include("session.php");

$query = "SELECT*FROM units";
$result =$mysqli->query($query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
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
        <h2 align ="center">Manage Unit details</h2>
        <a href="./signin_success.php">Back to Main</a>

        <button type="button" class="btn btn-light" style="float:right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Search</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel" >Search</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body" id="modalsearch">
                        <form id="lets_search" onsubmit="return search()">
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Search:</label>
                                <input type="text" class="form-control" id="recipient-name" name="recipient-name">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="send" id="send" class="btn btn-warning text-white">Search</button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

        <table class="table table-bordered table-striped" id="tableedit">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Unit Code</th>
                    <th>Unit Name</th>
                    <th>Coordinator</th>
                    <th>Semester</th>
                    <th>Campus</th>
                    <th>Description</th>

                </tr>
            </thead>
            <tbody>
                <?php
                  $query = "SELECT id, unit_code, unit_name, coordinator, semester, campus, description FROM units";
                  $result =$mysqli->query($query);
                    while ($row =$result->fetch_array(MYSQLI_ASSOC)):
                        echo "<tr>";
                    foreach($row as $key=>$value):
                        echo"<td>$value</td>"; 
                    endforeach;
                        echo"</tr>";
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
function search() {
    var value = $("#recipient-name").val().trim();
    $.post("search_query.php", {
            value: value
        }, function(data) {
            $("#modalsearch").html(data);
        });
        return false;
    };

//for more search times
$("#exampleModal").on('show.bs.modal',function(e){
    var data='<form id="lets_search" onsubmit="return search()"> <div class="form-group"> <label for="recipient-name" class="col-form-label">Search:</label> <input type="text" class="form-control" id="recipient-name" name="recipient-name"> </div> <div class="form-group"> <button type="submit" name="send" id="send" class="btn btn-warning text-white">Search</button> </div> </form>';
$('#modalsearch').html(data);
});





</script>
</body>
</html>