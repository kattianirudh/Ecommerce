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
						<li class="active">
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
	</div>
	

	<div class="page">
		
		<div class="col-md-8" >
		<div class="shopping-box" style="margin: 0px;width: 87%"">
			<div class="shopping-cart" style="margin: 0px;width: 95%;margin-left: 50px;">
				<div class="products">
					
  <!-- Title -->
			  <div class="title">
			    Your Items
			  </div>
			 <form action="cart.php" method="post" enctype="multipart-form-data" >
			  <!-- Product #1 -->
				  	<?php 
			$ip_add = getRealUserIp();
			$select_cart = "select * from cart where ip_add = '$ip_add'";
			$run_cart = mysqli_query($db,$select_cart);
			$count =  mysqli_num_rows($run_cart);
			while($cart_rows = mysqli_fetch_array($run_cart)){
				$product_id = $cart_rows['p_id'];
				$product_size = $cart_rows['size'];
				$product_color = $cart_rows['color'];
				$product_qty = $cart_rows['qty'];
				$cart_q = "select * from products where product_id ='$product_id'";
				$query_exe = mysqli_query($db,$cart_q);
				$rows_queries = mysqli_fetch_array($query_exe);
				$product_name = $rows_queries['product_title'];
				$product_price = $rows_queries['product_price'];
				$product_image = $rows_queries['product_img1'];
				?>
			  	<div class="item">
				    <div class="buttons">
				    	<input type = "checkbox" id="del" name="remove[]" value="<?php echo $product_id; ?>" style="display:none;"/>
					      <label  class="delete-btn" onclick=" window.open('cart.php?delete=<?php echo $product_id ?>','_self');"><img src="delete-icn.svg">
					      <?php update_cart(); ?>
					      <script> window.open('cart.php,'_self');</script> </label>
				      <span class="like-btn"></span>
				    </div>
				 
				    <div class="image">
				      <img src="admin_area/product_images/<?php echo $product_image; ?>" alt="Card image cap" />
				    </div>
				 
				    <div class="description">
				      <span><?php echo $product_name ?></span>
				      <span><?php echo $product_color ?></span>
				    </div>
				 
				    <div class="quantity">
				      <button class="plus-btn" type="button" name="button">+</button>
				      <input type="text" name="name" value="<?php echo $product_qty; ?>">
				      <button class="minus-btn" type="button" name="button">-</button>
				    </div>
				 
				    <div class="total-price">₹ <?php echo $product_price; ?></div>
				    <div class="size"><p><?php echo $product_size;  ?></p></div>
			 	 </div>


				<?php 	} ?>
				 
			 
			  <!-- Product #2 -->
			  <!-- <div class="item">
			    <div class="buttons">
			      <span class="delete-btn"><img src="delete-icn.svg" alt=""></span>
			      <span class="like-btn"></span>
			    </div>
			  			 
			    <div class="image">
			      <img src="admin_area\product_images\1.jpg" alt=""/>
			    </div>
			  			 
			    <div class="description">
			      <span>Maison Margiela</span>
			      <span>Future Sneakers</span>
			      <span>White</span>
			    </div>
			  			 
			    <div class="quantity">
			      <button class="plus-btn" type="button" name="button">+</button>
			      <input type="text" name="name" value="1">
			      <button class="minus-btn" type="button" name="button">-</button>
			    </div>
			  			 
			    <div class="total-price">$870</div>
			    <div class="size"><p>M</p></div>
			  </div> -->
			 
			  <!-- Product #3 -->
			  <!-- <div class="item">
			    <div class="buttons">
			      <span class="delete-btn"><img src="delete-icn.svg" alt=""></span>
			      <span class="like-btn"></span>
			    </div>
			  			 
			    <div class="image">
			      <img src="admin_area\product_images\1.jpg" alt="" />
			    </div>
			  			 
			    <div class="description">
			      <span>Our Legacy</span>
			      <span>Brushed Scarf</span>
			      <span>Brown</span>
			    </div>
			  			 
			    <div class="quantity">
			      <button class="plus-btn" type="button" name="button" id="incrementor">+</button>
			      <input type="text" name="name" value="1" id="values1">
			      <button class="minus-btn" type="button" name="button">-</button>
			    </div>
			  			 
			    <div class="total-price">$349</div>
			    <div class="size"><p>M</p></div>
			  </div> -->
			</div>
		</div>
			<span class="extras" >
				<a href="shop.php" style="text-decoration: none;color: black;"><button class="continue-shopping hovers" style="margin-left: 6%;"><!-- &#8249; -->Continue shopping</button></a>
				<button class="update hovers" type="submit" name="update">Update</button>
			</span>
			</div>
		</form>
		</div>
		<?php

		function update_cart(){
			global $db;
			if(isset($_GET['delete'])){
			$ip_add = getRealUserIp();
			$p_id = $_GET['delete'];
			/*echo"<script>alert('".$p_id."')</script>";*/
			$query = "delete from cart where ip_add = '$ip_add' AND p_id = '$p_id'";
			$execute_query = mysqli_query($db,$query);
			if($execute_query){
				echo "<script> window.open('cart.php,'_self');
				document.location.reload();
				</script>";
			
		}
		}
	}
		?>

		<div class="col-md-3">
			<div class="box" id="order-summery">
				<div class="box-header">
					<h3>Orders Summary</h3>
				</div>
				<p class="text-muted">Shopping and additional costs are calcuated based on the values you have entered</p>
				<div class="table-responsive">
					<table class="table">
						<tbody>
							<tr>
								<td>Order Subtotal</td>
								<th ><?php total_price(); ?> </th>
							</tr>
							<tr>
								<td>Shopping and Handeling</td>
								<th>₹ 0 </th>
							</tr>
							<tr>	
								<td>Tax</td>
								<th>₹ 0 </th>
							</tr>
							<tr class="total" style="font-size: 25px">
								<td><b>Total</b></td>
								<th><?php total_price(); ?></th>
							</tr>	
						</tbody>
					</table>
				</div>
			</div>
			<span class="extras" >
				<a href="checkout.php" style="text-decoration: none;color: black;float: right;"><button class="continue-shopping hovers" style="margin-top:16%;">Checkout</button></a>
			</span>
		</div>
	</div>	
	

	<script src="js/jquery.min.js"></script>
	<script src="js/javascript.js"></script>
<script src="js/bootstrap.min.js"></script>		
</body>
</html>