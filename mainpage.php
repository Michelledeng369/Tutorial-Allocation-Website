<?php
//include the file session.php
include("session.php");

//if the session for username has been set, automatically go to "signin_success.php"
if($session_user!="") {
    header('location: ./signin_success.php');
}

//if there is any received error message 
if(isset($_GET['error']))
{
    $errormessage=$_GET['error'];
    //show error message using javascript alert
    echo "<script>alert('$errormessage');</script>";
}
?>

<!DOCTYPE html>

<html>
    <head>
     <meta charset="utf-8">
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
    <title>Mainpage</title>
    <link rel="stylesheet" href="css/mainpage.css" />
    </head>
    
    <body>
        <nav class="navbar navbar-expand-md">
            <a class="navbar-brand" href="mainpage.php">University of DoWell</a>
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
                     <button type="button" class="btn btn-success" style="float:right" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Log In</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Log In</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body" id="modalsearch">
                        <form id="log" action="./signin_engine.php" method="post">
                            <div class="form-group">
                                <label for="username" class="col-form-label">User ID:</label>
                                <input type="text" class="form-control" id="idnumber" name="idnumber">
                                <label for="password" class="col-form-label">Password:</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="signin" id="submit" class="btn btn-warning text-white">Submit</button>
                            </div>
                        </form>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                    </div>

                </div>
            </div>
        </div>

                    <a href="Registration.php" target="_blank"><button class="btn btn-info btn-md">Sign up</button></a>
                </div>
            </div>
        </nav>
        
        <img src="./img/ban222.jpg" class="img11">
        
        
        
        <div class="container-fluid">
            <div class="description">
                <h1>Welcome to University of DoWell!</h1>
                <p>Start Your Study, Right Now!</p>
                
                <a href="UnitDetail.php" target="_blank"><button class="btn btn-dark btn-md">Unit Detail</button></a>
                <a href="UnitEnrolment.php" target="_blank"><button class="btn btn-secondary btn-md">UnitEnroll</button></a>
            </div>
       </div>
        
        <div class="container features">
            <h1>"Popular Course"</h1><br>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img src="./img/blog-1.jpg" class="card-img-top" alt="Card image cap">
                            <div class="card-body">
                                <h5>KIT712 - Data Management Technology</h5>
                                <p class="card-text">This unit is designed to introduce students to the fundamental concepts necessary for the analysis, design, use and implementation of a relational database management system for the management of data in modern organisations.</p>
                                <a href="UnitDetail.php"><button class="btn btn-info btn-md">More</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img src="./img/blog-2.jpg" class="card-img-top" alt="Card image cap">
                            <div class="card-body">
                                <h5>KIT713 - Multi-perspective ICT Project </h5>
                                <p class="card-text">This unit provides students with an opportunity to make practical use of knowledge they have acquired from their completed Masters units, in combination with gaining new skills in undertaking research.</p>
                                <a href="UnitDetail.php"><button class="btn btn-info btn-md">More</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img src="./img/blog-3.jpg" class="card-img-top" alt="Card image cap">
                            <div class="card-body">
                                <h5>KIT714 - ICT Research Principles</h5>
                                <p class="card-text">This unit is designed to give ICT research students an appreciation of the significance of research and provide students with research skills, knowledge and understandings that will enable them to conduct their own research in a rigorous manner.</p>
                                <a href="UnitDetail.php"><button class="btn btn-info btn-md">More</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img src="./img/blog-4.jpg" class="card-img-top" alt="Card image cap">
                            <div class="card-body">
                                <h5>KIT707 - Knowledge and Information Management</h5>
                                <p class="card-text">This unit aims to present a coherent view on the role of information and knowledge in organisations from a multidisciplinary perspective. Students will have an opportunity to explore current approaches to information and knowledge management in the context of a real organisation.</p>
                                <a href="UnitDetail.php"><button class="btn btn-info btn-md">More</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img src="./img/blog-5.jpg" class="card-img-top" alt="Card image cap">
                            <div class="card-body">
                                <h5>KIT710 - eLogistics</h5>
                                <p class="card-text">The unit explores contemporary supply chain logistics for organisations from Informational, Communication and Technological (ICT) perspectives. By the end of the unit, students will know how the principles of supply chain logistics intersect with ICTs to assist businesses achieve improved productivity and safety.</p>
                                <a href="UnitDetail.php"><button class="btn btn-info btn-md">More</button></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img src="./img/blog-6.jpg" class="card-img-top" alt="Card image cap">
                            <div class="card-body">
                                <h5>KIT711 - Network Security Techniques and Technology </h5>
                                <p class="card-text">This course will introduce you to a range of principles, concepts and technologies in network security. As a field it is constantly increasing in importance with it being a consideration for most companies with web presence. Students in lectures learning about the  secure networks technologies.</p>
                                <a href="UnitDetail.php"><button class="btn btn-info btn-md">More</button></a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
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

    </body>
</html>
