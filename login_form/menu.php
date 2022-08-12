<?php
session_start();
?>
<div class="nav">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a href="index.php" class="nav-item nav-link">Trang chủ</a>
                    <a href="product-list.php" class="nav-item nav-link">Sản phẩm</a>
                    <!-- <a href="product-detail.php" class="nav-item nav-link">Chi tiết SP</a> -->
                    <?php if (!empty($_SESSION['id'])) {
                    ?>
                        <a href="cart.php" class="nav-item nav-link">Giỏ hàng</a>
                    <?php } ?>

                    <!-- <a href="checkout.pho" class="nav-item nav-link">Kiểm tra lại</a> -->
                    <!-- <a href="my-account.php" class="nav-item nav-link">Tài khoản</a> -->
                    <!-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Thêm trang</a>
                        <div class="dropdown-menu">
                            <a href="wishlist.html" class="dropdown-item">Danh sách mong muốn</a>
                            <a href="login.html" class="dropdown-item">Đăng nhập & Đăng ký</a>
                            <a href="contact.html" class="dropdown-item">Liên hệ</a>
                        </div>
                    </div> -->
                </div>
                <div class="navbar-nav ml-auto">
                    <?php if (empty($_SESSION['id'])) { ?>
                        <a href="signin.php" class="nav-item nav-link">Đăng nhập</a>
                        <a href="signup.php" class="nav-item nav-link">Đăng ký</a>
                    <?php   } else { ?>

                        <a href="cart.php" class="btn cart">
                            <i class="fa fa-shopping-cart"></i>
                            <span></span>
                        </a>
                        <a href="my-account.php" class="nav-item nav-link"><?php echo $_SESSION['name'] ?></a>
                        <a class="nav-link" href="signout.php"><i class="fa fa-sign-out-alt"></i>Đăng xuất</a>
                    <?php } ?>

                </div>
            </div>
        </nav>
    </div>
</div>