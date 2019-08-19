<?php
session_start();
if ($_SESSION['id']==1) {
include "header.php";
if (isset($_GET['a'])) {
        $a=$_GET['a'];
      switch ($a) {
        case 1:
          $a1='active';
          break;
        case 2:
          $a2='active';
          break;
        case 3:
          $a3='active';
          break;
        default:
          $a1='active';
          break;
      }
      } else{
        $a1='active';
      }
if (isset($_GET['pro_to_date']) && isset($_GET['pro_from_date'])) {
  if (!empty($_GET['pro_to_date'])&&!empty($_GET['pro_from_date'])) {
      $pro_from_date = test_input($_GET['pro_from_date']);
      $pro_to_date = test_input($_GET['pro_to_date']);
      $payment_sql= "SELECT * FROM payment WHERE payment_date BETWEEN '$pro_from_date' AND '$pro_to_date' ORDER BY pid ASC ";
      $reg_sql= "SELECT * FROM user WHERE date BETWEEN '$pro_from_date' AND '$pro_to_date' ORDER BY uid ASC ";
      $game_sql= "SELECT * FROM game WHERE date BETWEEN '$pro_from_date' AND '$pro_to_date' ORDER BY gid ASC ";
      

      // $eq_repair_sql= "SELECT * FROM eq_repair WHERE finish_date BETWEEN '$pro_from_date' AND '$pro_to_date' ORDER BY rid ASC ";
      // $eq_detail_sql= "SELECT * FROM eq_detail WHERE date BETWEEN '$pro_from_date' AND '$pro_to_date' ORDER BY did ASC ";
  } else {
    //echo "empty";
  }
} else{
  $payment_sql="SELECT * FROM payment";
  $reg_sql="SELECT * FROM user";
  $game_sql="SELECT * FROM game";
  // $eq_repair_sql="SELECT * FROM eq_repair";
  // $eq_detail_sql="SELECT * FROM eq_detail";
}
?>
<body>


    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <!-- <a class=" btn btn-w-m btn-primary pull-right btn-lg" href="#modal-add" data-toggle="modal">Add User</a> -->
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                        <ul class="nav nav-tabs">
                          <li class="<?php echo @$a1;?>"><a data-toggle="tab" href="#tab-1"><i class="fa fa-line-chart"></i> Monthly Fee</a></li>
                          <li class="<?php echo @$a2;?>"><a data-toggle="tab" href="#tab-2"><i class="fa fa-file-excel-o"></i> Registration Fee</a></li>
                          <li class="<?php echo @$a3;?>"><a data-toggle="tab" href="#tab-3"><i class="fa fa-file-excel-o"></i> Game Registration Fee</a></li>
                        </ul>
                    <div class="tab-content">
                         <div id="tab-1" class="tab-pane <?php echo @$a1;?>">
                            <div class="ibox-title">
                                <h5> Monthly Fee Purpose Revenue </h5>
                            </div>
                      <div class="ibox-content">
                      <div class="row">
                                      <div class="col-md-12 col-sm-12">
                                          <form action="revenue.php" id="report_order" method="GET" class="form-inline">

                                              <div class="form-group" id="search_data">
                                                <div class="input-group date">
                                                    <!-- <label class="sr-only">Order From Date</label> -->
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" id="order_from_date" name="pro_from_date" class="form-control" placeholder="From Date">
                                                </div>
                                              </div>
                                              <input type="hidden" name="a" value="1">
                                              <div class="form-group" id="search_data">
                                              <div class="input-group date">
                                                  <!-- <label class="sr-only">Order To Date</label> -->
                                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" id="order_to_date" name="pro_to_date" class="form-control" placeholder="To Date">
                                              </div>
                                            </div>

                                              <input type="submit" id="submit" name="submit" value="Search" class="btn btn-primary">
                                              <a href="revenue.php?a=1"
                                                 class="btn btn-primary">All</a>
                                          </form>
                                      </div>
                                  </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th> Date </th>
                                    <th> Revenue Type </th>
                                    <th>Revenue from</th>
                                    <th>Amount </th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    //$sql="SELECT * FROM payment";
                                    $i=1;
                                    $total=0;
                                    if (@$result=mysqli_query($con,$payment_sql)) {
                                        while ($row=mysqli_fetch_assoc($result)) {
                                            $sql2="SELECT * FROM user WHERE uid=".$row['uid'];
                                             $resul2=mysqli_query($con,$sql2);
                                             $name=mysqli_fetch_assoc($resul2)['name'];

                                            echo '<tr class="gradeA">
                                                <td>'.$i.' </td>
                                                <td>'.date("Y-M-d",strtotime($row['payment_date'])).' </td>
                                                <td> Monthly Fee </td>
                                                <td>'.$name.'</td>
                                                <td class="center">'.$row['payment'].'</td>
                                            </tr>';
                                            $i++;
                                            $total+=$row['payment'];
                                         }
                                    }
                                    //$sql="SELECT * FROM user";

                                ?>


                                </tbody>

                                <tfoot>
                              		<tr>
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
            </div>


               <div id="tab-2" class="tab-pane  <?php echo @$a2;?>">
                            <div class="ibox-title">
                                <h5>  Registration Purpose revenue </h5>
                            </div>
                    <div class="ibox-content">
                      <div class="row">
                                      <div class="col-md-12 col-sm-12">
                                          <form action="revenue.php" id="report_order" method="GET" class="form-inline">

                                              <div class="form-group" id="search_data">
                                                <div class="input-group date">
                                                    <!-- <label class="sr-only">Order From Date</label> -->
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" id="order_from_date" name="pro_from_date" class="form-control" placeholder="From Date">
                                                    
                                                </div>
                                              </div>
                                              <input type="hidden" name="a" value="2">
                                              <div class="form-group" id="search_data">
                                              <div class="input-group date">
                                                  <!-- <label class="sr-only">Order To Date</label> -->
                                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" id="order_to_date" name="pro_to_date" class="form-control" placeholder="To Date">
                                              </div>
                                            </div>

                                              <input type="submit" id="submit" name="submit" value="Search" class="btn btn-primary">
                                              <a href="revenue.php?a=2"
                                                 class="btn btn-primary">All</a>
                                          </form>
                                      </div>
                                  </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th> Date </th>
                                    <th> Revenue Type </th>
                                    <th>Revenue from</th>
                                    <th>Amount </th>
                                </tr>
                                </thead>
                                <tbody>
                                     <?php

                                    //$sql="SELECT * FROM payment";
                                    $i=1;
                                    $total=0;

                                    //$sql="SELECT * FROM user";
                                    if (@$result=mysqli_query($con,$reg_sql)) {
                                        while ($row=mysqli_fetch_assoc($result)) {

                                            echo '<tr class="gradeA">
                                                <td>'.$i.' </td>
                                                <td>'.date("Y-M-d",strtotime($row['date'])).' </td>
                                                <td> Registration Fee </td>
                                                <td>'.$row['name'].'</td>
                                                <td class="center">'.$row['reg_fee'].'</td>
                                            </tr>';
                                            $i++;
                                            $total+=$row['reg_fee'];
                                         }
                                    }

                                ?>



                                </tbody>
                                <tfoot>
                              		<tr>
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
            </div>



            <div id="tab-3" class="tab-pane <?php echo @$a3;?>">
                            <div class="ibox-title">
                                <h5>  Game Purpose revenue </h5>
                            </div>
                    <div class="ibox-content">
                      <div class="row">
                                      <div class="col-md-12 col-sm-12">
                                          <form action="revenue.php" id="report_order" method="GET" class="form-inline">

                                              <div class="form-group" id="search_data">
                                                <div class="input-group date">
                                                    <!-- <label class="sr-only">Order From Date</label> -->
                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                    <input type="text" id="order_from_date" name="pro_from_date" class="form-control" placeholder="From Date">
                                                </div>
                                              </div>
                                              <input type="hidden" name="a" value="3">
                                              <div class="form-group" id="search_data">
                                              <div class="input-group date">
                                                  <!-- <label class="sr-only">Order To Date</label> -->
                                                  <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                  <input type="text" id="order_to_date" name="pro_to_date" class="form-control" placeholder="To Date">
                                              </div>
                                            </div>

                                              <input type="submit" id="submit" name="submit" value="Search" class="btn btn-primary">
                                              <a href="revenue.php?a=3"
                                                 class="btn btn-primary">All</a>
                                          </form>
                                      </div>
                                  </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Sl.</th>
                                    <th> Date </th>
                                    <th> Revenue Type </th>
                                    <th>Revenue from</th>
                                    <th>Amount </th>
                                </tr>
                                </thead>
                                <tbody>
                                     <?php

                                    //$sql="SELECT * FROM payment";
                                    $i=1;
                                    $total=0;

                                    //$sql="SELECT * FROM game";
                                    if (@$result=mysqli_query($con,$game_sql)) {
                                        while ($row=mysqli_fetch_assoc($result)) {
                                          if ($row['amount']==0) {
                                            continue;
                                          }

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
                                            echo '<tr class="gradeA">
                                                <td>'.$i.' </td>
                                                <td>'.date("Y-M-d",strtotime($row['date'])).' </td>
                                                <td> '.$it.' </td>
                                                <td>'.$row['name'].'</td>
                                                <td class="center">'.$row['amount'].'</td>
                                            </tr>';
                                            $i++;
                                            $total+=$row['amount'];
                                         }
                                    }

                                ?>



                                </tbody>
                                <tfoot>
                                  <tr>
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
            </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

<!--  put footer at the end of page-wrapper -->
<?php include "footer.php"; ?>



<script src="js/plugins/dataTables/datatables.min.js"></script>
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
          				var j = 4;
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
    <?php
}
?>