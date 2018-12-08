<?php include("includes/db.php");?>
<link rel="stylesheet" type="text/css" href="styles/style.css">
<div id="footer"><!-- footer Starts -->
	<div class="container footer-padding"><!-- container Starts -->
		<div class="row" ><!-- row Starts -->
			<div class="col-md-3 col-sm-6" ><!-- col-md-3 col-sm-6 Starts -->
				<h4 style="padding-left: 14%;font-family: Whitney-SemiBold, Whitney;">Pages</h4>
				<ul><!-- ul Starts -->
					<li><a href="cart.php">Shopping Cart</a></li>
					<li><a href="contact.php">About Us</a></li>
					<li><a href="shop.php">Shop</a></li>
					<li><a href='customer/my_account.php?my_orders' >My Account</a></li>
				</ul><!-- ul Ends -->
				<hr>
					<h4 style="padding-left: 15%;font-family: Whitney-SemiBold, Whitney;">User Section</h4>
				<ul><!-- ul Starts -->
					<li><a href='checkout.php' >Login</a></li>
					<li><a href="customer_register.php">Register</a></li>
					<li><a href="terms.php">Terms And Conditions </a></li>
				</ul><!-- ul Ends -->
				<hr class="hidden-md hidden-lg hidden-sm" >
			</div><!-- col-md-3 col-sm-6 Ends -->
			<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->
				<h4 style="padding-left: 14%;font-family: Whitney-SemiBold, Whitney;"> Top Products Categories </h4>
				<ul><!-- ul Starts -->
					<?php 
						$get_p_cats = "select * from product_categories";
						$run_p_cats = mysqli_query($db,$get_p_cats);
						while($row_p_cat = mysqli_fetch_array($run_p_cats)){
							$p_cat_id = $row_p_cat['p_cat_id'];
							$p_cat_title = $row_p_cat['p_cat_title'];
							$p_cat_desc = $row_p_cat['p_cat_desc'];
							echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a></li>";
	}
					 ?>
					
				</ul><!-- ul Ends -->
				<hr class="hidden-md hidden-lg">
			</div><!-- col-md-3 col-sm-6 Ends -->
			 <div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->
				
				<h4 style="font-family: Whitney-SemiBold, Whitney;" class="logoss"> Stay in touch </h4>
					<p class="social">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-google-plus"></i></a>
						<a href="#"><i class="fa fa-envelope"></i></a>
					</p>
					<div class="app">
						<div class="google-play">
							<img src="images/googleplay.png" alt="Not avaiable" style="width: 50%;">
						</div>
						<div class="app-store">
							<img src="images/appstore.svg" alt="Not avaiable" style="width: 50%; margin-top: 2%;">
						</div>
					</div>
			</div><!--col-md-3 col-sm-6 Ends -->
			<div class="col-md-3 col-sm-6"><!-- col-md-3 col-sm-6 Starts -->
				<h4 style="padding-left: 14%;font-family: Whitney-SemiBold, Whitney;">Get the news</h4>
				<p class="text-muted">
					Give us your email to keep u in touch.
				</p>
				
				<hr>
			
			</div><!-- col-md-3 col-sm-6 Ends -->
		</div><!-- row Ends -->
	</div><!-- container Ends -->
</div><!-- footer Ends -->
<div id="copyright" style="background-color: #d2d9e0"><!-- copyright Starts -->
	<div class="container" ><!-- container Start -->
		<div class="col-md-12" ><!-- col-md-6 Starts -->
			<center><p class="pull" style="padding-top: 10px;"> &copy; Anirudh Katti, 2018</p></center>
		</div><!-- col-md-6 Ends -->
	</div><!-- container Ends -->
</div><!-- copyright Ends -->

