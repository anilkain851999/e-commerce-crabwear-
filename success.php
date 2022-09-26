
<?php include('includes/header.php'); ?>
<?php
if(isset($_SESSION['customer_email'])){
$customer_email = $_SESSION['customer_email'];  
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-12 m-auto">
            <?php
            $_session_eamil = $_SESSION['customer_email'];
            $select_customer = "SELECT * FROM `customers` where `customer_email`= '$_session_eamil'";
            $run_cust = mysqli_query($conn, $select_customer);
            $row_customer=mysqli_fetch_array($run_cust); 
            $customer_id = $row_customer['customer_id'];
            ?>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.8.2.js"></script>

<style type="text/css">
    #overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #000;
    filter:alpha(opacity=70);
    -moz-opacity:0.7;
    -khtml-opacity: 0.7;
    opacity: 0.7;
    z-index: 100;
    display: none;
    }
    
    .popup{
    width: 100%;
    margin: 0 auto;
    display: none;
    position: fixed;
    z-index: 101;
    }
.cnt223 {
    min-width: 600px;
    width: 600;
    min-height: 150px;
    background: #fff;
    position: fixed;
    z-index: 103;
    padding: 57px 35px;
    box-shadow: rgb(149 157 165 / 20%) 0px 8px 24px;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border-radius: 0;
    border: 1px solid #fbd1a7;
}

</style>
<script type='text/javascript'>
$(function(){
var overlay = $('<div id="overlay"></div>');
overlay.show();
overlay.appendTo(document.body);
$('.popup').show();
$('.close').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});


 

$('.x').click(function(){
$('.popup').hide();
overlay.appendTo(document.body).remove();
return false;
});
});
</script>
        <div class='popup'>
            <div class='cnt223'>
                <div class="success-checkmark">
                  <div class="check-icon">
                    <span class="icon-line line-tip"></span>
                    <span class="icon-line line-long"></span>
                    <div class="icon-circle"></div>
                    <div class="icon-fix"></div>
                  </div>
                </div>
                <h1 class="text-center">Thank You!</h1>
                <p class="text-center">
Your order is confirmed. You will receive an order confirmation email/SMS
shortly with the expected delivery date for your items.
</p>
                </div>
            </div>
        </div>
    </div>
</div>


 <script>
    setTimeout(function(){
  window.location.href = 'order.php?c_id=<?php echo $customer_id ?>';
}, 3000);

$("button").click(function () {
  $(".check-icon").hide();
  
  setTimeout(function () {
    $(".check-icon").show();
  }, 10);
});
</script>


<style>
h1.text-center {
    color: #04aa86;
    font-size: 32px;
}
.success-checkmark {
  width: 80px;
  height: 115px;
  margin: 0 auto;
}
.success-checkmark .check-icon {
  width: 80px;
  height: 80px;
  position: relative;
  border-radius: 50%;
  box-sizing: content-box;
  border: 4px solid #4CAF50;
}
.success-checkmark .check-icon::before {
  top: 3px;
  left: -2px;
  width: 30px;
  transform-origin: 100% 50%;
  border-radius: 100px 0 0 100px;
}
.success-checkmark .check-icon::after {
  top: 0;
  left: 30px;
  width: 60px;
  transform-origin: 0 50%;
  border-radius: 0 100px 100px 0;
  animation: rotate-circle 4.25s ease-in;
}
.success-checkmark .check-icon::before, .success-checkmark .check-icon::after {
  content: "";
  height: 100px;
  position: absolute;
  /*background: #FFFFFF;*/
  transform: rotate(-45deg);
}
.success-checkmark .check-icon .icon-line {
  height: 5px;
  background-color: #4CAF50;
  display: block;
  border-radius: 2px;
  position: absolute;
  z-index: 10;
}
.success-checkmark .check-icon .icon-line.line-tip {
  top: 46px;
  left: 14px;
  width: 25px;
  transform: rotate(45deg);
  animation: icon-line-tip 0.75s;
}
.success-checkmark .check-icon .icon-line.line-long {
  top: 38px;
  right: 8px;
  width: 47px;
  transform: rotate(-45deg);
  animation: icon-line-long 0.75s;
}
.success-checkmark .check-icon .icon-circle {
  top: -4px;
  left: -4px;
  z-index: 10;
  width: 80px;
  height: 80px;
  border-radius: 50%;
  position: absolute;
  box-sizing: content-box;
  border: 4px solid rgba(76, 175, 80, 0.5);
}
.success-checkmark .check-icon .icon-fix {
  top: 8px;
  width: 5px;
  left: 26px;
  z-index: 1;
  height: 85px;
  position: absolute;
  transform: rotate(-45deg);
  /*background-color: #FFFFFF;*/
}

@keyframes rotate-circle {
  0% {
    transform: rotate(-45deg);
  }
  5% {
    transform: rotate(-45deg);
  }
  12% {
    transform: rotate(-405deg);
  }
  100% {
    transform: rotate(-405deg);
  }
}
@keyframes icon-line-tip {
  0% {
    width: 0;
    left: 1px;
    top: 19px;
  }
  54% {
    width: 0;
    left: 1px;
    top: 19px;
  }
  70% {
    width: 50px;
    left: -8px;
    top: 37px;
  }
  84% {
    width: 17px;
    left: 21px;
    top: 48px;
  }
  100% {
    width: 25px;
    left: 14px;
    top: 45px;
  }
}
@keyframes icon-line-long {
  0% {
    width: 0;
    right: 46px;
    top: 54px;
  }
  65% {
    width: 0;
    right: 46px;
    top: 54px;
  }
  84% {
    width: 55px;
    right: 0px;
    top: 35px;
  }
  100% {
    width: 47px;
    right: 8px;
    top: 38px;
  }
}
</style>

