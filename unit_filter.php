

<?php

$connect = mysqli_connect("localhost", "dengm", "448185", "dengm");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);

 //search the key words
 $query = "
  SELECT * FROM units 
  WHERE unit_code LIKE '%".$search."%'
  OR unit_name LIKE '%".$search."%' 
  OR coordinator LIKE '%".$search."%' 
  OR semester LIKE '%".$search."%' 
  OR campus LIKE '%".$search."%' 

 ";
}
else
{
 $query = "
  SELECT * FROM units ORDER BY unit_code
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
  //show the search content to table
 $output .= '
  <div class="table-responsive">
   <table class="table table-bordered table-striped" id="tableedit">
    <tr>
       <th>ID</th>
       <th>Unit Code</th>
       <th>Unit Name</th>
       <th>Coordinator</th>
       <th>Semester</th>
       <th>Campus</th>
       <th>Description</th>

    </tr>
    <script type="text/javascript" src="unit_edit.js"></script>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["id"].'</td>
    <td>'.$row["unit_code"].'</td>
    <td>'.$row["unit_name"].'</td>
    <td>'.$row["coordinator"].'</td>
    <td>'.$row["semester"].'</td>
    <td>'.$row["campus"].'</td>
    <td>'.$row["description"].'</td>
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>