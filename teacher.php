<?php
session_start();

$user = $_SESSION['user'];

if (isset($_POST['requestTA'])){
  header("refresh:0;url=requestTAv2.php");
}
if (isset($_POST['about'])){
  header("refresh:0;url=aboutTeacher.php");
}
if (isset($_POST['logout'])){
  header("refresh:0;url=logoutTeacher.php");
}
?>

<div style="border: 1px dashed black; padding: 10px; margin: 3px;">
    <form action="" method="post">
        <?php echo "Welcome  $user!";?> 
        <br><br>
        <input type="submit" id="requestTA" name="requestTA" value="Request TA">
        <input type="submit" id="about" name="about" value="About">
        <input type="submit" id="logout" name="logout" value="Log Out">
    </form>
</div>