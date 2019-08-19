<?php
include 'db.php';

$array = array(' bal (Table Tennis)', ' brush(pool)', ' post(Table Tennis)', ' spider(pool )', 'ball triangle(pool )', 'ball(pool)', 'Barbells', 'Barbells Rack', 'bat(Table Tennis)', 'Belly Bench ', 'Bench Press', 'Benches', 'Bicep Press', 'Big Balls', 'Cable Cross', 'Chalk holder(pool )', 'Cue (pool)', 'cue rack(pool )', 'Down/Pushup Set', 'doz chalk(pool )', 'Dumbell Rack', 'Electric Treadmill', 'Flat Bench', 'Floor Cllat', 'Folding Bench', 'Hex Dumbell', 'Hidrowlick baly cllasin for body', 'Iskiping Rope', 'long rest cue(pool )', 'Low & Row Cllashin ', 'Multi Station Gym', 'Net(Table Tennis)', 'Olympic Bar - 5 feet', 'Olympic Bar - 7 feet', 'Refridgerator', 'rest Cue(pool )', 'Rubber Weight Plate 10kg', 'Rubber Weight Plate 2.5kg', 'Rubber Weight Plate 20kg', 'Rubber Weight Plate 5kg', 'Side table', 'Sofaset double', 'Sofaset single', 'Spinner Bike ', 'Squat/self Cllasin for leg', 'Stepper ', 'Supported Tools', 'Table(Pool)', 'Table(Table Tennis)', 'Television', 'Voltage Stabilizer- 5 KVA', 'Weight Scale');
for ($i=0; $i < sizeof($array); $i++) { 
	echo $sql="INSERT INTO equip VALUES('','$array[$i]')";
	mysqli_query($con,$sql);
}
?>
