<?php
$conn = mysqli_connect("localhost", "root", "", "shopping");
session_start();
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $alreadyInCart = false;
    foreach ($_SESSION['cart'] as $item) {
        if ($item['id'] == $id) {
            $alreadyInCart = true;
            break;
        }
    }

    if (!$alreadyInCart) {
        $sql = "SELECT * FROM shop WHERE id = $id";
        $res = mysqli_query($conn, $sql);
        $rw = mysqli_fetch_row($res);
        $name = $rw[1];
        $profile = $rw[2];
        $price = $rw[4];
        $description = $rw[3]; 

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }

        $product = array(
            'id' => $id,
            'name' => $name,
            'profile' => $profile,
            'price' => $price,
            'description' => $description,
            'session_id' => session_id()
        );

        $_SESSION['cart'][] = $product;
    }
}
?>
<?php 

$sql = "select * from shop where id=1";



$res=mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Fruitables - Vegetable Website Template</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Raleway:wght@600;800&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
        <style>
            table,th,td{
                border:1px solid;
            }
            </style>
    </head>

    <body>

        <!-- Spinner Start -->
        <div id="spinner" class="show w-100 vh-100 bg-white position-fixed translate-middle top-50 start-50  d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" role="status"></div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar start -->
        <div class="container-fluid fixed-top">
            <div class="container topbar bg-primary d-none d-lg-block">
                <div class="d-flex justify-content-between">
                    
                </div>
            </div>
            <div class="container px-0">
                <nav class="navbar navbar-light bg-white navbar-expand-xl">
                    <a href="index.php" class="navbar-brand"><h1 class="text-primary display-6">Fruitables</h1></a>
                    <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars text-primary"></span>
                    </button>
                    <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                        <div class="navbar-nav mx-auto">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="shop.php" class="nav-item nav-link">Shop</a>
                            <a href="shop-detail.php" class="nav-item nav-link">Shop Detail</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu m-0 bg-secondary rounded-0">
                                    <a href="cart.php" class="dropdown-item active">Cart</a>
                                    <a href="check out.php" class="dropdown-item">Chackout</a>
                                    
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="d-flex m-3 me-0">
                           
                        <a href="dis.php" class="position-relative me-4 my-auto">
                                <i class="fa fa-shopping-bag fa-2x"></i>
                                
                            </a>
                            </a>
                            <a href="regi.php" class="my-auto">
                                <i class="fas fa-user fa-2x"></i>
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->


        <!-- Modal Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content rounded-0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center">
                        <div class="input-group w-75 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords" aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Search End -->


        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Cart</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Cart</li>
            </ol>
        </div>
        <!-- Single Page Header End -->
    


   <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="table-responsive">
                <?php if (!empty($_SESSION['cart'])): ?>
                    <h2>Products: <?php echo count($_SESSION['cart']); ?></h2>
                    

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Image</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $totalPrice = 0;
                            foreach ($_SESSION['cart'] as $item): 
                                $totalPrice += $item['price'];
                            ?>
                                <tr>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><img src="images/<?php echo $item['profile']; ?>" width="40px" height="30px"></td>
                                    <td><?php echo $item['description']; ?></td>
                                    <td><?php echo $item['price']; ?></td>
                                  
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php else: ?>
                    <p>Your cart is empty.</p>
                <?php endif; ?>
            </div>

            <div class="row justify-content-end">
                <div class="col-md-4">
                    <div class="bg-light rounded p-4">
                        <h1 class="display-6 mb-4">Cart Total</h1>
                       
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0">Total Bill</h5>
                            <div class="">
                                <p class="mb-0"><?php echo $totalPrice; ?></p>
                            </div>
                        </div>
                        <p class="mb-0 ml-2  mt-3">The Items will be Delivered in 2-3 day's</p>
                        <button class="btn btn-primary mt-3" onclick="alert('Thank You For Shopping....'); window.location.href = 'index.php'">Continue...</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- Cart Page End -->


        <!-- Footer Start -->
        
        <!-- <div class="row g-5">
                    <div class="col-lg-3 col-md-6"> 
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Why People Like us!</h4>
                            <p class="mb-4">typesetting, remaining essentially unchanged. It was 
                                popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                            <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Shop Info</h4>
                            <a class="btn-link" href="index.php">Home</a>
                            <a class="btn-link" href="shop.php">shop</a>
                            <a class="btn-link" href="shop-details.php">shop-detais</a>
                            <a class="btn-link" href="cart.php">cart</a>
                            <a class="btn-link" href="contact.php">contact</a>
                            
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                            <p>Address: 1592 kucjen nager solapur</p>
                            <p>Email:kalekarpremsai2000@gmail.com</p>
                            <p>Phone: +91 9307209470</p>
                            <p>Payment Accepted</p>
                            <img src="img/payment.png" class="img-fluid" alt="">
                        </div>
                </div>
            </div>
        </div> -->
        <!-- Footer End -->

      



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></scripContinue....>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </body>

</html>