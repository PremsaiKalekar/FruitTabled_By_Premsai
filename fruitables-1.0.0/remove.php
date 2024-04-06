<?php
session_start();

if(isset($_GET['id'])) {
    
    $id = htmlspecialchars($_GET['id']);

   
    if(isset($_SESSION['cart']) && is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
         
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $id) {
                unset($_SESSION['cart'][$key]);
                break;
            }
        }
    }
}


header("Location: cart.php");

?>