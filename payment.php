<?php
  session_start();
  include("includes/db.php");
  include("functions/functions.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
  <link rel="stylesheet" href="style3.css">
<meta name="robots" content="noindex,follow" />
</head>
<body>
<div class="payment">
  <form action="payment.php" method="get">
  <div class="checkout-panel">
    <div class="panel-body">
      <h2 class="title">Checkout</h2>

      <div class="progress-bar">
        <div class="step active"></div>
        <div class="step active"></div>
        <div class="step"></div>
        <div class="step"></div>
      </div>

      <div class="payment-method">
        <label for="card" class="method card">
          <div class="card-logos">
            <img src="img/visa_logo.png"/>
            <img src="img/mastercard_logo.png"/>
          </div>

          <div class="radio-input">
            <div id="card"  name="payment">
            Pay with credit card</div>
          </div>
        </label>

        <label for="paypal" class="method paypal">
          <img src="img/paypal_logo.png"/>
          <div class="radio-input">
            <div id="paypal"  name="payment">
            Pay with PayPal</div>
          </div>
        </label>
      </div>
      <div class="input-fields">
        <div class="column-1">
          <label for="cardholder" pattern="/^[A-Z]+$/i">Cardholder's Name</label>
          <input type="text" id="cardholder" name="cardholder" required" />

          <div class="small-inputs">
            <div>
              <label for="date">Valid thru</label>
              <input type="text" id="date" placeholder="MM / YY" name="date" pattern="^(0[1-9]{1}|1[0-2]{1})/\d{2}$" title="MM/YY" />
            </div>

            <div>
              <label for="verification">CVV / CVC *</label>
              <input type="password" id="verification" name="verification" pattern="[1-9][0-9][0-9]" title="3 digit CVV number with first no. non zero" required/>
            </div>
          </div>

        </div>
        <div class="column-2">
          <label for="cardnumber">Card Number</label>
          <input type="password" id="cardnumber" name="cardnumber" pattern="^(\d{4}[- ]){3}\d{4}|\d{16}$" title="16 digit number" />
    
          <span class="info">* CVV or CVC is the card security code, unique three digits number on the back of your card separate from its number.</span>
        </div>
      </div>

    </div>

    <div class="panel-footer">
      <button class="btn back-btn"><a href="cart.php" style="text-decoration: none;color: #f62f5e;">Back</a></button>
      <button class="btn next-btn" type="submit">Next Step</button>
    </div>
  </div>
  </form>
</div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- <script src="script2.js"></script> -->
</body>
</html>
<?php 
if(isset($_GET['verification'])){
   
    $date = $_GET['date'];
    $ver = $_GET['verification'];
    $cardnumber = $_GET['cardnumber'];
    $cardholder = $_GET['cardholder'];
   /* if((strlen((string)$ver))!=3){
      echo "<script>alert('Your CVV is incorrect.') </script>";
      echo "<script>window.open('payment.php','_self')</script>";
    }
    else{*/
         $customer_email = $_SESSION['customer_email'];
        $query1 = "select * from customers where customer_email = '$customer_email'";
         $execute1 = mysqli_query($db,$query1);
         $row = mysqli_fetch_array($execute1);
         $customer_id = $row['customer_id'];
      
      $query = "insert into payment(customer_id,customer_email,validity,cvv,card_number) values ('$customer_id','$cardholder','$date','$ver','$cardnumber')";
      

      $execute = mysqli_query($db,$query);

      echo "<script>alert('Payment Accecpted your product shall soon be delivered.')</script>";
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    /*}*/
}
?>