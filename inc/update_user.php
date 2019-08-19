<?php
include 'db.php';

if (isset($_POST['name'])&&isset($_POST['nid'])&&isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['address'])&&isset($_POST['sex'])&&isset($_POST['height'])&&isset($_POST['weight'])) {
// 	echo "success set";
	if (!empty($_POST['name'])&&!empty($_POST['nid'])&&!empty($_POST['email'])&&!empty($_POST['phone'])&&!empty($_POST['address'])&&!empty($_POST['sex'])&&!empty($_POST['height'])&&!empty($_POST['weight'])) {
		
		        $name=test_input($_POST['name']);
				$nid=test_input($_POST['nid']);
				$email=test_input($_POST['email']);
				$phone=test_input($_POST['phone']);
				$address=test_input($_POST['address']);
				$sex=test_input($_POST['sex']);
				$height=test_input($_POST['height']);
				$weight=test_input($_POST['weight']);
				$uid=$_POST['uid'];

				$query="UPDATE user SET name='$name', nid='$nid', email='$email', phone='$phone', address='$address', sex='$sex',height='$height', weight='$weight' WHERE uid='$uid'";

				if (mysqli_query($con,$query)) {
				// 	$uid=mysqli_insert_id($con);
				// 	$query2="INSERT INTO payment VALUES('','$uid','$monthly_fee','$date')";
				// 	mysqli_query($con,$query2);
					// echo "success";
					$_SESSION['suc']='update_user';
					header("Location: ../view_user.php");
				} else{
					// echo "faild";
					$_SESSION['fail']='update_user';
					header("Location: ../view_user.php");
				}
		
	} else{
		// echo "faild not empty";
		$_SESSION['fail']='update_user';
		header("Location: ../view_user.php");
	}
} else{
	// echo "fald set";
	$_SESSION['fail']='update_user';
	header("Location: ../view_user.php");
}
?>