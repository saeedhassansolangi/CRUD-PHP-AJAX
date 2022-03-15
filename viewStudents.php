<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<link rel="stylesheet" href="./style.css">

<?php
require('./config.php');

$students_record = "SELECT `student_name`,`email_id`, `department`, `roll_no`, `address` FROM `students_details`, `students` where `students_details`.`studentId` = `students`.`studentId`";
$result = mysqli_query($connection, $students_record);
if($result){
    $areThereAnyRecords = mysqli_num_rows($result) > 0;
    if($areThereAnyRecords){
        echo "<h1 class='mt-3'>Student Details</h1>";
        echo '<table class="table mt-5">';
        echo '<tr>';
        echo '<th>Student_name</th><th>Email_id</th><th>Department</th><th>Roll_no</th><th>Address</th>';
        echo '</tr>';
        while($student = mysqli_fetch_array($result)){
            echo '<tr>';
            echo '<td>'.$student['student_name'].'</td>';
            echo '<td>'.$student['email_id'].'</td>';
            echo '<td>'.$student['department'].'</td>';
            echo '<td>'.$student['roll_no'].'</td>';
            echo '<td>'.$student['address'].'</td>';
            echo '</tr>';
//            echo $student['student_name'] . " " . $student['email_id'] . " " . $student['department'] . " " . $student['roll_no'] ." ". $student['address'] ."<br>";
        }
        echo '</table>';
    }
}else {
    echo "Error: " . $students_record . "<br>" . mysqli_error($connection);
}

?>

