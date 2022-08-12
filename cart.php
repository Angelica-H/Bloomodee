<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>shop bán hàng thời trang</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="eCommerce HTML Template Free Download" name="keywords">
    <meta content="eCommerce HTML Template Free Download" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/slick/slick.css" rel="stylesheet">
    <link href="lib/slick/slick-theme.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/login.css" rel="stylesheet">
</head>

<body>

    <!-- Nav Bar Start -->
    <?php include 'login_form/menu.php' ?>
    <!-- Nav Bar End -->

    <!-- Bottom Bar Start -->
    <!-- <div class="bottom-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-md-3">
                    <div class="logo">
                        <a href="index.html">
                            <h1><img src="img/Logo-1.jpg" alt=""></h1>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="search">
                        <input type="text" placeholder="Tìm kiếm">
                        <button><i class="fa fa-search"></i></button>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="user">
                        <a href="wishlist.html" class="btn wishlist">
                            <i class="fa fa-heart"></i>
                            <span>(1000)</span>
                        </a>
                        <a href="cart.html" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span>(0)</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <!-- <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Tài khoản của tôi</li>
            </ul>
        </div>
    </div> -->
    <!-- Breadcrumb End -->

    <!-- My cart Start -->
    <section class="h-100 h-custom" style="background-color: #dae0e5ab;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Giỏ hàng</h1>

                                        </div>
                                        <?php if (isset($_SESSION['cart'])) { ?>
                                            <?php
                                            $cart = $_SESSION['cart'];
                                            $sum = 0;
                                            $count = 0;
                                            ?>

                                            <?php foreach ($cart as $id => $each) : ?>
                                                <hr class="my-4">

                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img height='100' src="admin/products/photos/<?php echo $each['image'] ?>">
                                                    </div>
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <h6 class="text-black mb-0"><?php echo $each['name'] ?></h6>
                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 d-flex">
                                                        <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=decre">
                                                            -
                                                        </a>
                                                        <?php echo $each['quantity'] ?>
                                                        <a href="update_quantity_in_cart.php?id=<?php echo $id ?>&type=incre">
                                                            +
                                                        </a>
                                                    </div>
                                                    <!-- <div class="col-md-1 col-lg-2 col-xl-2 d-flex">

                                                        <select name="size" class="form-select">
                                                            
                                                            <option value="S">S</option>
                                                            <option value="M">M</option>
                                                            <option value="L">L</option>
                                                            <option value="XL">XL</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-1 col-lg-2 col-xl-2 d-flex">

                                                        <select name="color" class="form-select">
                                                            <option value="trắng">trắng</option>
                                                            <option value="Đen">Đen</option>
                                                            <option value="Xanh">Xanh</option>

                                                        </select>
                                                    </div> -->
                                                    <div class="col-md-1 col-lg-1 col-xl-2 ">
                                                        <h6 class="mb-0"><?php
                                                                            $result = $each['price'] * $each['quantity'];
                                                                            echo number_format($result, 0, ',', '.');
                                                                            $sum += $result;
                                                                            $count++;
                                                                            ?></h6>

                                                    </div>
                                                    <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                        <a href="delete_from_cart.php?id=<?php echo $id ?>" class="text-muted"><i class="fas fa-times"></i></a>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>

                                            <hr class="my-4">
                                            <div class="d-flex justify-content-between align-items-center mb-5">
                                                <h1 class="fw-bold mb-0 text-black"></h1>
                                                <h6 class="mb-0 text-muted"><?php echo $count ?> items</h6>
                                            </div>
                                        <?php } ?>
                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="product-list.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Thành tiền </h3>
                                        <hr class="my-4">

                                        <!-- <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">số đơn </h5>
                                            <h5>đ</h5>
                                        </div>

                                        <h5 class="text-uppercase mb-3">Shipping</h5>

                                        <div class="mb-4 pb-2">
                                            <select class="select">
                                                <option value="1">Standard-Delivery- €5.00</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                                <option value="4">Four</option>
                                            </select>
                                        </div> -->
                                        <!-- echo number_format($each['price'], 0, ',', '.')  -->
                                        <h5 class="text-uppercase mb-3">Thông tin khách hàng</h5>
                                        <?php

                                        $id = $_SESSION['id'];
                                        require 'admin/connect.php';
                                        $sql = "select * from customers where id = '$id'";
                                        $resultt = mysqli_query($connect, $sql);
                                        $each = mysqli_fetch_array($resultt);

                                        ?>
                                        <form action="process_checkout.php" method="POST">
                                            <div class="mb-5">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Examplea2">Họ tên</label>
                                                    <input type="text" id="form3Examplea2" class="form-control" name="name_receiver" value="<?php echo $each['name'] ?>" />

                                                </div>
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Examplea3">Địa chỉ</label>
                                                    <input type="text" id="form3Examplea3" class="form-control" name="address_receiver" value="<?php echo $each['address'] ?>" />

                                                </div>
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Examplea4">Điện thoại</label>
                                                    <input type="text" id="form3Examplea4" class="form-control" name="phone_receiver" value="<?php echo $each['phone_number'] ?>" />

                                                </div>
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Examplea5">email</label>
                                                    <input type="text" id="form3Examplea5" class="form-control" name="email_receiver" value="<?php echo $each['email'] ?>" />

                                                </div>
                                            </div>


                                            <hr class="my-4">

                                            <div class="d-flex justify-content-between mb-5">
                                                <h5 class="text-uppercase">Tổng tiền</h5>
                                                <h5><?php if (isset($_SESSION['cart'])) { ?>
                                                        <?php echo  number_format($sum, 0, ',', '.') ?>
                                                    <?php } else { ?>
                                                        0
                                                    <?php } ?>
                                                    đ</h5>
                                            </div>

                                            <button class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Đặt hàng</button>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- My cart End -->
    <!-- Footer Start -->
    <div class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Liên lạc</h2>
                        <div class="contact-info">
                            <p><i class="fa fa-map-marker"></i>hương mạc-từ sơn-bắc ninh</p>
                            <p><i class="fa fa-envelope"></i>ngotam858@gmail.com</p>
                            <p><i class="fa fa-phone"></i>0355488110</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Theo dõi</h2>
                        <div class="contact-info">
                            <div class="social">
                                <a href=""><i class="fab fa-twitter"></i></a>
                                <a href=""><i class="fab fa-facebook-f"></i></a>
                                <a href=""><i class="fab fa-linkedin-in"></i></a>
                                <a href=""><i class="fab fa-instagram"></i></a>
                                <a href=""><i class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Thông tin công ty</h2>
                        <ul>
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">Chính sách bảo mật</a></li>
                            <li><a href="#">Điều khoản & Điều kiện</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="footer-widget">
                        <h2>Thông tin mua hàng</h2>
                        <ul>
                            <li><a href="#">Thanh toán</a></li>
                            <li><a href="#">Vận chuyển</a></li>
                            <li><a href="#">Hoàn trả</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row payment align-items-center">
                <div class="col-md-6">
                    <div class="payment-method">
                        <h2>Chấp nhận:</h2>
                        <img src="img/payment-method.png" alt="Payment Method" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment-security">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Footer Bottom Start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-6 copyright">
                </div>
                <div class="col-md-6 template-by">
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Bottom End -->

    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>