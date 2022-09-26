<?php include('includes/header.php');?>


    <section class="shop_content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contact Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="//crabwear.com/">Home</a></li>
                        <li>Contact us</li>
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

    <section id="Contact_us">
        <div class="container">
            <div class="row">
            <div class="col-md-2">
                <!--<?php //include('includes/sidebar.php'); ?>-->
            </div>
            <div class="col-md-8">
                    <div class="box"><!--box Start-->
                        <div class="box-header"><!--box-header Start-->
                            <div class="text-left">
                                <h2>Contact Us</h2>
                                <p class="text-muted">If you have any questions, please feel free to contact us, our
                                customer service center is working for you 24/7.</p>
                            </div>
                        </div>  
                    </div><!--box End-->
                    
                    
                    <form method="POST" id="contact_us_main">
                       <div class="form_flex">
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="emailHelp" name="name" placeholder="Enter Your Full Name">
                        </div>
                        
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email">
                        </div>
                        </div> 
                        <div class="form_flex">
                        <div class="mb-3">
                            <label for="mob_no" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mob_no" name="mob_no" placeholder="Enter Your Mobile Number">
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject</label>
                            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter Your Subject">
                        </div>
                        </div>
                        
                        <div class="mb-3">
                        <div class="form-group">
                            <label>Massage</label>
                            <textarea class="form-control" name="message"></textarea>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
                <div class="col-md-2">
             </div>
         </section>

<?php
error_reporting(E_ALL); 
ini_set("display_errors", 5);

require('./PHPMailer/PHPMailer/src/PHPMailer.php');
require("./PHPMailer/PHPMailer/src/SMTP.php");
require("./PHPMailer/PHPMailer/src/Exception.php");



                        if(isset($_POST['submit'])){
                             $name =$_POST['name'];
                             $email =$_POST['email'];
                             $subject =$_POST['subject'];
                             $mob_no =$_POST['mob_no'];
                             $message =$_POST['message'];
                    
                            //Create an instance; passing `true` enables exceptions
                            //$mail = new PHPMailer(true);
                            $mail = new PHPMailer\PHPMailer\PHPMailer(true);
                                
                            try {
                                //Server settings
                                //$mail->SMTPDebug = 3;                      //Enable verbose debug output
                                //$mail->isSMTP();                           //Send using SMTP
                                $mail->Host       = 'mail.crabwear.com';     //Set the SMTP server to send through
                                $mail->SMTPAuth   = true;                    //Enable SMTP authentication
                                $mail->Username   = 'contact@crabwear.com';  //SMTP username
                                $mail->Password   = 'What@2580';             //SMTP password
                                $mail->SMTPSecure = 'tls';                   //Enable implicit TLS encryption
                                $mail->Port       = 465;                     //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                    
                                //Recipients
                                $mail->setFrom('contact@crabwear.com', 'Anil ken');
                                $mail->addAddress('contact@crabwear.com', 'carb');     //Add a recipient
                                $mail->addReplyTo('contact@crabwear.com', 'Anil');
                               
                                //Content
                                $mail->isHTML(true);                                  //Set email format to HTML
                                $mail->Subject = $subject;
                                $mail->Mob_No = $mob_no;
                                $mail->Body    = $message;
                    
                                $mail->send();
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert" id="popup1">
                                          <img src="https://freeiconshop.com/wp-content/uploads/edd/checkmark-flat.png">
                        					<h2>Thank You! </h2>
                        					<p>Your Message has been successfully submitted. Thanks!</p> 
                                          <button type="button" data-bs-dismiss="alert" onclick="hide("popup1")" aria-label="Close">Ok</button>
                                        </div>';
                            } catch (Exception $email) {
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert popup-warning" id="popup1">
                                          <img src="https://cdn-icons-png.flaticon.com/512/1828/1828595.png">
                        					<h2>Error </h2>
                        					<p>Your Message has been Not Send Please Check</p> 
                                          <button type="button" data-bs-dismiss="alert" onclick="hide("popup1")" aria-label="Close">Ok</button>
                                        </div>';
                            }
                        } 
                        ?>
    <!-- Footer -->
    <?php include('includes/footer.php') ?>
    
<style>
div#popup1 {
    background: #fff;
    border: 2px solid #2dcb70;
    border-radius: 0;
    width: 500px;
    padding: 30px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align:center;
}
div#popup1 img {
    width: 90px;
    margin-top: -85px;
}
div#popup1 button {
    border: 1px solid #2dcb70;
    background: #fff;
    padding: 10px 50px;
    border-radius: 25px;
    margin-top: 30px;
    font-size: 18px;
    font-weight: 500;
    text-transform: uppercase;
    color: #664d03;
}
 .popup-warning {
    background: #fff;
    border: 2px solid #cb2d2d;
    border-radius: 0;
    width: 500px;
    padding: 30px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align:center;
}
.popup-warning img {
    width: 90px;
    margin-top: -85px;
}
.popup-warning button {
    border: 1px solid #cb2d2d;
    background: #fff;
    padding: 10px 50px;
    border-radius: 25px;
    margin-top: 30px;
    font-size: 18px;
    font-weight: 500;
    text-transform: uppercase;
    color: #664d03;
}
#popup1 {
  box-shadow:  0px 0px 0px 9999px rgba(0, 0, 0, 0.5);
}
        
.popup-warning h2{color: #cb2d2d;}
        
section#Contact_us .box-header h2 {
    font-size: 35px;
    color: #232323;
    font-family: 'Rubik';
    font-weight: 600;
    margin-bottom: 18px;
}
section#Contact_us .box-header h2 {
    position: relative;
}
section#Contact_us h2:before {
    content: "";
    position: absolute;
    left: 0;
    width: 177px;
    height: 1px;
    background-color: #ddd;
    bottom: -6px;
}
section#Contact_us h2:after {
    content: "";
    position: absolute;
    left: 0;
    width: 60px;
    height: 4px;
    background-color: #e22454;
    bottom: -7px;
    border-radius: 25px;
}
section#Contact_us p.text-muted {
    color: #000000 !important;
    font-size: 15px;
}
form#contact_us_main label.form-label {
    font-size: 15px;
}
form#contact_us_main button.btn.btn-primary {
    padding: 14px 30px;
    border-radius: 0;
    background: #e22454;
    border: 0px;
    text-transform: uppercase;
}
.form_flex {
    display: flex;
}
form#contact_us_main .mb-3 {
    width: 100%;
}
form#contact_us_main .form-control:focus {
    border-color: 0;
    outline: 0;
    box-shadow: none;
}
form#contact_us_main input {
    height: 50px;
}
form#contact_us_main .mb-3 {
    width: 100%;
    margin: 5px;
}
form#contact_us_main {
    margin-bottom: 80px;
    background: #eff2f7;
    padding: 50px;
}

/*______________IPAD MEDIA QUERY______________*/
@media screen and (max-width:768px) {
form#contact_us_main {
    padding: 20px;
}
.form_flex {
    display: inherit;
}
}
}
</style>
  
<script>
$ = function(id) {
  return document.getElementById(id);
}

var show = function(id) {
	$(id).style.display ='block';
}
var hide = function(id) {
	$(id).style.display ='none';
}
</script>