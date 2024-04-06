<?php
$conn=mysqli_connect("localhost","root","","cart");
if($conn)
{
    //echo " connect <br>";
}
else
{
    echo "not connect<br>";
}

?>
<html>
    <head>
        <style>
            table,th,td{
                border: 2px solid;
            }
            </style>
    </head>
    <body>
<table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>fname</th>
                        <th>lname</th>
                        <th>address</th>
                        <th>city</th>
                        <th>country</th>
                        <th>postcode</th>
                        <th>mobile</th>
                        <th>email</th>
                        <th>Payment</th>

                      </tr>
                      <?php 
                      $conn=mysqli_connect("localhost","root","",'shopping');
                      if($conn)
                      {
                          echo "";
                      }
                      else
                      {
                          echo "not connect";
                      }
                      $sql=" select * from bill";
                      
                      $res=mysqli_query($conn,$sql);
                      while($rw=mysqli_fetch_row($res))
                      {
                      ?>
                      
                          <tr>
                          <td><?php echo $rw[0];?></td>
                          <td><?php echo $rw[1];?></td>
                          <td><?php echo $rw[2];?></td>
                          <td><?php echo $rw[3];?></td>
                          <td><?php echo $rw[4];?></td>
                          <td><?php echo $rw[5];?></td>
                          <td><?php echo $rw[6];?></td>
                          <td><?php echo $rw[7];?></td>
                          <td><?php echo $rw[8];?></td>
                          <td><?php echo $rw[9];?></td>
                      </tr>
                      <?php
                      }
                      ?>
                       
                  </table>
                    </body>
                  </html>