<?php
include('db_conn.php'); 

//db connection


//search key word function
if (isset($_POST['value'])) {
    $keyword = $_POST['value'];
    $query = "SELECT * FROM units WHERE id LIKE '%$keyword%'
    or unit_code LIKE '%$keyword%'
    or unit_name LIKE '%$keyword%'
    or coordinator LIKE '%$keyword%'
    or semester LIKE '%$keyword%' 
    or campus LIKE '%$keyword%' ";
    $results = mysqli_query($mysqli, $query);
    if (mysqli_num_rows($results) > 0) {
        echo '<p>We found ' . mysqli_num_rows($results) . ' result(s).';
        foreach ($results as $r) {
            echo '<table class="table table-bordered"><tr>';
            echo '<td width="30%">ID</td>';
            echo '<td>' . $r['id'] . '</td></tr>';
            echo '<td>Unit Code</td>';
            echo '<td>' . $r['unit_code'] . '</td></tr>';
            echo '<td>Unit Name</td>';
            echo '<td>' . $r['unit_name'] . '</td></tr>';
            echo '<td>Coordinator</td>';
            echo '<td>' . $r['coordinator'] . '</td></tr>';
            echo '<td>Semester</td>';
            echo '<td>' . $r['semester'] . '</td></tr></table>';
        } 
    } else {
        
        echo '<form id="lets_search" onsubmit="return search()"> <div class="form-group"> <label for="recipient-name" class="col-form-label">Search:</label> <input type="text" class="form-control" id="recipient-name" name="recipient-name"> </div> <div class="form-group"> <button type="submit" name="send" id="send" class="btn btn-warning text-white">Search</button> </div> </form>';
        echo '<script>';
        echo 'alert("Don\'t have a record")';
        echo '</script>';
    }
}
 
?>