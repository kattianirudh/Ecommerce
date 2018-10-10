<style type="text/css">
		body{
			margin-top: 0px;
		}
		.login_container{
			min-width: 100%;
			min-height: 100vh;
			padding-top: 140px;
			background: -moz-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* ff3.6+ */
			background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, rgba(52,235,233,1)), color-stop(100%, rgba(208,255,174,1))); /* safari4+,chrome */
			background: -webkit-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* safari5.1+,chrome10+ */
			background: -o-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* opera 11.10+ */
			background: -ms-linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* ie10+ */
			background: linear-gradient(225deg, rgba(208,255,174,1) 0%, rgba(52,235,233,1) 100%); /* w3c */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d0ffae', endColorstr='#34ebe9',GradientType=1 ); /* ie6-9 */
		}

		.loginn_card{
			min-width: 400px;
			max-width: 400px;
			min-height: 450px;
			max-height: 450px;
			background-color: white;
			border-radius: 4px;
			box-shadow: 0px 10px 15px 2px rgba(0,0,0,0.2);
		}
	</style>
	<div class="login_container">
<div class="col-md-12	" >
<div class="box" ><!-- box Starts -->
	<div class="box-header" ><!-- box-header Starts -->
		<!-- <center>
			<h1>Login</h1>
			<p class="lead" >Already our Customer</p>
		</center> -->
		<!-- <p class="text-muted" style="width: 60%;margin: auto;padding-bottom: 5%;	">
		Hi, Welcome to our platform.Signing up will allow you to order many products from our website. This website is still under development so please feel free to report any bug that you may find.
		</p> -->
	</div>
	<form action="checkout.php" method="post" ><!--form Starts -->
	<!-- 	<div class="form-group" style="width: 50%;margin: auto;">form-group Starts
		<label>Email</label>
		<input type="text" class="form-control" name="c_email" required >
	</div>form-group Ends
	<div class="form-group" style="width: 50%;margin: auto;">form-group Starts
		<label>Password</label>
		<input type="password" class="form-control" name="c_pass" required >
	</div>form-group Ends
	<div class="text-center" >text-center Starts
		<button name="login" value="Login" class="btn btn-primary" style="width: 10%;margin-top: 2%;">
			<i class="fa fa-sign-in" ></i> Log in
		</button>
	</div>text-center Ends -->
		<center>
    		<div class="loginn_card">
    			<div style="font-size: 20pt; padding-top: 50px; color: rgba(0,0,0,0.6); padding-bottom: 50px"><i class="fa fa-lock" aria-hidden="true"></i> Login</div>

    			<div style="max-width: 320px">
	    				<input type="text" name="c_email" placeholder="Username" required class="form-control" style="border-bottom-left-radius: 0px; border-bottom-right-radius: 0px; min-height: 50px; border-left-color: #f492ac; border-top-color: #f492ac; border-right-color: #f492ac">
	    				<input type="password" name="c_pass" placeholder="Password" required class="form-control" style="border-top-left-radius: 0px; border-top-right-radius: 0px; min-height: 50px; border-left-color: #f492ac; border-right-color: #f492ac; border-bottom-color: #f492ac">
	    				<br><br>
	    				<input type="submit" name="login" value="login" style="min-height: 50px; background-color: #ef5585; color: #fff; border: 0px solid white; min-width: 320px; border-radius: 3px; font-size: 10pt; font-weight: 600">
	    			<br><br><div style="font-size: 10pt;">New? Register here. <a href="customer_register.php" style="color: #8869a6">Create Account</a></div>
    			</div>
		
    		</div>
	    </center>
	</form><!--form Ends -->
	<!-- <center>center Starts
		<a href="customer_register.php" >
		<h3>New ? Register Here</h3>
		</a>
	</center>center Ends -->
	</div>
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