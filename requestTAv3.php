<?php
session_start();

$user = $_SESSION['user'];

$selectedCourse =  $_SESSION['Course'];

if (isset($_POST['aboutButton'])){
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
    <form name = "rest" method="post" action="">
        <?php echo "Congratulations $user! <br><br> Your TA requests for $selectedCourse has been sent to the database.";?>
        <br><br>
        <input name ="aboutButton" type="submit" name="about" value="About">
        <input name ="backButton" type="submit" name="goback" value="Go Back to Main Menu">
        <input name ="logOutButton" type="submit" name="logout" value="Log Out">
    </form>
    
</div>
    

</body>
</html>