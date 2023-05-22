
<?php


		$sampleid  = $_POST['sampleid'];
		

// Check if the form was submitted
include_once 'dbconfig.php';

if($_SERVER["REQUEST_METHOD"] == "POST")
{

$d=0;
    // Check if file was uploaded without errors
    if(isset($_FILES["anyfile"]) && $_FILES["anyfile"]["error"] == 0)
    {
        $filename = $_FILES["anyfile"]["name"];
        $filetype = $_FILES["anyfile"]["type"];
        $filesize = $_FILES["anyfile"]["size"];
        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
    
        // Validate file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if($filesize > $maxsize)
        {
                echo '<script>alert("File Size Exists Max Size 10 MB")</script>';
                     header("refresh:1;url=task-info.php");

                  }
    
        // Validate type of the file
       
            // Check whether file exists before uploading it
            if(file_exists("uploads/" . $filename))
            {
            echo "<font color=red size=5><center><br><br><br>";
            
                echo '<script>alert("File Name is already exists.")</script>';
                $d=1;
                echo "</center></font>";
                
     header("refresh:1;url=task-info.php");
                
                
            } 
            else{
                if(move_uploaded_file($_FILES["anyfile"]["tmp_name"], "uploads/" . $filename))
                {
                   echo "Your file was uploaded successfully.";
                }
               
                
        
        } 
    } 
}

if($d==0)
{
   include('connection.php');

     
$sql2="update tbl_tests set report='$filename' where sampleid='$sampleid'";

$rd=mysqli_query($conn,$sql2);





    header('Location:task-info.php');

}




		
    
    ?><body bgcolor="#FFFFCC">
        
