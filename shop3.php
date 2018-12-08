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
							<a href="customer/my_account.php?my_orders">My Account</a>
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
			
				<div class="box">
							<?php  ?>
							<h2>Shop</h2>
							<hr>
						</div>
					
			</div>
			<div id="wait" style="position: absolute;top: 40%;left: 45%;padding: 100px;padding-top: 200px;">
				
			</div>

					<div class="row row-sizing" id="Products">
						<?php getProducts(); ?>
					</div>
					</div>
				</div>
			</div>
		</div><!-- Container Ends -->
	</div><!--content ends-->
	<center>
		<ul class="pagination" >
			<?php getPaginator(); ?>
		</ul>
	</center>
	<div class="row">
		<!-- <?php getpcatpro(); ?> -->

	</div>

	<?php include("includes/footer.php");?>
</body>
<script>
  $(document).ready(function(){
/// Hide And Show Code Starts ///
$('.nav-toggle').click(function(){
  $(".panel-collapse,.collapse-data").slideToggle(700,function(){
    if($(this).css('display')=='none'){
      $(".hide-show").html('Show');
    }
    else{
      $(".hide-show").html('Hide');
    }
  });
});
/// Hide And Show Code Ends ///
/// Search Filters code Starts /// 
$(function(){
  $.fn.extend({
    filterTable: function(){
      return this.each(function(){
        $(this).on('keyup', function(){
          var $this = $(this), 
          search = $this.val().toLowerCase(), 
          target = $this.attr('data-filters'), 
          handle = $(target), 
          rows = handle.find('li a');
          if(search == '') {
            rows.show(); 
          } else {
            rows.each(function(){
              var $this = $(this);
              $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
            });
          }
        });
      });
    }
  });
  $('[data-action="filter"][id="dev-table-filter"]').filterTable();
});
/// Search Filters code Ends /// 
});
</script>
<script>
	 $(document).ready(function(){
  // getProducts Function Code Starts 
  function getProducts(){
  // Manufacturers Code Starts 
  var sPath = ''; 
  var aInputs = $('li').find('.get_p_cat');
  var aKeys = Array();
  var aValues = Array();
  iKey = 0;
  $.each(aInputs,function(key,oInput){
    if(oInput.checked){
      aKeys[iKey] =  oInput.value
    };
    iKey++;
  });
  if(aKeys.length>0){
    var sPath = '';
    for(var i = 0; i < aKeys.length; i++){
      sPath = sPath + 'man[]=' + aKeys[i]+'&'; 
    }
  }
// Manufacturers Code ENDS 
// Products Categories Code Starts 
var aInputs = Array();
var aInputs = $('li').find('.get_p_cat');
var aKeys = Array();
var aValues = Array();
iKey = 0;
$.each(aInputs,function(key,oInput){
  if(oInput.checked){
    aKeys[iKey] =  oInput.value
  };
  iKey++;
});
if(aKeys.length>0){
  for(var i = 0; i < aKeys.length; i++){
    sPath = sPath + 'p_cat[]=' + aKeys[i]+'&';
  }
}
// Products Categories Code ENDS 
   // Categories Code Starts 
   

   // Categories Code ENDS 
   // Loader Code Starts 
   $('#wait').html('<img src="images/load.gif">'); 
// Loader Code ENDS
// ajax Code Starts 
$.ajax({
  url:"load.php", 
  method:"POST",
  data: sPath+'sAction=getProducts', 
  success:function(data){
   $('#Products').html('');  
   $('#Products').html(data);
   $("#wait").empty(); 
 }  
});  
$.ajax({
  url:"load.php",  
  method:"POST",  
  data: sPath+'sAction=getPaginator',  
  success:function(data){
    $('.pagination').html('');  
    $('.pagination').html(data);
  }  
});
// ajax Code Ends 
}
   // getProducts Function Code Ends    
   $('.get_manufacturer').click(function(){ 
    getProducts(); 
  });
   $('.get_p_cat').click(function(){ 
    getProducts();
  }); 
 });
	
</script>
</html>