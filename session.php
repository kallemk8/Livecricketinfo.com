<?php
	function connection2(){
	    $conn = new PDO("mysql:host=localhost;dbname=srikanth_livecricketinfo","kallemvideos",'K@sreekanth8' );
    return $conn;
	}
   	$db = connection2();

   session_start();
   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
   }
   $user_check = $_SESSION['login_user'];
   
  	$sql = "SELECT username FROM users WHERE username = '$user_check'";
	$res = $db->prepare($sql);
	$res->execute();
	
	while($row = $res->fetch()) {
		$data = $row['username'];
  	}
	
   if($data !=$_SESSION['login_user']){
   		header("location:login.php");
   }
   
?>