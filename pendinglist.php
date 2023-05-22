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
include('ems_header.php');
include('connection.php');

?>


<?php 
error_reporting(0);
//DB conncetion
include_once('configg.php');

if(isset($_POST['submit']))
{

$kv1 =array();

foreach ($_POST['n1'] as $i1 => $value1)
{
  $kv1[] = "$value1";
}

for($s=0; $s<50; $s++)
{

if($kv1[$s] !='')
{
$x++;
}
}

for($k=0; $k<$x; $k++)
{
$query="update tbl_tests set sentlab='yes' where sampleid='$kv1[$k]'";
$result = mysqli_multi_query($con, $query);
if ($result)
 {
echo '<script>alert("Your test request submitted successfully.")</script>';
  echo "<script>window.location.href='task-info.php'</script>";
} 
else
 {
    echo "<script>alert('Something went wrong. Please try again.');</script>";  
echo "<script>window.location.href='task-info.php'</script>";
}
}
}
?>








<form name="newtesting" method="post">

    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
        
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Sno.</th>
                                            <th>Sample No.</th>
                                            <th>Patient Name</th>
                                            <th>Mobile No.</th>
                                            <th>Test Type</th>
                                            <th>Date</th>
                                            <th>Move to Lab</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
<?php 
include_once('configg.php');


$query=mysqli_query($con,"select * from tbl_tests where sentlab=''");
    
$cnt=1;
while($row=mysqli_fetch_array($query)){
?>
            
                                        <tr>
                                            <td><?php echo $cnt;?></td>
                                            <td><?php echo $row['sampleid'];?></td>
                                            <td><?php echo $row['name'];?></td>
                                            <td><?php echo $row['mobile'];?></td>
                                            <td><?php echo $row['testtype'];?></td>
                                            <td><?php echo $row['testdate'];?></td>                                        
                                                                   
                                              <td><input type=checkbox name='n1[]' value="<?php echo $row['sampleid'];?>"></td>

                                           
                                        </tr>
<?php $cnt++;} ?>
                                    </tbody>
                                </table>
<div class="form-group">
                                 <input type="submit" class="btn btn-primary btn-user btn-block" name="submit" id="submit" value="submit">   
                                                       
                             </div>

</form>
          <div class="gap"></div>
          <div class="row">
            <div class="col-md-8">
              

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
