<?php

$db = mysqli_connect('localhost','root','','ecom_store');

/* Function to find the real IP address */
function getRealUserIp(){
	switch(true){
		case(!empty($_SERVER['HTTP_X_REAL_IP'])):	return $_SERVER['HTTP_X_REAL_IP'];
		case(!empty($_SERVER['HTTP_CLIENT_IP'])):	return $_SERVER['HTTP_CLIENT_IP'];
		case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])):	return $_SERVER['HTTP_X_FORWARDED_FOR'];
		default: return $_SERVER['REMOTE_ADDR'];
	}
}

function items(){
	global $db;
	if(isset($_SESSION['customer_email'])){
	$cust_email = $_SESSION['customer_email'];
	$ip_add = getRealUserIp();
	$get_items ="select * from cart where customer_email='$cust_email'";
	$run_item = mysqli_query($db,$get_items);
	$count_items = mysqli_num_rows($run_item);
	echo $count_items;
}
else echo '0';
}

function total_price(){
	global $db;
	$total = 0;
	if(isset($_SESSION['customer_email'])){
	$cust_email = $_SESSION['customer_email'];
	$ip_add = getRealUserIp();
	$select_cart = "select * from cart where customer_email = '$cust_email'";
	$run_cart = mysqli_query($db,$select_cart);
	while ($record  =mysqli_fetch_array($run_cart)) {
	    $pro_id = $record['p_id'];
	    $pro_qty = $record['qty'];
	    $get_price = "select * from products where product_id='$pro_id'";
	    $get_query = mysqli_query($db,$get_price);
	    while ($row_price = mysqli_fetch_array($get_query)){
	    	$sub_total = $row_price['product_price']*$pro_qty;
	    	$total = $total + $sub_total;
	        
	    }
	}}
	echo "₹ ".$total;
}
/* FUNCTION FOR ADD TO CART */
function add_cart(){
	 global $db;

 if(isset($_SESSION['customer_email'])){	
 $cust_email = $_SESSION['customer_email']; 
	if(isset($_GET['add_cart'])){
		$ip_add = getRealUserIp(); 
		$p_id = $_GET['add_cart'];
		$product_size = $_POST['option-0'];
		$product_color = $_POST['option-1'];
		$product_quantity = $_POST['quantity'];
		$check_product = "select * from cart where ip_add = '$ip_add' AND p_id = '$p_id'";
		$run_check = mysqli_query($db,$check_product);
		if(mysqli_fetch_array($run_check)>0)
		{
			echo "<script>alert('This product is aldready in the cart , if you want more of the same increase the quantity in the cart.')</script>";
			echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}
		else
		{
			$query = "insert into cart(p_id,customer_email,ip_add,qty,size,color) values ('$p_id','$cust_email','$ip_add','$product_quantity','$product_size','$product_color')";
			$run_query = mysqli_query($db,$query);
			echo "<script>alert('Added to cart.')</script>";
			echo "<script>window.open('details.php?pro_id=$p_id','_self')</script>";
		}
	}
}

}

/*END OF ADD TO CART FUNCTION */




function getPCats(){
	global $db;
	$get_p_cats = "select * from product_categories";
	$run_p_cats = mysqli_query($db,$get_p_cats);
	while($row_p_cat = mysqli_fetch_array($run_p_cats)){
		$p_cat_id = $row_p_cat['p_cat_id'];
		$p_cat_title = $row_p_cat['p_cat_title'];
		$p_cat_desc = $row_p_cat['p_cat_desc'];
		echo "<li><a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a></li>";
	}

}

function getCats(){

	global $db;
	$get_cats = "select * from categories";
	$run_cats = mysqli_query($db,$get_cats);
	while($row_cats = mysqli_fetch_array($run_cats)){
		$cat_id = $row_cats['cat_id'];
		$cat_title = $row_cats['cat_title'];
		$cat_desc = $row_cats['cat_desc'];	
		echo"<li><a href='shop.php?cat=$cat_id'>$cat_title</a></li>";

	}
}

function getpcatpro(){
	global $db;
	 if(isset($_GET['p_cat'])){
	 	$p_cat_id = $_GET['p_cat'];
	 	$get_p_cat = "select * from product_categories where p_cat_id = '$p_cat_id'";
	 	$run_p_cat = mysqli_query($db,$get_p_cat);
	 	$row_p_cat = mysqli_fetch_array($run_p_cat);
	 	$p_cat_title = $row_p_cat['p_cat_title'];
	 	$p_cat_desc = $row_p_cat['p_cat_desc'];
	 	$get_products = "select * from products where p_cat_id='$p_cat_id'";
	 	$run_products = mysqli_query($db,$get_products);
	 	$count = mysqli_num_rows($run_products);
	 	if($count==0){
	 		echo "
				<div class='box'>
					<h1>No products avaiable</h1>
					<hr>
				</div>";
	 	}
	 	else {
	 		echo"
	 		<div class='box'>
	 			<h1>$p_cat_title</h1>
	 			<hr>
	 		</div>";
	 	}
	 	while ($row_products = mysqli_fetch_array($run_products)) {
	 	    $pro_id = $row_products['product_id'];
			$pro_title = $row_products['product_title'];
			$pro_price = $row_products['product_price'];
			$pro_img1 = $row_products['product_img1'];
			echo '
				<div class="col-md-4 col-sm-6 center-responsive">
					<div class="product">
						<div class="card" style="width: 220px">
							<img class="card-img-top" src="admin_area/product_images/'.$pro_img1.'" alt="Card image cap" style="width: 100%;">
							<div class="card-body">
								<div class="one-line">	
									<div class="card_brand">
										<p>'.$pro_title.'</p>
									</div>
									<div class="card_price">
										<p>₹ '.$pro_price.'</p>
									</div>
								</div>
           						<div class="add_cart" style="display: block;">
           							<a href="details.php?pro_id='.$pro_id.'"><p style="color: rgba(0,0,0,0.6);">VIEW</p></a>
           						</div>
           					</div>
           				</div>
           			</div>
				</div>';
	 	}
	 }				
}


function getcatpro(){
	global $db;
	if(isset($_GET['cat'])){
		$cat_id = $_GET['cat'];
		$get_cat = "select * from categories where cat_id='$cat_id'";
		$run_cat = mysqli_query($db,$get_cat);
		$row_cat = mysqli_fetch_array($run_cat);
		$cat_title = $row_cat['cat_title'];
		$get_products = "select * from products where cat_id='$cat_id'";
		$run_products = mysqli_query($db,$get_products);
		$count = mysqli_num_rows($run_products);
		if($count==0){
			echo "
			<div class='box' >
			<h1> No Product Found In This Category </h1>
			</div>";
		}
		else{
			echo "
			<div class='box' >
			<h1> $cat_title </h1>
			</div>";
		}

	while($row_products=mysqli_fetch_array($run_products)){
		$pro_id = $row_products['product_id'];
		$pro_title = $row_products['product_title'];
		$pro_price = $row_products['product_price'];
		$pro_desc = $row_products['product_desc'];
		$pro_img1 = $row_products['product_img1'];
		echo '
		<div class="col-md-4 col-sm-6 center-responsive">
			<div class="product">
				<div class="card" style="width: 220px">
					<img class="card-img-top" src="admin_area/product_images/'.$pro_img1.'" alt="Card image cap" style="width: 100%;">
					<div class="card-body">
						<div class="one-line">	
							<div class="card_brand">
								<p>'.$pro_title.'</p>
							</div>
							<div class="card_price">
								<p>₹ '.$pro_price.'</p>
							</div>
						</div>
   						<div class="add_cart" style="display: block;">
   							<a href="details.php?pro_id='.$pro_id.' "><p style="color: rgba(0,0,0,0.6);">VIEW</p></a>
   						</div>
   					</div>
   				</div>
   			</div>
		</div>';
	 	}
	 }
	}


function remove2($p_id,$ip_add2){
	global $db;
	$ip_add = getRealUserIp();
	$query = "delete from cart where ip_add = '$ip_add2' AND p_id = '$p_id'";
	$execute_query = mysqli_query($db,$query);
	if($execute_query){
		echo "<script> window.open('cart.php,'_self');</script>";
	}
}


?>