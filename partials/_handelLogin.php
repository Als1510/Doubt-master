<?php
$showerror;
if($_SERVER['REQUEST_METHOD']=="POST")
{
    include '_dbconnect.php';
    $email = $_POST['LoginEmail'];
    $pass = $_POST['LoginPassword'];
    $sql = "Select * from user where user_email='$email'";
    $result = mysqli_query($conn, $sql);
    $numrows = mysqli_num_rows($result);
    if($numrows == 1)
    {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass']))
        {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['Sno'] = $row['Sno'];
            $_SESSION['useremail'] = $email;
            $_SESSION['user_name'] = $row['user_name'];
            header("Location: /Doubt/index.php");
        }
        else
        {
            $showerror = "Wrong Password! Try again.";
            header("Location: /Doubt/index.php?login=false&error=$showerror");
        }
    }
    else{
        $showerror = "Account not found. Signup";
    header("Location: /Doubt/index.php?login=false&error=$showerror");
    }
}
?>
