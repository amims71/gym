<?php
include 'db.php';

if (isset($_POST['name'])&&isset($_POST['nid'])&&isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['address_present'])&&isset($_POST['dob'])&&isset($_POST['sex'])&&isset($_POST['height'])&&isset($_POST['weight'])&&isset($_POST['blood'])&&isset($_POST['reg_fee'])&&isset($_POST['monthly_fee'])&&isset($_POST['date'])) {
	// echo "success set";
	if (!empty($_POST['name'])&&!empty($_POST['nid'])&&!empty($_POST['email'])&&!empty($_POST['phone'])&&!empty($_POST['address_present'])&&!empty($_POST['dob'])&&!empty($_POST['sex'])&&!empty($_POST['height'])&&!empty($_POST['weight'])&&!empty($_POST['blood'])&&!empty($_POST['reg_fee'])&&!empty($_POST['monthly_fee'])&&!empty($_POST['date'])) {
		
		$nid=test_input($_POST['nid']);
		$target_dir = "../uploads/";
		$imgName=basename($_FILES["image_location"]["name"]);
		$target_file = $target_dir . $imgName;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));



		$nid_check=mysqli_query($con,"SELECT * from user WHERE nid='".$nid."'");
		if (mysqli_num_rows($nid_check)>0) {
			$uploadOk = 0;
		}

		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["image_location"]["tmp_name"]);
		    if($check !== false) {
		        // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        // echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    // echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["image_location"]["size"] > 10000000) {
		    // echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    // echo "Sorry, your file was not uploaded.";
		    $_SESSION['fail']='add_user';
			header("Location: ../view_user.php");
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["image_location"]["tmp_name"], $target_file)) {
		        // echo "The file ". basename( $_FILES["image_location"]["name"]). " has been uploaded.";
		        $name_bangla=test_input($_POST['name_bangla']);
		        $name=test_input($_POST['name']);
		        $name_parent=test_input($_POST['name_parent']);
		        $occupation=test_input($_POST['occupation']);
		        $organization=test_input($_POST['organization']);
		        $designation=test_input($_POST['designation']);
		        $nationality=test_input($_POST['nationality']);
		        $nid=test_input($_POST['nid']);
				$dob=date("Y-m-d",strtotime($_POST['dob']));
				$sex=test_input($_POST['sex']);
				$email=test_input($_POST['email']);
		        $address_present=test_input($_POST['address_present']);
				$phone=test_input($_POST['phone']);
				$blood=test_input($_POST['blood']);
				$height=test_input($_POST['height']);
				$weight=test_input($_POST['weight']);
				$reg_fee=test_input($_POST['reg_fee']);
				$monthly_fee=test_input($_POST['monthly_fee']);
		        $membership_no=test_input($_POST['membership_no']);
				$date=date("Y-m-d",strtotime($_POST['date']));
		        $shift=test_input($_POST['shift']);
		        $address_permanent=test_input($_POST['address_permanent']);
				$image_location="uploads/".$imgName;

				$query="INSERT INTO user (`nid`, `email`, `name`, `phone`, `address`, `dob`, `sex`, `address_permanent`, `height`, `weight`, `blood`, `reg_fee`, `monthly_fee`, `image_location`, `date`, `name_bangla`, `name_parent`, `occupation`, `organization`, `designation`, `nationality`, `membership_no`, `shift`) VALUES ('$nid','$email','$name','$phone','$address_present','$dob','$sex','$address_permanent','$height','$weight','$blood','$reg_fee','$monthly_fee','$image_location','$date','$name_bangla','$name_parent','$occupation','$organization','$designation','$nationality','$membership_no','$shift')";

				if (mysqli_query($con,$query)) {
					$uid=mysqli_insert_id($con);
					$pay_for=date("M-Y",strtotime($date));
					$date=date("Y-m-d");
					$query2="INSERT INTO payment (`uid`, `payment`, `payment_date`, `pay_for`) VALUES('$uid','$monthly_fee','$date','$pay_for')";
					if (mysqli_query($con,$query2)) {
						// echo "complete";
						$pid=mysqli_insert_id($con);
						// echo "success";
						$_SESSION['suc']='add_user';
						header("Location: ../print.php?m=".$monthly_fee."&d=".$date."&i=".$uid."&r=".$reg_fee."&p=".$pid."&f=".$pay_for."&n=".$name);
					} else{
						// echo "faild 1";
						$_SESSION['fail']='add_user';
						header("Location: ../view_user.php");
					}
					
				} else{
					// echo "faild 2";
					$_SESSION['fail']='add_user';
					header("Location: ../view_user.php");
				}
		    } else {
		        // echo "Sorry, there was an error uploading your file.";
		        $_SESSION['fail']='add_user';
				header("Location: ../view_user.php");
		    }
		}
		
	} else{
		// echo "faild not empty";
		$_SESSION['fail']='add_user';
		header("Location: ../view_user.php");
	}
} else{
	// echo "fald set";
	$_SESSION['fail']='add_user';
	header("Location: ../view_user.php");
}
?>