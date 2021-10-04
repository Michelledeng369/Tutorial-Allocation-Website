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

//only the access is 1 can user use this page
if($row['access']!='1') {
echo'<script language="JavaScript">;alert("You do not have accesss to this page!");location.href="./signin_success.php";</script>;';
die;
}

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

        

        <div class="input-group md-form form-sm form-1 pl-0">
            <div class="input-group-prepend">
                <span class="btn btn-secondary" id="basic-text1"><i class="fas fa-search text-white" aria-hidden="true"></i></span>
            </div>
            <input class="form-control my-0 py-1" type="text" placeholder="Search" aria-label="Search" name="search_text" id="search_text">
        </div>
        <br>
        <div id="result"></div>

         <button type="button" style="float:right" class="btn btn-primary btn-md" style="float:right" data-toggle="modal" data-target="#Modal" data-whatever="@mdo">Add New Unit</button><br><br><br>
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Unit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" onsubmit="return validate();">
                                        <p>
                                            <label style="font-weight: 600">Unit Code</label>
                                            <input class="form-control" type ="text" id="unitCode" name="unitCode">
                                        </p>
                                        <p>
                                            <label style="font-weight: 600">Unit Name</label>
                                            <input class="form-control" type ="text" id="unitName" name="unitName">
                                        </p>
                                        <p>
                                            <label style="font-weight: 600">Coordinator</label>
                                            <input class="form-control" type ="text" id="coordinator" name="coordinator">
                                        </p>
                                        <p>
                                            <label style="font-weight: 600">Semester</label>
                                            <input class="form-control" type ="text" id="semester" name="semester">
                                        </p>
                                        <p>
                                            <label style="font-weight: 600">Campus</label>
                                            <input class="form-control" type ="text" id="campus" name="campus">
                                        </p>
                                        <p>
                                            <label style="font-weight: 600">Description</label>
                                            <input class="form-control" type ="text" id="description" name="description">
                                        </p>

                                        <p>
                                            <input type ="submit" name="submit" class="btn btn-info" value="Add">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </p>
                                    </form>

                                    <?php
                                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                                        $unitCode=$_POST['unitCode'];
                                        $unitName=$_POST['unitName'];
                                        $coordinator=$_POST['coordinator'];
                                        $semester=$_POST['semester'];
                                        $campus=$_POST['campus'];
                                        $description=$_POST['description'];


                                        //insert the added data to units database
                                        $query="INSERT INTO `units`(`unit_code`,`unit_name`,`coordinator`,`semester`,`campus`,`description`)VALUES('$unitCode','$unitName','$coordinator','$semester','$campus','$description')";
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

//the relevant information will shownon the table according to the key words
$(document).ready(function(){

    load_data();

    function load_data(query){

        $.ajax({
            url:"unit_filter.php",
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


//judge the format of input
function validate() {
 
            if ( $("#unitCode").val() === "") {
                alert("Unit Code is required.");
                
                return false;
            } else if ( $("#unitName").val() === "") {
                alert("Unit Name is required.");
                
                return false;
            }else if ( $("#coordinator").val() === "") {
                alert("Coordinator is required.");
                
                return false;
            }else if ( $("#semester").val() === "") {
                alert("Semester is required.");
                
                return false;
            }else{
                alert("You have added a unit successfully.");
            }

           
        };


</script>
</body>
</html>