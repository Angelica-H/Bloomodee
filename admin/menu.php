<ul class="menu cf">
    <li><a href="../root">Trang chủ</a></li>
    <li><a href="../manufacture">Quản lý nhà sản xuất</a></li>
    <li><a href="../products">Quản lý sản phẩm </a></li>
    <li><a href="../orders">Quản lý đơn hàng </a></li>
    <li><a href="../customers">Quản lý người dùng </a></li>
    <li><a>Hello - <?php echo $_SESSION['name'] ?></a>
        <ul class="submenu">
            <li><a href="../signout.php">đăng xuất</a></li>
        </ul>
    </li>
</ul>

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