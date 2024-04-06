<html>
<head>
    <style>
        table,th,td{
            border:1px solid;
        }
        </style>
</head>
<body>
<table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Update</th>
                        <th>Delete</th>
                      </tr>
                      <?php 
                      $conn=mysqli_connect("localhost","root","","shopping");
                      if($conn)
                      {
                          echo "";
                      }
                      else
                      {
                          echo "not connect";
                      }
                      $sql=" select * from contact";
                      
                      $res=mysqli_query($conn,$sql);
                      while($rw=mysqli_fetch_row($res))
                      {
                      ?>
                      
                          <tr>
                          <td><?php echo $rw[0];?></td>
                          <td><?php echo $rw[1];?></td>
                          <td><?php echo $rw[2];?></td>
                          <td><?php echo $rw[3];?></td>
                          <td><a href="update.php ? id=<?php echo $rw[0];?>">update</td>
                          <td><a href="delete.php ? id=<?php echo $rw[0];?>">delete</td>
                      </tr>
                      <?php
                      }
                      ?>
                       
                  </table>

                    </body>
                    </html>