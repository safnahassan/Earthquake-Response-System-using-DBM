<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'project');
define('DB_USER','root');
define('DB_PASSWORD','mysql1610');

$db=mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) or die("Failed to connect to MySQL: " . mysqli_error());
//$db=mysqli_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysqli_error());
/*
$ID = $_POST['user'];
$Password = $_POST['pass'];
*/
echo "hi";
function SignIn()
{

session_start();   //starting the session for user profile page
if(!empty($_POST['username']))   
{
	$query = "SELECT *  FROM User_details where User_ID = '$_POST[username]' AND Pass_word = '$_POST[password]'";
	$result = mysqli_query($db,$query);
	$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
	if(!empty($row['User_ID']) AND !empty($row['Pass_word']))
	{
		$_SESSION['User_ID'] = $row['Pass_word'];
		echo "LOGIN SUCCESSFUL";
		header("Location: welcome.php");

	}
	else
	{
		echo "Incorrect credentials. Please Retry.";
	}
}
}
if(isset($_POST['submit']))
{
	SignIn();
}

?>


