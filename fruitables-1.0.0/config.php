<?php
session_start();

$conn=mysqli_connect("localhost","root","",'shopping');
if($conn)
{
   // echo "connected";
}
else
{
    echo "not connect";
}

?>