<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce Store	</title>
	<link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=roboto:400,500,700,300,100">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet"  type="text/css" href="font-awesome/css/font-awesome.min.css ">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/cart-style.css">
	<link rel="shortcut icon" href="images/Infinity.png">
</head>

<body>
	<div id="top"><!--top starts-->	
		<div class="container"><!--container starts-->
			<div class="col-md-6 offer">
				<a href="customer/my_account.php?my_orders" class="btn btn-success btn-sm">
					<?php if(!isset($_SESSION['customer_email'])){
						echo 'Welcome : Guest';
					} 
					else{
						echo "Welcome:".$_SESSION['customer_email'];
					}
					?>
				</a>
				<a href="cart.php">
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
						<?php
						if(!isset($_SESSION['customer_email'])){
							echo '<a href="checkout.php">Login</a>';
						} else {
							echo '<a href="customer/logout.php">Logout</a>';
						}
						?>
					</li>
				</ul>
			</div>

		</div><!--top ends-->
	</div><!--container ends-->

	<div class="navbar navbar-default" id="navbar" style="margin-bottom: 0px;"><!-- navbar navbar-default Starts -->
		<div class="container" ><!-- container Starts -->

			<div class="navbar-header"><!-- navbar-header Starts -->

				<a class="navbar-brand home" href="index.php" ><!--- navbar navbar-brand home Starts -->

					<img src="images/Pandora.svg" alt="echo logo" class="hidden-xs" style="width: 65%;">
					<img src="images/Infinity.png" alt="echo logo" type="image/x-icon" class="visible-xs" >

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
						<li>
							<a href="index.php">Home</a>
						</li>
						<li \>
							<a href="shop.php">Shop</a>
						</li>
						<li>
							<a href="customer/my_account.php?my_orders">My Account</a>
						</li>
						<li>
							<a href="cart.php">Shopping Cart</a>
						</li>
						<li class="active">
							<a href="about.php">About Us</a>
						</li>
					</ul>

				</div><!--Padding nav ends-->
				<a href="cart.php" class="btn  navbar-btn right" style="margin-top:0px;"><!--btn btn-primary navbar-btn right Starts-->
					<img src="images/bag.png" style="width: 40%;">
					<span class="badge">
						<i class="f">
							<span style="font:-webkit-small-control;"><?php items(); ?> </span>
						</i>
					</span>
				</a><!--btn btn-primary navbar-btn right Ends-->
				<!-- <div class="navbar-collapse collapse right">navbar-collapse collapse right Starts
					<button class="btn navbar-btn btn-primary collapsed" type="button" data-toggle="collapse" data-target="#search">
						<span class="sr-only">Toggle Search</span>
						<i class="fa fa-search"></i>
					</button>
				</div>navbar-collapse collapse right ends -->
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
	
	<!-- <div class="main jumbotron" style="margin-bottom: 0px;font-family: 'Noto Serif SC', serif;">
		<div class="logo">
			<center>
				<img src="img/Globe.svg" alt="No Picture avaiable"  style="width: 10%;" />
			</center>
		</div>
		<div class="content center" style="margin-top: 5%;padding: 0 10%;font-size: 130%">
			<center>	
				<h3>About</h3>
				<hr>
				<p>The Pandora website is a full scale customer oriented Shopping Destinatin.
				Pandora teams up with the top fashing desigers in the country to bring hot, new curated content onto our platform so that our users can get their hands on fresh looks months before they come out.<br>
				All products are avaiable as presented in the pictures and any item bought can be given back within 10 days after getting the order.<br>
	
				</p>
			</center>
			
		</div>
	</div> -->
	
	 <main role="main" class="jumbotron" style="margin-bottom: 0px;">
      <div class="lead" style="padding: 0.6em;">
		
			<center>
				<img src="img/Globe.svg" alt="No Picture avaiable"  style="width: 10%;" />
			</center>
        <h1 class="head1 text-center display-4" style="font-family: 'Crimson Text', serif;">
          Pandora
        </h1>
        <hr>
        <div class="container" style="font-family: 'Crimson Text', serif;">
          <p class="dropcaps" "> 
           The Pandora website is a full scale, customer oriented Shopping destination.
			Pandora teams up with the top fashing desigers in the country to bring hot, new curated content onto our platform so that our users can get their hands on fresh looks months before they come out.
			All products are avaiable as presented in the pictures and any item bought can be returned within 10 days of purchase with full refund.
      </p>
          <p>

				Well, you can do all this from the comfort of your home while enjoying many online shopping benefits, right from irresistible deals and discounts to a robust user interface with many shopping filters (based on various categories of clothing, brands, budget, etc.). to make your shopping experience truly hassle free. Pandora, THE place to be when it comes to the latest in fashion, offers you fine, high-quality merchandise – go ahead and indulge in a bit of shopping online for men, women and kids. You can even pick up gift sets for your near and dear ones while being absolutely certain that it will put a smile on their faces. Go ahead and shop till you drop on India’s largest online fashion Store
          </p>
        </div>

      </div>
    </main>

<div class="footer" style="border-top: 2px solid grey">
	<?php include('includes/footer.php') ?>
</div>