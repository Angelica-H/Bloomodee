 <?php
    session_start();
    // unset($_SESSION['cart']);
    $id = $_GET['id'];
    if(empty($_GET['size_id']))
    {
        $id_size=1;
    }
    else
    { 
        $id_size=$_GET['size_id'] ;
    }
    if(empty($_GET['color_id']))
    {
        $id_color=1;
    }
    else
    { 
        $id_color=$_GET['color_id'] ;
    };
    if (empty($_SESSION['cart'][$id])) {
        require 'admin/connect.php';
        $sql = "select * from products where id = '$id'";
        $result = mysqli_query($connect, $sql);
        $each = mysqli_fetch_array($result);

        $_SESSION['cart'][$id]['name'] = $each['name'];
        $_SESSION['cart'][$id]['image'] = $each['image'];
        $_SESSION['cart'][$id]['price'] = $each['price'];
        $_SESSION['cart'][$id]['quantity'] = 1;
        $_SESSION['cart'][$id]['size'] =$id_size;
        $_SESSION['cart'][$id]['color'] =$id_color;
    } else {
        $_SESSION['cart'][$id]['quantity']++;
    }

    // print_r($_SESSION['cart']);
   header('location:product-list.php');
