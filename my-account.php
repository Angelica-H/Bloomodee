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
    <div class="breadcrumb-wrap">
        <div class="container-fluid">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                <li class="breadcrumb-item active">Tài khoản của tôi</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- My Account Start -->
    <div class="my-account">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Bảng điều khiển</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Đơn hàng của bạn</a>
                        <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Phương thức thanh toán</a>
                        <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>Địa chỉ</a>
                        <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Chi tiết tài khoản</a>
                        <a class="nav-link" href="signout.php"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                            <h4>Bảng điều khiển</h4>
                            <p>

                            <h5>xin chao <?php
                                            echo $_SESSION['name'];
                                            ?>
                            </h5>
                            </p>
                            <?php
                            if (isset($_GET['error'])) {
                            ?>
                                <span style="color: red;">
                                    <?php echo $_GET['error']  ?>
                                </span>
                            <?php } ?>

                            <?php
                            if (isset($_GET['success'])) {
                            ?>
                                <span style="color: green;">
                                    <?php echo $_GET['success']  ?>
                                </span>
                            <?php } ?>


                        </div>
                        <!-- don hang -->
                        <?php
                        require 'admin/connect.php';
                        $customer_id = $_SESSION['id'];
                        $sql = "select orders.*
                        from orders
                        join customers
                        on customers.id = orders.customer_id where customers.id='$customer_id'";
                        $result = mysqli_query($connect, $sql);
                        ?>
                        <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Ngày đặt</th>
                                            <th>Thông tin người nhận</th>
                                            <th>Giá</th>
                                            <th>Thành tiền</th>
                                            <th>Xem chi tiết</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($result as $each) : ?>
                                        <tr>
                                            <td><?php echo $each['id'] ?></td>
                                            <td><?php echo $each['created_at'] ?></td>
                                            <td>
                                                <?php echo $each['name_receiver'] ?><br>
                                                <?php echo $each['phone_receiver'] ?><br>
                                                <?php echo $each['address_receiver'] ?><br>
                                            </td>

                                            <td>
                                                <?php
                                                switch ($each['status']) {
                                                    case '0':
                                                        echo "Mới đặt";
                                                        break;
                                                    case '1':
                                                        echo "Đã duyệt";
                                                        break;
                                                    case '2':
                                                        echo "Đã huỷ";
                                                        break;
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo number_format($each['total_price'], 0, ',', '.') ?></td>
                                            <td>
                                                <a href="order_detail.php?id=<?php echo $each['id'] ?>">
                                                    Xem
                                                </a>
                                            </td>

                                        </tr>
                                    <?php endforeach ?>
                                </table>
                            </div>
                        </div>
                        <!-- don hang -->
                        <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                            <h4>Phương thức thanh toán</h4>
                            <p>
                                hãy chọn hình thức thanh toán phù hợp với quý khách hàng
                            </p>
                        </div>
                        <?php
                        $id = $_SESSION['id'];
                        require 'admin/connect.php';
                        $sql = "select * from customers where id ='$id'";
                        $result = mysqli_query($connect, $sql);
                        $each =  mysqli_fetch_array($result);
                        ?>
                        <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                            <h4>Địa chỉ</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Địa chỉ thanh toán</h5>
                                    <p>hương mạc -từ sơn- bắc ninh</p>
                                    <p>SĐT:0355488110</p>
                                    <button class="btn">Sửa địa chỉ</button>
                                </div>
                                <div class="col-md-6">
                                    <h5>Địa chỉ vận chuyển</h5>

                                    <p>Nhập điạ chỉ </p><input type="text">
                                    <p>SĐT: <?php echo $each['phone_number'] ?> </p>
                                    <button class="btn">Sửa địa chỉ</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                            <h4>Chi tiết tài khoản</h4>

                            <form action="login_form/process_update_account.php" method="POST">
                                <div class="row">
                                    <input type="hidden" name="id" value="<?php echo $each['id'] ?>">
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="name" value="<?php echo $each['name'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="address" value="<?php echo $each['address'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="phone_number" value="<?php echo $each['phone_number'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="email" value="<?php echo $each['email'] ?>">
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Address">
                                    </div> -->
                                    <div class="col-md-12">
                                        <button class="btn">cập nhật</button>
                                        <br><br>
                                    </div>

                                </div>
                                <h4>Đổi mật khẩu</h4>

                                <div class="row">

                                    <div class="col-md-12">
                                        <input class="form-control" type="text" placeholder="Current Password" value="<?php echo $each['password'] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="New Password" name="newpw">
                                    </div>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" placeholder="Confirm Password" name="repw">
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn">Lưu</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- My Account End -->
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