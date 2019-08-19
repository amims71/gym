<?php
include 'inc/db.php';
if(isset($_GET['i'])&&isset($_GET['d'])&&isset($_GET['p'])&&isset($_GET['n'])){
    if (!empty($_GET['i'])&&!empty($_GET['d'])&&!empty($_GET['p'])&&!empty($_GET['n'])) {
        $n=$_GET['n'];
        $d=$_GET['d'];
        if (isset($_GET['r'])) {
            if (!empty($_GET['r'])) {
                $reg=$_GET['r'];
                $month=$_GET['m'];
                $inv="#000".$_GET['i']."-".$_GET['p'];
                
                $pr='<tr>
                        <td>Registraton Fee</td>
                        <td class="alignright">'.$reg.' BDT</td>
                    </tr>
                    <tr>
                        <td>Monthly Fee for '.$_GET['f'].'</td>
                        <td class="alignright">'.$month.' BDT</td>
                    </tr>';
                    $total=$month+$reg;
                    $sql="INSERT INTO invoice  VALUES ('','$inv','$n','$total','Registration',NOW())";
            }
        } else if(isset($_GET['g'])){
            $game=$_GET['g'];
                $inv="#000".$_GET['i']."-".$_GET['p'];

                $pr='<tr>
                        <td>Game('.$_GET['it'].') Fee for '.date("d M, Y",strtotime($d)).'</td>
                        <td class="alignright">'.$game.' BDT</td>
                    </tr>
                    <tr><td>(Estimated start time: '.$_GET['start'].')</td></tr>';
                    $total=$game;
                    $redirect=1;
                    $sql="INSERT INTO invoice  VALUES ('','$inv','$n','$total','Game zone',NOW())";


        } else{
                $month=$_GET['m'];
                $inv="#000".$_GET['i']."-".$_GET['p'];

                $pr='<tr>
                        <td>Monthly Fee for '.$_GET['f'].'</td>
                        <td class="alignright">'.$month.' BDT</td>
                    </tr>';
                    $total=$month;
                    $sql="INSERT INTO invoice  VALUES ('','$inv','$n','$total','Monthly',NOW())";
        }
        mysqli_query($con,$sql);
    }
}
$all_query="SELECT * FROM user WHERE uid='".$_GET['i']."'";
$result=mysqli_query($con,$all_query);
$row=mysqli_fetch_assoc($result);
    $inv="#000".$_GET['i']."-".$_GET['p'];
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Techcity | Invoice Print </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="favicon.png" rel="shortcut icon" type="image/x-icon">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">


    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <link href="css/plugins/select2/select2.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet">
    <link href="css/custom-style.css" rel="stylesheet">

    <link href="css/plugins/clockpicker/clockpicker.css" rel="stylesheet">

    <!--CSS for Image Uploaded -->
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

    <!--Datbase table view-->
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">

</head>
<style>
    #example1{
        box-sizing: content-box;
        width: 100px;

        padding: 30px;
        border-top: 2px solid blue;
        margin-top: 50px;
    }
    #example2{
        box-sizing: content-box;
        width: 100px;

        padding: 30px;
        border-top: 2px solid blue;
        margin-top: 50px;
        margin-left: 200px;
    }
    #border{
        border-bottom: 2px dot-dash black;
    }
    .form-horizontal .control-label {
        text-align: left;
    }
</style>
<div class="wrapper wrapper-content animated fadeInRight">
<div class="container">
        <div class="row">

        <div class="col-lg-12">

            <div class="ibox float-e-margins">

                <div class="ibox-title">
                    <img src="logo_techcity.png" height="80px" width="250px">

                    <div class="row">
                        <div class="col-sm-10">
                            <h4 style="margin-top: 30px; margin-left: 20px"> FORM NO  </h4>
                            <input value="<?php echo $inv;?>" disabled/>
                        </div>
                        <div class="col-sm-2">
                            <div class="pic" style="text-align: center"> <img src="<?php echo $row['image_location'];?>" height="100px" width="100px"> </div>
                        </div>
                    </div>
                </div>

                <div class="ibox-content">

                    <div class="body">
                        <div class="modal-body">
                            <form  class="form-horizontal" >
                                <div class="row" >

                                        <div class="col-sm-12">
                                            <div class="form-group"><label class="col-sm-2 control-label"> Full Name (Bangla) </label>

                                                <div class="col-sm-10"><input type="text" placeholder=" Name " name="name"
                                                                             class="form-control required"
                                                                             value="<?php echo $row['name_bangla']; ?>" disabled >
                                                </div>
                                            </div>
                                            <div class="form-group"><label class="col-sm-2 control-label"> Full Name (English) </label>

                                                <div class="col-sm-10"><input type="text" placeholder=" Name " name="name"
                                                                              class="form-control required"
                                                                              value="<?php echo $row['name']; ?>" disabled >
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                <div class="row" >

                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Occupation </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                          class="form-control required"
                                                                          value="<?php echo $row['occupation']; ?>" disabled >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Organization </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['organization'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Designation </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['designation'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Date Of Birth </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['dob'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Nationality </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['nationality'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> National Id No </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['nid'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="form-group"><label class="col-sm-3 control-label"> Father's name/ Mother's Name </label>

                                            <div class="col-sm-9"><input type="text"  name="name"
                                                                          class="form-control required"
                                                                          value="<?php echo $row['name_parent'];?>" disabled >
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 control-label"> Present Address </label>

                                            <div class="col-sm-10"><input type="text"  name="name"
                                                                          class="form-control required"
                                                                          value="<?php echo $row['address'];?>" disabled >
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-2 control-label"> Permanent Address </label>

                                            <div class="col-sm-10"><input type="text"  name="name"
                                                                          class="form-control required"
                                                                          value="<?php echo $row['address_permanent'];?>" disabled >
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Admission Date </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['date'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Mobile Number </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['phone'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>
        <?php
        $morning='';
        $afternoon='';
        $night='';
        if ($row['shift']=='morning') {
            $morning='yes';
        }else if($row['shift']=='afternoon'){
            $afternoon='yes';
        }else if ($row['shift']=='night') {
            $night='yes';
        }


        ?>

                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Shift: Morning </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $morning;?>" disabled >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Afternoon </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $afternoon;?>" disabled >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Night </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $night;?>" disabled >
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Membership Number </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['membership_no'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Weight </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['weight'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Height</label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['height'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="row" style="border-bottom: 1px dotted black">


                                    <div class="col-sm-4">
                                        <div id="example1">
                                            <h4 style="margin-top: -20px"> Member Signature</h4>
                                        </div>




                                    </div>
                                    <div class="col-sm-4">




                                    </div>
                                    <div class="col-sm-4">
                                        <div id="example2">
                                            <h4 style="margin-top: -20px"> TBL Authority</h4>
                                        </div>


                                    </div>

                                </div>

                                <div class="row" style="margin-top: 20px" >

                                    <div class="col-sm-4">
                                        <div class="image" style="margin-top: -20px">
                                            <img src="logo_techcity.png" >
                                        </div>

                                        </div>
                                    <div class="col-sm-4">
                                       <div class="money_recipt" style="border: 2px solid black; color: black; margin-top: 10px" >
                                           <h2 style="text-align: center"> MONEY RECEIPT</h2>
                                       </div>


                                    </div>
                                    <div class="col-sm-4" style="color: #0f4bac">
                                        <div class="gym">
                                            <h2> GYM & SPORTS CENTER </h2>
                                            <p> SHEIKH HASINA SOFTWARE TECHNOLOY PARK, JASHORE</p>
                                        </div>



                                    </div>

                                    </div>
                                <div class="row"  style="margin-top: 30px">

                                    <div class="col-sm-12">
                                        <div class="form-group"><label class="col-sm-2 control-label"> Full Name  </label>

                                            <div class="col-sm-10"><input type="text" placeholder=" Name " name="name"
                                                                          class="form-control required"
                                                                          value="<?php echo $row['name'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>

                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Batch No.</label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="" >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Shift Time </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['shift'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Date of Admission  </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['date'];?>" disabled >
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Totla Payment </label>

                                            <div class="col-sm-8"><input type="text"  name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $total;?>" disabled >
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="row" >


                                    <div class="col-sm-4">
                                        <div id="example1">
                                            <h4 style="margin-top: -20px"> Member Signature</h4>
                                        </div>




                                    </div>
                                    <div class="col-sm-4">




                                    </div>
                                    <div class="col-sm-4">
                                        <div id="example2">
                                            <h4 style="margin-top: -20px"> TBL Authority</h4>
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
        </div>
    </div>
</div>
</div>

<!-- <script type="text/javascript">
    window.print();
    window.onafterprint = function(event) {
        <?php
        if ($redirect==1) {
            // echo 'document.location.href = "gamezone.php";';
        } else{
            // echo 'document.location.href = "view_user.php";';
        }
        ?> 
    }
</script> -->

    

</html>
