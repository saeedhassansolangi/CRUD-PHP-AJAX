<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Students</title>

    <style>
        body {
            background-color: aliceblue;
            font-family: "Cascadia Code", sans-serif;
        }
        .btn-submit {
            background: #7f9fe7;
            border:none;
            color:white;
            outline: none;
        }
        .btn-submit:hover {
            background: #4d5567;
            color:white;
        }
    </style>
</head>

<body>
<div class="container mt-3">
    <h1>Students</h1>
    <?php
    require "db.php";
    echo "<form action='' >";
    $student_record = "SELECT * FROM students";
    if($result = mysqli_query($connection, $student_record)) {
        if(mysqli_num_rows($result) > 0) {
            echo '<div class="form-group">
            <label for ="sel1"> Students: </label>
            <select class="form-control" id="stdId" name="stdId">';
            echo '<option value="">Select Student</option>';
            while($row = mysqli_fetch_array($result)) {
                echo "<option value='".$row['studentId']."'>".$row['student_name']."</option>";
            }
            echo '</select></div>';
        }
    }

    echo '<button type="button" id="fetchbtn" class="btn btn-lg btn-submit mt-3" >Fetch_Detials</button>';
    echo "</form>";

    ?>
</div>
<div class="container" id="dataContainer"></div>
<script>
    let fetchbtn = document.getElementById("fetchbtn");
    fetchbtn.addEventListener("click", fetchData);
    function fetchData(){

        let studentId = document.getElementById("stdId").value
        console.log(studentId)
        let xhr = new XMLHttpRequest(); //1
        xhr.onreadystatechange= function () { // 4
            console.log(xhr.responseText)
            if(xhr.responseText){
                document.getElementById("dataContainer").innerHTML = xhr.responseText;
            }else {
                document.getElementById("dataContainer").innerHTML = "No Data Found";
            }
        }
        xhr.open('GET', 'students_details.php?id='+studentId, true); //2
        xhr.send(); //3

    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

</body>

</html>