<div class="col-md-12	" >
<div class="box" ><!-- box Starts -->
	<div class="box-header" ><!-- box-header Starts -->
		<center>
			<h1>Login</h1>
			<p class="lead" >Already our Customer</p>
		</center>
		<p class="text-muted" style="width: 60%;margin: auto;padding-bottom: 5%;	">
		Hi, Welcome to our platform.Signing up will allow you to order many products from our website. This website is still under development so please feel free to report any bug that you may find.
		</p>
	</div><!-- box-header Ends -->
	<form action="checkout.php" method="post" ><!--form Starts -->
		<div class="form-group" style="width: 50%;margin: auto;"><!-- form-group Starts -->
			<label>Email</label>
			<input type="text" class="form-control" name="c_email" required >
		</div><!-- form-group Ends -->
		<div class="form-group" style="width: 50%;margin: auto;"><!-- form-group Starts -->
			<label>Password</label>
			<input type="password" class="form-control" name="c_pass" required >
		</div><!-- form-group Ends -->
		<div class="text-center" ><!-- text-center Starts -->
			<button name="login" value="Login" class="btn btn-primary" style="width: 10%;margin-top: 2%;">
				<i class="fa fa-sign-in" ></i> Log in
			</button>
		</div><!-- text-center Ends -->
	</form><!--form Ends -->
	<center><!-- center Starts -->
		<a href="customer_register.php" >
		<h3>New ? Register Here</h3>
		</a>
	</center><!-- center Ends -->
</div><!-- box Ends -->
</div>
<?php
	if(isset($_POST['login'])){
		$customer_email = $_POST['c_email'];
		$customer_pass = $_POST['c_pass'];
		$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
		$run_customer = mysqli_query($db,$select_customer);
		$get_ip = getRealUserIp();
		$check_customer = mysqli_num_rows($run_customer);
		$select_cart = "select * from cart where ip_add='$get_ip'";
		$run_cart = mysqli_query($db,$select_cart);
		$check_cart = mysqli_num_rows($run_cart);
		if($check_customer==0){
			echo "<script>alert('password or email is wrong')</script>";
			exit();
		}
		if($check_customer==1 AND $check_cart==0){
			$_SESSION['customer_email']=$customer_email;
			echo "<script>alert('You are Logged In')</script>";
			echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
		}
		else {
			$_SESSION['customer_email']=$customer_email;
			echo "<script>alert('You are Logged In')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";
		} 
	}
?>


		<script src="../js/jquery.min.js"></script>
	   <script src="../js/javascript.js"></script>
		<script src="../js/bootstrap.min.js"></script>
	</body>
</html>