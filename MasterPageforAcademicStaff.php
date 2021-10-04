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
        <h2 align ="center">Modify the list of Academic Staff</h2><br>
                  
           <table class="table table-bordered table-striped" id="tableedit">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Staff ID</th>
                    <th>Staff Name</th>
                    <th>Unavailability</th>
                    <th>Title</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  $query = "SELECT id, idnumber, username, unavailability, title FROM users where access!='5'";
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

 <button type="button" class="btn btn-primary btn-md" style="float:right" data-toggle="modal" data-target="#Modal" data-whatever="@mdo">Add New Staff</button><br><br><br>
            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New Staff</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
                                        <p>
                                            <label style="font-weight: 600">ID</label>
                                            <input class="form-control" type ="text" id="idnumber" name="idnumber">
                                        </p>
                                        <p>
                                            <label style="font-weight: 600">Username</label>
                                            <input class="form-control" type ="text" id="username" name="username">
                                        </p>
                                        <p>
                                            <label style="font-weight: 600">Lecturer</label>
                                            <input class="form-control" type ="checkbox" id="lecturer" name="title[]" value="Lecturer">
                                         </p>
                                          <p>
                                        <label style="font-weight: 600">Tutor</label>
                                        <input class="form-control" type ="checkbox" id="tutor" name="title[]" value="Tutor">
                                        </p>
                                        <p>
                                            <input type ="submit" name="submit" class="btn btn-info" value="Add">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </p>
                                    </form>
                                    <?php
                                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                                        $idnumber=$_POST['idnumber'];
                                        $username=$_POST['username'];
                                        $tag = $_POST['title'];
                                        $title = implode(', ', $tag);
                                        
                                        //insert the added data to units database                                        
                                        $query="INSERT INTO `users`(`idnumber`,`username`,`title`,`access`)VALUES('$idnumber','$username','$title',3)";
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

$(document).ready(function () {
    $('#tableedit').Tabledit({
        //Connect with staff_edit.php
        url:'staff_edit.php',
        toolbarClass:'d-inline',
        buttons: {
        //edit button
           edit:{
                class:'btn btn-sm btn-light',
                html:'<span class="fas fa-pencil-alt"></span>',
                action:'edit'
            },
            //delete button
            delete:{
                class:'btn btn-sm btn-light',
                html:'<span class="fas fa-trash"></span>',
                action:'delete'
            }
        },
        columns:{
            identifier:[0,'id'],
            editable:[[4, 'title']]
        },
        restoreButton:false,
        onSuccess:function(data,textStatus,jqXHR){
            if(data.action=='delete'){
                $('#'+data.id).remove();
            }
        }
    });
});
</script>
</body>
</html>