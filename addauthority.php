<html lang="en">
<?php
	     define('DB_HOST', 'localhost');
	     define('DB_NAME', 'project');
	     define('DB_USER','root');
	     define('DB_PASSWORD','mysql1610');
	     echo "<script> console.log('PHP1');</script>";
	     function AddAuthority()
	     {
	     echo "<script> console.log('PHP3');</script>";
	     session_start();   //starting the session for user profile page
	     if(!empty($_POST['UserID']))   
	     {

	     $UserID = $_POST["UserID"];
	     $DepID = $_POST["DepID"];
	     $Authority = $_POST["Authority"];
	     

	     // Create connection
	     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	     // Check connection
	     if (!$conn) {
	     die("Connection failed: " . mysqli_connect_error());
	     }
	     
	     $sql = "insert into Position (Dep_ID,User_ID,Authority) values('$DepID','$UserID','$Authority')";
	     $sql2 = "DELETE FROM Position WHERE Dep_ID = '$DepID' AND User_ID = '$UserID'";
	    if((mysqli_query($conn, $sql))){
	     
	     	echo "<script> alert('Records inserted successfully.');window.location.href='http://localhost/modify.html';</script>";
	     	

	     } else{
	     
	        mysqli_query($conn, $sql2);
	    	
	    	echo "<script> alert('Incorrect credentials. Could not register.');window.location.href='http://localhost/modify.html';</script>";

	     }
	     }
	     mysqli_close($conn);
	     }
	     if(isset($_POST['submit']))
	     {
	     AddAuthority();
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
      <div class="card-header">Add An Authority.</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="UserID">User ID</label>
                <input class="form-control" name="UserID" type="text" aria-describedby="nameHelp" placeholder="Enter User ID">
              </div>
              
              <div class="col-md-6">
                <label for="DepID">Department ID</label>
                <input class="form-control" name="DepID" type="text" aria-describedby="nameHelp" placeholder="Enter Department ID">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="Authority">Authority to modify in this department?</label><br>
            <input type="radio" name="Authority" value="Yes"> Yes<br>
  	    <input type="radio" name="Authority" value="No"> No<br>
 
          </div>
          <input id="button" type="submit" name="submit" value="Add">
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
