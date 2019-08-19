<?php include "header.php"; 

function differenceInHours($startdate,$enddate){
    $starttimestamp = strtotime($startdate);
    $endtimestamp = strtotime($enddate);
    $difference = abs($endtimestamp - $starttimestamp)/3600;
    return $difference;
}

?>
<body>
<style>
    .button {
        text-align: center;
        padding-top: 20px;
        clear: both;
    }

    .popover.clockpicker-popover.bottom.clockpicker-align-left {
        z-index: 999999 !important;
    }
</style>


<script>
	function getName(val) {
	  if (val==1) {
		  $.ajax({
		  type: "POST",
		  url: "inc/get_name.php",
		  data:'',
		  success: function(data){
		    $("#name").html(data);
		  }
		  });
		  document.getElementById("amount").value=500;
	  }else if(val==2){
        document.getElementById("amount").value=0;
      }
      else{
	  	document.getElementById("name").innerHTML='<input type="text" placeholder=" Name " name="name"class="form-control required" required>';
	  	document.getElementById("nid").innerHTML='<input type="Number" placeholder=" National Id Card Number " name="nid" class="form-control" required>';
	  	document.getElementById("amount").value=500;
	  }
	}

	function getNID(val) {
	  $.ajax({
	  type: "POST",
	  url: "inc/get_nid.php",
	  data:'uid='+val,
	  success: function(data){
	    $("#nid").html(data);
	  }
	  });
	}

</script>

<div id="modal-delete" class="modal fade" aria-hidden="true;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h3 class="m-t-none m-b">Are you sure, you want to delete this user?</h3>
                        <h3 class="m-t-none m-b">Sorry. You don't have permissin to delete user.</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="button text-center">
                            <div class="form-group">
                                <!-- <button class="btn btn-white">Cancel</button> -->
                                <button type="button" class="btn btn-white" data-dismiss="modal">No</button>

                                <button type="submit" class="btn btn-primary" readonly>Yes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="modal-add" class="modal fade" aria-hidden="true" style="overflow:hidden;">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="inc/add_game.php" class="form-horizontal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Add Gamezone/Sona Information</h3>
                            <div class="row"> <!--First row option starts here-->
                                <div class="col-sm-6">

                                    <div class="form-group"><label class="col-sm-4 control-label"> User Type </label>

                                        <div class="col-sm-8">
                                            <select class="select2_demo_3 form-control" onChange="getName(this.value);" name="u_type" required>
                                                <option></option>
                                                <option value="1">Member</option>
                                                <option value="2">Hotel Booker</option>
                                                <option value="3">General</option>

                                            </select>
                                        </div>
                                    </div>

                                    <!-- Name Section starts here  -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Name </label>

                                        <div class="col-sm-8" id="name">
                                        	<input type="text" placeholder=" Name " name="name" class="form-control required" required>
                                        </div>
                                    </div>  <!--  End of Name Section starts here  -->
                                    <!-- NId number section -->

                                    <div class="form-group"><label class="col-sm-4 control-label">NID </label>

                                        <div class="col-sm-8" id="nid"><input type="Number" placeholder=" National Id Card Number " name="nid" class="form-control" required>
                                        </div>
                                    </div>  <!-- NId number section -->

                                    <!-- User Type Section-->


                                    <!--  Item Section  -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Item  </label>

                                        <div class="col-sm-8">
                                            <select class="select2_demo_4 form-control" id="item" name="item" required>
                                                <option></option>
                                                <option value="1">Pool Table</option>
                                                <option value="2">Table Tennis</option>
                                                <option value="3">Sona</option>

                                            </select>




                                        </div>
                                    </div>

                                </div> <!--End of  First colum section -->
                                <!--starting second column section-->
                                <div class="col-sm-6">

                                     <!-- Date -->
                                    <div class="form-group" id="data_1">

                                        <label class="col-sm-4 control-label">Date  </label>
                                        <div class="col-sm-8">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="date" name="date" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Capacity-->

                                    <div class="form-group"><label class="col-sm-4 control-label"> Start Time </label>

                                        <div class="col-sm-8" >
                                            <div class="input-group clockpicker" data-autoclose="true">
                                                <input name="start" type="text" class="form-control" value="09:30" >
                                                <span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-sm-4 control-label"> End Time </label>

                                        <div class="col-sm-8" >
                                            <div class="input-group clockpicker" data-autoclose="true">
                                                <input name="end" type="text" class="form-control" value="10:30" >
                                                <span class="input-group-addon">
                                    <span class="fa fa-clock-o"></span>
                                </span>
                                            </div>

                                        </div>
                                    </div>


                                    <!-- Amount to be paid -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Amount To Be Paid
                                             </label>

                                        <div class="col-sm-8"><input type="Number" id="amount" value="500" name="amount" class="form-control" readonly>
                                        </div>
                                    </div>






                                </div> <!--Ending second column option -->


                            </div> <!--First Row ends here -->

                            <div class="button">
                            	<div class="row">
                                    <div class="col-sm-12">
                                        <div class="button text-center">
                                            <div class="form-group">
                                                <p><strong>Note:</strong> <font color="red">All Fields must be filled</font></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="button text-center">
                                            <div class="form-group">
                                                <button class="btn btn-white" data-dismiss="modal">Cancel</button>
                                                <button id="add-user" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php
$query = mysqli_query($con, "SELECT * FROM game ") or die(mysql_error());

while ($row = mysqli_fetch_array($query)) {
    switch ($row['item']) {
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
	switch ($row['u_type']) {
		case 1:
			$ut='Member';
			break;
		case 2:
			$ut='Hotel Booker';
			break;
		case 3:
			$ut='General';
			break;
		default:
			$ut='empty';
			break;
	}
    ?>
    <div id="modal-view<?php echo $row['gid']; ?>" class="modal fade" aria-hidden="true">
        <div class="modal-dialog" style="width:70%;">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="inc/update_user.php" class="form-horizontal"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Update Game Zone/ Sauna</h3>
                                <div class="row"> <!--First row option starts here-->
                                    <div class="col-sm-6">

                                        <div class="form-group"><label class="col-sm-4 control-label"> User Type </label>

                                            <div class="col-sm-8">
                                                <input type="text" name="u_type" class="form-control" value="<?php echo $ut; ?>" disabled>
                                            </div>
                                        </div>
                                        <!-- Name Section starts here  -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Name </label>

                                            <div class="col-sm-8"><input type="text" name="name" value="<?php echo $row['name']; ?>" class="form-control required" required disabled>
                                            </div>
                                        </div>  <!--  End of Name Section starts here  -->
                                        <!-- NId number section -->

                                        <div class="form-group"><label class="col-sm-4 control-label">NID </label>

                                            <div class="col-sm-8"><input type="Number" name="nid" class="form-control" value="<?php echo $row['nid']; ?>" required disabled>
                                            </div>
                                        </div>  <!-- NId number section -->

                                        <!--  Item Section  -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Item  </label>

                                            <div class="col-sm-8">
                                               <input type="text"  name="nid" class="form-control" value="<?php echo $it; ?>" disabled>
                                            </div>
                                        </div>





                                    </div> <!--End of  First colum section -->
                                    <!--starting second column section-->
                                    <div class="col-sm-6">
                                        <!-- Date -->
                                        <div class="form-group" id="data_1">

                                            <label class="col-sm-4 control-label">Date  </label>
                                            <div class="col-sm-8">
                                                <div class="input-group date"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input id="asd" name="date" type="text" value="<?php echo $row['date']; ?>" class="form-control" disabled >
                                                </div>
                                            </div>
                                        </div>


                                        <!--Hour -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Hour Rated </label>

                                            <div class="col-sm-8">
                                                <input type="text" name="hour" class="form-control" value="<?php echo $dt; ?>" disabled>
                                            </div>
                                        </div>
                                     
                                        <!-- Amount to be paid -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Amount Paid
                                            </label>

                                            <div class="col-sm-8"><input type="Number" value="<?php echo $row['amount']; ?>" name="amount_paid" class="form-control" disabled>
                                            </div>
                                        </div>






                                    </div> <!--Ending second column option -->


                                </div> <!--First Row ends here -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="button text-center">
                                            <div class="form-group">
                                                <button class="btn btn-white" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php } ?>


<!-- <div class="row  border-bottom "></div> -->

<!--   Put all the body contenet here -->


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <h5> Game zone/ Sauna Information </h5>
                    <a class="btn-primary pull-right btn-sm" href="#modal-add" data-toggle="modal">Add Game Zone/Sauna</a>

                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>

                                <th>Sl.</th>
                                <th hidden>NID</th>
                                <th> Name</th>
                                <th>User Type</th>
                                <th>Item</th>
                                <th>Date</th>
                                <th >Hour Opted</th>
                                <th >Amount </th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            //$query = mysqli_query($con,"SELECT * FROM user ")or die(mysql_error());

                            // while ($row = mysqli_fetch_array($query)) {

                            $sql = "SELECT * FROM game";
                            if ($result = mysqli_query($con, $sql)) {
                                // echo "<pre>";print_r($result);echo "</pre>";
                                $i = 1;
                                while ($row = mysqli_fetch_array($result)) {
                                    $dt=differenceInHours($row['start'],$row['end']);
                                	switch ($row['item']) {
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
									switch ($row['u_type']) {
										case 1:
											$ut='Member';
											break;
										case 2:
											$ut='Hotel Booker';
											break;
										case 3:
											$ut='General';
											break;
										default:
											$ut='empty';
											break;
									}
                                    echo '<tr class="gradeA">
                                   

                                    <td>'.$i.' </td>
                                     <td hidden>' . $row['nid'] . '</td>
                                    <td>' . $row['name'] . ' </td>
                                 
                               
                                    <td >  '.$ut.'</td>
                                    <td > '.$it.' </td>
                                    <td >  '.$row['date'].' </td>
                                    <td > '.@$dt.' </td>
                                    <td > '.$row['amount'].'</td>
                                  
                                   
                                   
                                 
                                    
                                    <td class="center">
                                        <a data-toggle="modal" href="#modal-delete"><i class="fa fa-trash"></i></a>
                                        <a data-toggle="modal" href="#modal-view' . $row['gid'] . '"><i class="fa fa-eye"></i></a>
                                        </i></a>

                                    </td>
                                </tr>';
                                    $i++;
                                }
                            }

                            ?>


                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>


<!--  put footer at the end of page-wrapper -->
<?php include "footer.php"; ?>


<!-- Date picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>


<script src="js/plugins/select2/select2.full.min.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>
<!-- Clock picker -->
<script src="js/plugins/clockpicker/clockpicker.js"></script>
<script type="text/javascript">
    $('.clockpicker').clockpicker();


    $(".select2_demo_3").select2({
        placeholder: "Select User Type",
        allowClear: true,

    });

    $(".select2_demo_4").select2({
        placeholder: "Select Item",
        allowClear: true,

    });

    $(".select2_demo_7").select2({
        placeholder: "Select Name",
        allowClear: true,

    });

    $(".select2_demo_5").select2({
        placeholder: "Select Hourly Opted",
        allowClear: true,

    });

    $(".select2_demo_6").select2({
        placeholder: "Select Capacity",
        allowClear: true,

    });
    // $(document).ready(function() {
    //   $("#select2_demo_3").select2({
    //     dropdownParent: $("#myModal")
    //   });
    // });


    // $('#data_1 .input-group.date').datepicker({
    //     todayBtn: "linked",
    //     keyboardNavigation: false,
    //     forceParse: false,
    //     calendarWeeks: true,
    //     autoclose: true
    // });

</script>
<script>
    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {
                    extend: 'print',
                    customize: function (win) {
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });
        $('#data_1 .input-group.date').datepicker({
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });


        $('#data_2 .input-group.date').datepicker({
            format: "M-yyyy",
            viewMode: "months",
            minViewMode: "months"
        });


    });


</script>
