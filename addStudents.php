<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title> Add Student</title>
</head>

<body>
<div class="container">
    <h1>Add Student Details</h1>

    <form action="" id="formAddStudent" name="formAddStudent">
           <?php
            require('./config.php');
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

           ?>
        <div class="form-group">
            <label for="">Email Address</label>
            <input type="text" class="form-control" name="email" id="email" >
        </div>
        <div class="form-group">
            <label for="">Department</label>
            <input type="text" class="form-control" name="dept" id="dept" >
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="addr" id="addr">
        </div>
        <div class="form-group">
            <label for="">Roll No</label>
            <input type="text" class="form-control" name="roll_no" id="roll_no" >
        </div>

        <button type="submit" class="btn mt-4">Submit</button>
    </form>

</div>
<div class="container" id="dataContainer"></div>
<script>
    let formAddStudent = document.getElementById("formAddStudent");

    formAddStudent.addEventListener("submit", function (e) {
        e.preventDefault()
        const stdId = document.forms['formAddStudent']['stdId'].value
        const email = document.forms['formAddStudent']['email'].value
        const dept = document.forms['formAddStudent']['dept'].value
        const addr = document.forms['formAddStudent']['addr'].value
        const roll_no = document.forms['formAddStudent']['roll_no'].value

        console.log({
            stdId, email, dept, addr, roll_no
        })

        let xhr = new XMLHttpRequest();
        xhr.open('POST', `insertStudentDetails.php`, true);
        xhr.onreadystatechange= function () {
            console.log(xhr.responseText)
            document.getElementById("dataContainer").innerHTML = xhr.responseText;
        }
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send(`stdId=${stdId}&email=${email}&dept=${dept}&addr=${addr}&roll_no=${roll_no}`);
    })
</script>

</body>

</html>