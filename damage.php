<?php include "header.php"; ?>

<div class="row border-bottom">

</div>
<style>
    .button {
        text-align: center;
        padding-top: 20px;
        clear: both;
    }
</style>



<div id="modal-add" class="modal fade" aria-hidden="true">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="inc/damage.php" class="form-horizontal">
                  <div class="row">
                      <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Add Users</h3>
                    <div class="row"> <!--First row option starts here-->
                        <div class="col-sm-6">

                           <!-- Equipment Name -->

                            <div class="form-group"><label class="col-sm-4 control-label"> Equipment Name </label>

                                <div class="col-sm-8">
                                    <select class="select2_demo_3 form-control" name="eid">
                                        <option ></option>

                                        <?php
                                        $sql="SELECT DISTINCT eid FROM eq_detail";
                                        $result=mysqli_query($con,$sql);

                                        while ($row=mysqli_fetch_assoc($result)) {
                                            $sql2="SELECT name FROM equip WHERE eid=".$row['eid'];
                                            $name=mysqli_fetch_assoc(mysqli_query($con,$sql2))['name'];
                                            echo '<option value='.$row['eid'].'>'.$name.'</option>';
                                        }
                                        ?>

                                    </select>

                                    <!--
                                      </select> -->

                                </div>
                            </div>

                            <!-- Date     -->
                            <div class="form-group" id="data_1"><label class="col-sm-4 control-label">  Damage  Date </label>
                                <div class="col-sm-8">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="asd" type="text" name="date" class="form-control" required>
                                        <script type="text/javascript">n =  new Date();y = n.getFullYear();m = n.getMonth() + 1;d = n.getDate();document.getElementById('asd').value=m+'/'+d+'/'+y;
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">


                            <!-- Equipment Price  -->

                            <div class="form-group"><label class="col-sm-4 control-label"> Equipment Quantity  </label>

                                <div class="col-sm-8"><input type="Number" placeholder="  Equipment Quantity  " name="count"
                                                             class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-4 control-label"> Damage Details  </label>

                                <div class="col-sm-8"><input type="text" placeholder="  Damage details  " name="details"
                                                             class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group"><label class="col-sm-4 control-label"> Previously damaged? </label>

                        <div class="col-sm-8"><label class="radio-inline">
                                <input type="radio" name="pre_d" value="1" checked>yes
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="pre_d" value="0">no
                            </label>
                        </div>
                    </div>

                        </div> <!--Ending second column option -->


                    </div> <!--First Row ends here -->

                    <!-- Save Button  -->
                    <div class="button">
                    	<div class="row">
                            <div class="col-sm-12">
                                <div class="button text-center">
                                    <div class="form-group">
                                        <p><b>Note:</b> <font color="red">All Fields must be filled</font></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="button text-center">
                                    <div class="form-group">
                                        <button class="btn btn-white" data-dismiss="modal">Cancel</button>
                            			<button type="submit" class="btn btn-primary">Submit</button>
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
                    $query = mysqli_query($con,"SELECT * FROM eq_repair ")or die(mysql_error());

                        while ($row = mysqli_fetch_array($query)) {
                             $sql2="SELECT * FROM equip WHERE eid=".$row['eid'];
                             $resul2=mysqli_query($con,$sql2);
                             $name=mysqli_fetch_assoc($resul2)['name'];

                ?>

<div id="modal<?php echo $row['rid'];?>" class="modal fade" aria-hidden="true">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
            <div class="modal-body">
              <form method="POST" action="inc/repair.php" class="form-horizontal" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Send to Repair</h3>
                            <div class="row"> <!--First row option starts here-->
                                <div class="col-sm-6">
                                    <!-- Name Section starts here  -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Name</label>

                                        <div class="col-sm-8"><input type="text" placeholder=" Name " name="name" class="form-control required" value="<?php echo $name;?>" disabled>
                                        </div>
                                    </div>
                                    <input type="hidden" name="rid" value="<?php echo $row['rid'];?>">

                                    <div class="form-group" id="data_1">

                                        <label class="col-sm-4 control-label"> Repair Starting Date </label>
                                        <div class="col-sm-8">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" required name="date" id="asdf">
                                        </div>
                                        </div>
                                    </div>  <!--  end of Enrollment Date    -->

                                </div> <!--Ending second column option -->


                            </div> <!--First Row ends here -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="button text-center">
                                        <div class="form-group">
                                            <p><b>Note:</b> <font color="red">All Fields must be filled</font></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="button text-center">
                                        <div class="form-group">
                                        <input type="hidden" name="uid" value="<?php echo $row['uid'];?>">
                                                <button class="btn btn-white" data-dismiss="modal">Cancel</button>
                                                <button id="update<?php echo $row['uid']; ?>" class="btn btn-primary">Submit</button>
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





<div id="modal-fin<?php echo $row['rid'];?>" class="modal fade" aria-hidden="true">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
            <div class="modal-body">
              <form method="POST" action="inc/finish.php" class="form-horizontal" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Finish Repairment Status</h3>


                            <div class="row"> <!--First row option starts here-->
                                <div class="col-sm-6">
                                    <!-- Name Section starts here  -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Name</label>

                                        <div class="col-sm-8"><input type="text" placeholder=" Name " name="name" class="form-control required" value="<?php echo $name;?>" disabled>
                                        </div>
                                    </div>  <!--  End of Name Section starts here  -->
                                    <!-- NId number section -->
                                    <input type="hidden" name="rid" value="<?php echo $row['rid'];?>">
                                    <!-- Age section   -->
                                    <div class="form-group" id="data_1">

                                        <label class="col-sm-4 control-label">Start Repair Date</label>
                                        <div class="col-sm-8">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" required value="<?php echo date("m/d/Y",strtotime($row['start_repair_date']));?>" disabled>
                                        </div>
                                        </div>
                                    </div>

                                </div> <!--End of  First colum section -->
                                <!--starting second column section-->
                                <div class="col-sm-6">

                                    <!-- reg_fee -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Total Cost </label>

                                        <div class="col-sm-8"><input type="Number" placeholder="  Total Cost  " name="cost" class="form-control" required  >
                                        </div>
                                    </div>
                                    <!-- Image    -->
                                    <div class="form-group"><label class="col-sm-4 control-label"> Upload Invoice Image </label>
                                        <div class="col-sm-8">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" required data-trigger="fileinput"><i
                                                            class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                                class="fileinput-filename"></span></div>
                                                    <span class="input-group-addon btn btn-default btn-file" ><span class="fileinput-new" >Select file</span><span
                                                                class="fileinput-exists">Change</span><input type="file" id="image_location" name="image_location" ></span>
                                                    <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                    data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                    </div>

                                    <div class="form-group" id="data_1">

                                        <label class="col-sm-4 control-label">End Repair Date</label>
                                        <div class="col-sm-8">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input name="date" type="text" class="form-control" required id="asd">
                                        </div>
                                        </div>
                                    </div>
                                </div> <!--Ending second column option -->


                            </div> <!--First Row ends here -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="button text-center">
                                        <div class="form-group">
                                            <p><b>Note:</b> <font color="red">All Fields must be filled</font></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="button text-center">
                                        <div class="form-group">
                                                <button class="btn btn-white" data-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-primary">Submit</button>
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





<div id="modal-view<?php echo $row['rid'];?>" class="modal fade" aria-hidden="true">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="inc/damage.php" class="form-horizontal">
                    <div class="row"> <!--First row option starts here-->
                        <div class="col-sm-6">


                            <!-- Equipment Name -->

                            <div class="form-group"><label class="col-sm-4 control-label"> Equipment Name </label>

                                <div class="col-sm-8"><input type="text" placeholder="   " value="<?php echo $name;?>"
                                                             class="form-control" required disabled>
                                </div>
                            </div>

                            <!--
                             Damage Details-->

                            <div class="form-group"><label class="col-sm-4 control-label"> Damage Details </label>

                                <div class="col-sm-8"><input type="text" placeholder="   " value="<?php echo $row['detail'];?>"
                                                             class="form-control" required disabled>
                                </div>
                            </div>


                            <!--  start repari Date     -->
                            <div class="form-group" id="data_1"><label class="col-sm-4 control-label"> Start Repair
                                    Date </label>
                                <div class="col-sm-8">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                                id="asd" type="text" value="<?php echo $row['start_repair_date'];?>" class="form-control" required disabled>
                                    </div>
                                </div>
                            </div>

                            <!-- Invoice Image -->

                            <div class="lightBoxGallery">
                                <div class="form-group"><label class="col-sm-4 control-label"> Invoice Image </label>

                                    <div class="col-sm-8">
                                        <a href="<?php echo $row['invoice_image_location'];?>" target="_blank"><img  id= "pic"src="<?php echo $row['invoice_image_location'];?>" height="100" width="100"></a>
                                       <!-- <img src="image_2.png" alt="Smiley face" height="100" width="100">-->
                                    </div>
                                </div>


                                <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                                <div id="blueimp-gallery" class="blueimp-gallery">
                                    <div class="slides"></div>
                                    <h3 class="title"></h3>
                                    <!-- <a class="prev">‹</a>
                                    <a class="next">›</a> -->
                                    <!-- <a class="close">×</a> -->
                                    <a class="play-pause"></a>
                                    <ol class="indicator"></ol>

                                </div>

                            </div>


                        </div>
                        <div class="col-sm-6">


                            <!-- Equipment Price  -->

                            <div class="form-group"><label class="col-sm-4 control-label"> Equipment Quantity </label>

                                <div class="col-sm-8"><input type="Number" placeholder="   " value="<?php echo $row['count'];?>"
                                                             class="form-control" required disabled="">
                                </div>
                            </div>

                            <!-- Damage Date-->
                            <div class="form-group" id="data_1"><label class="col-sm-4 control-label"> Damage
                                    Date </label>
                                <div class="col-sm-8">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                                id="asd" type="text" value="<?php echo $row['damage_date'];?>" class="form-control" required disabled>
                                    </div>
                                </div>
                            </div>
                            <!--Ending Repair Date -->
                            <div class="form-group" id="data_1"><label class="col-sm-4 control-label"> End Repair
                                    Date </label>
                                <div class="col-sm-8">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input
                                                id="asd" type="text" value="<?php echo $row['finish_date'];?>" class="form-control" required disabled>
                                    </div>
                                </div>
                            </div>

                            <!--Total Cost-->
                            <div class="form-group"><label class="col-sm-4 control-label"> Total Cost </label>

                                <div class="col-sm-8"><input type="Number" placeholder="   " value="<?php echo $row['cost'];?>"
                                                             class="form-control" required disabled>
                                </div>
                            </div>
                            <!--Status -->
                            <div class="form-group"><label class="col-sm-4 control-label"> Status </label>

                                <div class="col-sm-8"><input type="text" placeholder="   " value="<?php echo $row['repairment_status'];?>"
                                                             class="form-control" required disabled>
                                </div>
                            </div>


                        </div> <!--Ending second column option -->


                    </div> <!--First Row ends here -->

                    <!-- Save Button  -->
                    <div class="button">
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <button class="btn btn-white" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php }?>











    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> Damage Information </h5>
                    <a  class=" btn-primary pull-right btn-sm btn-danger" href="#modal-add" data-toggle="modal">Add Damage</a>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th> Name </th>
                                    <th>Details</th>
                                    <th>Quantity</th>
                                    <th>Damage Date</th>
                                    <th>Current Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sql="SELECT * FROM eq_repair";
                                    if ($result=mysqli_query($con,$sql)) {
                                        $i=1;
                                        while ($row=mysqli_fetch_array($result)) {
                                             $sql2="SELECT * FROM equip WHERE eid=".$row['eid'];
                                             $resul2=mysqli_query($con,$sql2);
                                             $name=mysqli_fetch_assoc($resul2)['name'];
                                             if($row['repairment_status']=="Damaged"){
                                                $status='<span class="label label-danger">Damaged</span>';
                                                $action='<a data-toggle="modal" href="#modal'.$row['rid'].'"><i class="fa fa-wrench" style="color:#FFC302"></i></a>
                                        <a data-toggle="modal" href="#modal-view'.$row['rid'].'"><i class="fa fa-eye"></i></a>';
                                            } elseif($row['repairment_status']=="Under Repair"){
                                                $status='<span class="label label-warning">Under Repair</span>';
                                                $action='<a data-toggle="modal" href="#modal-fin'.$row['rid'].'"><i class="fa fa-check" style="color:green"></i></a>
                                        <a data-toggle="modal" href="#modal-view'.$row['rid'].'"><i class="fa fa-eye"></i></a>';
                                            } elseif ($row['repairment_status']=="Repaired") {
                                                $status='<span class="label label-primary">Repaired</span>';
                                                $action='<a data-toggle="modal" href="#modal-view'.$row['rid'].'"><i class="fa fa-eye"></i></a>';
                                            }
                                            else{
                                                $status='';
                                            }

                                            echo '<tr class="gradeA">
                                                <td>'.$i.' </td>
                                                <td>'.$name.' </td>
                                                <td>'.$row['detail'].'</td>
                                                <td class="center">'.$row['count'].'</td>
                                                <td class="center">'.$row['damage_date'].'</td>
                                                <td class="center">'.$status.'</td>
                                                <td class="center">'.$action.'</td>
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
</div>

</div>
<!-- Date picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
<!-- Select2 -->
<script src="js/plugins/select2/select2.full.min.js"></script>
<!-- Image Uploaded -->
<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>
<!-- Jquery Validate -->
<script src="js/plugins/validate/jquery.validate.min.js"></script>


<!-- Date picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="js/plugins/dataTables/datatables.min.js"></script>
<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>
<!-- Custom and plugin javascript -->

<script src="js/plugins/select2/select2.full.min.js"></script>

<script src="js/plugins/pace/pace.min.js"></script>
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
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

    $(".select2_demo_3").select2({
        placeholder: "Select Equipment Name",
        allowClear: true,

    });

</script>
