<?php
	session_start();
	include("includes/db.php");
	include("functions/functions.php");
?>

	<?php
	// var_dump($_GET['pro_id']);
	if(isset($_GET['pro_id'])){
		$product_id = $_GET['pro_id'];
		//var_dump($_GET['pro_id']);
		$get_products = "select * from products where product_id = '$product_id'";
		$run_get_products = mysqli_query($db,$get_products);
		$row_get_products = mysqli_fetch_array($run_get_products);
		$p_cat_id = $row_get_products['p_cat_id'];
		$p_title = $row_get_products['product_title'];
		$p_cat_price = $row_get_products['product_price'];
		$get_p_cat = "select * from product_categories where p_cat_id = '$p_cat_id'";
		$p_img = $row_get_products['product_img1'];
		 $run_p_cat = mysqli_query($db,$get_p_cat);
		 $row_run_p_cat = mysqli_fetch_array($run_p_cat);
		 $product_cat_title = $row_run_p_cat['p_cat_title'];
	}
?>
<!-- <script> alert("<?php $product_id; ?>")</script> -->
<!DOCTYPE html>
<html>
<head>
	<title>E-Commerce Store	</title>
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=roboto:400,500,700,300,100">
	<link rel="stylesheet" type="text/css" href="styles/bootstrap.min.css">
	<link rel="stylesheet"  type="text/css" href="font-awesome/css/font-awesome.min.css ">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<link rel="stylesheet" type="text/css" href="styles/css2.css">
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
					echo "Welcome:".$_SESSION['c_name'];
				}
				?>
			</a>
			<a href="#">
				Shopping Cart total Price: $100 , Items: <?php items(); ?>
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

	<div class="navbar navbar-default " id="navbar"><!-- navbar navbar-default Starts -->
		<div class="container" ><!-- container Starts -->

			<div class="navbar-collapse collapse" id="navigation"><!--Navbar collapse starts-->
				<div class="padding-nav"><!--Padding-Nav starts-->
					<ul class="nav navbar-nav navbar-left">
						<li >
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="shop.php">Shop</a>
						</li>
						<li class="active">
							<a href="checkout.php">My Account</a>
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
						<span><?php items(); ?> Items</span>
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

	


			<!-- <div class="col-md-9">
				<div class="row" id="productmain">
					<div class="col-sm-6">
						<div id="mainimage">
							<div id="myCarousel" class="carouselslide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target='#myCarousel' data-slide-to="0" class="active"></li>
									<li data-target='#myCarousel' data-slide-to="1"></li>
									<li data-target='#myCarousel' data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="itemactive">
										<center><img src="" alt=""></center>	
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->

			<!-- <div class="display">
				<div class="images" >
					<div class="col-md-5">
						<img src="admin_area\product_images\1.jpg" alt="Image not avaiable" style="max-width: 75%;">
					</div>
				</div>
				<div class="image-data">
					<h2>Light Blue Tommy Hilfiger<h2>
				</div>
			</div> -->

			

		<section aria-label="Main content" role="main" class="product-detail">
		  <div itemscope itemtype="http://schema.org/Product">
		    <div class="shadow">
		      <div class="_cont detail-top">
		        <div class="cols">
		          <div class="left-col">
		            <div class="big">
		              <img src="admin_area/product_images/<?php echo $p_img; ?>"  alt="No image">
		             
		              <div class="detail-socials">
		                <div class="social-sharing" data-permalink="#">
		                  <a target="_blank"  class="share-facebook" title="Share"></a>
		                  <a target="_blank"  class="share-twitter" title="Tweet"></a>
		                  <a target="_blank"  class="share-pinterest" title="Pin it"></a>
		                </div>
		              </div>
		            </div>
		          </div>
		          <div class="right-col">
		            <h1 itemprop="name"><?php echo $p_title; ?></h1>
		              <div class="price-shipping">
		                <div class="price" id="price-preview">
		                  ₹<?php echo $p_cat_price; ?>
		                </div>
		                <p style="float: right">Free shipping</p>
		              </div>

		            <form action="cart.php?add_cart=<?php echo $product_id; ?>" method="post" class="form-horizontal">
		              <div class="swatches">
		                <div class="swatch clearfix" data-option-index="0">
		                  <div class="header">Size</div>
		                  <div data-value="M" class="swatch-element plain m available">
		                    <input id="swatch-0-m" type="radio" name="option-0" value="M" checked  />
		                    <label for="swatch-0-m">
		                      M
		                    </label>
		                  </div>
		                  <div data-value="L" class="swatch-element plain l available">
		                    <input id="swatch-0-l" type="radio" name="option-0" value="L"  />
		                    <label for="swatch-0-l">
		                      L
		                    </label>
		                  </div>
		                  <div data-value="XL" class="swatch-element plain xl available">
		                    <input id="swatch-0-xl" type="radio" name="option-0" value="XL"  />
		                    <label for="swatch-0-xl">
		                      XL
		                      
		                    </label>
		                  </div>
		                  <div data-value="XXL" class="swatch-element plain xxl available">
		                    <input id="swatch-0-xxl" type="radio" name="option-0" value="XXL"  />
		                    <label for="swatch-0-xxl">
		                      XXL

		                    </label>
		                  </div>
		                </div>
		                <div class="swatch clearfix" data-option-index="1">
		                  <div class="header">Color</div>
		                  <div data-value="Blue" class="swatch-element color blue available">
		                    <div class="tooltip">Blue</div>
		                    <input quickbeam="color" id="swatch-1-blue" type="radio" name="option-1" value="Blue" checked  />
		                    <label for="swatch-1-blue" style="border-color: blue;">
		                     
		                      <span style="background-color: blue;"></span>
		                    </label>
		                  </div>
		                  <div data-value="Red" class="swatch-element color red available">
		                    <div class="tooltip">Red</div>
		                    <input quickbeam="color" id="swatch-1-red" type="radio" name="option-1" value="Red"  />
		                    <label for="swatch-1-red" style="border-color: red;">
		                     
		                      <span style="background-color: red;"></span>
		                    </label>
		                  </div>
		                  <div data-value="Yellow" class="swatch-element color yellow available">
		                    <div class="tooltip">Yellow</div>
		                    <input quickbeam="color" id="swatch-1-yellow" type="radio" name="option-1" value="Yellow"  />
		                    <label for="swatch-1-yellow" style="border-color: yellow;">
		                     
		                      <span style="background-color: yellow;"></span>
		                    </label>
		                  </div>
		                </div>
		                <div class="guide">
		                  <p>Size guide</p>
		                </div>
		              </div>

		              <!-- <form method="post" enctype="multipart/form-data" id="AddToCartForm"> -->
		             
		                <div class="btn-and-quantity-wrap">
		                  <div class="btn-and-quantity">
		                  	<?php echo' <a href="index.php?pro_id='.$product_id.'">'; ?>
			                    <button id="AddToCart" quickbeam="add-to-cart" type="submit">
			                      <span id="AddToCartText">Add to Cart</span>
			                    </button>
		                    </a>
		                  </div>
		                   <input type="number" name="quantity" value="1" class="quantity">
		                </div>
		                
		             </form>
		              <!-- <?php add_cart(); ?> -->
		              <div class="tabs">
		                <div class="tab-labels">
		                  <span data-id="1" class="active">Info</span>
		                  <span data-id="2">Brand</span>
		                </div>
		                <div class="tab-slides">
		                  <div id="tab-slide-1" itemprop="description"  class="slide active">
		                    <p>This is a sample javascript tabs made by Anirudh Katti.</p>
		                  </div>
		                  <div id="tab-slide-2" class="slide">
		                    <p>Your just wasting your time here in the second tab.</p>
		                  </div>
		                </div>
		              </div>
		              <div class="social-sharing-btn-wrapper">
		                <span id="social_sharing_btn">Share</span>
		              </div>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
		</section>
	   <script src="js/jquery.min.js"></script>
	   <script src="js/javascript.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>


<!-- Quickbeam cart end -->
	
				
					
				
					
