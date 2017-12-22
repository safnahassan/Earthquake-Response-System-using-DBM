
<html lang="en">
<?php
	     define('DB_HOST', 'localhost');
	     define('DB_NAME', 'project');
	     define('DB_USER','root');
	     define('DB_PASSWORD','mysql1610');
	     echo "<script> console.log('PHP1');</script>";
	     function SendMessage()
	     {
	     echo "<script> console.log('PHP3');</script>";
	     session_start();   //starting the session for user profile page
	     if(!empty($_POST['UserID']))   
	     {

	     $UserID = $_POST["UserID"];
	     $Location = $_POST["Location"];
	     $MID = $_POST["MID"];
	     $DepID = $_POST["DepID"];

	     // Create connection
	     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	     // Check connection
	     if (!$conn) {
	     die("Connection failed: " . mysqli_connect_error());
	     }
	     
	     $sql1 = "select Message from Preinstalled_Short_Message where M_ID = '$MID'";
	     $msg = mysqli_query($conn, $sql1);
	     
	     if((mysqli_query($conn, $sql1))){
	     
	             $result = mysqli_fetch_array($msg);
	             $message = $result['Message'];
	             $sendingresult = "OK";
	             $sql3 = "select Phone_No from Group_details where Dep_ID = '$DepID'";
	             $numbers = mysqli_query($conn, $sql3);	         
	             
	             while ($row = mysqli_fetch_assoc($numbers))
	             {
			     $Number = $row['Phone_No'];
			     $sql = "insert into Message (M_ID,User_ID,Phone_No,Location,Message,Sending_Result) values('$MID','$UserID','$Number','$Location','$message','$sendingresult')";
			     
			     $sql2 = "DELETE FROM Message WHERE User_ID = '$UserID' AND M_ID = '$MID' AND Phone_No = '$Number' AND Location = '$Location')";
			     if((mysqli_query($conn, $sql))){
			     	//echo "Records inserted successfully.";
			     	echo "<script> alert('Message sent successfully.');window.location.href='http://localhost/modify.html';</script>";
			     } else{
			     
				mysqli_query($conn, $sql2);
			    	//echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
			    	echo "<script> alert('Incorrect credentials. Could not send message.');window.location.href='http://localhost/modify.html';</script>";

			     }
		     }
	     } else{
	        echo "<script> alert('Could not send message.Enter valid Message ID.');window.location.href='http://localhost/modify.html';</script>";
	     }
	     
	     }
	     mysqli_close($conn);
	     }
	     if(isset($_POST['submit']))
	     {
	     SendMessage();
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
      <div class="card-header">Send A Message</div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="UserID">User ID</label>
                <input class="form-control" name="UserID" type="text" aria-describedby="nameHelp" placeholder="Enter User ID (sender's)">
              </div>
              <div class="col-md-6">
                <label for="MID">M_ID</label>
                <input class="form-control" name="MID" type="text" aria-describedby="nameHelp" placeholder="Enter message ID">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="Location">Location</label>
            <input class="form-control" name="Location" type="text" aria-describedby="nameHelp" placeholder="Enter location of earthquake.">
          </div>
          <div class="form-group">
            <label for="DepID">Department ID</label>
            <input class="form-control" name="DepID" type="text" placeholder="Department ID of the department whose members should recieve the message.">
          </div>
          <input id="button" type="submit" name="submit" value="Send">
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
