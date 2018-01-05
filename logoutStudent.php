<?php

if (isset($_POST['yes'])){
  header("refresh:0;url=index.php");
}
if (isset($_POST['no'])){
  header("refresh:0;url=student.php");
}
?>

<div style="border: 1px dashed black; padding: 10px; margin: 3px;">
    <form action="?login" method="post">
        <p>Are You Sure?</p>
        <input type="submit" id="yes" name="yes" value="Yes!">
        <input type="submit" id="no" name="no" value="No!">
    </form>
</div>