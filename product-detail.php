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
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Nav Bar Start -->
    <?php include 'login_form/menu.php' ?>
    <!-- Nav Bar End -->


    <!-- Bottom Bar Start -->
    <div class="bottom-bar">
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
                <!-- <div class="col-md-3">
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
                </div> -->
            </div>
        </div>
    </div>
    <!-- Bottom Bar End -->

    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Chi tiết sản phẩm</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="product-detail-top">
                        <div class="row align-items-center">
                            <?php
                            $id = $_GET['id'];
                            require 'admin/connect.php';
                            $sql = "select * from products
                                where id = '$id'";
                            $result = mysqli_query($connect, $sql);
                            $each = mysqli_fetch_array($result);
                            ?>
                            <div class="col-md-5">
                                <div class="product-slider-single normal-slider">
                                    <img src="admin/products/photos/<?php echo $each['image'] ?>">

                                </div>

                            </div>
                            <div class="col-md-7">
                                <form action="">
                                    <div class="product-content">
                                        <div class="title">
                                            <h2><?php echo $each['name'] ?></h2>
                                        </div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price">
                                            <h4>Giá:</h4>
                                            <p><?php echo number_format($each['price'], 0, ',', '.') ?>đ <span></span></p>
                                        </div>
                                        <!-- <div class="quantity">
                                        <h4>Số lượng:</h4>
                                        <div class="qty">
                                            <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                            <input type="text" value="1">
                                            <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div> -->
                                        <div class="p-size">
                                            <h4>Size:</h4>
                                            <!-- <div class="btn-group btn-group-sm">
                                            <button type="button" class="btn" value="s">S</button>
                                            <button type="button" class="btn" value="M">M</button>
                                            <button type="button" class="btn" value="L">L</button>
                                            <button type="button" class="btn" value="XL">XL</button>
                                        </div> -->

                                            <select name="size" class="form-select">
                                                <option value="S">S</option>
                                                <option value="M">M</option>
                                                <option value="L">L</option>
                                                <option value="XL">XL</option>
                                            </select>
                                        </div>
                                        <div class="p-color">
                                            <h4>Màu:</h4>
                                            <div class="btn-group btn-group-sm">
                                                <button type="button" class="btn" value="Trắng">Trắng</button>
                                                <button type="button" class="btn" value="Đen">Đen</button>
                                                <button type="button" class="btn" value="Xanh">Xanh</button>
                                            </div>
                                        </div>
                                        <div class="action">
                                            <a class="btn" href="add_to_cart.php?id=<?php echo $each['id'] ?>"><i class="fa fa-shopping-cart"></i>Thêm vào giỏ hàng</a>
                                            <a class="btn" href="#"><i class="fa fa-shopping-bag"></i>Mua ngay</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#description">Mô tả</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#specification">Quy cách</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#reviews">Đánh giá (1)</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="description" class="container tab-pane active">
                                    <h4>Mô tả SP</h4>
                                    <p>
                                        <?php echo $each['description'] ?>
                                </div>
                                <div id="specification" class="container tab-pane fade">
                                    <h4>Đặc điểm SP</h4>
                                    <ul>
                                        <li>mâcu mã đa dạng</li>
                                        <li>phong cách độc đáo</li>
                                        <li>phù hợp mọi lứa tuổi</li>
                                        <li>không giới hạn cân nạng và chiều cao</li>
                                        <li>chất lượng cam kết đảm bảo</li>
                                    </ul>
                                </div>
                                <div id="reviews" class="container tab-pane fade">
                                    <div class="reviews-submitted">
                                        <div class="reviewer">ngô văn hòa - <span>lục ngạn- bắc giang</span></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>
                                            sản phẩm rất tốt sẽ mua thêm
                                        </p>
                                    </div>
                                    <div class="reviews-submit">
                                        <h4>Đánh giá:</h4>
                                        <div class="ratting">
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="row form">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Tên">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" placeholder="Email">
                                            </div>
                                            <div class="col-sm-12">
                                                <textarea placeholder="Review"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <button>Gửi</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="product">
                        <div class="section-header">
                            <h1>Sản phẩm liên quan</h1>
                        </div>

                        <div class="row align-items-center product-slider product-slider-3">
                            <?php
                            $id = $_GET['id'];
                            require 'admin/connect.php';
                            $sql = "select * from products
                                where id = '$id'";
                            $result = mysqli_query($connect, $sql);
                            $pro = mysqli_fetch_array($result);
                            $row = $pro['manufacturer_id'];
                            $sql = "select * from products where manufacturer_id = $row ";
                            $result = mysqli_query($connect, $sql);
                            ?>
                            <?php foreach ($result as $pro) : ?> <div class="col-lg-3">

                                    <div class="product-item">
                                        <div class="product-title">
                                            <a href="product-detail.php?id=<?php echo $pro['id'] ?>"><?php echo $pro['name'] ?></a>
                                            <div class="ratting">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="product-image">
                                            <a href="product-detail.php?id=<?php echo $pro['id'] ?>">
                                                <img src="admin/products/photos/<?php echo $pro['image'] ?>">
                                            </a>
                                            <div class="product-action">
                                                <a href="#"><i class="fa fa-cart-plus"></i></a>
                                                <a href="#"><i class="fa fa-heart"></i></a>
                                                <a href="product-detail.php?id=<?php echo $pro['id'] ?>"><i class="fa fa-search"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-price">
                                            <h3><?php echo number_format($each['price'], 0, ',', '.') ?><span>đ</span></h3>
                                            <a class="btn" href="add_to_cart.php?id=<?php echo $each['id'] ?>"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                        </div>
                                    </div>

                                </div> <?php endforeach ?>
                            <!-- <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Tên SP</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-8.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span></span>99k</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Tên SP</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-6.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span></span>99k</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Tên SP</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-4.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span></span>99k</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Tên SP</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-2.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span></span>99k</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>

                <!-- Side Bar Start -->
                <div class="col-lg-4 sidebar">
                    <div class="sidebar-widget category">
                        <h2 class="title">sản phẩm bán chạy</h2>
                        <!-- <nav class="navbar bg-light">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-female"></i>Thời trang & Làm đẹp</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-child"></i>Trẻ em</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-tshirt"></i>Nam & Nữ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"><i class="fa fa-mobile-alt"></i>Tiện ích & Phụ kiện</a>
                                </li>
                            </ul>
                        </nav> -->
                    </div>

                    <div class="sidebar-widget widget-slider">

                        <?php
                        $id = $_GET['id'];
                        require 'admin/connect.php';
                        $sql = "select * from products
                                where id != '$id'";
                        $result = mysqli_query($connect, $sql);
                        $pro = mysqli_fetch_array($result);
                        $row = $pro['manufacturer_id'];
                        $sql = "select * from products where manufacturer_id = $row ";
                        $result = mysqli_query($connect, $sql);
                        ?>

                        <div class="sidebar-slider normal-slider">
                            <?php foreach ($result as  $pro) : ?>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="product-detail.php?id=<?php echo $pro['id'] ?>"><?php echo  $pro['name'] ?></a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.php?id=<?php echo $pro['id'] ?>">
                                            <img src="admin/products/photos/<?php echo  $pro['image'] ?>">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="product-detail.php?id=<?php echo $pro['id'] ?>"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><?php echo number_format($each['price'], 0, ',', '.') ?><span>đ</span></h3>
                                        <a class="btn" href="add_to_cart.php?id=<?php echo $each['id'] ?>"><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                    </div>
                                </div>
                            <?php endforeach ?>
                            <!-- <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Tên SP</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-9.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span></span>99k</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                    </div>
                                </div>
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#">Tên SP</a>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                            <img src="img/product-8.jpg" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span></span>99k</h3>
                                        <a class="btn" href=""><i class="fa fa-shopping-cart"></i>Mua ngay</a>
                                    </div>
                                </div> -->
                        </div>
                    </div>
                </div>
                <!-- Side Bar End -->
            </div>
        </div>
    </div>
    <!-- Product Detail End -->

    <!-- Brand Start -->
    <div class="brand">
        <div class="container-fluid">
            <div class="brand-slider">
                <?php
                require 'admin/connect.php';
                $sql = 'select * from manufacturers';
                $result = mysqli_query($connect, $sql);
                ?>
                <?php foreach ($result as $each) : ?>
                    <div class="brand-item"><img src="<?php echo $each['manufacturer_image'] ?>" height="100px" alt=""></div><?php endforeach ?>
            </div>
        </div>

    </div>
    <!-- Brand End -->

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
                        <h2>Được bảo vệ bởi:</h2>
                        <img src="img/godaddy.svg" alt="Payment Security" />
                        <img src="img/norton.svg" alt="Payment Security" />
                        <img src="img/ssl.svg" alt="Payment Security" />
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