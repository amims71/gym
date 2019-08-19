<?php
include 'db.php';

if(isset($_POST['rid'])&&isset($_POST['date'])){
	if (!empty($_POST['rid'])&&!empty($_POST['date'])) {
		$rid=test_input($_POST['rid']);
		$date=date("Y-m-d",strtotime($_POST['date']));

		$query="UPDATE eq_repair SET start_repair_date='$date', repairment_status='Under Repair' WHERE rid='$rid'";		
		if (mysqli_query($con,$query)) {
					echo "success";
					$_SESSION['suc']='repair';
					header("Location: ../damage.php");
				} else{
					$_SESSION['fail']='repair';
					header("Location: ../damage.php");
				}
	}else{
		$_SESSION['fail']='repair';
		header("Location: ../damage.php");
	}
} else{
	$_SESSION['fail']='repair';
	header("Location: ../damage.php");
}

?>