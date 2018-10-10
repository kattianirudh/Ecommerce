<?php
if(!isset($_SESSION['admin_email'])){
	echo "<script>window.open('login.php','_self')</script>;";
}
else
{	
	if(isset($_GET['admin_delete'])){
		$delete_user = "delete from admin where admin_id='$admin_id'";
		$run_delete = mysqli_query($db,$delete_user);
		if($run_delete){
			echo "<script>alert('One user has been deleted')</script>";
			echo "</script>window.open('index.php?view_admin','_self')</script>";
		}
	}
}
?>