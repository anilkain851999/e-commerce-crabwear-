<?php include('includes/header.php');?>

<section class="shop_content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Shop</h1>
                <ul class="breadcrumb">
                    <li><a href="//crabwear.com/">Home</a></li>
                    <li>shop</li>
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

<section class="shop_prodcuts_sec">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
               <?php include('includes/sidebar.php'); ?>
            </div>
            <div class="col-md-9 shop_multiple_products">
            <?php
            if (!isset($_GET['p_cat'])){
                if (!isset($_GET['cat_id'])){
                    echo "<div class='shop_box'>
                                <h2>Shop</h2>
                          </div>";
                }
            }
            ?>   
             
            <div class="row text-center">
                        <?php
                            if (!isset($_GET['p_cat'])){
                                if (!isset($_GET['cat_id'])){
                                    
                                $per_page = 6;
                                if(isset($_GET['page'])){
                                    $page= $_GET['page'];
                                }
                                else{
                                    $page=1;    
                                }
                                $start_from=($page-1) * $per_page; 
                                $get_product = "SELECT * FROM `products` order by 1 DESC LIMIT $start_from, $per_page";
                                $run_pro = mysqli_query($conn, $get_product);
                                $i=0;
                                while ($row=mysqli_fetch_array($run_pro)) {
                                    $pro_id=$row['product_id'];
                                    $pro_title=$row['product_title'];
                                    $pro_price=$row['product_price'];
                                    $pro_img1=$row['product_img1'];
                                    $i++;
                                    echo "<div class='col-md-4 col-xl-4 col-lg-4 col-6 main_column_products'>
                                    <div class='product'>
                                    <a href='details.php?pro_id=$pro_id'><img src='admin_area/products_img/$pro_img1'></a>
                                    <div class='shop_pro_details'>
                                        <div class='text'>
                                            <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                            <p class='price'>₹$pro_price</p>
                                        </div>
                                        <form action='details.php?add_cart=$pro_id' method='POST'>
                                        <div class='form-group dis-hide'>
                                            <label class='col-md-5 control-label'>Prouct Quantity</label>
                                            <input class='text-center' name='product_qty' type='number' value='1' min='1'>
                                        </div>
                                        <div class='products_size'>
                                            <input type='text' class='form-control dis_none' name='size' id='product_size$i'>
                                            <ul id='list$i' class='list_sizes'>
                                                <li class='active'>S</li>
                                                <li class=''>M</li>
                                                <li class=''>L</li>
                                                <li class=''>Xl</li>
                                            </ul>
                                        </div>
                                     <div class='add_cart_btn_whis' type='submit'>
                                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'>View Details</a>
                                        <button class='add_to_cart_pro'>Add to Cart</button>
                                     </div>
                                    </form>
                                    </div>
                                    </div>
                                    </div>";
                                }
                        ?>
                        
                    <div class="pagination">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?php
                                $query ="SELECT * FROM `products`"; 
                                $result= mysqli_query($conn, $query);
                                $total_record= mysqli_num_rows($result);
                                $total_pages =ceil($total_record / $per_page);

                                echo " <li class='page-item'><a class='page-link' href='shop.php?page=1'>".'Previous'."</a></li>";

                                for ($i=1; $i<=$total_pages ; $i++) { 
                                echo "<li class='page-item'><a class='page-link' href='shop.php?page=".$i."'>".$i."</a></li>";
                                }
                                echo " <li class='page-item'><a class='page-link' href='shop.php?page=$total_pages'>".'Next'."</a></li>";
                                }
                                }
                                ?>
                            </ul>
                        </nav> 
                    </div> 
                    <div class="row categeory_pr_pg">
                        <?php getPcatPro();
                              getCatpro()
                        ?> 
                     </div>
               </div> 
            </div>
        </div>
    </div>
</section>

<style>
.dis_none{
        display:none;
    }
    
section.shop_prodcuts_sec .shop_pro_details {
    padding: 20px;
}
section.shop_prodcuts_sec .main_column_products {
    margin-bottom: 20px;
}
section.shop_prodcuts_sec .product {
    box-shadow: 0 8px 32px #0000001a;
    height: 100%;
}
section.shop_prodcuts_sec button.add_to_cart_pro {
    color: #89531c;
    border: none;
    background: none;
    margin-left: 45px;
}

@media screen and (max-width:600px) {
section.shop_prodcuts_sec .main_column_products {
    padding: 5px;
}
.main_column_products .product img {
    height: 228px;
}
section.shop_prodcuts_sec .shop_pro_details form {
    display: none;
}
}

</style>

<!-- Footer -->
<?php include('includes/footer.php')?>


<script>

for (let j = 0; j < 100; j++) {

 var items = document.querySelectorAll("#list" + j + " li");
                
    for(var i = 0; i < items.length; i++)
    {
        items[i].onclick = function(){
            
            document.getElementById("product_size" + j + "").value = this.innerHTML;
            console.log("product_size" + j + "")

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