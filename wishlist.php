<?php include('includes/header.php'); ?>


<?php
require_once __DIR__ . "/lib/DataSource.php";
$db = new DataSource();
?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="css/style.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<section class="shop_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Wishlist</h1>
                    <ul class="circles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

<section id="wishlist_product_page">
<div class="container">
    <div class="row">
<?php
$query = 'SELECT * FROM wishlist JOIN products ON products.product_id  = wishlist.product_id';
$whish_array = $db->select($query);
$whish_array_pid = array();
if (! empty($whish_array)) {
    $i=0;
    foreach ($whish_array as $key => $value) {
        $whish_array_pid[] = $whish_array[$key]['product_id'];
        ?>
      
		<div class="product-item col-md-3 col-xl-3 col-6">
		    <div class="wishlist_wrapper">
                    <form method="post"
                        action="cart.php?action=add&add_cartpro=<?php echo $whish_array[$key]["product_id"]; ?>">
                        <div class="product-image">
                            <img
                                src="admin_area/products_img/<?php echo $whish_array[$key]["product_img1"]; ?>">
                        </div>
                        <div class="product-tile-footer">
                            <div class="product-title"><?php echo $whish_array[$key]["product_title"]; ?>
                            
                            <?php if (in_array($whish_array[$key]["product_id"], $whish_array_pid)) { 
                                ?>
                            <span
                                    data-pid="<?php echo $whish_array[$key]["product_id"]; ?>"
                                    class="heart"
                                    onclick="removeFromWishlist(this)"
                                    title="Add to wish list"> <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24"
                                        viewBox="0 0 24 24" fill="none"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-line join="round"
                                        stroke="currentColor"
                                        class="feather feather-heart color-filled">
									<path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg>
                                <img src="images/loading.gif" 
                                    id="loader">
                                </span>
                                <?php } else {
                            ?>
                                <span data-pid="<?php echo $whish_array[$key]["product_id"]; ?>" class="heart" onclick="addToWishlist(this)" title="Add to wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-line join="round" stroke="currentColor" class="feather feather-heart">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">                                   
                                </path>
                                </svg>
                                    <img src="images/loading.gif" id="loader">
                                </span>
                            <?php } ?>

                            </div>
                            <div class="product-price"><?php echo "Rs. ".$whish_array[$key]["product_price"]; ?></div>
                            <div class="cart-action">
                                <div class="qty_col">
                                <span>Qty</span>
                                <input class='text-center quantity_wishlist' name='product_qty' type='number' value='1' min='1'></div>
                                    <div class='products_size' >
                                    <input type="hidden" class="form-control" name="size" id="product_size<?php echo $i?>" value="<?=$whish_array[$key]["size"];?>">
                                        <ul id='list<?php echo $i?>' class='list_sizes'>
                                            <li <?php if($whish_array[$key]["size"] == "S"){ echo "class='active'";}?> data-value="S">S</li>
                                            <li <?php if($whish_array[$key]["size"] == "M"){ echo "class='active'";}?> data-value="M">M</li>
                                            <li <?php if($whish_array[$key]["size"] == "L"){ echo "class='active'";}?>  data-value="L">L</li>
                                            <li <?php if($whish_array[$key]["size"] == "XL"){ echo "class='active'";}?>  data-value="XL">Xl</li>
                                        </ul>
                                    </div>
                                    <input type="submit" value="Add to Cart" class="btnAddAction" />
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            
	<?php
	$i++;
    }
}
?>
</div>
</div>
</section>
<?php include('includes/footer.php') ?>

<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/custom.js"></script>
<script type="text/javascript" src="vendor/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/wishlist.js"></script>
</BODY>
</HTML>