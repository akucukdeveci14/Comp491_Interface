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

if (isset($_POST['username'], $_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "select * from loginInformation where accountID = '$username' and password = '$password'";
    $result = mysqli_query($con,$query);
    $num_row = mysqli_num_rows($result);
    $rowvalue = mysqli_fetch_array($result);

    if(($num_row == 1) && (substr($rowvalue[0], -2) !== "14")){
        $_SESSION['user']=$username;
        header("refresh:0;url=teacher.php");
    }
    else if(($num_row == 1) && (substr($rowvalue[0], -2) == "14")){
        $_SESSION['user']=$username;
        header("refresh:0;url=student.php");
    }


    else{
        echo "Invalid user";
    }
}

else if(isset($_POST['aboutButton'])){

        header("refresh:0;url=aboutStudent.php");
}
?>

<div style="border: 1px dashed black; padding: 10px; margin: 3px;">
    <form action="" method="post">
        <p>Welcome! Please log in your information to continue.</p>
        <p>Username <input name="username" placeholder=""></p>
        <p>Password <input type="password" name="password" placeholder=""></p>
        <input type="submit" value="Log In">
    </form>
</div>