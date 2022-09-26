<?php
include('includes/db_conn.php');

$pro_id= $_POST['pro_id'];
$quantity = $_POST['quantity'];

if(!empty($quantity)){
	mysqli_query($conn, "update cart set qty = '$quantity' WHERE p_id='$pro_id' ");
	
}
?>