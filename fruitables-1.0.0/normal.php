<?php
$conn=mysqli_connect("localhost","root","","shopping");
session_start();


if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}






$sql="select * from product1" ;
$res=mysqli_query($conn,$sql);
//$rw=mysqli_fetch_row($res);

 ?>




<!DOCTYPE html>
<html>
<head>
    <style>
table, th, td {
  border: 1px solid;
}  
</style> 
    <title>Session</title>
</head>
<body>
   
       <a class='cart'></a> 
<h2>Session</h2>

<button><a href="index.php">add product</a></button>
<table> 
   
    <tr>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        
        <th>display card</th>
    </tr> 
    
<?php
    while($rw=mysqli_fetch_row($res))
     {
        ?>
   <?php



   ?>
    <tr>    
      <td><p><?php echo $rw[1]?></p></td>
      <td><img src="images/<?php echo $rw[2];?>" width="40px"  height="30px" ></td>
      <td><p><?php echo $rw[3];?></p></td>

      <td><a href="cart.php?id=<?php echo $rw[0];?>">Display cart</td>
    </tr>
    
    

<?php
     }
     ?>
     </table>
        </body>
</html>