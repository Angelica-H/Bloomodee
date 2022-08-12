<?php 
        if(isset($_GET['error'])) {
    ?>
        <span style="color: red; text-align: center;">
            <?php echo $_GET['error']  ?>
        </span>
    <?php }?>

<?php 
        if(isset($_GET['success'])) {
?>
        <span style="color: green; text-align: center;">
            <?php echo $_GET['success']  ?>
        </span>
<?php }?>

