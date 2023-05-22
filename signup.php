<?php 

include_once('configg.php');

if(isset($_POST['submit'])){
//getting post values
$fname=$_POST['fullname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$rpassword=$_POST['rpassword'];

if($password != $rpassword)
{
echo '<script>alert(" Password and retype password Not Matched")</script>';
$s="no";
}
if($s !="no")
{
$query="insert into tbl_admin(fullname,username,email,password,user_role) values('$fname','$username','$email','$password','2');";
$result = mysqli_multi_query($con, $query);
}
if ($result) {
echo '<script>alert("Your user created sucessfully")</script>';
  echo "<script>window.location.href='main.php'</script>";
} 
else {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='main.php'</script>";
}
}
?>



        <p align="center"><font color="#008080" size="5">Covid19-Testing Signup Form</font></p>
</h1>
<form name="newtesting" method="post">

                        <div class="col-lg-6">

                            <!-- Basic Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary" align="center">
									<font color="#0000FF" size="4">Fill Information</font></h6>
                                </div>
                                <div class="card-body">
                        <div class="form-group">
                            <p align="center">
                            <label><font color="#0000FF">Full Name</font></label><font color="#0000FF">
							<font color="#0000FF" size="3">
                                            <input type="text" class="form-control" id="fullname" name="fullname"  placeholder="Enter your full name..." pattern="[A-Za-z ]+" title="letters only" required="true"></font>
							</font>
                                        </div>
                                        <div class="form-group">
                                             <p align="center">
												<font color="#0000FF">
                                             <label>User Name</label>
                                  			<font size="3">
                                  <input type="text" class="form-control" id="username" name="username" placeholder="Please enter your username"></font>
												</font>
                                                <span id="mobile-availability-status" style="font-size:12px;"></span>
                                        </div>
                                        <div class="form-group">
                                             <p align="center">
												<font color="#0000FF">
                                             <label>Email</label>
                                            <font size="3">
                                            <input type="text" class="form-control" id="email" name="email" required="true"></font>
												</font>
                                        </div>
                                        <div class="form-group">
                                               <p align="center">
												<font color="#0000FF">
                                               <label>Password</label>
                                            	<font size="3">
                                            <input type="password" class="form-control" id="password" name="password" placeholder=" Enter Pasword" required="true"></font>
												</font>
                                        </div>
                                        <div class="form-group">
                                              <p align="center">
												<font color="#0000FF">
                                              <label>Retype Password</label>
                                            	</font><font size="3">
                                            <input type="password" class="form-control" id="rpassword" name="rpassword" placeholder="Retype Password" required="true"></font>
                                        </div>
                          

                              
                       <div class="form-group">
                                 <p align="center">
                                 <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit" value="submit">   
                                                       
                             </div>

                                </div>
                            </div>
                       

                        </div>

                    </div>
</form>
		
<?php

include("include/footer.php");

?>