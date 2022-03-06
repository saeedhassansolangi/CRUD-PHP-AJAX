<?php
    require "./db.php";
    $id = $_GET['id'];
    $select_record= "SELECT students.`studentId`, students.`student_name`, students_details.`email_id`, students_details.`department`, students_details.`roll_no` from students, students_details WHERE students.`studentId` = students_details.`studentId` AND students_details.`studentId`='".$id."'";

    if($result = mysqli_query($connection, $select_record)){
        if(mysqli_num_rows($result)){
            echo "<h1 class='mt-3'>Student Details</h1>";
            echo '<table class="table mt-5">';
            echo '<tr>';
            echo '<th>student_id</th><th>name</th><th>email_id</th><th>department</th><th>roll_no</th>';
            $fetch_record = mysqli_fetch_array($result);
            echo '</tr>';
            echo '<tr>';
            echo '<td>'.$fetch_record['studentId'].'</td>';
            echo '<td>'.$fetch_record['student_name'].'</td>';
            echo '<td>'.$fetch_record['email_id'].'</td>';
            echo '<td>'.$fetch_record['department'].'</td>';
            echo '<td>'.$fetch_record['roll_no'].'</td>';
            echo '</tr>';
            echo '</table>';
        }
    }
?>
