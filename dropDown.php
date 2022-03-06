<?php
require "db.php";
echo "<form action='' >";
$student_record = "SELECT * FROM students";
if($result = mysqli_query($connection, $student_record)) {
    if(mysqli_num_rows($result) > 0) {
        echo '<div class="form-group">
            <label for ="sel1"> Students: </label>
            <select class="form-control" id="stdId" name="stdId">';
        while($row = mysqli_fetch_array($result)) {
            echo "<option value='".$row['studentId']."'>".$row['student_name']."</option>";
        }
        echo '</select></div>';
    }
}

echo '<button type="button" id="fetchbtn" class="btn btn-primary btn-lg mt-5">Fetch</button>';
echo "</form>";

?>