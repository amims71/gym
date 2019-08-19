<?php
include 'db.php';


if (isset($_POST['name'])&&isset($_POST['nid'])&&isset($_POST['u_type'])&&isset($_POST['item'])&&isset($_POST['start'])&&isset($_POST['end'])&&isset($_POST['amount'])&&isset($_POST['date'])) {
	// echo "success set";
	if (!empty($_POST['name'])&&!empty($_POST['nid'])&&!empty($_POST['u_type'])&&!empty($_POST['item'])&&!empty($_POST['date'])&&!empty($_POST['start'])&&!empty($_POST['end'])) {
		
		$nid=test_input($_POST['nid']);
        $name=test_input($_POST['name']);
		$u_type=test_input($_POST['u_type']);
		$item=test_input($_POST['item']);
		$date=date("Y-m-d",strtotime($_POST['date']));
		$start=test_input($_POST['start']);
        $end=test_input($_POST['end']);
		$amount=test_input($_POST['amount']);
		switch ($item) {
			case 1:
				$it='Pool Table';
				break;
			case 2:
				$it='Table Tennis';
				break;
			case 3:
				$it='Sauna';
				break;
			default:
				$it='empty';
				break;
		}
		$q="SELECT * FROM game WHERE nid='$nid' AND date='$date' AND start=".$start;
		$r=mysqli_query($con,$q);

		if (@mysqli_num_rows($r)>0) {
			// echo "faild";
			$_SESSION['fail']='add_game';
			header("Location: ../gamezone.php");
		} else{
			$query="INSERT INTO game  (`u_type`, `name`, `nid`, `item`, `date`, `start`, `end`, `amount`, `time`) VALUES ('$u_type','$name','$nid','$item','$date','$start','$end','$amount',NOW())";

			if (mysqli_query($con,$query)) {
				// echo $uid=mysqli_insert_id($con);
				$date=date("Y-m-d");
				$_SESSION['suc']='add_game';
				header("Location: ../invoice_print.php?g=".$amount."&d=".$date."&i=".rand(100,1000)."&p=".$uid."&n=".$name."&it=".$it."&start=".$start);
				
			} else{
				// echo "faild";
				$_SESSION['fail']='add_game';
				header("Location: ../gamezone.php");
			}
		}


	} else{
		// echo "faild not empty";
		$_SESSION['fail']='add_game';
		header("Location: ../gamezone.php");
	}
} else{
	// echo "fald set";
	$_SESSION['fail']='add_game';
	header("Location: ../gamezone.php");
}
?>