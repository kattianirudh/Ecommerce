<?php
	session_start();
	include("includes/db.php");
	include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce Store	</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=roboto:400,500,700,300,100">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet"  type="text/css" href="font-awesome/css/font-awesome.min.css ">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/cart-style.css">
</head>

<body>
<div id="top"><!--top starts-->	
	<div class="container"><!--container starts-->
		<div class="col-md-6 offer">
			<a href="#" class="btn btn-success btn-sm">
				<?php if(!isset($_SESSION['c_name'])){
					echo 'Welcome : Guest';
				} 
				else{
					echo "Welcome".$_SESSION['c_name'];
				}
				?>
			</a>
			<a href="#">
				Shopping Cart total Price: <?php total_price(); ?>, Items: <?php items(); ?>
			</a>
		</div>
		<div class="col-md-6">
			<ul class="menu">
				<li>
					<a href="customer_register.php">Register</a>
				</li>
				<li>
					<a href="checkout.php">My Account</a>
				</li>
				<li>
					<a href="cart.php">Go to Cart</a>
				</li>
				<li>
					<?php	if(!isset($_SESSION['customer_email'])){
					echo '<a href="checkout.php">Login</a>';
				}
				else{
					echo '<a href="customer/logout.php">Logout</a>';
			}?>
				</li>
			</ul>
		</div>
		
	</div><!--top ends-->
	</div><!--container ends-->

	<div class="navbar navbar-default" id="navbar"><!-- navbar navbar-default Starts -->
		<div class="container" ><!-- container Starts -->

			<div class="navbar-header"><!-- navbar-header Starts -->

				<a class="navbar-brand home" href="index.php" ><!--- navbar navbar-brand home Starts -->

					<img src="images/logo.png" alt="echo logo" class="hidden-xs" >
					<img src="images/logo-small.png" alt="echo logo" class="visible-xs" >

				</a><!--- navbar navbar-brand home Ends -->

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation"  >

					<span class="sr-only" >Toggle Navigation </span>

					<i class="fa fa-align-justify"></i>
				</button>
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">

					<span class="sr-only" >Toggle Search</span>

					<i class="fa fa-search" ></i>			
				</button>
			</div><!-- navbar-header Ends -->
			<div class="navbar-collapse collapse" id="navigation"><!--Navbar collapse starts-->
				<div class="padding-nav"><!--Padding-Nav starts-->
					<ul class="nav navbar-nav navbar-left">
						<li>
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="shop.php">Shop</a>
						</li>
						<li>
							<a href="customer/my_account.php">My Account</a>
						</li>
						<li>
							<a href="cart.php">Shopping Cart</a>
						</li>
						<li>
							<a href="Contact.php">Contact Us</a>
						</li>
					</ul>

				</div><!--Padding nav ends-->
				<a href="cart.php" class="btn btn-primary navbar-btn right"><!--btn btn-primary navbar-btn right Starts-->
					<i class="fa fa-shopping-cart">
						<span><?php items(); ?> items</span>
					</i>
				</a><!--btn btn-primary navbar-btn right Ends-->
				<div class="navbar-collapse collapse right" ><!-- navbar-collapse collapse right Starts -->
					<button class="btn navbar-btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#search" style="background-color:rgb(79, 191, 168)" >
						<span class="sr-only">Toggle Search</span>
						<i class="fa fa-search"></i>
					</button>
				</div><!--navbar-collapse collapse right ends-->
				<?php add_cart(); ?>
				<div class="collapse-clearfix collapse" id="search"><!--collapse-clearfix starts-->
					<form action="customer_register.php" method="post" class="navbar-form" ><!--navbar-form starts-->
						<div class="input-group"><!--Input group Starts-->
							<input type="text" class="form-control" placeholder="Search" name="user_query" required>
							<span class="input-group-btn"> <!--Span to place the search button beside search box starts-->
								<button type="submit" value="Search" name="search" class="btn btn-primary">
									<i class="fa fa-search"></i>
								</button>
							</span><!--Span to place the search button beside search box ends-->
						</div><!--Input group Ends-->
					</form><!--navbar-form Ends-->
				</div><!--collapse-clearfix Ends-->
			</div><!--Navbar collapse Ends-->
		</div>
	</div>

<div id="content" ><!-- content Starts -->
	<div class="container" ><!-- container Starts -->
		<div class="col-md-12" ><!--- col-md-12 Starts -->
			<ul class="breadcrumb" ><!-- breadcrumb Starts -->
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>Register</li>
			</ul><!-- breadcrumb Ends -->
		</div><!--- col-md-12 Ends -->
		<div class="col-md-3"><!-- col-md-3 Starts -->
			<?php include("includes/sidebar.php"); ?>
		</div><!-- col-md-3 Ends -->
		<div class="col-md-9" ><!-- col-md-9 Starts -->
			<div class="box" ><!-- box Starts -->
				<div class="box-header" ><!-- box-header Starts -->
					<center><!-- center Starts -->
						<h2> Register A New Account </h2>
					</center><!-- center Ends -->
				</div><!-- box-header Ends -->
				<form action="customer_register.php" method="post" enctype="multipart/form-data" ><!-- form Starts -->
					<div class="form-group" ><!-- form-group Starts -->
						<label>Customer Name</label>
						<input type="text" class="form-control" name="c_name" required>
					</div><!-- form-group Ends -->
					<div class="form-group"><!-- form-group Starts -->
						<label> Customer Email</label>
						<input type="text" class="form-control" name="c_email" required>
					</div><!-- form-group Ends -->
					<div class="form-group"><!-- form-group Starts -->
						<label> Customer Password </label>
						<input type="password" class="form-control" name="c_pass" required>
					</div><!-- form-group Ends -->
					<div class="form-group"><!-- form-group Starts -->
						<label> Customer Country </label>
						<input type="text" class="form-control" name="c_country" required>
					</div><!-- form-group Ends -->
					<div class="form-group"><!-- form-group Starts -->
						<label> Customer City </label>
						<input type="text" class="form-control" name="c_city" required>
					</div><!-- form-group Ends -->
					<div class="form-group"><!-- form-group Starts -->
						<label> Customer Contact </label>
						<input type="text" class="form-control" name="c_contact" required>
					</div><!-- form-group Ends -->
					<div class="form-group"><!-- form-group Starts -->
						<label> Customer Address </label>
						<input type="text" class="form-control" name="c_address" required>
					</div><!-- form-group Ends -->
					<div class="form-group"><!-- form-group Starts -->
						<label> Customer Image </label>
						<input type="file" class="form-control" name="c_image" required>
					</div><!-- form-group Ends -->
					<div class="text-center"><!-- text-center Starts -->
						<button type="submit" name="register" class="btn btn-primary" style="width: 10%; background-color: #2e6da4; margin-bottom: 10%;" >
							<i class="fa fa-user-md" ></i> Register
						</button>
					</div><!-- text-center Ends -->
				</form><!-- form Ends -->
			</div><!-- box Ends -->
		</div><!-- col-md-9 Ends -->
	</div><!-- container Ends -->
</div><!-- content Ends -->
	<script src="js/jquery.min.js"></script>
	<script src="js/javascript.js"></script>
<script src="js/bootstrap.min.js"></script>		
</body>
</html>

<?php
if(isset($_POST['register']))
{	$db = mysqli_connect('localhost','root','','ecom_store');
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = $_POST['c_pass'];
	$c_country = $_POST['c_country'];
	$c_city = $_POST['c_city'];
	$c_contact = $_POST['c_contact'];
	$c_address = $_POST['c_address'];
	$c_image = $_FILES['c_image']['name'];
	$c_image_tmp = $_FILES['c_image']['tmp_name'];
	$c_ip = getRealUserIp(); 
	move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");

	$insert_customer ="insert into customers(customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
	$run_customer = mysqli_query($db,$insert_customer);
	/*print_r(var_dump($db));
	// var_dump($db); 
	var_dump($run_customer);
	die('gg');*/
	echo"<script>alert('".$c_name."')</script>";
	$sel_cart = "select * from cart where ip_add='$c_ip'";
	$run_cart = mysqli_query($db,$sel_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if($check_cart>0)
	{
		$_SESSION['customer_email']=$c_email;
		$_SESSION['c_name']=$c_name;
		echo "<script>alert('You have been Registered Successfully')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
	else{
		$_SESSION['customer_email']=$c_email;
		$_SESSION['c_name']=$c_email;
		echo "<script>alert('You have been Registered Successfully')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}
}

?>