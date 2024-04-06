<?php
$conn=mysqli_connect("localhost","root","","shopping");
session_start();
if($conn)
{
    echo "connected";
}
else
{
    echo "not connected";
}

if(isset($_POST['login']))
{
    
    $email=$_POST['email'];
    $password=$_POST['password'];

    $sql="select count(id) from reg where email='$email' and password='$password'";
    $res=mysqli_query($conn,$sql);
    $rw=mysqli_fetch_row($res);
    $count=$rw[0];
    //return $count;
    if($count=='1')
    {
        $_SESSION['username']=$email;

        echo "<script>alert('login Successfully')
        window.location.href='index.php'
        </script>";
        
    }

    else
    {
        echo "login failed".$conn->error;
    }
}


?>




<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post">
        Email:<input type="email" name="email" autocomplete="off"><br>
        Password: <input type="password" name="password" autocomplete="off"><br>
        <input type="submit" value="Login" name="login">
    </form>
</body>
</html>