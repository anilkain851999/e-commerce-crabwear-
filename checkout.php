<?php include('includes/header.php');?>

<section class="shop_content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="//crabwear.com/">Home</a></li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<section class="shop_prodcuts_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
               <?php
            if(isset($_SESSION['customer_email'])){
               include('includes/billing_address.php');
            }
               ?>
            </div>
            <div class="col-md-5 shop_multiple_products">
            <?php
                if(!isset($_SESSION['customer_email'])){
                    include('customer/customer_login.php');
                }else{
                    include('payment_option.php');
                }
            ?>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->
<?php include('includes/footer.php')?>



