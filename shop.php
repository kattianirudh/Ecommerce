<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce Store	</title>
	<?php include("functions/functions.php"); ?>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=roboto:400,500,700,300,100">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet"  type="text/css" href="font-awesome/css/font-awesome.min.css ">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
</head>
<body>
<div id="top"><!--top starts-->	
	<div class="container"><!--container starts-->
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
				Shopping Cart total Price: <?php total_price(); ?> , Items: <?php items(); ?>
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
					echo '<a href="checkout.php">Logout</a>';
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
						<li >
							<a href="index.php">Home</a>
						</li>
						<li class="active">
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

	<div id="content"><!--content starts-->
		<div class="container"> <!-- Container starts -->
			<div class="col-md-3">
				<?php include("includes/sidebar.php");?>
			</div>
			<div class="col-md-9">
			
				<?php if(!isset($_GET['p_cat'])){
					if(!isset($_GET['cat'])){
						echo"<box>
							<?php getpcatpro(); ?>
							<h2>Shop</h2>
							<hr>
						</box>";
					}
				} ?>	
				<?php 
					getpcatpro(); 
					getcatpro();?>
			</div>

					<div class="row row-sizing">
						<?php 
							if(!isset($_GET['p_cat'])){
								if(!isset($_GET['cat'])){
									$per_page = 6;
									if(isset($_GET['page'])){
										$page = $_GET['page'];
									}
									else
									{
										$page = 1;
									}
									$start_from = ($page-1)*$per_page;
									$get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
									$run_get_products = mysqli_query($db,$get_products);
									while($row_get_products = mysqli_fetch_array($run_get_products)){
										$product_id = $row_get_products['product_id'];
										$product_title = $row_get_products['product_title'];
										$product_img1 = $row_get_products['product_img1'];
										$product_price = $row_get_products['product_price'];
										$_SESSION['pro_id']=$product_id; 
										echo '

										<div class="col-md-4 col-sm-6 center-responsive sizing">
											<div class="product">
												<div class="card" style="width: 220px">
													<img class="card-img-top" src="admin_area/product_images/'.$product_img1.'" alt="Card image cap" style="width: 100%;">
													<div class="card-body">
														<div class="one-line">	
															<div class="card_brand">
																<p>'.$product_title.'</p>
															</div>
															<div class="card_price">
																<p>₹ '.$product_price.'</p>
															</div>
														</div>
				                   						<div class="add_cart" style="display: block;">
				                   							<a href="details.php?pro_id='.$product_id.'"><p style="color: rgba(0,0,0,0.6);">VIEW</p></a>
				                   						</div>
				                   					</div>
				                   				</div>
				                   			</div>
										</div>';		
									}
								}
							}
						?>
					</div>
					</div>
				</div>
			</div>
		</div><!-- Container Ends -->
	</div><!--content ends-->
	<center>
		<ul class="pagination" >
			<?php 
				$per_page = 6;
				$query = "select * from products";
				$query_run = mysqli_query($db,$query);
				$total_records = mysqli_num_rows($query_run);
				$total_pages = ceil($total_records/$per_page);
				echo "
				<li ><a href='shop.php?page=1'>".'First Page'."</a></li>";
				for($i=1;$i<=$total_pages;$i++)
				{
					echo" 
						<li><a href='shop.php?page=".$i."'>".$i."</a></li>";
				};
				echo "<li><a href='shop.php?page=".$total_pages."'>".'Last Page'."</a></li>	"	
			?>
		</ul>
	</center>
	<div class="row">
		<!-- <?php getpcatpro(); ?> -->

	</div>

	<?php include("includes/footer.php");?>
</body>
</html>