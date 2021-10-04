
<?php

$connect = mysqli_connect("localhost", "dengm", "448185", "dengm");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM tutorial 
  WHERE unitcode LIKE '%".$search."%'
  OR tutor LIKE '%".$search."%' 
  OR time LIKE '%".$search."%' 
  OR location LIKE '%".$search."%' 
 "; //Searching according to the key word.
}
else
{
 $query = "
  SELECT * FROM tutorial ORDER BY unitcode
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table-bordered table-striped" id="tableedit">
    <tr>
     <th>ID</th>
                    <th>Unit Code</th>
                    <th>Tutor</th>
                    <th>Time</th>
                    <th>Location</th>
                    <th>Max Number</th>
    </tr>
    <script type="text/javascript" src="edit.js"></script>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
   <td>'.$row["id"].'</td>
    <td>'.$row["unitcode"].'</td>
    <td>'.$row["tutor"].'</td>
    <td>'.$row["time"].'</td>
    <td>'.$row["location"].'</td>
    <td>'.$row["maxnumber"].'</td>
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