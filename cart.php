<?php
 
 include('includes/header.php');?>
<?php
if(isset($_SESSION['customer_email'])){
$customer_email = $_SESSION['customer_email'];  
}

if(isset($_REQUEST['action'])== 'add' && isset($_REQUEST['add_cartpro'])){
    mysqli_query($conn,"delete from wishlist where customer_id='$_SESSION[customer_id]' and product_id='$_REQUEST[add_cartpro]' ");
    addcartpro();
}
?>

<section class="shop_content">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
            <h1>Shopping Cart</h1>
                <ul class="breadcrumb">
                    <li><a href="//crabwear.com/">Home</a></li>
                    <li>Cart</li>
                </ul>
                
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

    <section class="shop_prodcuts_sec cart_main_products">
        <div class="container">
            <div class="row">
                <div class="col-md-7" id="cart">
                    <div class="box">
                <form action="cart.php" method="POST" enctype="multipart-form-data">                  
                    <?php                       
                        $ip_add = getUserIP();
                        $select_cart = "SELECT * FROM `cart` WHERE customer_id='$_SESSION[customer_id]'";
                        $run_cart = mysqli_query($conn, $select_cart);
                        $count = mysqli_num_rows($run_cart);
                    ?>

                    <p class="text-muted">Currently you have <?php echo "$count" ?> item(s) in your cart</p>
                                <?php
                                $total =0;  
                               
                                    $get_product ="SELECT * FROM `cart` inner JOIN products ON `cart`.`p_id` = `products`.`product_id` WHERE `cart`.`customer_id`='$_SESSION[customer_id]'";
                                    $run_pro = mysqli_query($conn, $get_product);

                                    while ($row=mysqli_fetch_array($run_pro)) {
                                        $pro_id = $row ['p_id'];
                                        $pro_size = $row ['size'];
                                        $pro_qty = $row ['qty'];
                                        $p_title =$row ['product_title'];
                                        $p_img1 =$row ['product_img1'];
                                        $p_price =$row ['product_price'];
                                        $sub_total =$row['product_price']*$pro_qty;
                                        $total+=$sub_total;                                                                           
                                ?>
                                <div class="cart_item_card">
                                    <div class="card-img_cart">
                                        <img src='admin_area/products_img/<?php echo $p_img1 ?>'>
                                    </div>
                                    <div class="cart_item_details">
                                        <p class="title_cart_prod"><?php echo $p_title?></p>
                                        <div class="size_qty_cart">
                                            <p class="cart_prod_size"><span>Size</span><?php echo $pro_size?></p>
                                            <p class="product_data"><span>Qty</span><input class='text-center iquantity' id="<?php echo $pro_id; ?>" onchange='subtotal(),saveCart(this)' type='number' value='<?php echo $pro_qty?>' min='1' max='10'></p>
                                        </div>
                                        <p class="cross_icon_cart">
                                            <a href="<?=$_SERVER['PHP_SELF'].'?del_item='.$pro_id; ?>" class="icon" onclick="return confirm('Are you sure you want to Remove?');">
                                                <i class="fas fa-times"></i>
                                            </a>
                                        </p>
                                        <p class="price_cart_prod"><?php echo 'Rs.'. $p_price?> <input type='hidden' class='iprice' value='<?php echo $p_price?>'></p>
                                        <p class="total_price_one_item">Rs.<span class='itotal'></span></p>
                                    </div>
                                </div>
                                
                                <?php }
                            ?>
                            
                            <div class="cart_total_all">
                                <p class="total_cart">Total</p>
                                <p>Rs.<span id='gtotal'></span></p>
                            </div>
                    </div>
                    

                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="index.php" class="btn cart_button"><i class="fas fa-arrow-left"></i>Continue Shopping</a>                            
                        </div>
                        <div class="pull-right">                         
                         
                        </div>
                    </div>
                </form>
                </div> 
        

        <div class="col-md-5"> 
                    <div class="box_order_summary" id="order-summary">
                        <div class="box-header">
                            <h3>Cart Totals</h3>
                        </div>
                        
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>Total</td>
                                    <!-- <th id='gtotal'></th> -->
                                    <th class="cart_charges" id='gstotal'> </th>
                                </tr>
                                <tr>
                                    <td>Shipping and handling</td>
                                    <td class="cart_charges">INR 0</td>
                                </tr>
                                <tr>
                                    <td>Tax</td>
                                    <td class="cart_charges">INR 0</td>
                                </tr>
                                <tr>
                                    <td class="total"> Subtotal</td>
                                    <th class="cart_charges" >Rs.<span id='gatotal'></span></th>
                                </tr>
                                </tbody>
                            </table>                           
                    </div>                   
                </div> 
                <a href="checkout.php" class="btn cart_button">Proceed to checkout <i class="fas fa-arrow-right"></i></a>
              </div>
        </div>
    </section>

<style>
    
ul.circles li {
    position: absolute;
    display: block;
    list-style: none;
    width: 20px;
    height: 20px;
    background-color: #e22454;
    -webkit-animation: animate 25s linear infinite;
    animation: animate 25s linear infinite; 
    bottom: -150px;
    opacity: 0.2 !important;
}
.circles li:nth-child(1) {
    left: 25%;
    width: 80px;
    height: 80px;
    -webkit-animation-delay: 0s;
    animation-delay: 0s;
}
.circles li:nth-child(2) {
    left: 10%;
    width: 20px;
    height: 20px;
    -webkit-animation-delay: 2s;
    animation-delay: 2s;
    -webkit-animation-duration: 12s;
    animation-duration: 12s;
}
.circles li:nth-child(3) {
    left: 70%;
    width: 20px;
    height: 20px;
    -webkit-animation-delay: 4s;
    animation-delay: 4s;
}
.circles li:nth-child(4) {
    left: 40%;
    width: 60px;
    height: 60px;
    -webkit-animation-delay: 0s;
    animation-delay: 0s;
    -webkit-animation-duration: 18s;
    animation-duration: 18s;
}
.circles li:nth-child(5) {
    left: 65%;
    width: 20px;
    height: 20px;
    -webkit-animation-delay: 0s;
    animation-delay: 0s;
}
.circles li:nth-child(6) {
    left: 75%;
    width: 90px;
    height: 90px;
    -webkit-animation-delay: 3s;
    animation-delay: 3s;
}
.circles li:nth-child(7) {
    left: 19%;
    width: 110px;
    height: 110px;
    -webkit-animation-delay: 7s;
    animation-delay: 7s;
}
.circles li:nth-child(8) {
    left: 50%;
    width: 25px;
    height: 25px;
    -webkit-animation-delay: 15s;
    animation-delay: 15s;
    -webkit-animation-duration: 45s;
    animation-duration: 45s;
}
.circles li:nth-child(9) {
    left: 20%;
    width: 15px;
    height: 15px;
    -webkit-animation-delay: 2s;
    animation-delay: 2s;
    -webkit-animation-duration: 35s;
    animation-duration: 35s;
}
.circles li:nth-child(10) {
    left: 85%;
    width: 110px;
    height: 110px;
    -webkit-animation-delay: 0s;
    animation-delay: 0s;
    -webkit-animation-duration: 11s;
    animation-duration: 11s;
}
section.shop_content {
    position: relative;
    z-index: 0;
}
.circles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: -1;
}
@keyframes animate {
0% {
    -webkit-transform: translateY(0) rotate(0deg);
    transform: translateY(0) rotate(0deg);
    opacity: 1;
    border-radius: 0;
}
100% {
    -webkit-transform: translateY(-1000px) rotate(720deg);
    transform: translateY(-1000px) rotate(720deg);
    opacity: 0;
    border-radius: 50%;
}
}
</style>


<!-- Footer -->
<?php include('includes/footer.php') ?>


<!-- Script  -->
<script>
function update_qty(){
$input_qty = document.getElementById('input-qty').value;
document.getElementById('input-qty').value=$input_qty;
}

var gt=0;
var iprice=document.getElementsByClassName('iprice');
var iquantity=document.getElementsByClassName('iquantity');
var itotal=document.getElementsByClassName('itotal');
var gtotal=document.getElementById('gtotal');

function subtotal(){
    gt=0;
    gs=0;
    gat=0;
    for(i=0; i<iprice.length;i++)
    {
        itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
        gt=gt+(iprice[i].value)*(iquantity[i].value);
        
        gs=gs+(iprice[i].value)*(iquantity[i].value);
        gat=gat+(iprice[i].value)*(iquantity[i].value);
        
    }
    gtotal.innerText=gt;
    gstotal.innerText=gs;
    gatotal.innerText=gat;
}
subtotal();

function saveCart(obj) {
	var quantity = $(obj).val();
	var pro_id = $(obj).attr("id");
	$.ajax({
		url: "update_quantity.php",
		type: "POST",
		data: 'pro_id='+pro_id+'&quantity='+quantity,
		success: function(data, status){$("#total_price").html(data); console.log('product_id:'+ pro_id, 'quantity:' + quantity) },
		error: function () {console.log("Problen in sending reply!")}
	});
}
</script>