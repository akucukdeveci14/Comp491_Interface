<?php
session_start();

$user = $_SESSION['user'];

$rowvalue = $_SESSION['userID'];

if (isset($_POST['submitCourses'])){
  header("refresh:0;url=submitcourses.php");
}
if (isset($_POST['askTA'])){
  header("refresh:0;url=askTA.php");
}
if (isset($_POST['about'])){
  header("refresh:0;url=aboutStudent.php");
}
if (isset($_POST['logout'])){
  header("refresh:0;url=logoutStudent.php");
}
?>

<div style="border: 1px dashed black; padding: 10px; margin: 3px;">
    <form action="?login" method="post">
        <?php echo "Welcome  $user!";?> 
        <br><br>
        <input type="submit" id="submitCourses" name="submitCourses" value="Submit Taken Courses">
        <input type="submit" id="askTA" name="askTA" value="Ask to be a TA">
        <input type="submit" id="about" name="about" value="About">
        <input type="submit" id="logout" name="logout" value="Log Out">
    </form>
</div>