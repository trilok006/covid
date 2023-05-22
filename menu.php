
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trilok  Covid Management System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/bootstrap.theme.min.css">
  <link rel="stylesheet" href="assets/bootstrap-datepicker/css/datepicker.css">
  <link rel="stylesheet" href="assets/bootstrap-datepicker/css/datepicker-custom.css">
  <link rel="stylesheet" href="assets/css/custom.css">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/custom.js"></script>
  <script src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script src="assets/bootstrap-datepicker/js/datepicker-custom.js"></script>
  <script type="text/javascript">
    
    /* delete function confirmation  */
    function check_delete() {
      var check = confirm('Are you sure you want to delete this?');
        if (check) {
         
            return true;
        } else {
            return false;
      }
    }
  </script>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: skyblue;
  color: black;
}

.topnav a.active {
  background-color: #04AA6D;
  color: white;
}



</style>



</head>
<body>

<div class="topnav">

  <a class="active" href="task-info.php">ADMIN PANEL</a>
  <a href="task-info.php">All Tests List</a>
      <a href="pendinglist.php">Pending/New Tests</a>
            <a href="uploadreport.php">Upload Reports</a>
  <a href="betweenselect.php">Between Days Report</a>
    <a href="searchselect.php">Search</a>

  <a href="logout.php">Logout</a>
</body>
</html>
  
 </div>
 </div>