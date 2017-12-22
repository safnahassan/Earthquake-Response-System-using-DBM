
<html lang="en">
	<?php
	     define('DB_HOST', 'localhost');
	     define('DB_NAME', 'project');
	     define('DB_USER','root');
	     define('DB_PASSWORD','mysql1610');
	     echo "<script> console.log('PHP1');</script>";
	     function AddUser()
	     {
	     echo "<script> console.log('PHP3');</script>";
	     session_start();   //starting the session for user profile page
	     if(!empty($_POST['UserID']))   
	     {

	     $UserID = $_POST["UserID"];
	     $Name = $_POST["Name"];
	     $DepID = $_POST["DepID"];
	     $Pass = $_POST["Password1"];
	     $Confirm = $_POST["ConfirmPassword"];

	     // Create connection
	     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	     // Check connection
	     if (!$conn) {
	     die("Connection failed: " . mysqli_connect_error());
	     }
	     
	     $sql = "insert into User_details(User_ID,Pass_word,Name,Dep_ID) values('$UserID','$Pass','$Name','$DepID')";
	     $sql2 = "DELETE FROM User_details WHERE User_ID = '$UserID' AND Pass_word = '$Pass'";
	     if((mysqli_query($conn, $sql)) && (strcmp($Pass, $Confirm) == 0)){
	     	//echo "Records inserted successfully.";
	     	echo "<script> alert('Records inserted successfully.');window.location.href='http://localhost/modify.html';</script>";
	     	

	     } else{
	     
	        mysqli_query($conn, $sql2);
	    	//echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
	    	echo "<script> alert('Incorrect credentials. Could not register.');window.location.href='http://localhost/modify.html';</script>";

	     }
	     }
	     mysqli_close($conn);
	     }
	     if(isset($_POST['submit']))
	     {
	     AddUser();
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
	      <div class="card-header">Register an Account</div>
	      <div class="card-body">
		<form method="POST" action="">
		  <div class="form-group">
		    <div class="form-row">
		      <div class="col-md-6">
			<label for="UserID">User ID</label>
			<input class="form-control" name="UserID" type="text" aria-describedby="nameHelp" placeholder="Enter User ID">
		      </div>
		      <div class="col-md-6">
			<label for="Name">First name</label>
			<input class="form-control" name="Name" type="text" aria-describedby="nameHelp" placeholder="Enter first name">
		      </div>
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="DepID">Department ID</label>
		    <input class="form-control" name="DepID" type="text" aria-describedby="nameHelp" placeholder="Enter Dep. ID">
		  </div>
		  <div class="form-group">
		    <div class="form-row">
		      <div class="col-md-6">
			<label for="Password1">Password</label>
			<input class="form-control" name="Password1" type="password" placeholder="Password">
		      </div>
		      <div class="col-md-6">
			<label for="ConfirmPassword">Confirm password</label>
			<input class="form-control" name="ConfirmPassword" type="password" placeholder="Confirm password">
		      </div>
		    </div>
		  </div>
		  <input id="button" type="submit" name="submit" value="Register">
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
