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
        $lname=$_POST['lname'];
        $cname=$_POST['cname'];
        $address=$_POST['add'];
        $town=$_POST['tname'];
        $country=$_POST['country'];
        $postcode=$_POST['pcode'];
        $mobile=$_POST['mob'];
        $email=$_POST['email'];
        $Message=$_POST['msg'];
    
    $sql="insert into bill1(fname,lname,cname,address,city,country,post_code,mobile,email,msg) values('$uname','$lname','$cname','$address','$town','$country','$postcode','$mobile','$email','$Message')";
    
    if(mysqli_query($conn,$sql))
        {
            echo"<script>alert('product place')</script>";
          
        }
        else
        {
            echo "data not inserted";
           
        }
    }
?>