


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






<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


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
                                            <th>Status</th>
                                            <th>Report</th>
                                        </tr>
                                    </thead>
                                
                                    <tbody>
<?php 
include_once('configg.php');


$query=mysqli_query($con,"select * from tbl_tests where user_id='$user_id'");
    
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
                                             <?php if($row['sentlab']=='')
                                             {
                                             echo"<td>Pending</td>";
                                             }
                                                   if($row['sentlab']!='')
                                             {
                                             echo"<td>Send to Lab</td>";
                                             }
                                                                            
                                             
                                             ?>
                                               <?php $report= $row['report']; ?>

<?php
 if($report !='')
                  {
                 echo"<td><a href='uploads/$report'>click here</a></td>";
                  }
                  if($report =='')
                  {
                  echo"<td></td>";
                  }
?>
                                           
                                        </tr>
<?php $cnt++;} ?>
                                    </tbody>
                                </table>



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
