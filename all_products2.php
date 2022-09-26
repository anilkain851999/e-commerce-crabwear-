<?php
require_once __DIR__ . "/lib/DataSource.php";
$db_handle = new DataSource();

$query = 'SELECT * FROM wishlist JOIN products ON products.product_id  = wishlist.product_id ORDER BY wishlist.product_id ASC';

$whish_array = $db_handle->select($query);
$whish_array_pid = array();
if (!empty($whish_array)) {
    foreach ($whish_array as $z => $value) {
        $whish_array_pid[] = $whish_array[$z]['product_id'];
    }
}
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            if (!empty($_POST["quantity"])) {
                $query = 'SELECT * FROM products WHERE code= ? ';
                $paramType = 's';
                $paramValue = array(
                    $_GET["code"]
                );
                $productByCode = $db_handle->select($query, $paramType, $paramValue);

                $itemArray = array(
                    $productByCode[0]["code"] => array(
                        'product_title' => $productByCode[0]["product_title"],
                        'code' => $productByCode[0]["code"],
                        'quantity' => $_POST["quantity"],
                        'product_price' => $productByCode[0]["product_price"],
                        'product_img1' => $productByCode[0]["product_img1"]
                    )
                );

                

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["code"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
}
?>

    <?php
    $query = 'SELECT * FROM products ORDER BY 1 DESC LIMIT 8,16';
    $product_array = $db_handle->select($query);
    $i=8;
    if (!empty($product_array)) {
        foreach ($product_array as $key => $value){
    ?>
            <div class='col-6 col-md-6 col-lg-4 col-xl-3 get_pro_space'>
                <div class='product-card'>

                    <div class='product_img'>
                        <a class='hover-switch' href='details.php?pro_id=<?php echo $product_array[$key]["product_id"]; ?>'>
                            <img src="admin_area/products_img/<?php echo $product_array[$key]["product_img1"]; ?>">
                        </a>
                    </div>
                      
                    <div class='products_info'>
                        <div class="product-title"><p><?php echo $product_array[$key]["product_title"]; ?></p>
                        <p class='product-card__price'>Rs. <?php echo $product_array[$key]["product_price"]; ?>
                        <s class='product-card__regular-price'>Rs. 1490.00</s>
                        </p>
                        <form action='cart.php?action=add&add_cartpro=<?php echo $product_array[$key]["product_id"]; ?>' method='POST'>
                        <div class='products_size'>
                            <input type="hidden" class="form-control" name="size" id="product_size<?php echo $i;?>">
                            <ul id='list<?php echo $i;?>' class='list_sizes' id="list">
                                <li class='' data-value="S">S</li>
                                <li class='' data-value="M">M</li>
                                <li class='' data-value="L">L</li>
                                <li class='' data-value="XL">Xl</li>
                            </ul>
                        </div>
                            <?php if (in_array($product_array[$key]["product_id"], $whish_array_pid)) { 
                                ?>
                                <span data-pid="<?php echo $product_array[$key]["product_id"]; ?>" class="heart" onclick="removeFromWishlist(this)" title="Remove from wishlist">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-line join="round" stroke="currentColor" class="feather feather-heart color-filled">
                                            <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
                                    </svg>
                                    <img src="images/loading.gif" id="loader">
                                </span>
                            <?php } else {
                            ?>
                                <span data-pid="<?php echo $product_array[$key]["product_id"]; ?>" class="heart" onclick="addToWishlist(this)" title="Add to wishlist">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke-width="2" stroke-linecap="round" stroke-line join="round" stroke="currentColor" class="feather feather-heart">
                                <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">                                   
                                </path>
                                </svg>
                                    <img src="images/loading.gif" id="loader">
                                </span>
                            <?php } ?>
                        </div>

                       
                            <div class='form-group dis-hide'>
                                <label class='col-md-5 control-label'>Prouct Quantity</label>
                                <input class='text-center d-none' name='product_qty' type='number' value='1' min='1'>
                            </div>
                            <div class="cart-action">
                                <input type="text" class="product-quantity d-none" name="quantity" value="1" size="2" />

                                <input type="submit" value="Add to Cart" class="btnAddAction" />
                            </div>  
                        </form>
                    </div>
                </div>
            </div>  
    <?php
    $i++;
        }
        
    }
    ?>
</div>


<script type="text/javascript" src="vendor/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="js/wishlist.js"></script>











<style>
    .product-item img {
        width: 100px;
    }

#whishlist {
    color: black;
    background-color: #ffffff;
    border: #787e84 1px solid;
    padding: 5px 10px;
    text-decoration: none;
    border-radius: 3px;
    margin: 10px 0px;
 }

.heart {
    cursor: pointer;
    vertical-align: middle;
    float: right;
    margin-top: 0px;
}

    
.color-filled {
	fill: #a50d0d;
	stroke: #a50d0d;
}

#loader {display: none; }

div#shopping-cart table.tbl-cart img.cart-item-image {width: 50px;}

table {
    caption-side: bottom;
    border-collapse: collapse;
    width: 100%;
}
a.btnRemoveAction img {
    width: 25px;
}
</style>

<script>

for (let j = 8; j < 100; j++) {

 var items = document.querySelectorAll("#list" + j + " li");
                
    for(var i = 8; i < items.length; i++)
    {
        items[i].onclick = function(){
            
            document.getElementById("product_size" + j + "").value = this.innerHTML;

            $(document).ready(function(){
                  $('ul li').click(function(){
                    $('li').removeClass("active");
                    $(this).addClass("active");
                });
                });
                };
    }
 }
    </script>


