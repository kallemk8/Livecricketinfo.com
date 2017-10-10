<?php include('functions.php'); ?>
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
			<div class="container" style="background:#fff;">
			
				<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Country Name</label>
			    <input type="text" class="form-control" name="country_name" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Country Rank</label>
			    <input type="text" class="form-control" name="country_rank" >
			</div>
			
			<div class="form-group">
			    <label for="exampleInputEmail1">About Country</label>
			    <textarea class="form-control" name="about_country"></textarea>
			</div>
			<div class="form-group">
				<input type="hidden" name="post_type" value="posts">
				<input type="hidden" name="post_status" value="Open">
				<input type="submit" name="addbatsman" class="btn btn-primary btn-lg add-country">
			</div>
				</div>
				<div class="col-md-6">
				<?php $Country = get_countrys(); ?>
				<table class="table">
					<tr>
						<th>Country ID</th>
						<th>Country Name</th>
						<th>Edit</th>
					</tr>
					<?php foreach ($Country as $key => $value): ?>
					<tr>
						<td><?php echo $value['CountryId']; ?></td>
						<td><?php echo $value['CountryName']; ?></td>
						<td><a href="edit-country.php?edit=<?php echo $value['CountryId']; ?>">Edit</a></td>
					</tr>
					<?php endforeach; ?>

				</table>
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
				$('.add-country').click(function(event){
					var country_name = $('input[name="country_name"]').val();
					var country_rank = $('input[name="country_rank"]').val();
					var about_country = $('textarea[name="about_country"]').val();
					$.post("http://www.livecricketinfo.com/action.php",
					{	
						action:"addcountry",
						country_name:country_name,
						country_rank:country_rank,
						about_country:about_country
					},function(data,status){
						alert(data);
					});
				});
			});
		</script>
    </body>
</html>