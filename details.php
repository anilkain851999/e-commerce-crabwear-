<?php include('./includes/header.php');?>

<?php
if(isset($_GET['pro_id'])){
    $pro_id = $_GET['pro_id'];
    $get_products = "SELECT * FROM `products` where product_id = $pro_id";
    $run_products = mysqli_query($conn, $get_products);
    $row_products = mysqli_fetch_array($run_products);
    $p_cat_id = $row_products['p_cat_id'];
    $p_title = $row_products['product_title'];
    $p_price = $row_products['product_price'];
    $p_desc = $row_products['product_desc'];
    $p_img1 = $row_products['product_img1'];
    $p_img2 = $row_products['product_img2'];
    $p_img3 = $row_products['product_img3'];
    
    $get_p_cat="SELECT * FROM `product_categeories` where p_cat_id='$p_cat_id'";
    $run_p_cat=mysqli_query($conn, $get_p_cat);
    $row_p_cat=mysqli_fetch_array($run_p_cat);
    $p_cat_id=$row_p_cat['p_cat_id'];
    $p_cat_title=$row_p_cat ['p_cat_title'];
}
?>

<section class="shop_content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1><?php echo $p_title ?></h1>
                <ul class="breadcrumb">
                    <li><a href="//crabwear.com/">Home</a></li>
                    <li>shop</li>
                    <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title?></a></li>
                    <li><?php echo $p_title ?></li>
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
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src='admin_area/products_img/<?php echo $p_img1?>' class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="admin_area/products_img/<?php echo $p_img2?>" class="d-block w-100" alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="admin_area/products_img/<?php echo $p_img3?>" class="d-block w-100" alt="...">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"><img src="admin_area/products_img/<?php echo $p_img1?>" class="d-block w-100" alt="..."></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"><img src='admin_area/products_img/<?php echo $p_img2?>' class="d-block w-100" alt="..."></button>

                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"><img src='admin_area/products_img/<?php echo $p_img3?>' class="d-block w-100" alt="..."></button>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="product-count_single_products">
                        <ul>
                            <li>
                                <img src="../assets/images/cubes.png" class="img-fluid blur-up lazyloaded" alt="image">
                                <span class="p-counter">37</span>
                                <span class="lang">orders in last 24 hours</span>
                            </li>
                            <li>
                                <img src="../assets/images/man.png" class="img-fluid user_img" alt="image">
                                <span class="p-counter">44</span>
                                <span class="lang">active view this</span>
                            </li>
                        </ul>
                    </div>
                    
                    <div class="box product_data single_products_shop">
                        <h1 class=""><?php echo $p_title?></h1>

                        <?php addCart()?> <!-- add cart function -->

                        <form action="details.php?add_cart=<?php echo $pro_id?>" method="POST" class="fom-horizontal quantity_sizes_form">
                            <!-- Products Price Feild Start-->
                            <div class="products_price">
                                <p class="price">INR <?php echo  $p_price   ?></p>
                            </div>
                            
                            <div class="border-dashed"></div>

                            <div class="form-group" >
                                <label class="col-md-5 control-label">Select Size</label>
                                <div class="col-md-7">
                                      <input type="text" class="form-control" name="size" id="product_size">
                                      <ul id="list" class="list_sizes">
                                        <li class="active">S</li>
                                        <li class="">M</li>
                                        <li class="">L</li>
                                        <li class="">Xl</li>
                                    </ul>
                                 </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-5 control-label">Quantity</label>
                                    <div class="col-md-7 inc_dec_btn">
                                        <div class="input-group mb-3 quantity_item" style="width:165px">
                                            <button class="input-group-text decrement-btn" onclick="update_qty()">-</button>
                                            <input type="text" class="form-control bg-white text-center input-qty" id="input-qty" name="product_qty" value="1" readonly>
                                            <button class="input-group-text increment-btn" onclick="update_qty()">+</button>
                                        </div>                                
                                    </div>
                            </div>
                                    <p class="buttons single_product_btn">
                                        <button class="btn add_cart" type="submit">
                                            <i class="fa fa-bookmark"></i>Wishlist
                                        </button>
                                        <button class="btn add_cart" type="submit">
                                            <i class="fa fa-shopping-cart"></i>Add to cart
                                        </button>
                                    </p>
                                </form>                         
                           </div>
                            <div class="product-count_single_products delevery_chrge_pro">
                            <ul>
                                    <li>
                                        <img src="../assets/images/delivery-truck.png" class="img-fluid user_img" alt="image">
                                        <span class="lang">Free shipping for orders above $500 USD</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        
        

        		<div class="row">
        			<div class="col-md-12">
        				<div class="tabs" id="tabs_products_details">
        				    <input type="radio" name="tab" id="tab1" checked="checked">
        				    <label for="tab1">Description</label>
        				    <input type="radio" name="tab" id="tab2">
        				    <label for="tab2">Size</label>
        				    <input type="radio" name="tab" id="tab3">
        				    <label for="tab3">Archives</label>
        				    <input type="radio" name="tab" id="tab4">
        				    <label for="tab4">Contact</label>
        				  
        				    <div class="tab-content-wrapper">
        				      <div id="tab-content-1" class="tab-content">
        				        <p><?php echo $p_desc?></p>
        				      </div>
        				      <div id="tab-content-2" class="tab-content">
        				        <ul>
                                    <li>Small</li>
                                    <li>Medium</li>
                                    <li>Large</li>
                                    <li>Extra Large</li>
                                </ul>
        				      </div>
        				      <div id="tab-content-3" class="tab-content">
        				        
        				        <p>No Content </p>
        				      </div>
        				      <div id="tab-content-4" class="tab-content">
        				        
        				        <p>No Content</p>
        				      </div>
        				    </div>
        				  </div>
        			</div>
        	</div>
        	
        
    </section>


    <!-- Footer -->
    <?php include('includes/footer.php') ?>


    <script>

    function update_qty(){
    $input_qty = document.getElementById('input-qty').value;
    document.getElementById('input-qty').value=$input_qty;
    }

    var items = document.querySelectorAll("#list li");
                
    for(var i = 0; i < items.length; i++)
    {
        items[i].onclick = function(){
            document.getElementById("product_size").value = this.innerHTML;
        };
    }
    
    $(document).ready(function(){
          $('ul li').click(function(){
            $('li').removeClass("active");
            $(this).addClass("active");
        });
        });

    </script>