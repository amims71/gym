<?php
include 'db.php';

$uid=test_input($_POST["uid"]);
$query="SELECT nid, name FROM user WHERE uid=".$uid;
$result=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($result);

?>

<input type="Number" value="<?php echo $row['nid'];?>" name="nid" class="form-control" required readonly>
<input type="hidden" value="<?php echo $row['name'];?>" name="name" class="form-control" required>