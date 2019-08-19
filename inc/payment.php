<?php
include 'db.php';
if (isset($_POST['uid'])&&isset($_POST['monthly_fee'])&&isset($_POST['payment_date'])) {
	if (!empty($_POST['uid'])&&!empty($_POST['monthly_fee'])&&!empty($_POST['payment_date'])) {
		if ($_POST['monthly_fee']==$_POST['monthly_fees']) {
			$uid=$_POST['uid'];
			$res=mysqli_query($con,"SELECT name FROM user WHERE uid=".$uid);
			$name=mysqli_fetch_assoc($res)['name'];
			$monthly_fee=$_POST['monthly_fee'];
			$pay_for=$_POST['payment_date'];
			$date=date("Y-m-d");
			$res=mysqli_query($con,"SELECT * FROM payment WHERE uid=".$uid." AND pay_for='".$pay_for."'");
			if (mysqli_num_rows($res)>1) {
				// echo "already paid";
				$_SESSION['fail']='payment';
				header("Location: ../view_user.php");
			} else{
				$query2="INSERT INTO payment VALUES('','$uid','$monthly_fee','$date','$pay_for')";
				mysqli_query($con,$query2);
				$pid=mysqli_insert_id($con);
				$_SESSION['suc']='payment';
				header("Location: ../invoice_print.php?m=".$monthly_fee."&d=".$date."&i=".$uid."&p=".$pid."&f=".$pay_for."&n=".$name);
			}
		} else{
			$_SESSION['fail']='payment';
			// echo "Please Pay the defined amount.";
			header("Location: ../view_user.php");
		}
	}else{
		// echo "empty";
		$_SESSION['fail']='payment';
		header("Location: ../view_user.php");
	}
} else{
	$_SESSION['fail']='payment';
	// echo "unset";
	header("Location: ../view_user.php");
}

?>