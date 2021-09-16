<?php 
$showError ='false';
if($_SERVER['REQUEST_METHOD']=="POST")
{
    include '_dbconnect.php';
    $user_name = $_POST['SignupName'];
    $user_email = $_POST['SignupEmail'];
    $pass = $_POST['SignupPassword'];
    $cpass = $_POST['SignupCPassword'];
    $existsql = "SELECT * FROM  `user` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existsql);
    $numrows = mysqli_num_rows($result);
    if($numrows>0)
    {
        $showError = "Email already in use";
        header("Location: /Doubt/index.php?signupsuccess=false&error=$showError");
    }
    else
    {
        if($pass == $cpass)
        {
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`user_name`,`user_email`, `user_pass`, `timestamp`) VALUES ('$user_name','$user_email', '$hash', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            if($result)
            {
                $showAlert = true;
                header("Location: /Doubt/index.php?signupsuccess=true");
                exit();
            }
        }
        else
        {
            $showError = "Passwords do not match";
            header("Location: /Doubt/index.php?signupsuccess=false&error=$showError");
        }
    }
}
?>
