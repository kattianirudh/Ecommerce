<?php
$db = mysqli_connect('localhost','root','','ecom_store');




?>
<div class="col cont_filter">
	<div class="feature">CATEGORIES</div><br>
	<div class="brands choose">
		<input type="checkbox">
		All
		<?php
		$query1 = "select * from categories"; 
		$exec = mysqli_query($db,$query1);	
		while($array = mysqli_fetch_array($exec)){
			$cat_id = $array['cat_id'];
			$cat_title = $array['cat_title'];
			$cat_description = $array['cat_desc'];

			?>

			<br><input type="checkbox" value="<?php echo $cat_title; ?>" class="get_manufacturer"><?php echo $cat_title; ?>	

			<?php  }	?>
		</div>

		<br><hr><br>
		<div class="feature">TYPES</div><br>
		<div class="price choose">
			<?php 
			$query2 = "select * from product_categories";
			$exec2 = mysqli_query($db,$query2);	
			while($array2 = mysqli_fetch_array($exec2)){
				$p_cat_id = $array2['p_cat_id'];
				$p_cat_title = $array2['p_cat_title'];
				$p_cat_description = $array2['p_cat_desc'];

				?>
				<input type="radio" name="sel_price" class="get_p_cat"> <?php echo $p_cat_title;  ?>  
				<br> 
			<?php } ?>
			</div>
		</div>
		<div class="col cont_list">
			<div class="head_bar"><div class="prod_head" style="float: left;">
			</div> 
		</div><br><br><hr>
		<br>	
	</div>