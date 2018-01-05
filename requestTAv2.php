<?php
session_start();
$user = $_SESSION['user'];

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
    $numofTA = $_POST['numofTA'];
    $_SESSION['numofTA'] = $numofTA;
    
    $selectedcourse = $_POST['Course'];
    $_SESSION['Course'] = $selectedcourse;
    header("refresh:0;url=requestTA.php");
}

else if (isset($_POST['aboutButton'])){
    header("refresh:0;url=aboutTeacher.php");
}

else if (isset($_POST['backButton'])){
    header("refresh:0;url=teacher.php");
}

else if (isset($_POST['logOutButton'])){
    header("refresh:0;url=logoutTeacher.php");
}

?>

<!DOCTYPE html>
<html>
<body>
    
<div style="border: 1px dashed black; padding: 10px; margin: 3px;"> 
    
     <form name = "request2" method="post" action="">
          <p>Please choose the course you are currently teaching.</p>
        <select name="Course">  
        <?php
        $res = mysqli_query($con,"select courseID from givenCourses where teacherID ='$user'");      
        while($row=mysqli_fetch_array($res)){
            ?>
        <option value ="<?php echo $row["courseID"]; ?>"><?php echo $row["courseID"]; ?></option>

            <?php
                                         
        }
            ?>
         </select> 
        <p>Enter the number of TAs you need for this course <input name="numofTA" placeholder=""></p>
        <input name ="requestButton" type="submit" id="request" name="request" value="Request TA">
         

    </form>
    <form name = "rest" method="post" action="">
        <br>
        <input name ="aboutButton" type="submit" name="about" value="About">
        <input name ="backButton" type="submit" name="goback" value="Go Back">
        <input name ="logOutButton" type="submit" name="logout" value="Log Out">
    </form>
    
</div>
    

</body>
</html>

    