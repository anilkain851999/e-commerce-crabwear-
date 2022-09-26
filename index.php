<?php include('includes/header.php'); ?>

<section class="bg-hero">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class='carousel-inner'>
            <?php
            $get_slider = "select * from slider LIMIT 0,1";
            $run_slider = mysqli_query($conn, $get_slider);
            while ($row = mysqli_fetch_array($run_slider)) {
                $slider_name = $row['slider_name'];
                $slider_image = $row['slider_img'];
                echo
                "<div class='carousel-item active'>
                <img src='./assets/images/$slider_image' class='d-block w-100' alt='...'>
                <div class='carousel-caption d-none d-md-block'>
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
                </div>
            ";
            }
            ?>
            <?php
            $get_slider = "select * from slider LIMIT 1,3";
            $run_slider = mysqli_query($conn, $get_slider);
            while ($row = mysqli_fetch_array($run_slider)) {
                $slider_name = $row['slider_name'];
                $slider_image = $row['slider_img'];
                echo
                "<div class='carousel-item'>
                <img src='./assets/images/$slider_image' class='d-block w-100' alt='...'>
                <div class='carousel-caption d-none d-md-block'>
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
                </div>";
            }
            ?>  
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</section>


<section id="categeory_collection_sec">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="wrapper_categeory_collection ">
                <a href="http://crabwear.com/shop.php?p_cat=4" target="blank">
                <img class="large_img" src="./assets/images/banner_tshirt.jpg">
                <div class="text_wrapper_cet_coll content_wht">
                    <!--<h3>JANE MULE <br>SHOES</h3>-->
                    <!--<a href="">View Collection</a>-->
                </div>
                </a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                <div class="wrapper_categeory_collection">
                    <a href="http://crabwear.com/shop.php?p_cat=7" target="blank">
                <img class="small_img_cat" src="./assets/images/shorts-crabwear.jpg">
                <div class="small-txt_wrapper_right content_blk">
                    <h3>Crabwear<br>Shorts</h3>
                    <a href="">View Collection</a>
                </div>
                </a>
            </div>
                </div>
                <div class="col-md-12">
                <div class="wrapper_categeory_collection collection_bott">
                    <a href="http://crabwear.com/shop.php?p_cat=12" target="blank">
                <img class="small_img_cat" src="./assets/images/carbwear-jaket.jpg">
                <div class="small-txt_wrapper_left content_blk">
                    <h3>Crabwear<br>Jacket</h3>
                    <a href="">View Collection</a>
                </div>
                </a>
            </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="wrapper_categeory_collection">
                <a href="http://crabwear.com/shop.php?p_cat=20" target="blank">
                <img class="large_img" src="./assets/images/banner_kurta.jpg">
                <div class="text_wrapper_cet_coll content_blk">
                    <!--<h3>JANE MULE <br>SHOES</h3>-->
                    <!--<a href="">View Collection</a>-->
                </div>
                </a>
            </div>
        </div>
    </div>
</div>
</section>




<section class="products_wapper">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2>New arrivals</h2>
                <h5 class="subtitle_heading">Our collection</h5>
            </div>
        </div>
        <div class="row text-center">
                <?php                    
                    include ('./all_products.php');
                ?>    
        </div>
    </div>
</section>  

<section id="hero-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="./assets/images/Bandhan_Myntra_Offer_Banner_02.webp" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="./assets/images/slider-b.webp" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                          <img src="./assets/images/Bandhan_Myntra_Offer_Banner_02.webp" class="d-block w-100" alt="...">
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
            </div>
        </div>
    </div>
</section>


<section class="products_wapper">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-12">
                <h2>Best Seller</h2>
                <h5 class="subtitle_heading">Our collection</h5>
            </div>
        </div>
        <div class="row text-center">
                 <?php                    
                    include ('./all_products2.php');
                ?> 
        </div>
    </div>
</section>  

<section class="user-advanteage">
    <div class="container">
        <div class="row text-center">
            <div class="col-6 col-md-3">
                <div class="box-wepper">
                    <img src="./assets/images/customer.png">
                    <h3><a href="#">Customer Servcies</a></h3>
                    <p>Top notch customer service.</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="box-wepper">
                    <img src="./assets/images/shop.png">
                    <h3><a href="#">Pickup At Any Store</a></h3>
                    <p>Free shipping on orders over INR 65.</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="box-wepper">
                    <img src="./assets/images/credit-card.png">
                    <h3><a href="#">Secured Payment</a></h3>
                    <p>We accept all major credit cards.</p>
                </div>
            </div>
            <div class="col-6 col-md-3">
                <div class="box-wepper">
                    <img src="./assets/images/product-return.png">
                    <h3><a href="#">Free Returns</a></h3>
                    <p>30-days free return policy.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Footer -->
<?php include('includes/footer.php') ?>


    