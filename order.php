<?php include('includes/header.php'); ?>

<?php
if (isset($_GET['c_id'])) {
    $customer_id = $_GET['c_id'];
}
$ip_add = getUserIP();
$status = "Pending";
$invoice_no = rand();
$select_cart = "SELECT * FROM `cart` where customer_id='$_SESSION[customer_id]'";
$run_cart = mysqli_query($conn, $select_cart);


//Fetch Data On Cart Table
while ($row_cart=mysqli_fetch_array($run_cart)) {
   $pro_id = $row_cart['p_id'];
   $pro_qty = $row_cart['qty']; 
   $pro_size = $row_cart['size'];

   //Get Product from porducts table
   $get_products= "SELECT * FROM `products` WHERE product_id='$pro_id'";
   $run_product = mysqli_query($conn, $get_products);

        while ($row_pro=mysqli_fetch_array($run_product )) {
            $sub_total = $row_pro['product_price']*$pro_qty;

            //insert data customer table
            $insert_customer_order = "INSERT INTO `customers_order` (`customer_id`, `product_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) VALUES ('$customer_id', '$pro_id', '$sub_total', '$invoice_no', '$pro_qty', '$pro_size', NOW(), '$status')";
            $run_cus_order = mysqli_query($conn, $insert_customer_order);

    

            //Delete Cart Items after purches order
            $delete_cart = "DELETE FROM `cart` WHERE customer_id='$_SESSION[customer_id]'";
            $run_del =mysqli_query($conn, $delete_cart);

           
            echo "<script> window.open('customer/my_account.php?my_order', '_self')</script>";
        }
}
?>