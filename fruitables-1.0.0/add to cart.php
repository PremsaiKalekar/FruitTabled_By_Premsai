<?php
$conn = mysqli_connect("localhost", "root", "", "shopping");
session_start();
if(isset($_GET['id']))
{
$id = $_GET['id'];


$alreadyInCart = false;
foreach ($_SESSION['cart'] as $item) {
    if ($item['id'] == $id) {
        $alreadyInCart = true;
        break;
    }
}


if (!$alreadyInCart) {
    $sql = "SELECT * FROM product1 WHERE id = $id";
    $res = mysqli_query($conn, $sql);
    $rw = mysqli_fetch_row($res);
    $name = $rw[1];
    $profile = $rw[2];
    $price = $rw[3];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $product = array(
        'id' => $id,
        'name' => $name,
        'profile' => $profile,
        'price' => $price,
        'session_id' => session_id()
    );

    $_SESSION['cart'][] = $product;
}
}

    
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table,
        th,
        td {
            border: 1px solid;
        }
    </style>
    <title>Session</title>
</head>
<body>

    <?php if (!empty($_SESSION['cart']))  ?>
        
        <h2>Product= <?php echo count($_SESSION['cart']);?></h2>
       
        <button><a href="index.php">add cart</a></button>
        <table>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Price</th>
                <th>Remove</th>
            </tr>
            <?php foreach ($_SESSION['cart'] as $item){ ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td><img src="images/<?php echo $item['profile']; ?>" width="40px" height="30px"></td>
                    <td><?php echo $item['price']; ?></td>
                    <td><a href="remove1.php?id=<?php echo $item['id']; ?>">Remove</a></td>
                </tr>
            <?php }?>
        </table>
    <?php ?>
</body>
</html>
