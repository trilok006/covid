


<?php

require 'authentication.php'; // admin authentication check 

// auth check
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
if ($user_id == NULL || $security_key == NULL)
 {
    header('Location: index.php');
}

// check admin
$user_role = $_SESSION['user_role'];


if(isset($_GET['delete_task']))
{
  $action_id = $_GET['task_id'];
  
  $sql = "DELETE FROM task_info WHERE task_id = :id";
  $sent_po = "task-info.php";
  $obj_admin->delete_data_by_this_method($sql,$action_id,$sent_po);
}


$page_name="Task_Info";
include('ems_header_user.php');
include('connection.php');

?>

<?php 
error_reporting(0);
//DB conncetion
include_once('configg.php');

if(isset($_POST['submit'])){
//getting post values
$fname=$_POST['fullname'];
$mnumber=$_POST['mobilenumber'];
$dob=$_POST['dob'];
$govtid=$_POST['govtissuedid'];
$govtidnumber=$_POST['govtidnumber'];
$address=$_POST['address'];
$state=$_POST['state'];
$testtype=$_POST['testtype'];
$timeslot=$_POST['birthdaytime'];
$country=$_POST['country'];
$orderno= mt_rand(100000000, 999999999);
$query="insert into tbl_tests(sampleid,user_id,name,mobile,dob,govtid,govtidnum,address,state,country,testtype,testdate) values('$orderno','$user_id','$fname','$mnumber','$dob','$govtid','$govtidnumber','$address','$state','$country','$testtype','$timeslot');";
$result = mysqli_multi_query($con, $query);
if ($result) {
echo '<script>alert("Your test request submitted successfully. Order number is "+"'.$orderno.'")</script>';
  echo "<script>window.location.href='usertaskinfo.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='usertaskinfo.php'</script>";
}
}
?>







    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
        
        <h1 class="h3 mb-4 text-gray-800">Covid19-Testing Application Form</h1>
<form name="newtesting" method="post">
  <div class="row">

                        <div class="col-lg-6">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Personal Information</h6>
                                </div>
                                <div class="card-body">
                        <div class="form-group">
                            <label>Full Name</label>
                                            <input type="text" class="form-control" id="fullname" name="fullname"  placeholder="Enter your full name..." pattern="[A-Za-z ]+" title="letters only" required="true">
                                        </div>
                                        <div class="form-group">
                                             <label>Mobile Number</label>
                                  <input type="text" class="form-control" id="mobilenumber" name="mobilenumber" placeholder="Please enter your mobile number" pattern="[0-9]{10}" title="10 numeric characters only" required="true" onBlur="mobileAvailability()">
                                                <span id="mobile-availability-status" style="font-size:12px;"></span>
                                        </div>
                                        <div class="form-group">
                                             <label>DOB</label>
                                            <input type="date" class="form-control" id="dob" name="dob" required="true">
                                        </div>
                                        <div class="form-group">
                                               <label>Any Govt Issued ID</label>
                                            <input type="text" class="form-control" id="govtissuedid" name="govtissuedid" placeholder=" any Govt ID" required="true">
                                        </div>
                                        <div class="form-group">
                                              <label>Govt Issued ID Number</label>
                                            <input type="text" class="form-control" id="govtidnumber" name="govtidnumber" placeholder="Enter Goevernment Issued ID Number" required="true">
                                        </div>
                          

                               <div class="form-group">
                                              <label>Address</label>
                                            <textarea class="form-control" id="address" name="address" required="true" placeholder="Enter your full addres here"></textarea>
                                        </div>
 <div class="form-group">
                                              <label>State</label>
                                      <input type="text" class="form-control" id="state" name="state" placeholder="Enter your State Here" required="true">
                                        </div>
                                        
                                        <div class="form-group">
                                              <label>Country</label>
                                      <input type="text" class="form-control" id="state" name="country" placeholder="Enter your country Here" required="true">
                                        </div>


                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">

                           <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Testing Information</h6>
                                </div>
                                <div class="card-body">
                             <div class="form-group">
                                              <label>Test Type</label>
                                              <select class="form-control" id="testtype" name="testtype" required="true">
                                            <option value="">Select</option> 
                                            <option value="Antigen">Antigen</option>  
                                            <option value="RT-PCR">RT-PCR</option>
                                            <option value="CB-NAAT">CB-NAAT</option>    
                                              </select>
                                        </div>

                                                      <div class="form-group">
                                            <label>Testing Date</label>
                                 <input type="date" class="form-control" id="birthdaytime" name="birthdaytime" class="form-control">                                        
                             </div>
                       <div class="form-group">
                                 <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit" value="submit">   
                                                       
                             </div>

                                </div>
                            </div>
                       

                        </div>

                    </div>
</form>


          <div class="gap"></div>
          <div class="row">
            <div class="col-md-8">
              <div class="btn-group">
                <?php if($user_role == 1){ ?>
                <div class="btn-group">
                  <button class="btn btn-warning btn-menu" data-toggle="modal" data-target="#myModal">Assign New Assignment</button>
                </div>
              <?php } ?>

              </div>

            </div>

            
          </div>
          

<?php

include("include/footer.php");



?>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script type="text/javascript">
  flatpickr('#t_start_time', {
    enableTime: true
  });

  flatpickr('#t_end_time', {
    enableTime: true
  });

</script>
