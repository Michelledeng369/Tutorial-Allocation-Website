<?php
//include the file session.php
include("session.php"); 
include("db_conn.php");

if(isset($_POST['signup']))
{
//receive the username data from the form 
$idnumber=$_POST['idnumber'];
$user=$_POST['username'];
//receive the password data from the form 
$email=$_POST['email'];
$address=$_POST['address'];
$dob=$_POST['dob'];
$pnumber=$_POST['pnumber'];
$qualification=$_POST['qualification'];
$expertise=$_POST['expertise'];

$salt = base64_encode(random_bytes(16));
$password = crypt($_POST["password"], $salt);
$repassword = crypt($_POST["repassword"], $salt);

//query to check whether username is in the table (check whether the user has been signed up)
$query = "SELECT * FROM users WHERE username='$user'";
//execute query to the database and retrieve the result ($result)
$result = $mysqli->query($query);

//convert the result to array (the key of the array will be the column names of the table)
  $row=$result->fetch_array(MYSQLI_ASSOC);


//if the username from table/database is not same as the username data from the form
if($row['username']==$user)
{
  
  //automatically go back to signin_form and pass the error message
  echo "<script>alert('Username exits');</script>";

  
}//if the username is same as the username data from the form
else{
if($repassword==$password) {

  $query="INSERT INTO users(idnumber, username, password, access, email, address, dob, pnumber, qualification, expertise) VALUES('$_POST[idnumber]','$_POST[username]','$password','5','$_POST[email]','$_POST[address]', '$_POST[dob]', '$_POST[pnumber]', '$_POST[qualification]', '$_POST[expertise]')";
  $result=$mysqli->query($query); 
  $session_user=$user;
  $session_id=$idnumber;

  $_SESSION['session_user']=$session_user;
  $_SESSION['session_id']=$session_id;

  //automatically go to signin_success.php
  header('Location:signin_success.php'); 
   }
  
  }   
}
?>

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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/mainpage.css" />

    <title>Registration page</title>
  </head>
  
  <body>
      <div id="container">
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
            </div>
        </nav>
          
          <section class="main">
              <img src="./img/ban111.jpg" class="img12"><br><br>
              <div class="button1">
                  <p>Registration to Course Management System</p><br>
                  <button id = "student">Student</button>
                  <button id = "staff">Staff</button>
                  <br><br>
              </div>
              
              <div id = "remove">
                  <form id="signupform" action="" onsubmit="return validate();" method="post" >
                      <h1>This is STUDENT Registration Page
                          <span>Please fill all the texts in the fields.</span></h1>

                      <label>
                          <span style="color:red">*Name: </span>
                          <input type="text" name="username" id="username" ><br><br>
                      </label>

                      <label>
                          <span style="color:red">*ID:</span>
                          <input type="text" name="idnumber" id="id" ><br><br>
                      </label>
                      <label>
                          <span style="color:red">*Password: </span>
                          <input type="password" name="password" id="password" ><br><br>
                      </label>
                      
                      <label>
                          <span style="color:red">*Confirm password: </span>
                          <input type="password" name="repassword" id="repassword" ><br><br>
                      </label>
                      
                      <label>
                          <span style="color:red">*Email: </span>
                          <input type="text" name="email" id="email" ><br><br>
                      </label>
                      
                      <label>
                          <span>Address (optional):</span>
                          <input type="text" name="address" id="address" ><br><br>
                      </label>
                      
                      <label>
                          <span>Date of Birth (optional): </span>
                          <input type="text" name="dob" id="dob" ><br><br>
                      </label>
                      
                      <label>
                          <span>Phone number (optional):</span>
                          <input type="text" name="pnumber" id="pnumber" ><br><br>
                      </label>
                      
                      <label>
                          <span>&nbsp;</span>
                          <input type="submit" value="Submit" id="submit" name="signup">
                      </label>
                  </form>
              </div>
              
              <div id = "remove1"><form id="signupform" action="" onsubmit="return validate1();" method="post">
                      <h1>This is STAFF Registration Page
                          <span>Please fill all the texts in the fields.</span>
                      </h1>
                      
                      <label>
                          <span style="color:red">*Name:</span>
                          <input type="text" name="username" id="username1" ><br><br>
                      </label>
                      
                      <label>
                          <span style="color:red">*ID:</span>
                          <input type="text" name="idnumber" id="id1" ><br><br>
                      </label>
                      
                      <label>
                          <span style="color:red">*Password:</span>
                          <input type="password" name="password" id="password1" ><br><br>
                      </label>
                      
                      <label>
                          <span style="color:red">*Confirm password:</span>
                          <input type="password" name="repassword" id="repassword1" ><br><br>
                      </label>
                      
                      <label>
                          <span style="color:red">*Email:</span>
                          <input type="text" name="email" id="email1" ><br><br>
                      </label>
                      
                      <label>
                          <span style="color:red">*Phone number: </span>
                          <input type="text" name="pnumber" id="pnumber1" ><br><br>
                      </label>
                      
                      <label>
                          <span style="color:red">*Qualification:</span>
                          <input list="qualification" type="text" name="qualification" id="qualification1">
                          <datalist id="qualification">
                              <option value="PhD">
                              <option value="Master">
                          </datalist>
                          <br><br>
                      </label>
                      
                      <label>
                          <span style="color:red">*Expertise:</span>
                          <input list="expertise" type="text" name="expertise" id="expertise1">
                          <datalist id="expertise">
                              <option value="Human Computer Interaction">
                              <option value="Information Systems">
                              <option value="Network Administration">
                          </datalist>
                          <br><br>
                      </label>
                      
                      <label>
                          <span>Address (optional): </span>
                          <input type="text" name="address" id="address1" ><br><br>
                      </label>

                      <label>
                          <span>Date of Birth (optional): </span>
                          <input type="date" name="dob" id="dob" ><br><br>
                      </label>
                      <label>
                          <span>&nbsp;</span>
                          <input type="submit" value="Submit" id="submit" name="signup">
                      </label>
                  
                  </form>
              </div>
              <br><br>
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
      </div>

<script type="text/javascript">
  
  //switch ‘staff' and 'student' form  
    $(document).ready(function(e) {
    $("#student").click(function(e) {
        $("#remove1").hide();
        $("#remove").show();
    });
     $("#staff").click(function(e) {
        $("#remove").hide();
        $("#remove1").show();
    });     
});

    function validate() {
        var reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^])[A-Za-z\d!@#$%^]{6,12}$/;
        var reg1 = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;
        if ( $("#username").val() === "") {
            alert("please enter your username.");
            
            return false;
        } else if ( $("#id").val() === "") {
            alert("please enter your ID number.");
            
            return false;
        }else if ( reg.test($("#password").val() ) === false) {
            alert("Password must contain at least one number and one uppercase and lowercase letter, one of following special characters !@#$%^ and 6 to 12 characters.");
            return false;
        }else if ( $("#repassword").val() === "") {
            alert("please re-type the password.");
            
            return false;
        }else if ( $("#password").val() !== $("#repassword").val()) {
            alert("Password do not match.");
            
            return false;
        }else if ( reg1.test($("#email").val() ) === false) {
            alert("please enter your valid email address.");
            
            return false;
        }
    }
    
    function validate1() {
        var reg = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^])[A-Za-z\d!@#$%^]{6,12}$/;
        var reg1 = /([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)/;
        if ( $("#username1").val() === "") {
            alert("please enter your username.");
            
            return false;
        } else if ( $("#id1").val() === "") {
            alert("please enter your ID number.");
            
            return false;
        }else if ( reg.test($("#password1").val() ) === false) {
            alert("Password must contain at least one number and one uppercase and lowercase letter, one of following special characters !@#$%^ and 6 to 12 characters.");
                
            return false;
        }else if ( $("#confirm_password1").val() === "") {
            alert("please re-type the password.");
                
            return false;
        }else if ( $("#password1").val() !== $("#repassword1").val()) {
            alert("Password do not match.");
                
            return false;
        }else if( reg1.test($("#email1").val() ) === false) {
            alert("please enter your valid email address.");
            
            return false;
        }else if ( $("#pnumber1").val() === "") {
            alert("please enter your phone number.");
            
            return false;
        }else if ( $("#qualification1").val() === "") {
            alert("Please enter your qualification.");
            
            return false;
        }else if ( $("#expertise1").val() === "") {
            alert("Please enter your expertise.");
            
            return false;
        }
    }

</script>
  </body>
</html>