<?php
session_start();
include "header.php";


if (isset($_POST['pro_to_date']) && isset($_POST['pro_from_date'])) {
  if (!empty($_POST['pro_to_date'])&&!empty($_POST['pro_from_date'])) {
      $pro_from_date = test_input($_POST['pro_from_date']);
      $pro_to_date = test_input($_POST['pro_to_date']);
      $expens_sql= "SELECT * FROM expens WHERE date BETWEEN '$pro_from_date' AND '$pro_to_date' ORDER BY exid ASC ";

      $eq_repair_sql= "SELECT * FROM eq_repair WHERE finish_date BETWEEN '$pro_from_date' AND '$pro_to_date' ORDER BY rid ASC ";
      $eq_detail_sql= "SELECT * FROM eq_detail WHERE date BETWEEN '$pro_from_date' AND '$pro_to_date' ORDER BY did ASC ";
  } else {
    echo "empty";
  }
} else{
  $expens_sql="SELECT * FROM expens";
  $eq_repair_sql="SELECT * FROM eq_repair";
  $eq_detail_sql="SELECT * FROM eq_detail";
}

?>
<body>

<div id="modal-add" class="modal fade" aria-hidden="true">
    <div class="modal-dialog" style="width:70%;">
        <div class="modal-content">
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data" action="inc/cost.php" class="form-horizontal">
                        <div class="row"> <!--First row option starts here-->
                             <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Add Cost</h3>
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group"><label class="col-sm-4 control-label">  Cost Detail </label>
                                    <div class="col-sm-8"><input type="text" placeholder=" Cost Detail " name="cost_detail" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group" id="data_1">
                                    <label class="col-sm-4 control-label">  Date  </label>
                                    <div class="col-sm-8">
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" id="asd" name="date" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-4 control-label"> Cost Type </label>
                                    <div class="col-sm-8"><label class="radio-inline">
                                            <input type="radio" name="c_type" value="0" checked>Maintanence
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="c_type" value="1">Others
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group"><label class="col-sm-4 control-label"> Cost </label>
                                    <div class="col-sm-8"><input type="Number" placeholder="  Total Cost  " name="cost" class="form-control"  >
                                    </div>
                                </div>
                                <div class="form-group" id="data_1">
                                    <label class="col-sm-4 control-label">Invoice Image </label>
                                    <div class="col-sm-8">
                                        <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                            <div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span>
                                            </div>
                                            <span class="input-group-addon btn btn-default btn-file" ><span class="fileinput-new" >Select file</span>
                                            <span class="fileinput-exists">Change</span><input type="file" id="image_location" name="image_location" ></span>
                                            <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                        <h5>  Cost Information  </h5>
                   <a class="btn-primary pull-right btn-sm" href="#modal-add" data-toggle="modal">Add Cost</a>
                        </div>

                   <?php
                   if ($_SESSION['id']==1) {
                       ?>
                        <div class="ibox-content">
                      <div class="row">
                                      <div class="col-md-12 col-sm-12">
                                          <form action="cost.php" id="report_order" method="POST" class="form-inline">

                                              <div class="form-group" id="search_data">
                                                <div class="input-group date">
                                                    <!-- <label class="sr-only">Order From Date</label> -->
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" id="order_from_date" name="pro_from_date" class="form-control" placeholder="From Date">
                                                </div>
                                              </div>
                                              <div class="form-group" id="search_data">
                                              <div class="input-group date">
                                                  <!-- <label class="sr-only">Order To Date</label> -->
                                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" id="order_to_date" name="pro_to_date" class="form-control" placeholder="To Date">
                                              </div>
                                            </div>

                                              <input type="submit" id="submit" name="submit" value="Search" class="btn btn-primary">
                                              <a href="cost.php"
                                                 class="btn btn-primary">All</a>
                                          </form>
                                      </div>
                                  </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" id="examples">
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th> Date </th>
                                    <th> Cost Type </th>
                                    <th> Invoice </th>
                                    <th> Cost Detail</th>
                                    <th> Amount </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i=1;
                                    $total=0;
                                    if ($result=mysqli_query($con,$expens_sql)) {

                                        while ($row=mysqli_fetch_assoc($result)) {
                                            if ($row['type']==0) {
                                                $type='Maintanence';
                                            } else{
                                                $type='Others';
                                            }
                                            if (!empty($row['image_location'])) {
                                              $img='<a href="'.$row['image_location'].'" target="_blank"><img src="'.$row['image_location'].'" width="50px" height="50px" /></a>';
                                            }else{
                                              $img='No Invoice';
                                            }

                                            echo '<tr class="gradeA">
                                                <td>'.$i.' </td>
                                                <td>'.date("Y-M-d",strtotime($row['date'])).' </td>
                                                <td>'.$type.' </td>
                                                <td style="text-align:center;">'.$img.'</td>

                                                <td>'.$row['detail'].'</td>
                                                <td class="center">'.$row['cost'].'</td>
                                            </tr>';
                                            $i++;
                                            $total+=$row['cost'];
                                         }
                                    }
                                    if ($result=mysqli_query($con,$eq_repair_sql)) {
                                        while ($row=mysqli_fetch_assoc($result)) {
                                            $type="Repair";
                                            if ($row['finish_date']=='0000-00-00') {
                                                continue;
                                            }
                                            if(!empty($row['invoice_image_location'])){
                                              $img='<a href="'.$row['invoice_image_location'].'" target="_blank"><img src="'.$row['invoice_image_location'].'" width="50px" height="50px" /></a>';
                                            }else{
                                              $img='No Invoice Found';
                                            }
                                            echo '<tr class="gradeA">
                                                <td>'.$i.' </td>
                                                <td>'.date("Y-M-d",strtotime($row['finish_date'])).' </td>
                                                <td>'.$type.' </td>
                                                <td style="text-align:center;">'.$img.'</td>
                                                <td>'.$row['detail'].'</td>
                                                <td class="center">'.$row['cost'].'</td>
                                            </tr>';
                                            $i++;
                                            $total+=$row['cost'];
                                         }
                                    }
                                    if ($result=mysqli_query($con,$eq_detail_sql)) {
                                        while ($row=mysqli_fetch_assoc($result)) {
                                            $type="Purchase";
                                            $result2=mysqli_query($con,"SELECT * FROM equip WHERE eid=".$row['eid']);
                                            $detail=mysqli_fetch_assoc($result2)['name'];
                                            echo '<tr class="gradeA">
                                                <td>'.$i.' </td>
                                                <td>'.date("Y-M-d",strtotime($row['date'])).' </td>
                                                <td>'.$type.' </td>
                                                <td style="text-align:center;">No Invoice</td>
                                                <td>'.$detail.'</td>
                                                <td class="center">'.$row['price'].'</td>
                                            </tr>';
                                            $i++;
                                            $total+=$row['price'];
                                         }
                                    }

                                ?>


                                </tbody>

                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    <td></td>
                                        <td></td>
                                        <td>Totals</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                       <?php
                   }

                   ?>
                </div>
            </div>
        </div>
    </div>



<!--  put footer at the end of page-wrapper -->
<?php include "footer.php"; ?>



<script src="js/plugins/dataTables/datatables.min.js"></script>
<!-- Date picker -->
<script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

<!-- Custom and plugin javascript -->

<script src="js/plugins/pace/pace.min.js"></script>
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({

          //live total count
          "paging": false,
                    "autoWidth": true,
                    "footerCallback": function ( row, data, start, end, display ) {
                        var api = this.api();
                        nb_cols = api.columns().nodes().length;
                        var j = 5;
                        while(j < nb_cols){
                            var pageTotal = api
                          .column( j, { page: 'current'} )
                          .data()
                          .reduce( function (a, b) {
                              return Number(a) + Number(b);
                          }, 0 );
                    // Update footer
                    $( api.column( j ).footer() ).html(pageTotal);
                            j++;
                        }
                    },

            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',

            buttons: [
                { extend: 'copy',footer:true},
                {extend: 'csv',footer:true},
                {extend: 'excel', title: 'ExampleFile',footer:true},
                {extend: 'pdf', title: 'ExampleFile',footer:true},

                {extend: 'print',footer:true,
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

    $('#search_data .input-group.date').datepicker({
        format: 'yyyy-mm-dd',
        todayBtn: "linked",
        keyboardNavigation: false,
        forceParse: false,
        calendarWeeks: true,
        autoclose: true
    });


    });

</script>
