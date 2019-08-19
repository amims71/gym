<?php
include 'db.php';

$query="SELECT name,uid FROM user";
$result=mysqli_query($con,$query);

?>

<select class="select2_demo_7 form-control" onChange="getNID(this.value);" id="name" name="gname" required>
    <option></option>
    <?php while ($row=mysqli_fetch_assoc($result)) {
    	echo "<option value='".$row['uid']."'>".$row['name']."</option>";
    }
     ?>

</select>