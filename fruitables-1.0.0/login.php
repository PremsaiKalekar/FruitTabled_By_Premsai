<?php
require 'config.php';

if(isset($_POST["login"])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

   
    $query = "SELECT * FROM tb_user1 WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    
    if($result) {
        
        if(mysqli_num_rows($result) > 0) {
          
            $row = mysqli_fetch_assoc($result);
          
            if($password == $row['password']) {
           
                session_start();
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];

                header("location: index.php");
                exit(); 
            } else {
                echo "<script> alert('Wrong password');</script>";
            }
        } else {
            echo "<script> alert('Username not found');</script>";
        }
    } else {
       
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        /* Your CSS styles */
        .container {
            width: 50%;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Form</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
    <br>
    <a href="regi.php">Regstraction</a>
</body>
</html>
