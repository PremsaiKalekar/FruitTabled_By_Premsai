<?php


$conn=mysqli_connect("localhost","root","","shopping");
if($conn)
{
    echo "connect<br>";
}
else
{
    echo "not connect<br>";
}

if(isset($_POST['btn']))
    {
        $uname=$_POST['fname'];
        $email=$_POST['email'];
        $Message=$_POST['mess'];

        
    $sql="insert into contact(name,email,msg) values('$uname','$email','$Message')"; 





    if(mysqli_query($conn,$sql))
        {
            echo"data inserted";
        }
        else
        {
            echo"data not inserted";
        }
    }
?>