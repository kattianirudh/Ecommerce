<?php
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>";
}
else {
	?>
	<div class="row">
		<div class="col-lg-12">
			<ol class="breadcrumb">
				<li class="active">
					<i class="fa fa-dashboard"></i> Dashboard / View Payments
				</li>
			</ol>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
						<i class="fa fa-money fa-fw"> </i> View Payments
					</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table class="table table-hover table-bordered table-striped">
							<thead>
								<tr>
									<th>Payment No:</th>
									<th>Invoice No:</th>
									<th>Amount Paid:</th>
									<th>Payment Code:</th>
									<th>Payment Date:</th>
									<th>Delete Payment:</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$i = 0;
								$get_payments = "select * from payment";
								$get_orders = "select* from customer_orders";
								$run_orders = mysqli_query($db,$get_orders);
								$run_payments = mysqli_query($db,$get_payments);
								while($orders=mysqli_fetch_array($run_orders))	{
									$payment_id = rand(1000,9999);
									$invoice_no = $orders['invoice_no'];
									$amount = $orders['due_amount'];
									$code = rand(10000,99999);
									$payment_date = $orders['order_date'];
									$i++;
									?>
									<tr>
										<td><?php echo $i; ?></td>
										<td bgcolor="yellow" ><?php echo $invoice_no; ?></td>
										<td>$<?php echo $amount; ?></td>
										<td><?php echo $code; ?></td>
										<td><?php echo $payment_date; ?></td>
										<td>
											<a href="index.php?payment_delete=<?php echo $payment_id; ?>" >
												<i class="fa fa-trash-o" ></i> Delete
											</a>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>