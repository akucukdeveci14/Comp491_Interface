<?php

session_start();

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
    $courseID = $_POST['Course'];
    $_SESSION['Course'] = $courseID;
    header("refresh:0;url=submitcoursesv2.php");
    
}

else if (isset($_POST['aboutButton'])){
    header("refresh:0;url=aboutStudent.php");
}

else if (isset($_POST['backButton'])){
    header("refresh:0;url=student.php");
}

else if (isset($_POST['logOutButton'])){
    header("refresh:0;url=logoutStudent.php");
}

?>

<div style="border: 1px dashed black; padding: 10px; margin: 3px;"> 
    <form name = "request" method="post" action="">
        <p>Select the course you have taken before and continue.</p>
        <select name="Course">  
        <?php
        $res = mysqli_query($con,"select courseID from givenCourses");      
        while($row=mysqli_fetch_array($res)){
            ?>
        <option value ="<?php echo $row["courseID"]; ?>"><?php echo $row["courseID"]; ?></option>

            <?php
                                         
        }
            ?>
         </select>
        <br><br>
        <input name = "requestButton" type="submit" name="request" value="Continue">
    </form>
          
    <form name = "rest" method="post" action="">
        <input name ="aboutButton" type="submit" name="about">
        <input name ="backButton" type="submit" name="goback" value="Go Back">
        <input name ="logOutButton" type="submit" name="logout" value="Log Out">
    </form>
    
</div>