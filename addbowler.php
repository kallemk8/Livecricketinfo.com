<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="utf-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link rel="icon" type="image/png" href="images/favicon.png" />
	    <title>Live Cricket Score & Live Cricket Streaming Video - Livecricketinfo</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
		
	    <link href="css/bootstrap.css" rel="stylesheet">
	    <link href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
	    <link href="css/style.css" rel="stylesheet">
	    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	
	<body>
		<header>
			<div class="container">
				<div class="header">
					<div class="col-md-3 col-sm-6">
						<h1 class="logo">
							<img src="images/logo.png" width="40px">
							<a href="index.php" title="Watch Live cricket score and Live Cricket Streaming">Livecricketinfo</a>
						</h1>
					</div>
					<div class="col-md-9 col-sm-6">
						<div class="menu">
							<ul class="comman-menu">
								<li><a href="">Live Scores</a></li>
								<li><a href="">Schedule</a></li>
								<li><a href="">Archives</a></li>
								<li><a href="">News</a></li>
								<li><a href="">Series</a></li>
								<li><a href="">Teams</a></li>
								<li><a href="">Videos</a></li>
								<li><a href="">Photos</a></li>
								<li><a href="">Rankings</a></li>
								<li><a href="">More</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</header>
		<section>
			<div class="container">
				<div class="col-md-6">
					<div class="form-group">
			    <label for="exampleInputEmail1">Batsman Name</label>
			    <input type="text" class="form-control" name="batsman" >
			</div>
			
			<div class="form-group">
			    <label for="exampleInputEmail1">Select Team</label>
			    <select class="form-control" name="select_team">
			    	<option value="1">India</option>
			    	<option value="2">England</option>
			    	<option value="3">Pakistan</option>
			    	<option value="4">Australia </option>
			    	<option value="5">Sri Lanka </option>
			    	<option value="6">Bangladesh </option>
			    	<option value="7">West Indies</option>
			    	<option value="8">South Africa</option>
			    	<option value="9">Zimbabwe </option>
			    	<option value="10">New Zealand</option>
			    </select>
			    
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Select Country</label>
			    <select class="form-control" name="select_country">
			    	<option value="1">India</option>
			    	<option value="2">England</option>
			    	<option value="3">Pakistan</option>
			    	<option value="4">Australia </option>
			    	<option value="5">Sri Lanka </option>
			    	<option value="6">Bangladesh </option>
			    	<option value="7">West Indies</option>
			    	<option value="8">South Africa</option>
			    	<option value="9">Zimbabwe </option>
			    	<option value="10">New Zealand</option>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Select State</label>
			    <select class="form-control" name="select_state">
			    	<option value="1">Telangana</option>
			    	<option value="2">Andhra Pradesh</option>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">About Batsman</label>
			    <textarea class="form-control" name="about_batsman"></textarea>
			</div>
			<div class="form-group">
				<input type="hidden" name="post_type" value="posts">
				<input type="hidden" name="post_status" value="Open">
				<input type="submit" name="addbatsman" class="btn btn-primary btn-lg addbatsman">
			</div>
				</div>
			</div>

		</section>
		<footer id='footer'>
			<div class="container">
				<p>&copy; copyrights 2016 livecricketinfo.com</p>
			</div>
		</footer>
		<script type="text/javascript">
			$(document).ready(function(){
				$('.addbatsman').click(function(event){
					var batsman = $('input[name="batsman"]').val();
					var select_team = $('select[name="select_team"]').val();
					var select_country = $('select[name="select_country"]').val();
					var select_state = $('select[name="select_state"]').val();
					var about_batsman = $('textarea[name="about_batsman"]').val();
					alert(batsman);
					alert(select_team);
					alert(select_country);
					alert(select_state);
					alert(about_batsman);
					$.post("http://localhost/livecricketinfo/action.php",
					{	
						action:"addbatsman",
						batsman:batsman,
						select_team:select_team,
						select_country:select_country,
						select_state:select_state,
						about_batsman:about_batsman
					},function(data,status){
						alert(status);
					});
				});
			});
		</script>
    </body>
</html>