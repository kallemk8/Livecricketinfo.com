<?php session_start();  ?>
<?php 
	function connection2(){
	    $conn = new PDO("mysql:host=localhost;dbname=srikanth_livecricketinfo","kallemvideos",'K@sreekanth8' );
    return $conn;
	}
   $db = connection2();
   
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = $_POST['username'];
      $mypassword = $_POST['password']; 
      
      $sql = "SELECT ID FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $res = $db->prepare($sql);
		$res->execute();
     $count = $res->rowCount();
      // If result matched $myusername and $mypassword, table row must be 1 row
      if($count == 1) {
         $_SESSION['login_user'] = $myusername;
         header("location: posts.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<?php include('header.php'); ?>	<style type="text/css">
		.login_notification{
			display: none;
		}
		.login_button{
			margin-bottom: 15px;
		    border: rgba(237, 28, 36, 0.7);
		    background: rgba(237, 28, 36, 0.7);
		    display: block;
		    width: 100%;
		}
	</style>
	<div class='container' >
		<div class="row">
		<div class="col-md-12" style="margin: 15px 0px;">
		<div class="" style="background: #fff; overflow: hidden;">
		<div id='login' class='col-md-3 col-md-offset-4' >
			<div class='login' >
				<h1 class='login-title'>Login Page</h1>
				<form  action="" method="POST" >
					<div class="form-group">
					<input type='name' placeholder='Username'  class='form-control' name='username' required/>
					</div>
					<div class="form-group">
					<input type='password' placeholder='Password'  class='form-control' name='password'  required/>
					</div>
					<div class='login_notification'>Please enter correct values ...!</div>
					<input type='submit' class='btn btn-primary login_button' value='Login' />
					
				</form>
			</div>
		</div>
		</div>
		</div>
		</div>
	</div>
<?php  include('footer.php'); ?>