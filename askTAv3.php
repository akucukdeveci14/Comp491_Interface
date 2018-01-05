<?php
session_start();

$user = $_SESSION['user'];

$selectedCourse =  $_SESSION['Course'];

if (isset($_POST['aboutButton'])){
    header("refresh:0;url=aboutStudent.php");
}

else if (isset($_POST['backButton'])){
    header("refresh:0;url=student.php");
}

else if (isset($_POST['logOutButton'])){
    header("refresh:0;url=logoutStudent.php");
}


?>

<!DOCTYPE html>
<html>
<body>

<div style="border: 1px dashed black; padding: 10px; margin: 3px;"> 
    <form name = "rest" method="post" action="">
        <?php echo "Congratulations $user! <br><br> Your request has been sent to $selectedCourse teacher.";?>
        <br><br>
        <input name ="aboutButton" type="submit" name="about" value="About">
        <input name ="backButton" type="submit" name="goback" value="Go Back to Main Menu">
        <input name ="logOutButton" type="submit" name="logout" value="Log Out">
    </form>
    
</div>
    

</body>
</html>