<?php
include 'db.php';

if(isset($_POST['count'])&&isset($_POST['eid'])&&isset($_POST['price'])&&isset($_POST['date'])){
	if (!empty($_POST['count'])&&!empty($_POST['eid'])&&!empty($_POST['price'])&&!empty($_POST['date'])) {
		$count=test_input($_POST['count']);
		$eid=test_input($_POST['eid']);
		$price=test_input($_POST['price']);
		$date=date("Y-m-d",strtotime($_POST['date']));

		$query="INSERT INTO eq_detail (`eid`, `count`, `price`, `date`) VALUES ('$eid','$count','$price','$date')";		
		if (mysqli_query($con,$query)) {
			// echo "success";
			$_SESSION['suc']='add_equipment';
			header("Location: ../equipment_report.php");
		} else{
			// echo "faild";
			$_SESSION['fail']='add_equipment';
			header("Location: ../equipment_report.php");
		}
	}else{
		// echo "empty";
		$_SESSION['fail']='add_equipment';
		header("Location: ../equipment_report.php");
	}
} else{
	// echo "not set";
	$_SESSION['fail']='add_equipment';
	header("Location: ../equipment_report.php");
}

?>