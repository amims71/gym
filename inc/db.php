<?php
 if (!isset($_SESSION)) {
  session_start();
 }

 $con=mysqli_connect('localhost','techcity_apps','GaPlf748B5','techcity_apps');

if ($con) {
	//echo "success connect";
	//echo mysqli_connect_error();
} else{
	//echo mysqli_connect_error();
	echo "failed connect";
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(!isset($_SESSION['id'])){
  header("location: login.php");
 } else{
  $id=$_SESSION['id'];
      switch ($id) {
        case 1:
          $user='Super User';
          break;
        case 2:
          $user='Admin User';
          break;
        default:
          $user='No User';
          break;
      }
 }
?>
