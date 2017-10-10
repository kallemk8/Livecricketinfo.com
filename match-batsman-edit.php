
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
	<?php include('functions.php'); ?>
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
		<section id="single-page-conttent" >
			<div class="container">
				<div class="row">
					<div class="col-md-9 paddingright0">
						<div class="score-card margintop15">
							<div class="recent">
								<?php 
									$playbatsman = $_GET['playbatsman'];
									$match_id = $_GET['match_id'];
									$inning = $_GET['inning'];
								 ?>
								<?php $singlerecent = get_single_batsman($playbatsman);
									print_r($singlerecent);
								?>
								<?php foreach($singlerecent as $recent): ?>
								<table class="table">
									<tr>
										<td>Batsman</td>
										<td>Playstatus</td>
									</tr>

									<tr>
										<td><?php echo get_player_name($recent['batsmanid']); ?></td>
										<td><input type="text" name="outby" value="<?php echo $recent['Outby']; ?>"></td>
										<td>
											<select class="form-control" name="playstatus">
												<option value="1" >Yes</option>
												<option value="0" >No</option>
											</select>
										</td>
									</tr>
									
									<tr >
										<td colspan="7"><input type="submit" name="" class="edit-batsman-single"></td>
									</tr>
								</table>

								
								<?php endforeach; ?>
							</div>
							<script type="text/javascript">
							$(document).ready(function(){
								$('.edit-batsman-single').click(function(event){
									event.preventDefault();

									var userid = <?php echo $_GET['playbatsman']; ?>;
									
									var playstatus = $('select[name="playstatus"]').val();
									var outby = $('input[name="outby"]').val();
									$.post("http://www.livecricketinfo.com/action.php",
									{	
										action:"editbatsmanfullscore",
										userid:userid,
										outby:outby,
										playstatus:playstatus
										
									},function(data,status){
										alert(data);
									});
								});
							});
						</script>
						</div>
					</div>
					<div class="col-md-3">
						<div class="left-sidebar margintop15">
						<h2 class="sidebar-title">Player Search</h2>
						<div class="player-search">
							<div class="search-input">
								<input type="text" name="search-player" placeholder="Search Player" />
							</div>
							<div class="search-button">
								<input type="submit" value="GO" class="search-button-text">
							</div>
						</div>
					</div>
					<div class="left-sidebar">
						<h2 class="sidebar-title">LATEST NEWS</h2>
						<ul class="latest-news-sidebar">
							<li>Spirited Zimbabwe hope to square series against Sri Lanka
							<div class="time-remaing">2h ago</div>
							</li>
							<li>Upul Tharanga to captain Sri Lanka in Zimbabwe tri-series<div class="time-remaing">2h ago</div></li>
							<li>Shreyas Iyer - Oodles of talent, short on patience<div class="time-remaing">2h ago</div></li>
							<li>BPL 2016 to restart on November 8<div class="time-remaing">2h ago</div></li>

						</ul>
					</div>

					</div>
				</div>
			</div>
		</section>

		
		<footer id='footer'>
			<div class="container">
				<p>&copy; copyrights 2016 livecricketinfo.com</p>
			</div>
		</footer>
		
    </body>
</html>