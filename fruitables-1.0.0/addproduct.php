<?php


    $conn=mysqli_connect("localhost","root","","shopping");
    if($conn)
    {
        echo " connect <br>";
    }
    else
    {
        echo "not connect<br>";
    }
   
    if(isset($_POST['btn']))
    {
        $uname=$_POST['fname'];
        $description=$_POST['des'];
        $price=$_POST['price'];
    
    $filename=$_FILES['img']['name'];
    $filesize=$_FILES['img']['size'];
    $filetemp=$_FILES['img']['tmp_name'];
    $filetype=$_FILES['img']['type'];
    $filestore="images/".$filename;

    if(move_uploaded_file($filetemp,$filestore))
    {
        $sql="insert into shop(name,img,des,price) values('$uname','$filename','$description','$price')";

        if(mysqli_query($conn,$sql))
        {
            echo"<script>alert('image upload')</script>";
        }
        else
        {
            echo"image not upload";
        }
    }



}   
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Interactive Form</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
    form {
        max-width: 400px;
        margin: 0 auto;
    }
    label {
        display: block;
        margin-bottom: 5px;
    }
    input[type="text"], textarea {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }
    input[type="file"] {
        margin-bottom: 10px;
    }
    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
    button:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
    <form  method='post'  enctype="multipart/form-data">
        
        <label for="name">Name:</label>
        <input type="text" id="name" name="fname" required>

        <label for="image">Image:</label>
        <input type="file" id="image" name="img" accept="image/*">

        <label for="description">Description:</label>
        <textarea id="description" name="des" rows="4" required></textarea>
        
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>
        
        <button type="submit" name='btn'>Submit</button>
    </form>
</body>
</html>
