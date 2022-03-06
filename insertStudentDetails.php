<?php

    require "./config.php";
    $stdId = $_POST['stdId'];
    $email = $_POST['email'];
    $dept =  $_POST['dept'];
    $addr = $_POST['addr'];
    $roll_no = $_POST['roll_no'];

   if(isset($stdId) && isset($email) && isset($dept) && isset($addr) && isset($roll_no)){
       $insertRecord = "INSERT INTO students_details (`email_id`, `department`, `roll_no`, `address`, `studentId`) VALUES ('$email','$dept','$roll_no','$addr',$stdId)";
       if (mysqli_query($connection, $insertRecord)) {
           echo '<p class="alert alert-success mt-3" role="alert">'.'Record added successfully for studentId '.' '.$stdId.'</p>';
       } else {
           echo '<p class="alert alert-danger mt-3" role="alert">Error adding data</p>';
           echo "ERROR: Could not able to execute $insertRecord. " . mysqli_error($connection);
       }
   }

