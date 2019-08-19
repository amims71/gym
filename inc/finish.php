<?php
include 'db.php';

if(isset($_POST['cost'])&&isset($_POST['rid'])&&isset($_POST['date'])){
	if (!empty($_POST['cost'])&&!empty($_POST['rid'])&&!empty($_POST['date'])) {
		$target_dir = "../uploads/";
		$imgName=basename($_FILES["image_location"]["name"]);
		$target_file = $target_dir . $imgName;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["image_location"]["tmp_name"]);
		    if($check !== false) {
		        echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		if (file_exists($target_file)) {
		    echo "Sorry, file already exists.";
		    $uploadOk = 0;
		}
		// Check file size
		if ($_FILES["image_location"]["size"] > 10000000) {
		    echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    echo "Sorry, your file was not uploaded.";
		} else {
		    if (move_uploaded_file($_FILES["image_location"]["tmp_name"], $target_file)) {

		    	$rid=test_input($_POST['rid']);
				$date=date("Y-m-d",strtotime($_POST['date']));
				$image_location="uploads/".$imgName;
				$cost=test_input($_POST['cost']);

				$query="UPDATE eq_repair SET finish_date='$date', cost='$cost', repairment_status='Repaired', invoice_image_location='$image_location' WHERE rid='$rid'";
				if (mysqli_query($con,$query)) {
					echo "success";
					$_SESSION['suc']='finish';
					header("Location: ../damage.php");
				} else{
					echo "faild";
					$_SESSION['fail']='finish';
					header("Location: ../damage.php");
				}
			} else{
				echo "not uploaded";
				$_SESSION['fail']='finish';
				header("Location: ../damage.php");
			}
		}
	} else{
		echo "empty";
		$_SESSION['fail']='finish';
		header("Location: ../damage.php");
	}
} else{
	echo "not set";
	$_SESSION['fail']='finish';
	header("Location: ../damage.php");
}

?>