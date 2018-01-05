<?php
session_start();

$numofTA = $_SESSION['numofTA'];

$intnumofTA = (int)$numofTA;

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
      for ($y = 1; $y <= $intnumofTA; $y++) {

          $choice = $_POST[$y];
          
          $user = $_SESSION['user'];
          
          $query1 = "SELECT `teacherID` FROM `teachers` where accountID = '$user'";
          $result = mysqli_query($con,$query1);
          $row = mysqli_fetch_array($result);
        
          $query2 = "insert into rankings VALUES ('$row[0]', '$choice', '$selectedCourse', '$y')";
          mysqli_query($con,$query2);
    }
    header("refresh:0;url=requestTAv3.php");    

}  

else if (isset($_POST['aboutButton'])){
    header("refresh:0;url=aboutTeacher.php");
}

else if (isset($_POST['backButton'])){
    header("refresh:0;url=requestTAv2.php");
}

else if (isset($_POST['logOutButton'])){
    header("refresh:0;url=logoutTeacher.php");
}

?>

<!DOCTYPE html>
<html>
<body>

<div style="border: 1px dashed black; padding: 10px; margin: 3px;"> 
    <form name = "request" method="post" action="">
    <?php echo "Course you have selected is  $selectedCourse";?>
    <p>Please enter the 5-digit ID of students that you want to assign.</p>    
        <h3>Rankings</h3>  
    <?php
     
    for ($x = 1; $x <= $intnumofTA; $x++) {
?>
        <p>Choice <?php echo $x;?> <input type="text" name=<?php echo $x ?> placeholder=""></p>
<?php
           }
?>
     
    <input name ="requestButton" type="submit" id="request" name="request" value="Request TA">
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

    