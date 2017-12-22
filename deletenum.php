
<html lang="en">
<?php
	     define('DB_HOST', 'localhost');
	     define('DB_NAME', 'project');
	     define('DB_USER','root');
	     define('DB_PASSWORD','mysql1610');
	     echo "<script> console.log('PHP1');</script>";
	     function DeleteNumber()
	     {
	     echo "<script> console.log('PHP3');</script>";
	     session_start();   //starting the session for user profile page
	     if(!empty($_POST['UserID']))   
	     {

	     $UserID = $_POST["UserID"];
	     $DepID = $_POST["DepID"];
	     $Number = $_POST["Number"];
	   
	     // Create connection
	     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	     // Check connection
	     if (!$conn) {
	     die("Connection failed: " . mysqli_connect_error());
	     }
	     
	     $sql = "DELETE FROM Group_details WHERE Phone_No = '$Newnumber' AND Dep_ID = '$DepID'";
	     $sql3 = "select * from Position where User_ID = '$UserID' AND Dep_ID = '$DepID' AND Authority = 'Yes'";
	     
	     $result = mysqli_query($conn, $sql3);
	     $count = mysqli_num_rows($result);
	     
	     
	     if(($result) && ($count == 1)){
	     
	     	mysqli_query($conn, $sql);
	     	echo "<script> alert('Records deleted successfully.');window.location.href='http://localhost/modify.html';</script>";
	     	

	     } else{
	     	
	    	echo "<script> alert('User does not have an Authority to delete records in this department.');window.location.href='http://localhost/modify.html';</script>";

	     }
	     }
	     mysqli_close($conn);
	     }
	     if(isset($_POST['submit']))
	     {
	     DeleteNumber();
	     }
	?>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Delete a number from a department</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="UserID">User ID</label>
                <input class="form-control" name="UserID" type="text" aria-describedby="nameHelp" placeholder="Enter User ID">
              </div>
            </div>
          </div>
          
          <div class="form-group">
            <label for="DepID">Department ID</label>
            <input class="form-control" name="DepID" type="text" aria-describedby="nameHelp" placeholder="Enter Dep. ID">
          </div>
          <div class="form-group">
            <label for="Number">Phone Number</label>
            <input class="form-control" name="Number" type="text" placeholder="Phone Number you want to delete from this department.">
          </div>
          <input id="button" type="submit" name="submit" value="Delete">
        </form>
     
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
