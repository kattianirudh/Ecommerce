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
</head>
<body>
<div id="top"><!--top starts-->	
	<div class="container navbar-container"><!--container starts-->
		<div class="col-md-6 offer">
			<a href="#" class="btn btn-success btn-sm">
				<?php if(!isset($_SESSION['customer_email'])){
					echo 'Welcome : Guest';
				} 
				else{
					echo "Welcome:".$_SESSION['customer_email'];
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
					<a href="customer/checkout.php">My Account</a>
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
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search" >

					<span class="sr-only" >Toggle Search</span>

					<i class="fa fa-search" ></i>			
				</button>
			</div><!-- navbar-header Ends -->
			<div class="navbar-collapse collapse" id="navigation"><!--Navbar collapse starts-->
				<div class="padding-nav"><!--Padding-Nav starts-->
					<ul class="nav navbar-nav navbar-left">
						<li class="active">
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="shop.php">Shop</a>
						</li>
						<li>
							<?php

						if(!isset($_SESSION['customer_email'])){
							echo '<a href = "checkout.php">My Account</a>';
						} 
						else
							{echo '<a href = "customer/my_account.php?my_orders">My Account</a>';}
					 ?>
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
				<div class="navbar-collapse collapse right"><!-- navbar-collapse collapse right Starts -->
					<button class="btn navbar-btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle Search</span>
						<i class="fa fa-search"></i>
					</button>
				</div><!--navbar-collapse collapse right ends-->
				<div class="collapse-clearfix collapse" id="search"><!--collapse-clearfix starts-->
					<form action="result.php" method="get" class="navbar-form" ><!--navbar-form starts-->
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
	</div><!-- navbar navbar-default Ends -->
	<div class="container" id="slider">
		<div class="col-md-10">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
					<li data-target="#myCarousel" data-slide-to="3"></li>
					<li data-target="#myCarousel" data-slide-to="4"></li>
				</ol>
				<div class="carousel-inner">
				<?php $get_slides = "select * from slider LIMIT 0,1";
					$run_slides = mysqli_query($con,$get_slides);
					while($row_slides=mysqli_fetch_array($run_slides)){
						$slide_name=$row_slides['slide_name'];
						$slide_image=$row_slides['slide_image'];
						echo "<div class='item active'>
							<img src='admin_area/slides_images/$slide_image'>
						</div>";
					} ?>

					<?php $get_slides = "select * from slider LIMIT 1,3";
					$run_slides = mysqli_query($con,$get_slides);
					while($row_slides=mysqli_fetch_array($run_slides)){
						$slide_name=$row_slides['slide_name'];
						$slide_image=$row_slides['slide_image'];
						echo "<div class='item'>
							<img src='admin_area/slides_images/$slide_image'>
						</div>";
					} ?>
				</div><!-- carousel-inner Ends -->
				<a class="left carousel-control" href="#myCarousel" data-slide="prev"><!-- left carousel-control Starts -->
					<span class="glyphicon glyphicon-chevron-left"> </span>
					<span class="sr-only"> Previous </span>
				</a><!-- left carousel-control Ends -->
				<a class="right carousel-control" href="#myCarousel" data-slide="next"><!-- right carousel-control Starts -->
					<span class="glyphicon glyphicon-chevron-right"> </span>
					<span class="sr-only"> Next </span>
				</a><!-- right carousel-control Ends -->
			</div>
		</div>
	</div>
	<div class="strip">
		<div class="strip-padding">
			<img src="images/strip.jpg" alt="Not avaiable">
		</div>
	</div>
	<div class="row space">
		<div class="col-md-3">
			<img src="images/1.jpg" alt="Unable to load">
		</div>
		<div class="col-md-3">
			<img src="images/2.jpg" alt="Unable to load">
		</div>
		<div class="col-md-3">
			<img src="images/3.jpg" alt="Unable to load">
		</div>
		<div class="col-md-3">
			<img src="images/4.jpg" alt="Unable to load">
		</div>
	</div>
	<div class="row space">
		<div class="col-md-3">
			<img src="images/5.jpg" alt="Unable to load">
		</div>
		<div class="col-md-3">
			<img src="images/6.jpg" alt="Unable to load">
		</div>
		<div class="col-md-3">
			<img src="images/7.jpg" alt="Unable to load">
		</div>
		<div class="col-md-3">
			<img src="images/8.jpg" alt="Unable to load">
		</div>
	</div>
	<div class="airtel">
		<img src="images/airtel.jpg" alt="Not avaiable">
	</div>
	<div class="myntra">
		<img src="images/myntra.jpg" alt="Not avaiable">
	</div>
	

	<?php include("includes/footer.php");?>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	</body>
	</html>