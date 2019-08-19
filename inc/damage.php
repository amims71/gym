<?php
include 'db.php';

if(isset($_POST['count'])&&isset($_POST['eid'])&&isset($_POST['details'])&&isset($_POST['date'])){
	if (!empty($_POST['count'])&&!empty($_POST['eid'])&&!empty($_POST['details'])&&!empty($_POST['date'])) {
		$count=test_input($_POST['count']);
		$eid=test_input($_POST['eid']);
		$details=test_input($_POST['details']);
		$date=date("Y-m-d",strtotime($_POST['date']));
		$prev_d=test_input($_POST['pre_d']);

		$ss="SELECT SUM(count) as totaltech  FROM eq_detail WHERE eid= $eid";
		$sql3="SELECT * FROM eq_repair WHERE eid=".$eid;
		$damaged=0;
        $repaired=0;
        $constr=0;
        $result2=mysqli_query($con,$sql3);
        $rr=mysqli_query($con,$ss);
        $all=mysqli_fetch_assoc($rr)['totaltech'];
        while ($row2=mysqli_fetch_assoc($result2)) {
            if ($row2['prev_d']==0&&$row2['repairment_status']=='Damaged') {
                $damaged+=$row2['count'];
            }elseif ($row2['prev_d']==0&&$row2['repairment_status']=='Repaired') {
                $repaired+=$row2['count'];
            }elseif ($row2['repairment_status']=='Under Repair') {
                $constr+=$row2['count'];
            }
        }
        $fit=$all-($damaged+$repaired+$constr);

        if ($count<=$repaired && $prev_d==1) {
        	$x=1;
        } elseif ($count<=$fit && $prev_d==0) {
        	$x=1;
        } else{
        	$x=0;
        }
        

		if ($x==1) {
			echo $query="INSERT INTO `eq_repair` (`eid`, `count`, `cost`, `detail`, `damage_date`, `start_repair_date`, `finish_date`, `invoice_image_location`, `repairment_status`, `prev_d`) VALUES ('$eid','$count','','$details','$date','0000-00-00','0000-00-00','','Damaged','$prev_d')";		
			if (mysqli_query($con,$query)) {
						echo "success";
						$_SESSION['suc']='damage';
						header("Location: ../damage.php");
					} else{
						echo "faild";
						$_SESSION['fail']='damage';
						header("Location: ../damage.php");
					}
		} else{
			echo "This is an invalid count";
			$_SESSION['fail']='damage';
			header("Location: ../damage.php");
		}
	}else{
		echo "empty";
		$_SESSION['fail']='damage';
		header("Location: ../damage.php");
	}
} else{
	echo "not set";
	$_SESSION['fail']='damage';
	header("Location: ../damage.php");
}

?>