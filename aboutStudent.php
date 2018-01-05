<?php
if (isset($_POST['goback'])){
  header("refresh:0;url=student.php");
}
if (isset($_POST['logout'])){
  header("refresh:0;url=logoutStudent.php");
}
?>

<div style="border: 1px dashed black; padding: 10px; margin: 3px;">
    <form action="?login" method="post">
        <p>This project is designed by Ali Küçükdeveci, Koç University Computer Engineering student.<br><br>
        Main purpose of the project is to digitalize assignation of teaching assistants.</p>
        <br>
        <input type="submit" id="goback" name="goback" value="Go Back to Main Menu">
        <input type="submit" id="logout" name="logout" value="Log Out">
    </form>
</div>