<?php include "header.php"; ?>
<body>
<style>
    .button {
        text-align: center;
        padding-top: 20px;
        clear: both;
    }
</style>
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

                                <button type="submit" class="btn btn-primary" disabled>Yes</button>
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
                <form method="POST" action="inc/add_user.php" class="form-horizontal" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Add Users</h3>
                            <div class="row"> <!--First row option starts here-->
                                <div class="col-sm-6">
                                    <!-- Name Section starts here  -->
                                    <div class="form-group"><label class="col-sm-4 control-label">Full Name(Bangla) </label>

                                        <div class="col-sm-8"><input type="text" placeholder=" Full Name(Bangla) " name="name_bangla"
                                                                     class="form-control required" required>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-4 control-label"> Full Name </label>

                                        <div class="col-sm-8"><input type="text" placeholder="Full Name " name="name"
                                                                     class="form-control required" required>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-4 control-label">Father's / Mother's Name </label>

                                        <div class="col-sm-8"><input type="text" placeholder=" Name " name="name_parent"
                                                                     class="form-control required" required>
                                        </div>
                                    </div>


                                    <div class="form-group"><label class="col-sm-2 control-label">Occupation </label>

                                        <div class="col-sm-4"><input type="text"
                                                                     placeholder=" Occupation " name="occupation" class="form-control" required>
                                        </div>
                                        <label class="col-sm-2 control-label">Organization </label>
                                        <div class="col-sm-4"><input type="text"
                                                                     placeholder=" Organization " name="organization" class="form-control" required>
                                        </div>
                                    </div> 
                                    <div class="form-group"><label class="col-sm-2 control-label">Designation </label>

                                        <div class="col-sm-4"><input type="text"
                                                                     placeholder=" Designation " name="designation" class="form-control" required>
                                        </div>
                                        <label class="col-sm-2 control-label">Nationality </label>

                                        <div class="col-sm-4"><input type="text"
                                                                     placeholder=" Nationality " name="nationality" class="form-control" required>
                                        </div>
                                    </div> 

                                    <div class="form-group" id="data_1"><label class="col-sm-2 control-label">NID </label>

                                        <div class="col-sm-4"><input type="Number"
                                                                     placeholder=" National Id Card Number " name="nid"
                                                                     class="form-control" required>
                                        </div>
                                        <label class="col-sm-2 control-label">Date of Birth </label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i
                                                            class="fa fa-calendar"></i></span><input id="asd" name="dob" type="text" class="form-control" required>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group"><label class="col-sm-4 control-label"> Gender </label>

                                        <div class="col-sm-8"><label class="radio-inline">
                                                <input type="radio" name="sex" value="male" checked>Male
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="female">female
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="sex" value="other">Others
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group" ><label class="col-sm-4 control-label">Email Address </label>

                                        <div class="col-sm-8"><input type="email" placeholder=" Email Address " name="email" class="form-control" required>
                                        </div>                                        
                                    </div>


                                    <div class="form-group"><label class="col-sm-4 control-label"> Present Address </label>

                                        <div class="col-sm-8"><textarea type="text" placeholder="  Address "
                                                                        name="address_present" class="form-control" required> </textarea>
                                        </div>
                                    </div>


                                </div> <!--End of  First colum section -->
                                <!--starting second column section-->
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label">Mobile Number </label>

                                        <div class="col-sm-8"><input type="Number" placeholder="Mobile Number " name="phone" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group"><label class="col-sm-4 control-label"> Upload Image </label>
                                        <div class="col-sm-8">

                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <div class="form-control" data-trigger="fileinput"><i
                                                            class="glyphicon glyphicon-file fileinput-exists"></i> <span
                                                            class="fileinput-filename"></span></div>
                                                <span class="input-group-addon btn btn-default btn-file"><span
                                                            class="fileinput-new">Select file</span><span
                                                            class="fileinput-exists">Change</span><input type="file" id="image_location" name="image_location" required></span>
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists"
                                                   data-dismiss="fileinput">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group"><label class="col-sm-4 control-label"> Blood Group </label>

                                        <div class="col-sm-8">
                                            <select class="select2_demo_3 form-control" name="blood" required>
                                                <option></option>
                                                <option value="A+">A+</option>
                                                <option value="A-">A-</option>
                                                <option value="B+">B+</option>
                                                <option value="B-">B-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="O+">O+</option>
                                                <option value="O-">O-</option>
                                                <option value=" ">Unknown</option>
                                            </select>

                                        </div>
                                    </div>
                                    <!-- Heigth -->
                                    <div class="form-group"><label class="col-sm-2 control-label"> Height(feet) </label>

                                        <div class="col-sm-4"><input type="text" placeholder="  Height " name="height"
                                                                     class="form-control" required>
                                        </div>
                                        <label class="col-sm-2 control-label"> Weight(kg)  </label>

                                        <div class="col-sm-4"><input type="text" placeholder="  Weight " name="weight"
                                                                     class="form-control" required>
                                        </div>
                                    </div>

                                    

                                    <!-- reg_fee -->
                                    <div class="form-group"><label class="col-sm-2 control-label"> Registration
                                            Fee </label>

                                        <div class="col-sm-4"><input type="Number" placeholder="  Registration Fee  "
                                                                     name="reg_fee"
                                                                     class="form-control" required>
                                        </div>
                                        <label class="col-sm-2 control-label"> Monthly Fee </label>

                                        <div class="col-sm-4"><input type="Number" placeholder="  Monthly Fee  "
                                                                     name="monthly_fee"
                                                                     class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group" id="data_1">
                                        <label class="col-sm-2 control-label"> Membership No.</label>

                                        <div class="col-sm-4"><input type="Number" placeholder=" Membership No. "
                                                                     name="membership_no"
                                                                     class="form-control" required>
                                        </div>
                                        <label class="col-sm-2 control-label"> Enrollment Date </label>
                                        <div class="col-sm-4">
                                            <div class="input-group date">
                                                <span class="input-group-addon"><i
                                                            class="fa fa-calendar"></i></span><input id="asdf" type="text" class="form-control"name="date" required>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="form-group"><label class="col-sm-4 control-label"> Shift </label>

                                        <div class="col-sm-8"><label class="radio-inline">
                                                <input type="radio" name="shift" value="morning" checked>Morning
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="shift" value="afternoon">Afternoon
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="shift" value="night">Night
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group"><label class="col-sm-4 control-label"> Permanent Address </label>

                                        <div class="col-sm-8"><textarea type="text" placeholder="  Address "
                                                                        name="address_permanent" class="form-control" required> </textarea>
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
                                                <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
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
$query = mysqli_query($con, "SELECT * FROM user ") or die(mysql_error());

while ($row = mysqli_fetch_array($query)) {
    // echo "<pre>";print_r($row);echo "</pre>";
    // echo $row['uid'].'</br>';
    ?>

    <div id="modal-pay<?php echo $row['uid']; ?>" class="modal fade" aria-hidden="true;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="inc/payment.php" class="form-horizontal">
                        <div class="row">
                            <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Payment</h3>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Name </label>

                                            <div class="col-sm-8"><input type="text" name="name"
                                                                         value="<?php echo $row['name'] ?>"
                                                                         class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group"><label class="col-sm-4 control-label"> Phone </label>

                                            <div class="col-sm-8"><input type="text" name="phone"
                                                                         value="<?php echo $row['phone'] ?>"
                                                                         class="form-control" required>
                                            </div>
                                        </div>
                                    </div> <!--End of  First colum section -->
                                    <!--starting second column section-->
                                    <div class="col-sm-6">
                                        <div class="form-group"><label class="col-sm-4 control-label"> Payment
                                                Amount </label>

                                            <div class="col-sm-8"><input type="number" name="monthly_fee"
                                                                         value="<?php echo $row['monthly_fee'] ?>"
                                                                         class="form-control" required>
                                                <input type="hidden" name="uid" value="<?php echo $row['uid'] ?>">
                                                <input type="hidden" name="monthly_fees"
                                                       value="<?php echo $row['monthly_fee'] ?>">
                                            </div>
                                        </div>

                                        <!-- Date     -->
                                        <div class="form-group" id="data_2">

                                            <label class="col-sm-4 control-label"> Month </label>
                                            <div class="col-sm-8">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span><input id="asd"
                                                                                                         type="text"
                                                                                                         name="payment_date"
                                                                                                         class="form-control" required>
                                                </div>
                                            </div>
                                        </div>  <!--  end of Enrollment Date    -->
                                        <!--  <div class="form-group" id="data_1">

                                             <label class="col-sm-4 control-label">Payment  Date  </label>
                                             <div class="col-sm-8">
                                                 <div class="input-group month">
                                                     <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" name="payment_date" class="form-control" required>
                                                 </div>
                                             </div>
                                         </div>    end of exp_date      -->

                                    </div> <!--Ending second column option -->
                                </div>
                            </div>

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
                                            <button class="btn btn-white" data-dismiss="modal" type="submit">Cancel</button>
	                                    	<button type="submit" class="btn btn-primary">Submit</button>
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
if ($_SESSION['id']==1) {
    $edit='<a data-toggle="modal" href="#modal' . $row['uid'] . '"><i class="fa fa-edit"></i></a>';
    $del='<a data-toggle="modal" href="#modal-delete"><i class="fa fa-trash"></i></a>';
    ?>

        <div id="modal<?php echo $row['uid']; ?>" class="modal fade" aria-hidden="true">
        <div class="modal-dialog" style="width:70%;">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="inc/update_user.php" class="form-horizontal"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">Update Users</h3>
                                <div class="row"> <!--First row option starts here-->
                                    <div class="col-sm-6">
                                        <!-- Name Section starts here  -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Name</label>

                                            <div class="col-sm-8"><input type="text" placeholder=" Name " name="name"
                                                                         class="form-control" required
                                                                         value="<?php echo $row['name']; ?>">
                                            </div>
                                        </div>  <!--  End of Name Section starts here  -->
                                        <!-- NId number section -->

                                        <div class="form-group"><label class="col-sm-4 control-label">NID</label>

                                            <div class="col-sm-8"><input type="Number"
                                                                         placeholder=" National Id Card Number "
                                                                         name="nid"
                                                                         class="form-control" required
                                                                         value="<?php echo $row['nid']; ?>">
                                            </div>
                                        </div>  <!-- NId number section -->

                                        <!--  Email Address Section  -->

                                        <div class="form-group"><label class="col-sm-4 control-label">Email
                                                Address</label>

                                            <div class="col-sm-8"><input type="email" placeholder=" Email Address "
                                                                         name="email"
                                                                         class="form-control" required
                                                                         value="<?php echo $row['email']; ?>">
                                            </div>
                                        </div>


                                        <!-- Mobile Number Section  -->

                                        <div class="form-group"><label class="col-sm-4 control-label">Mobile
                                                Number</label>

                                            <div class="col-sm-8"><input type="Number" placeholder="Mobile Number "
                                                                         name="phone"
                                                                         class="form-control" required
                                                                         value="<?php echo $row['phone']; ?>">
                                            </div>
                                        </div>

                                        <!-- Address Section here  -->


                                        <div class="form-group"><label class="col-sm-4 control-label"> Remarks</label>

                                            <div class="col-sm-8"><textarea type="text" placeholder="  Address "
                                                                            name="address" required
                                                                            class="form-control" required><?php echo $row['address_present']; ?> </textarea>
                                            </div>
                                        </div>

                                        <!-- Age section   -->
                                        <div class="form-group" id="data_1">

                                            <label class="col-sm-4 control-label">Date of Birth</label>
                                            <div class="col-sm-8">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span><input name="dob" type="text" class="form-control" required value="<?php echo date("m/d/Y", strtotime($row['dob'])); ?>" disabled>
                                                </div>
                                            </div>
                                        </div><!--  End of Age section   -->


                                        <!-- Gender  -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Gender </label>

                                            <div class="col-sm-8"><label class="radio-inline">
                                                    <input type="radio" name="sex" value="male" checked>Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="sex" value="female">female
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="sex" value="other">Others
                                                </label>
                                            </div>
                                        </div>  <!-- end of  Gender  -->

                                        <div class="form-group"><label class="col-sm-4 control-label"> Remarks </label>

                                            <div class="col-sm-8"><textarea type="text" value="<?php echo $row['remarks']; ?>"
                                                                            name="remarks" class="form-control" required> </textarea>
                                            </div>
                                        </div>


                                    </div> <!--End of  First colum section -->
                                    <!--starting second column section-->
                                    <div class="col-sm-6">
                                        <!-- Heigth -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Height </label>

                                            <div class="col-sm-8"><input type="Number" placeholder="  Height "
                                                                         name="height"
                                                                         class="form-control" required
                                                                         value="<?php echo $row['height']; ?>">
                                            </div>
                                        </div>

                                        <!-- Weight  -->

                                        <div class="form-group"><label class="col-sm-4 control-label"> Weight </label>

                                            <div class="col-sm-8"><input type="Number" placeholder="  Weight "
                                                                         name="weight"
                                                                         class="form-control" required
                                                                         value="<?php echo $row['weight']; ?>">
                                            </div>
                                        </div>
                                        <!-- Blood Group  -->

                                        <div class="form-group"><label class="col-sm-4 control-label"> Blood
                                                Group </label>

                                            <div class="col-sm-8">
                                                <select class="select2_demo_3 form-control" name="blood">
                                                    <option value="<?php echo $row['blood']; ?>"><?php echo $row['blood']; ?></option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                    <option value=" ">Unknown</option>
                                                </select>

                                                <!--
                                                </select> -->

                                            </div>
                                        </div>

                                        <!-- reg_fee -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Registration
                                                Fee </label>

                                            <div class="col-sm-8"><input type="Number"
                                                                         placeholder="  Registration Fee  "
                                                                         name="reg_fee"
                                                                         class="form-control" required
                                                                         value="<?php echo $row['reg_fee']; ?>"
                                                                         disabled>
                                            </div>
                                        </div>
                                        <!-- monthly_fee   -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Monthly
                                                Fee </label>

                                            <div class="col-sm-8"><input type="Number" placeholder="  Monthly Fee  "
                                                                         name="monthly_fee"
                                                                         class="form-control"
                                                                         value="<?php echo $row['monthly_fee']; ?>"
                                                                         disabled>
                                            </div>
                                        </div>
                                        <!-- Image    -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Upload
                                                Image </label>
                                            <div class="col-sm-8">

                                                <div class="fileinput fileinput-new input-group"
                                                     data-provides="fileinput">
                                                    <div class="form-control" data-trigger="fileinput"><i
                                                                class="glyphicon glyphicon-file fileinput-exists"></i>
                                                        <span
                                                                class="fileinput-filename"
                                                                disabled><?php echo $row['image_location']; ?></span>
                                                    </div>
                                                    <span class="input-group-addon btn btn-default btn-file"
                                                          disabled><span class="fileinput-new"
                                                                         disabled>Select file</span><span
                                                                class="fileinput-exists">Change</span><input type="file"
                                                                                                             id="image_location"
                                                                                                             name="image_location"
                                                                                                             disabled></span>
                                                    <a href="#"
                                                       class="input-group-addon btn btn-default fileinput-exists"
                                                       data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- Enrollment Date    -->
                                        <div class="form-group" id="data_1">

                                            <label class="col-sm-4 control-label"> Enrollment Date </label>
                                            <div class="col-sm-8">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span><input type="text"
                                                                                                         class="form-control"
                                                                                                         name="date"
                                                                                                         value="<?php echo date("m/d/Y", strtotime($row['date'])); ?>"
                                                                                                         disabled>
                                                </div>
                                            </div>
                                        </div>  <!--  end of Enrollment Date    -->

                                    </div> <!--Ending second column option -->


                                </div> <!--First Row ends here -->
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
                                                <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
                                                <button class="btn btn-white" data-dismiss="modal">Cancel</button>
                                                <button id="update<?php echo $row['uid']; ?>" class="btn btn-primary">
                                                    Submit
                                                </button>
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
} else{
    $edit='';
    $del='';
}
?>


    <div id="modal-view<?php echo $row['uid']; ?>" class="modal fade" aria-hidden="true">
        <div class="modal-dialog" style="width:70%;">
            <div class="modal-content">
                <div class="modal-body">
                    <form method="POST" action="inc/update_user.php" class="form-horizontal"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12"><h3 class="m-t-none m-b navbar-static-top">User Details</h3>


                                <div class="row"> <!--First row option starts here-->
                                    <div class="col-sm-6">
                                        <!-- Name Section starts here  -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Name</label>

                                            <div class="col-sm-8"><input type="text" placeholder=" Name " name="name"
                                                                         class="form-control required"
                                                                         value="<?php echo $row['name']; ?>" disabled>
                                            </div>
                                        </div>  <!--  End of Name Section starts here  -->
                                        <!-- NId number section -->

                                        <div class="form-group"><label class="col-sm-4 control-label">NID</label>

                                            <div class="col-sm-8"><input type="Number"
                                                                         placeholder=" National Id Card Number "
                                                                         name="nid"
                                                                         class="form-control"
                                                                         value="<?php echo $row['nid']; ?>" disabled>
                                            </div>
                                        </div>  <!-- NId number section -->

                                        <!--  Email Address Section  -->

                                        <div class="form-group"><label class="col-sm-4 control-label">Email
                                                Address</label>

                                            <div class="col-sm-8"><input type="email" placeholder=" Email Address "
                                                                         name="email"
                                                                         class="form-control"
                                                                         value="<?php echo $row['email']; ?>" disabled>
                                            </div>
                                        </div>


                                        <!-- Mobile Number Section  -->

                                        <div class="form-group"><label class="col-sm-4 control-label">Mobile
                                                Number</label>

                                            <div class="col-sm-8"><input type="Number" placeholder="Mobile Number "
                                                                         name="phone"
                                                                         class="form-control"
                                                                         value="<?php echo $row['phone']; ?>" disabled>
                                            </div>
                                        </div>

                                        <!-- Address Section here  -->


                                        <div class="form-group"><label class="col-sm-4 control-label"> Address</label>

                                            <div class="col-sm-8"><textarea type="text" placeholder="  Address "
                                                                            name="address" class="form-control"
                                                                            disabled><?php echo $row['address']; ?> </textarea>
                                            </div>
                                        </div>

                                        <!-- Age section   -->
                                        <div class="form-group" id="data_1">

                                            <label class="col-sm-4 control-label">Date of Birth</label>
                                            <div class="col-sm-8">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span><input name="dob"
                                                                                                         type="text"
                                                                                                         class="form-control"
                                                                                                         value="<?php echo date("m/d/Y", strtotime($row['dob'])); ?>"
                                                                                                         disabled>
                                                </div>
                                            </div>
                                        </div><!--  End of Age section   -->


                                        <!-- Gender  -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Gender </label>

                                            <div class="col-sm-8"><label class="radio-inline">
                                                    <input type="radio" name="sex" value="male" disabled checked>Male
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="sex" value="female" disabled>female
                                                </label>
                                                <label class="radio-inline">
                                                    <input type="radio" name="sex" value="other" disabled>Others
                                                </label>
                                            </div>
                                        </div>  <!-- end of  Gender  -->

                                        <div class="form-group"><label class="col-sm-4 control-label"> Remarks </label>

                                            <div class="col-sm-8"><textarea type="text"
                                                                            name="remarks" class="form-control" disabled > <?php echo $row['remarks']; ?> </textarea>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="col-sm-6">

                                        <div class="form-group"><label class="col-sm-4 control-label"> Height </label>

                                            <div class="col-sm-8"><input type="Number" placeholder="  Height "
                                                                         name="height"
                                                                         class="form-control"
                                                                         value="<?php echo $row['height']; ?>" disabled>
                                            </div>
                                        </div>

                                        <div class="form-group"><label class="col-sm-4 control-label"> Weight </label>

                                            <div class="col-sm-8"><input type="Number" placeholder="  Weight "
                                                                         name="weight"
                                                                         class="form-control"
                                                                         value="<?php echo $row['weight']; ?>" disabled>
                                            </div>
                                        </div>
                                        <!-- Blood Group  -->

                                        <div class="form-group"><label class="col-sm-4 control-label"> Blood
                                                Group </label>

                                            <div class="col-sm-8">
                                                <select class="select2_demo_3 form-control" name="blood" disabled>
                                                    <option value="<?php echo $row['blood']; ?>"><?php echo $row['blood']; ?></option>
                                                    <option value="A+">A+</option>
                                                    <option value="A-">A-</option>
                                                    <option value="B+">B+</option>
                                                    <option value="B-">B-</option>
                                                    <option value="AB+">AB+</option>
                                                    <option value="AB-">AB-</option>
                                                    <option value="O+">O+</option>
                                                    <option value="O-">O-</option>
                                                    <option value=" ">Unknown</option>
                                                </select>

                                                <!--
                                                </select> -->

                                            </div>
                                        </div>

                                        <!-- reg_fee -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Registration
                                                Fee </label>

                                            <div class="col-sm-8"><input type="Number"
                                                                         placeholder="  Registration Fee  "
                                                                         name="reg_fee"
                                                                         class="form-control"
                                                                         value="<?php echo $row['reg_fee']; ?>"
                                                                         disabled>
                                            </div>
                                        </div>
                                        <!-- monthly_fee   -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Monthly
                                                Fee </label>

                                            <div class="col-sm-8"><input type="Number" placeholder="  Monthly Fee  "
                                                                         name="monthly_fee"
                                                                         class="form-control"
                                                                         value="<?php echo $row['monthly_fee']; ?>"
                                                                         disabled>
                                            </div>
                                        </div>
                                        <!-- Image    -->
                                        <div class="form-group"><label class="col-sm-4 control-label"> Upload
                                                Image </label>
                                            <div class="col-sm-8">
                                                <a href="<?php echo $row['image_location']; ?>" target="_blank"><img src="<?php echo $row['image_location']; ?>" width="100px"
                                                     height="100px"></a>
                                            </div>
                                        </div>


                                        <!-- Enrollment Date    -->
                                        <div class="form-group" id="data_1">

                                            <label class="col-sm-4 control-label"> Enrollment Date </label>
                                            <div class="col-sm-8">
                                                <div class="input-group date">
                                                    <span class="input-group-addon"><i
                                                                class="fa fa-calendar"></i></span><input type="text"
                                                                                                         class="form-control"
                                                                                                         name="date"
                                                                                                         value="<?php echo date("m/d/Y", strtotime($row['date'])); ?>"
                                                                                                         disabled>
                                                </div>
                                            </div>
                                        </div>  <!--  end of Enrollment Date    -->

                                    </div> <!--Ending second column option -->


                                </div> <!--First Row ends here -->
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="button text-center">
                                            <div class="form-group">
                                                <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
                                                <button class="btn btn-white" data-dismiss="modal">Cancel</button>
                                                <!-- <button id="update<?php echo $row['uid']; ?>" class="btn btn-primary">Submit</button> -->
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
                    <h5> User Information </h5>
                    <a class="btn-primary pull-right btn-sm" href="#modal-add" data-toggle="modal">Add User</a>

                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>

                                <th>Sl.</th>
                                <th hidden>NID</th>
                                <th> Name</th>

                                <th>Email Address</th>
                                <th>Mobile Number</th>
                                <th>Address</th>
                                <th hidden>Date Of Birth</th>
                                <th hidden>Sex</th>
                                <th hidden>Height</th>
                                <th hidden>Weight</th>
                                <th hidden>Blood Group</th>
                                <th hidden>Registration Fee</th>
                                <th hidden>Monthly Fee</th>

                                <th>Current Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            //$query = mysqli_query($con,"SELECT * FROM user ")or die(mysql_error());

                            // while ($row = mysqli_fetch_array($query)) {

                            $sql = "SELECT * FROM user";
                            if ($result = mysqli_query($con, $sql)) {
                                // echo "<pre>";print_r($result);echo "</pre>";
                                $i = 1;
                                while ($row = mysqli_fetch_array($result)) {

                                    $sql2 = "SELECT * FROM payment WHERE uid=" . $row['uid'];
                                    //echo mysqli_query($con,$sql);
                                    if ($result2 = mysqli_query($con, $sql2)) {
                                        $status = '<span class="label label-danger">Inactive</span>';
                                        while ($row2 = mysqli_fetch_assoc($result2)) {
                                            // $ch2=date('m-Y',strtotime($row2['pay_for']));
                                            // $ch=date('m-Y');

                                            if (date('F Y', strtotime($row2['pay_for'])) == date('F Y')) {
                                                $status = '<span class="label label-primary">Active</span>';
                                            }
                                        }
                                    } else {
                                        echo "asdfghjk";
                                    }


                                    echo '<tr class="gradeA">
                                   

                                    <td>' . $i . ' </td>
                                     <td hidden>' . $row['nid'] . '</td>
                                    <td>' . $row['name'] . ' </td>
                                 
                                    <td class="center">' . $row['email'] . '</td>
                                    <td class="center">' . $row['phone'] . '</td>
                                    <td class="center">' . $row['address'] . '</td>
                                    <td hidden>' . $row['dob'] . '</td>
                                    <td hidden>' . $row['sex'] . '</td>
                                    <td hidden>' . $row['height'] . '</td>
                                    <td hidden>' . $row['weight'] . '</td>
                                    <td hidden>' . $row['blood'] . '</td>
                                    <td hidden>' . $row['reg_fee'] . '</td>
                                    <td hidden>' . $row['monthly_fee'] . '</td>
                                   
                                   
                                 
                                    <td class="client-status center">' . $status . '</td>
                                    <td class="center">
                                        '.$edit.'
                                        '.$del.'
                                        <a data-toggle="modal" href="#modal-view' . $row['uid'] . '"><i class="fa fa-eye"></i></a>
                                        <a data-toggle="modal" href="#modal-pay' . $row['uid'] . '"><i class="fa fa-money"></i></a>

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
<script type="text/javascript">


    $(".select2_demo_3").select2({
        placeholder: "Select Blood Group",
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
