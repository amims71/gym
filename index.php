<?php 
    include "header.php";
            if ($_SESSION['id']==1) {
                
            $start_date=date("Y-m-01");
            $end_date=date("Y-m-t");

            $prev_start=date("Y-m-01",strtotime("previous month"));
            $prev_end=date("Y-m-t",strtotime("previous month"));

            $sql="SELECT SUM(payment) as total_monthly FROM payment WHERE payment_date>='$start_date' AND payment_date<='$end_date'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $total_monthly= $row['total_monthly'];
            $sql="SELECT SUM(reg_fee) as total_reg FROM user WHERE date>='$start_date' AND date<='$end_date'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $total_reg= $row['total_reg'];
            $total_monthly+=$total_reg;

            $sql1="SELECT SUM(payment) as total_prev FROM payment WHERE payment_date>='$prev_start' AND payment_date<='$prev_end'";
            $result1=mysqli_query($con,$sql1);
            $row1=mysqli_fetch_assoc($result1);
            $total_prev= $row1['total_prev'];
            $sql="SELECT SUM(reg_fee) as reg_prev FROM user WHERE date>='$prev_start' AND date<='$prev_end'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $reg_prev= $row['reg_prev'];

            $total_prev+=$reg_prev;

            $def=$total_monthly-$total_prev;
            @$per_inc=($def/$total_monthly)*100;
            if ($def<0) {
                $class_income="fa fa-level-down";
                $class_color="danger";
            } else{
                $class_income="fa fa-level-up";
                $class_color="success";
            }



            $sql="SELECT SUM(cost) as total_expens FROM expens WHERE date>='$start_date' AND date<='$end_date'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $total_reg= $row['total_expens'];
            $sql="SELECT SUM(cost) as total_repair FROM eq_repair WHERE finish_date>='$start_date' AND finish_date<='$end_date'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $total_reg+= $row['total_repair'];
            $sql="SELECT SUM(price) as total_detail FROM eq_detail WHERE date>='$start_date' AND date<='$end_date'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $total_reg+= $row['total_detail'];




            $sql="SELECT SUM(cost) as total_expens FROM expens WHERE date>='$prev_start' AND date<='$prev_end'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $total_prev= $row['total_expens'];
            $sql="SELECT SUM(cost) as total_repair FROM eq_repair WHERE finish_date>='$prev_start' AND finish_date<='$prev_end'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $total_prev+= $row['total_repair'];
            $sql="SELECT SUM(price) as total_detail FROM eq_detail WHERE date>='$prev_start' AND date<='$prev_end'";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $total_prev+= $row['total_detail'];


            $def=$total_reg-$total_prev;
            @$per_cost=($def/$total_reg)*100;
            if ($def<0) {
                $class_cost="fa fa-level-down";
                $class_color_cost="success";
            } else{

                $class_cost="fa fa-level-up";
                $class_color_cost="danger";
            }




            $d1=date("Y-m-")."1";
            $d2=date("Y-m-t", strtotime('+5 years'));
            $sql="SELECT * FROM user WHERE date>='$d1' AND date<='$d2'";
            $result=mysqli_query($con,$sql);
            $this_user=mysqli_num_rows($result);
            $sql="SELECT * FROM user";
            if ($result=mysqli_query($con,$sql)) {
                $total_user=mysqli_num_rows($result);
                $prev_user=$total_user-$this_user;
                $prev_month=date("M-Y",strtotime("previous month"));
                $cur_month=date('M-Y');
                $active=0;
                $inactive=0;
                $sql2="SELECT * FROM payment WHERE pay_for='$cur_month'";
                if ($result=mysqli_query($con,$sql2)) {
                    $active=mysqli_num_rows($result);
                    $inactive=$total_user-$active;
                }

                $sql2="SELECT * FROM payment WHERE pay_for='$prev_month'";
                if ($result=mysqli_query($con,$sql2)) {
                    $prev_active=mysqli_num_rows($result);
                    $prev_inactive=$prev_user-$prev_active;
                }
            }

            $def_active=$active-$prev_active;
            $def_inactive=$inactive-$prev_inactive;
            if ($def_active>0) {
                $class_active="fa fa-level-up";
                $class_color_active="success";
            } else{

                $class_active="fa fa-level-down";
                $class_color_active="danger";
            }

            @$per_active=($def_active/$active)*100;
            @$per_inactive=($def_inactive/$inactive)*100;
            if ($def_inactive<0) {
                $class_inactive="fa fa-level-down";
                $class_color_inactive="success";
            } else{

                $class_inactive="fa fa-level-up";
                $class_color_inactive="danger";
            }

            //date("Y-m-d H:i:s",strtotime("-5 month"));
            $labels=array();
            $income=array();
            $cost=array();
            $actives=array();
            $inactives=array();
            for ($i=3; $i >= 0; $i--) {
                $start_date=date("Y-m-01",strtotime("-".$i." month"));
                $end_date=date("Y-m-t",strtotime("-".$i." month"));
                $label=date("F",strtotime("-".$i." month"));
                array_push($labels, '"'.$label.'"');

                $d2s=date("Y-m-t", strtotime('+5 years'));
                $d1s=date("Y-m-01", strtotime('-'.($i-1).' month'));
                $special_check=date("M-Y", strtotime($d1s));
                $sql="SELECT * FROM user WHERE date>='$d1s' AND date<='$d2s'";
                // $sql="SELECT * FROM user INNER JOIN payment ON user.uid=payment.uid WHERE date>='$d1s' AND date<='$d2s' AND pay_for='$special_check'";
                $result=mysqli_query($con,$sql);
                @$minus=mysqli_num_rows($result);

                $sql="SELECT * FROM user";
                $result=mysqli_query($con,$sql);
                $totals=mysqli_num_rows($result);
                $totals=$totals-$minus;

                $month=date("M-Y",strtotime("-".$i." month"));
                $sql="SELECT * FROM payment WHERE pay_for='$month'";
                $result=mysqli_query($con,$sql);
                $activess=mysqli_num_rows($result);
                array_push($actives, '"'.$activess.'"');
                $inactivess=$totals-$activess;
                array_push($inactives, '"'.$inactivess.'"');

                $sql="SELECT SUM(payment) as total_monthly FROM payment WHERE payment_date>='$start_date' AND payment_date<='$end_date'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                $total_monthly= $row['total_monthly'];
                $sql="SELECT SUM(reg_fee) as total_reg FROM user WHERE date>='$start_date' AND date<='$end_date'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                $total_reg= $row['total_reg'];
                $total_monthly+=$total_reg;
                array_push($income, $total_monthly);

                $sql="SELECT SUM(cost) as total_expens FROM expens WHERE date>='$start_date' AND date<='$end_date'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                $total_reg= $row['total_expens'];
                $sql="SELECT SUM(cost) as total_repair FROM eq_repair WHERE finish_date>='$start_date' AND finish_date<='$end_date'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                $total_reg+= $row['total_repair'];
                $sql="SELECT SUM(price) as total_detail FROM eq_detail WHERE date>='$start_date' AND date<='$end_date'";
                $result=mysqli_query($con,$sql);
                $row=mysqli_fetch_assoc($result);
                $total_reg+= $row['total_detail'];
                array_push($cost, $total_reg);
            }
            $labels=implode(",", $labels);
            $income=implode(",", $income);
            $cost=implode(",", $cost);
            $actives=implode(",", $actives);
            $inactives=implode(",", $inactives);

              ?>

                <div class="wrapper wrapper-content">
        <div class="row">
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Income</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($total_monthly);?></h1>
                                <div class="stat-percent font-bold text-<?php echo $class_color;?>"><?php echo number_format($per_inc,2);?>% <i class="<?php echo $class_income;?>"></i></div>
                                <small>Total income</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly</span>
                                <h5>Cost</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($total_reg);?></h1>
                                <div class="stat-percent font-bold text-<?php echo $class_color_cost;?>"><?php echo number_format($per_cost,2);?>% <i class="<?php echo $class_cost;?>"></i></div>
                                <small>Total Costs</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly </span>
                                <h5>Active Users</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($active);?></h1>
                                <div class="stat-percent font-bold text-<?php echo $class_color_active;?>"><?php echo number_format($per_active,2);?>% <i class="<?php echo $class_active;?>"></i></div>
                                <small>Total Active Users</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <span class="label label-success pull-right">Monthly </span>
                                <h5>Inactive Users</h5>
                            </div>
                            <div class="ibox-content">
                                <h1 class="no-margins"><?php echo number_format($inactive);?></h1>
                                <div class="stat-percent font-bold text-<?php echo $class_color_inactive;?>"><?php echo number_format($per_inactive,2);?>% <i class="<?php echo $class_inactive;?>"></i></div>
                                <small>Total Inactive Users</small>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
                 <div class="col-lg-9">
                    <div class="row">
                      <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Cost and Revenue</h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="barChart" height="220px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Active and Inactive User</h5>
                        </div>
                        <div class="ibox-content">
                            <div>
                                <canvas id="barChart1" height="220px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



<?php

$fits=0;
$damages=0;
$repairs=0;
$constructing=0;
$alls=0;

$sql="SELECT DISTINCT eid FROM eq_detail";
$result=mysqli_query($con,$sql);
while ($row=mysqli_fetch_assoc($result)) {
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
    }
    $fit=$all-($repaired+$damaged+$constr);
    $fits+=$fit;

    $repaired+=$rrepaired;
    $repairs+=$repaired;

    $damaged+=$rdamaged;
    $damages+=$damaged;

    $constr+=$rconstr;
    $constructing+=$constr;

    $alls+=$all;

}

@$fitss=($fits/$alls)*100;
@$repairss=($repairs/$alls)*100;
@$damagess=($damages/$alls)*100;
@$constructings=($constructing/$alls)*100;


?>







                               <div class="col-lg-3" >
                                 <div class="ibox-title">
                                     <h5>Equipment Details</h5>
                                 </div>
            <div class="ibox-content" height="240">
                                <div>
                                    <div>
                                        <span>Fit</span>
                                        <small class="pull-right"><?php echo $fits?>/<?php echo $alls?></small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: <?php echo $fitss?>%;" class="progress-bar"></div>
                                    </div>

                                    <div>
                                        <span>Repaired</span>
                                        <small class="pull-right"><?php echo $repairs?></small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: <?php echo $repairss?>%;" class="progress-bar"></div>
                                    </div>

                                    <div>
                                        <span>Under Repairment</span>
                                        <small class="pull-right"><?php echo $constructing?></small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: <?php echo $constructings?>%;" class="progress-bar"></div>
                                    </div>
                                     <div>
                                        <span>Damaged</span>
                                        <small class="pull-right"><?php echo $damages?></small>
                                    </div>
                                    <div class="progress progress-small">
                                        <div style="width: <?php echo $damagess?>%;" class="progress-bar"></div>
                                    </div>
                                </div>
                            </div>

        </div>

    </div>

    <?php
            }

            ?>
               <?php include "footer.php";  ?>


               <script type="text/javascript">
                   $(document).ready(function() {

         var barData = {
        labels: [<?php echo $labels?>],
        datasets: [
            {
                label: "Income",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [<?php echo $income?>]
            },
            {
                label: "Cost",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [<?php echo $cost?>]
            }
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("barChart").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});

    ////////////////////////////2nd Bar Chart/////////////////////////////////////////////////
        var barData = {
        labels: [<?php echo $labels?>],
        datasets: [
            {
                label: "Active",
                backgroundColor: 'rgba(26,179,148,0.5)',
                borderColor: "rgba(26,179,148,0.7)",
                pointBackgroundColor: "rgba(26,179,148,1)",
                pointBorderColor: "#fff",
                data: [<?php echo $actives?>]
            },
            {
                label: "Inactive",
                backgroundColor: 'rgba(220, 220, 220, 0.5)',
                pointBorderColor: "#fff",
                data: [<?php echo $inactives?>]
            }
        ]
    };

    var barOptions = {
        responsive: true
    };


    var ctx2 = document.getElementById("barChart1").getContext("2d");
    new Chart(ctx2, {type: 'bar', data: barData, options:barOptions});


        });
               </script>
