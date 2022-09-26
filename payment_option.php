<div class="container">
    <div class="row">
        <div class="col-md-12 m-auto">
            <?php
            $_session_eamil = $_SESSION['customer_email'];
            $select_customer = "SELECT * FROM `customers` where `customer_email`= '$_session_eamil'";
            $run_cust = mysqli_query($conn, $select_customer);
            $row_customer=mysqli_fetch_array($run_cust); 
            $customer_id = $row_customer['customer_id'];
            $customer_name =$row_customer['customer_name'];
            $customer_email=$row_customer['customer_email'];
            $customer_contact=$row_customer['customer_contact'];
            ?>
            
        
            <?php
                $total =0;  
               
                    $get_product ="SELECT * FROM `cart` inner JOIN products ON `cart`.`p_id` = `products`.`product_id` WHERE `cart`.`customer_id`='$_SESSION[customer_id]'";
                    $run_pro = mysqli_query($conn, $get_product);
    
                    while ($row=mysqli_fetch_array($run_pro)) {
                        $pro_id = $row ['p_id'];
                        $pro_qty = $row ['qty'];
                        $p_price =$row ['product_price'];
                        $sub_total =$row['product_price']*$pro_qty;
                        $total+=$sub_total;      
                    }
                ?>
           

           
        <div class="box_form">
                    <div class="box-header">
                        <center>
                            <h2>Payment option</h2>
                        </center>
                    </div>
                    
                    <div>
                    <center>
                        <a href="order.php?c_id=<?php echo $customer_id ?>" id="pay_offline"> <h5>Pay offline</h5></a>
                        <p class="pay_cradit_bold">Credit Card/Debit Card/NetBanking</p>
                        <img class="payment_img" src="../assets/images/payment.svg">
                        <p class="small_pay">Pay securely by Credit or Debit card or Internet Banking through Razorpay.</p>
                        
                        <a class="btn cart_button" id="rzp-button1">Place Order</a>
                    </center>
                    </div>
            </div>
        </div>
    </div>
</div>


<button id="rzp-button12">Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_FCCPrDEKEojasU",
    "amount": <?php echo $total?>.*'100',
    "currency": "INR",
    "name": "Crabwear",
    "description": "Test Transaction",
    "image": "http://crabwear.com/assets/images/Logo%20Crab.svg",
    // "order_id": "order_9A33XWu170gUtm",
    "callback_url": "./success",
    "prefill": {
        "name": "<?php echo $customer_name?>",
        "email": "<?php echo $customer_email?>",
        "contact": "<?php echo $customer_contact?>"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#e22454"
    }
};
var rzp1 = new Razorpay(options);
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

 <style>
    p.pay_cradit_bold {
        font-size: 14px;
        font-weight: 600;
    }
    img.payment_img {
    width: 224px;
    margin-top: 15px;
    margin-bottom: 15px;
    }
    p.small_pay {
    font-size: 12px;
    padding: 20px;
    color: #959595;
}
button#rzp-button12 {
    display: none;
}
 </style>
    

