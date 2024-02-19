<?php




$username = isset($_SESSION['user']) ? $_SESSION['user'] : '';

?>
<div style="text-align: center;">
<ul class="topnav" style="text-align: center;">
 <?php if (!empty($username)): ?>
            <p style="color:white">Welcome, <?php echo $username; ?>,    <a href="user/logout.php" style="color:red;">Logout</a></p>



        <?php endif; ?>
    <li><a href="index.php" <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'class="active"'; ?>>Home</a></li>
    <li><a href="product_data.php" <?php if(basename($_SERVER['PHP_SELF']) == 'user_data.php') echo 'class="active"'; ?>>Product Data</a></li>
    <li><a href="add_product.php" <?php if(basename($_SERVER['PHP_SELF']) == 'add_product.php') echo 'class="active"'; ?>>Add Product</a></li>
    <li><a href="read_tag.php" <?php if(basename($_SERVER['PHP_SELF']) == 'read_tag.php') echo 'class="active"'; ?>>Add to stock</a></li>
    <li><a href="read_tag_out.php" <?php if(basename($_SERVER['PHP_SELF']) == 'read_tag_out.php') echo 'class="active"'; ?>>Out of stock</a></li>
</ul>
</div>
