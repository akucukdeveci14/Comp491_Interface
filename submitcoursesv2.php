<?php
session_start();

$user = $_SESSION['user'];

$selectedCourse =  $_SESSION['Course'];

define("HOST", "127.0.0.1");
define("USERNAME", "root");
define("PASSWORD", "1234");
define("DB_NAME", "Comp491");
$con = new mysqli(HOST, USERNAME, PASSWORD, DB_NAME);

/* check connection */
if ($con->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if(isset($_POST['requestButton'])){
    $query1 = "SELECT `studentID` FROM `students` where accountID = '$user'";
    $result = mysqli_query($con,$query1);
    $row = mysqli_fetch_array($result);
    $query2 = "insert into previousCourses VALUES ('$row[0]', '$selectedCourse')";
    mysqli_query($con,$query2);
    header("refresh:0;url=askTAv3.php");
}

else if (isset($_POST['aboutButton'])){
    header("refresh:0;url=aboutStudent.php");
}

else if (isset($_POST['backButton'])){
    header("refresh:0;url=submitcourses.php");
}

else if (isset($_POST['logOutButton'])){
    header("refresh:0;url=logoutStudent.php");
}

?>

<!DOCTYPE html>
<html>
<body>

<div style="border: 1px dashed black; padding: 10px; margin: 3px;"> 
    <form name = "request" method="post" action="">
    <p>You have selected a course to add to your resume.</p>    
    <?php echo "Course you have selected is  $selectedCourse.";?> 
    <br><br>
    <input name ="requestButton" type="submit" id="request" name="request" value="Add to your resume">
    </form>
    <br>
    <form name = "rest" method="post" action="">
        <input name ="aboutButton" type="submit" name="about" value="About">
        <input name ="backButton" type="submit" name="goback" value="Go Back">
        <input name ="logOutButton" type="submit" name="logout" value="Log Out">
    </form>
    
</div>
    

</body>
</html>