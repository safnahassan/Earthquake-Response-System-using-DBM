<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['User_ID'];
   
   $ses_sql = mysqli_query($db,"select User_ID from User_details where User_ID = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['User_ID'];
   
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
?>
