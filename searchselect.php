<?php

require 'authentication.php'; // admin authentication check 

// auth check
$user_id = $_SESSION['admin_id'];
$user_name = $_SESSION['name'];
$security_key = $_SESSION['security_key'];
if ($user_id == NULL || $security_key == NULL) {
    header('Location: index.php');
}

// check admin
$user_role = $_SESSION['user_role'];





if(isset($_POST['update_task_info'])){
    $obj_admin->update_task_info($_POST,$task_id, $user_role);
}

$page_name="Edit Task";
include('ems_header.php');




?>







<!--modal for employee add-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">


    <div class="row">
      <div class="col-md-12">
        <div class="well well-custom">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="well">
              
              
                <h3 class="text-center bg-primary" style="padding: 7px;">Search Reports </h3><br>

                      <div class="row">
                        <div class="col-md-12">
              <form name="form" action="searchreport.php" method="post"  enctype="multipart/form-data">
			                  
 <div class="form-group">
                    <div class="col-sm-6">
                    
    From date : <input type="text" name="search" placeholder="mobile/sampleid"> 

    </div>                                           
                  </div>


                              <div class="col-sm-6">
                              <input type="submit" name="submit" value="Submit" class="btn btn-success-custom"></button>
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


    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

	<script type="text/javascript">
	  flatpickr('#t_start_time', {
	    enableTime: true
	  });

	  flatpickr('#t_end_time', {
	    enableTime: true
	  });

	</script>


<?php

include("include/footer.php");

?>