<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce Store	</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=roboto:400,500,700,300,100">
	<link rel="stylesheet" type="text/css" href="../styles/bootstrap.min.css">
	<link rel="stylesheet"  type="text/css" href="../font-awesome/css/font-awesome.min.css ">
	<link rel="stylesheet" type="text/css" href="../styles/style.css">
	<link rel="stylesheet" type="text/css" href="navbar.css">
</head>
<body>
<div id="top"><!--top starts-->	
	<div class="container"><!--container starts-->
		<div class="col-md-6 offer">
			<a href="#" class="btn btn-success btn-sm">
				WELCOME:Guest
			</a>
			<a href="#">
				Shopping Cart total Price: $100 , Total Items: 2
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
					<a href="checkout.php">Login</a>
				</li>
			</ul>
		</div>
		
	</div><!--top ends-->
	</div><!--container ends-->

	<div class="navbar navbar-default" id="navbar"><!-- navbar navbar-default Starts -->
		<div class="container" ><!-- container Starts -->

			<div class="navbar-header"><!-- navbar-header Starts -->

				<a class="navbar-brand home" href="../index.php" ><!--- navbar navbar-brand home Starts -->

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
						<li class="hover-nav">
							<a href="index.php">Home	
								<div class="mega-menu">
						          <div class="inner-mega-menu">
						            <a><b>Top Wear</b></a>
						            <a>TShirts</a><br>
						            <a>CasualShirts</a><br>
						            <a>Formals</a><br>
						            <a>Jackets</a><br>
						            <a>Suits</a><br>	
						            <a><b>Men Traditional</b></a><br>
						            <a>Sherwani</a><br>
						            <a>Kurta</a><br>
									<a>Dhoti</a><br>
						          </div>
						          <div class="inner-mega-menu">
						            <a><b>Bottom-wear</b></a><br>
						            <a>Jeans</a><br>
						            <a>Casual Trousers</a><br>
						            <a>Shorts</a><br>
						            <a>Cargo</a><br>
						            <a>Chinos</a><br>
						          </div>
						          <div class="inner-mega-menu">
						            <a><b>Sports Wear</b></a><br>
						            <a>Track Pants</a><br>
						            <a>Sport Shirt</a><br>
						          </div>
						          <div class="inner-mega-menu">
						            <a><b>Women Wear</b></a><br>
						            <a>Pants</a><br>
						            <a>Skirts</a><br>
						            <a>Saree</a><br>
						          </div>
						        </div>
						        </a>
						</li>
						<li>
							<a href="../shop.php">Shop</a>
						</li>
						<li class="active">
							<a href="customer/my_account.php">My Account</a>
						</li>
						<li>
							<a href="../cart.php">Shopping Cart</a>
						</li>
						<li>
							<a href="../Contact.php">Contact Us</a>
						</li>
					</ul>

				</div><!--Padding nav ends-->
				<a href="cart.php" class="btn btn-primary navbar-btn right"><!--btn btn-primary navbar-btn right Starts-->
					<i class="fa fa-shopping-cart">
						<span>4 items</span>
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

	<div class="container">
		

	<div class="col-md-3">
		<?php include("includes/sidebar.php");?>
	</div>
	<div class="col-md-9">
		<div class="box">
			<h1 align="center">Please confirm your payment</h1>
			<form action="confirm.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Invoice No:</label>
					<input type="text" class="form-control" name="invoice_no" required>
				</div>
				<div class="form-group">
					<label>Amount sent:</label>
					<input type="text" class="form-control" name="amount_sent" required>
				</div>
				<div class="form-group">
					<label>Select Payment Mode:</label>
					<select name="payment_mode" class="form-control">
						<option>Select Payment Mode</option>
						<option>Bank Code</option>
						<option>UBL/Omni Paisa</option>
						<option>Western union</option>
					</select>
				</div>
				<div class="form-group">
					<label>Transaction Refferal ID	</label>
					<input type="text" class="form-control" name="ref_no" required>
				</div>
				<div class="form-group">
					<label>Easy Paisa/Omni Code</label>
					<input type="text" class="form-control" name="code" required>
				</div>
				<div class="form-group">
					<label>Payment Date:</label>
					<input type="text" class="form-control" name="date" required>
				</div>
			</form>
			<div class="text-center">
				<button class="btn btn-primary" type="submit" name="confirm_payment">
					<i class="fa fa-user"></i> Confirm Payment
				</button>
			</div>
		</div>
	</div>




















	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>	

</body>
</html>