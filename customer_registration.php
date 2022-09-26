<?php 
include('includes/header.php') 
?>

<?php
    $error = NULL;

	$c_nameErr = $c_emailErr  = $c_paaswordErr = $c_countryErr = $c_cityErr = $c_contactErr = $c_addressErr = NULL;
	$c_name = $c_email  = $c_paasword = $c_country = $c_city = $c_contact = $c_address = NULL;

	$flag = true;
	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["c_name"])) { //Customer NAme feild is required
			$c_nameErr = "Customer name is required";
			$flag = false;
		} else {
			$c_name = test_input($_POST["c_name"]);
		}

		if (empty($_POST["c_email"])) { //Email feild is required
			$c_emailErr = "Eamil is required";
			$flag = false;
		} else {
			$c_email = test_input($_POST["c_email"]);
		}

        if (empty($_POST["c_paasword"])) { //Password feild is required
			$c_paaswordErr = "Password is required";
			$flag = false;
		} else {
			$c_paasword = test_input($_POST["c_paasword"]);
		}

		if (empty($_POST["c_country"])) { //Country feild is required
			$c_countryErr = "Country is required";
			$flag = false;
		} else {
			$c_country = test_input($_POST["c_country"]);
		}

        if (empty($_POST["c_city"])) { //City feild is required
			$c_cityErr = "City is required";
			$flag = false;
		} else {
			$c_city = test_input($_POST["c_city"]);
		}

        if (empty($_POST["c_contact"])) { //c_contact feild is required
			$c_contactErr = "Contact is required";
			$flag = false;
		} else {
			$c_contact = test_input($_POST["c_contact"]);
		}

        if (empty($_POST["c_address"])) { //c_contact feild is required
			$c_addressErr = "Address is required";
			$flag = false;
		} else {
			$c_address = test_input($_POST["c_address"]);
		}

        $c_images =$_FILES['c_images']['name'];
        $c_tmp_img =$_FILES['c_images']['tmp_name'];
        $c_ip = getUserIP();
    
        move_uploaded_file($c_tmp_img, "customer/customer_images/$c_images");
		
        
		// submit form if validated successfully
		if ($flag) {

		$conn = new mysqli('localhost', "crabwear_crabwear", "What@2580!", "crabwear_crabwear_11");

			if ($conn->connect_error) {
				die("connection failed error: " . $conn->connect_error);
			}
			
            $insert_customer = "INSERT INTO `customers` (`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES ('$c_name', '$c_email', ' $c_paasword', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_images', '$c_ip')";

            $run_customer = mysqli_query($conn, $insert_customer);

            //When he has any products in his cart
            $sel_cart = "SELECT * FROM `cart` where ip_add='$c_ip'";
            
            $run_cart = mysqli_query($conn, $sel_cart);
            $check_cart = mysqli_num_rows($run_cart);
            if($check_cart>0){
                $_SESSION['customer_email']= $c_email;      
                echo "<script>alert('You have been registered successfully')</script>";
                echo "<script>window.open('checkout.php','_self')</script>";
            }
            else{
                $_SESSION['customer_email']= $c_email;
                echo "<script>alert('You have been registered successfully')</script>";
                echo "<script>window.open('index.php', '_self')</script>";
            }
		}
	}

	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	?>

<div id="register_form">
<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="https://cdn.pixabay.com/photo/2020/09/20/14/08/woman-5587219_960_720.jpg" alt="">
				</div>

				<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST"  enctype="multipart/form-data">
					<h3>Registration Form</h3>

					<div class="form-wrapper">
                        <input type="text" class="form-control" id="c_name" aria-describedby="emailHelp" name="c_name" placeholder="Customer Name*" value="<?= $c_name; ?>"> 
                        <span class="error"> <?= $c_nameErr; ?></span>
					</div>
					
					<div class="form-wrapper">
						<input type="text" placeholder="Customer Email*" class="form-control"  name="c_email" value="<?= $c_email; ?>">
                        <span class="error"> <?= $c_emailErr; ?></span>
					</div>
					<div class="form-wrapper">
						<input type="password" placeholder="Password*" class="form-control" name="c_paasword" value="<?= $c_paasword; ?>">
                        <span class="error"> <?= $c_paaswordErr; ?></span>
					</div>
					<div class="form-wrapper">
                        <input type="text" class="form-control" id="c_country"  name="c_country" placeholder="Country*" value="<?= $c_country; ?>">
                        <span class="error"> <?= $c_countryErr; ?></span>
					</div>
                    <div class="form-wrapper">
                        <input type="text" class="form-control" id="c_city" name="c_city" placeholder="City*" value="<?= $c_city; ?>">
                        <span class="error"> <?= $c_cityErr; ?></span>
					</div>
                    <div class="form-wrapper">
                        <input type="text" class="form-control" id="c_contact" name="c_contact" placeholder="Customer Contact*" value="<?= $c_contact; ?>">
                        <span class="error"> <?= $c_contactErr; ?></span>
					</div>
                    <div class="form-wrapper">
                        <input type="text" class="form-control" id="c_address" name="c_address" placeholder="Address*" value="<?= $c_address; ?>">
                        <span class="error"> <?= $c_addressErr; ?></span>
					</div>
                    <div class="form-wrapper">
                        <input type="file" class="form-control" id="c_images"  name="c_images" placeholder="Customer Image">
					</div>
					<button type="submit"  name="submit" >Register
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>
    </div>


    <!-- Footer -->
    <?php include('includes/footer.php') ?>





<!-- <section class="shop_prodcuts_sec">
        <div class="container">
            <div class="row">
            <div class="col-md-8 m-auto">
                    <div class="box_form">
                        <div class="box-header">
                            <center>
                                <h2>Customer registrations</h2>
                                <p class="text-muted">If you have any questions, please feel free to contact us, our
                                customer service center is working for you 24/7.</p>
                            </center>
                        </div>  
                    </div>

                    <form class="box_form" action="customer_registration.php" method="POST"  enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="customer name" class="form-label">Customer Name</label>
                            <input type="text" class="form-control" id="c_name" aria-describedby="emailHelp" name="c_name">
                        </div>
                        <div class="mb-3">
                            <label for="c_email" class="form-label">Customer Email</label>
                            <input type="email" class="form-control" id="c_email" name="c_email">
                        </div>
                        <div class="mb-3">
                            <label for="c_paasword" class="form-label">Password</label>
                            <input type="password" class="form-control" id="c_paasword" name="c_paasword">
                        </div>
                        <div class="mb-3">
                            <label for="Country" class="form-label">Country</label>
                            <input type="text" class="form-control" id="C_country" name="c_country">
                        </div>
                        <div class="mb-3">
                            <label for="c_city" class="form-label">City</label>
                            <input type="text" class="form-control" id="C_city" name="c_city">
                        </div>
                        <div class="mb-3">
                            <label for="c_contact" class="form-label">Customer Contact</label>
                            <input type="text" class="form-control" id="c_number"  name="c_contact" >
                        </div>
                        <div class="mb-3">
                            <label for="c_address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="c_address"  name="c_address" >
                        </div>
                        <div class="mb-3">
                            <label for="c_images" class="form-label">Customer Image</label>
                            <input type="file" class="form-control" id="c_images"  name="c_images">
                        </div>
                        
                        <button type="submit"  name="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
        </div>
 </section> -->
 <!-- insert data in database New Mathode input data-->
    <?php
    // if(isset($_POST['submit'])){
    //     $c_name = $_POST['c_name'];
    //     $c_email = $_POST['c_email'];
    //     $c_paasword = $_POST['c_paasword']; 
    //     $c_country = $_POST['c_country'];
    //     $c_city = $_POST['c_city'];
    //     $c_contact = $_POST['c_contact'];
    //     $c_address = $_POST['c_address'];

    //     $c_images =$_FILES['c_images']['name'];
    //     $c_tmp_img =$_FILES['c_images']['tmp_name'];
    //     $c_ip = getUserIP();
    
    //     move_uploaded_file($c_tmp_img, "customer/customer_images/$c_images");

    //     $insert_customer = "INSERT INTO `customers` (`customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES ('$c_name', '$c_email', ' $c_paasword', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_images', '$c_ip')";

    //     $run_customer = mysqli_query($conn, $insert_customer);

    //     //When he has any products in his cart
    //     $sel_cart = "SELECT * FROM `cart` where ip_add='$c_ip'";
        
    //     $run_cart = mysqli_query($conn, $sel_cart);
    //     $check_cart = mysqli_num_rows($run_cart);
    //     if($check_cart>0){
    //         $_SESSION['customer_email']= $c_email;      
    //         echo "<script>alert('You have been registered successfully')</script>";
    //         echo "<script>window.open('checkout.php','_self')</script>";
    //     }
    //     else{
    //         $_SESSION['customer_email']= $c_email;
    //         echo "<script>alert('You have been registered successfully')</script>";
    //         echo "<script>window.open('index.php', '_self')</script>";
    //     }

    // }
    ?>