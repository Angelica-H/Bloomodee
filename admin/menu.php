<ul class="menu cf">
    <li><a href="../root">Trang chủ</a></li>
    <li><a href="../manufacture">Quản lý nhà sản xuất</a></li>
    <li><a href="../products">Quản lý sản phẩm </a></li>
    <li><a href="../orders">Quản lý đơn hàng </a>
    <ul class="submenu">
            <li><a href="../orders/order_approved.php">Thống kê đơn đã duyệt</a></li>
            <li><a href="../orders/not_approved.php">Thống kê đơn đã duyệt</a></li>
            <li><a href="../orders/order_canceled.php">Thống kê đơn đã Hủy</a></li>
        </ul>
    </li>
    <li><a href="../customers">Quản lý người dùng </a></li>
   
    <li><a>Hello - <?php echo $_SESSION['name'] ?></a>
        <ul class="submenu">
            <li><a href="../signout.php">đăng xuất</a></li>
        </ul>
    </li>
</ul>