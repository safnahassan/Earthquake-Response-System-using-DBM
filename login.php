
<html lang="en">
  <?php
     define('DB_HOST', 'localhost');
     define('DB_NAME', 'project');
     define('DB_USER','root');
     define('DB_PASSWORD','mysql1610');

     echo "<script> console.log('PHP1');</script>";
     function SignIn()
     {
     echo "<script> console.log('PHP3');</script>";
     session_start();   //starting the session for user profile page
     if(!empty($_POST['username']))   
     {

     $User = $_POST["username"];
     $Pass = $_POST["password"];

     // Create connection
     $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
     // Check connection
     if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
     }

     $sql = "SELECT * from User_details where User_ID = '$User' AND Pass_word = '$Pass'";
     $result = mysqli_query($conn, $sql);

     /*
     //This section of code is for debugging. Reminder : Remove it later
     if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  $a = $row["User_ID"];
  echo "<script> console.log('User Id is : $a');</script>";
  }
  } else {
  echo "0 results";
  }
  */

  
  $count = mysqli_num_rows($result);
  
  if($count == 1) {
  echo "<script> console.log('YUSS');alert('Welcome! $User has logged in. Wait...');</script>";
    
  $_SESSION['login_user'] = $User;
  header("Location: modify.html");
  }
  else
  {
  echo "<script> alert('Incorrect credentials.');</script>";
  }
  
  }
  }
  if(isset($_POST['submit']))
  {
  SignIn();
  }
  echo "<script> console.log('PHP2');</script>";
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
      <div class="card card-login mx-auto mt-5">
	<div class="card-header">Login</div>
	<div class="card-body">
	  <form method="POST" action="">
	    <div class="form-group">
	      <label for="exampleInputEmail1">User ID </label>
	      <input class="form-control" name="username" type="text" aria-describedby="emailHelp" placeholder="Enter user ID">
	    </div>
	    <div class="form-group">
	      <label for="exampleInputPassword1">Password</label>
	      <input class="form-control" name="password" type="password" placeholder="Password">
	    </div>
	    <!--a class="btn btn-primary btn-block" href="blank.html">Login</a-->
	    <input id="button" type="submit" name="submit" value="Log-In">
	  </form>
	  <div class="text-center">
	    <a class="d-block small mt-3" href="register.html">Register an Account</a>
	  </div>
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
