<?php include "header.php"; ?>
<body>
<div id="modal-delete" class="modal fade" aria-hidden="true;">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-body">
                  <div class="row">
                      <div class="col-sm-12">
                        <h3 class="m-t-none m-b">Sorry. You don't have permissin to delete Equipment.</h3>
                      </div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12">
                          <div class="button text-center">
                              <div class="form-group">
                                      <!-- <button class="btn btn-white">Cancel</button> -->
                                      <button type="button" class="btn btn-white" data-dismiss="modal">No</button>

                                      <button type="submit" class="btn btn-primary" disabled>Yes</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>




<div id="modal-add" class="modal fade" aria-hidden="true">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" action="inc/add_equipment.php" class="form-horizontal">
                  <div class="row">
                    <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Add Equipment</h3>
                    <div class="row"> <!--First row option starts here-->
                        <div class="col-sm-6">

                           <!-- Equipment Name -->

                            <div class="form-group"><label class="col-sm-4 control-label"> Equipment Name </label>

                                <div class="col-sm-8">
                                    <select class="select2_demo_3 form-control" name="eid">
                                        <option ></option>

                                        <?php
                                        $sql="SELECT * FROM equip";
                                        $result=mysqli_query($con,$sql);

                                        while ($row=mysqli_fetch_assoc($result)) {
                                            echo '<option value='.$row['eid'].'>'.$row['name'].'</option>';
                                        }
                                        ?>

                                    </select>

                                    <!--
                                      </select> -->

                                </div>
                            </div>


                            <!-- Date     -->
                            <div class="form-group" id="data_1">

                                <label class="col-sm-4 control-label">  Purchase  Date </label>
                                <div class="col-sm-8">
                                    <div class="input-group date">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input id="asd" type="text" name="date" class="form-control" required>
                                        <script type="text/javascript">n =  new Date();y = n.getFullYear();m = n.getMonth() + 1;d = n.getDate();document.getElementById('asd').value=m+'/'+d+'/'+y;
                                        </script>
                                    </div>
                                </div>
                            </div>  <!--  end of Enrollment Date    -->


                        </div> <!--End of  First colum section -->
                        <!--starting second column section-->
                        <div class="col-sm-6">


                            <!-- Equipment Price  -->

                            <div class="form-group"><label class="col-sm-4 control-label"> Equipment Quantity  </label>

                                <div class="col-sm-8"><input type="Number" placeholder="  Equipment Quantity  " name="count"
                                                             class="form-control" required>
                                </div>
                            </div>

                            <div class="form-group"><label class="col-sm-4 control-label">  Total Price </label>

                                <div class="col-sm-8"><input type="Number" placeholder="  Total Price " name="price"
                                                             class="form-control" required>
                                </div>
                            </div>








                        </div> <!--Ending second column option -->


                    </div> <!--First Row ends here -->
                    </div>
                    <!-- Save Button  -->
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

                  <!--   <div class="button">
                        <div class="form-group">
                            <div class="col-sm-offset-1 col-sm-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div> -->
                </div>
                </form>
            </div>
        </div>
    </div>
</div>




    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5> Equipment Information</h5>
                         <a class="btn-primary pull-right btn-sm" href="#modal-add" data-toggle="modal">Add Equipment</a>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th> Name </th>
                                    <th> Total Equipment </th>
                                    <th>In Use</th>
                                    <th>Repaired Quantity </th>
                                    <th>Damage Quantity</th>
                                    <th>Under Repairment</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql="SELECT * FROM eq_detail";
                                    if ($result=mysqli_query($con,$sql)) {
                                        $sql="SELECT DISTINCT eid FROM eq_detail";
                                        $result=mysqli_query($con,$sql);
                                        $i=1;

                                        while ($row=mysqli_fetch_assoc($result)) {
                                            $sql2="SELECT name FROM equip WHERE eid=".$row['eid'];
                                            $name=mysqli_fetch_assoc(mysqli_query($con,$sql2))['name'];
                                            $sql3="SELECT * FROM eq_repair WHERE eid=".$row['eid'];
                                            $result2=mysqli_query($con,$sql3);
                                            $damaged=0;
                                            $repaired=0;
                                            $constr=0;
                                            $rdamaged=0;
                                            $rrepaired=0;
                                            $rconstr=0;
                                            $eid=$row['eid'];
                                            $ss="SELECT SUM(count) as totaltech  FROM eq_detail WHERE eid= $eid";
                                            $rr=mysqli_query($con,$ss);
                                            $all=mysqli_fetch_assoc($rr)['totaltech'];
                                            while ($row2=mysqli_fetch_assoc($result2)) {
                                                // if ($row2['prev_d']==0) {
                                                    if ($row2['repairment_status']=='Damaged') {
                                                        $damaged+=$row2['count'];
                                                    }elseif ($row2['repairment_status']=='Repaired') {
                                                        $repaired+=$row2['count'];
                                                    }elseif ($row2['repairment_status']=='Under Repair') {
                                                        $constr+=$row2['count'];
                                                    }
                                                // } elseif ($row2['prev_d']==1) {
                                                //     if ($row2['repairment_status']=='Damaged') {
                                                //         $rdamaged+=$row2['count'];
                                                //     }elseif ($row2['repairment_status']=='Repaired') {
                                                //         $rrepaired+=$row2['count'];
                                                //     }elseif ($row2['repairment_status']=='Under Repair') {
                                                //         $rconstr+=$row2['count'];
                                                //     }
                                                // }
                                            }
                                            $fit=$all-($damaged+$constr);
                                            // $rfit=$all-($rdamaged+$rconstr);

                                            echo '<tr class="gradeA">
                                                <td>'.$i.' </td>
                                                <td>'.$name.' </td>
                                                <td>'.$all.' </td>
                                                <td>'.$fit.'</td>
                                                <td class="center"><a href="damage.php"> '.($repaired+$rrepaired).'</a></td>
                                                <td class="center"><a href="damage.php">'.($damaged+$rdamaged).'</a></td>
                                                <td class="center"><a href="damage.php">'.($constr+$rconstr).'</a></td>

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



<script src="js/plugins/dataTables/datatables.min.js"></script>
<!-- Date picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>


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

    });

    $(".select2_demo_3").select2({
          placeholder: "Select Equipment Name",
          allowClear: true,

      });
</script>
