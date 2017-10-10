<?php $recent_id = $_GET['edit']; ?>
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
								<?php $singlerecent = get_single_recent($recent_id); ?>
								<?php foreach($singlerecent as $recent): ?>
								<table class="table">
									<tr>
										<td>Runs</td>
										<td>Wide</td>
										<td>nbs</td>
										<td>legbs</td>
										<td>wickets</td>
									</tr>
									<tr>
										<td><input type="text" value="<?php echo $recent['runs']; ?>" name="runs" class="form-control"></td>
										<td><input type="text" name="wide" value="<?php echo $recent['wide']; ?>" class="form-control"></td>
										<td><input type="text" name="nbs" value="<?php echo $recent['nbs']; ?>" class="form-control"></td>
										<td><input type="text" value="<?php echo $recent['legbs']; ?>" name="legbs" class="form-control"></td>
										<td><input type="text" name="wickets" value="<?php echo $recent['wickets']; ?>" class="form-control"></td>
									</tr>
									<tr>
										<td>Batsman</td>
										<td>Bowler</td>
										<td>4/6</td>
										<td>outby</td>
										
									</tr>
									<tr>
										<?php if($recent['innings']==1||$recent['innings']==3): ?>
										<td>
										<?php $player = get_tema_one_players($recent['match_id']); ?>
										<?php $player1 = explode(",",$player) ?>
											<select class="form-control" name="batsman" >
												<?php foreach ($player1 as $value): ?>
												<?php if($value==$recent['batsman']): ?>
												<option value="<?php echo $value; ?>" selected><?php echo get_player_name($value); ?></option>
												<?php endif; ?>
												<?php if($value!=$recent['batsman']): ?>
												<option value="<?php echo $value; ?>" ><?php echo get_player_name($value); ?></option>
												<?php endif; ?>
												<?php endforeach; ?>
											</select>
										</td>

										<td>
										<?php $twoplayer = get_tema_two_players($recent['match_id']); ?>
										<?php $twoplayer1 = explode(",",$twoplayer) ?>
											<select class="form-control" name="bowler">
												<?php foreach ($twoplayer1 as $value): ?>
													<?php if($value==$recent['bowler']): ?>
												<option value="<?php echo $value; ?>" selected><?php echo get_player_name($value); ?></option>
												<?php endif; ?>
												<?php if($value!=$recent['bowler']): ?>
												<option value="<?php echo $value; ?>" ><?php echo get_player_name($value); ?></option>
												<?php endif; ?>
												<?php endforeach; ?>
											</select>
										</td>
										<?php endif; ?>
										<?php if($recent['innings']==2||$recent['innings']==4): ?>
										<td>
										<?php $player = get_tema_two_players($recent['match_id']); ?>
										<?php $player1 = explode(",",$player) ?>
											<select class="form-control" name="batsman">
												<?php foreach ($player1 as $value): ?>
												<?php if($value==$recent['batsman']): ?>
												<option value="<?php echo $value; ?>" selected><?php echo get_player_name($value); ?></option>
												<?php endif; ?>
												<?php if($value!=$recent['batsman']): ?>
												<option value="<?php echo $value; ?>" ><?php echo get_player_name($value); ?></option>
												<?php endif; ?>
												<?php endforeach; ?>
											</select>
										</td>
										<td>
										<?php $player = get_tema_one_players($recent['match_id']); ?>
										<?php $player1 = explode(",",$player) ?>
											<select class="form-control" name="bowler">
												<?php foreach ($player1 as $value): ?>
												<?php if($value==$recent['bowler']): ?>
												<option value="<?php echo $value; ?>" selected><?php echo get_player_name($value); ?></option>
												<?php endif; ?>
												<?php if($value!=$recent['bowler']): ?>
												<option value="<?php echo $value; ?>" ><?php echo get_player_name($value); ?></option>
												<?php endif; ?>
												<?php endforeach; ?>
											</select>
										</td>
										<?php endif; ?>
										<td>
											<select class="form-control" name="4or6">
												<?php if($recent['4or6']==0): ?>
												<option value="0" selected>No</option>
												<option value="1" >4</option>
												<option value="2" >6</option>
												<?php endif; ?>
												<?php if($recent['4or6']==1): ?>
												<option value="0" selected>No</option>
												<option value="1" selected>4</option>
												<option value="2" >6</option>
												<?php endif; ?>
												<?php if($recent['4or6']==2): ?>
													<option value="0" selected>No</option>
												<option value="1" >4</option>
												
												<option value="2" selected>6</option>
												<?php endif; ?>
												
											</select>
										</td>
										<td>
											<input type="text" value="<?php echo $recent['outby']; ?>" name="outby" class="form-control">
										</td>
										
									</tr>
									<tr >
										<td colspan="6"><input type="submit" name="" class="edit-ball-score"></td>
									</tr>
								</table>

								<?php 
									$recent_id = $recent['recent_id'];
								?>
								<?php endforeach; ?>
							</div>
							<script type="text/javascript">
							$(document).ready(function(){
								$('.edit-ball-score').click(function(event){
									event.preventDefault();
									var recent_id = <?php echo $recent_id; ?>;
									var wickets = $('input[name="wickets"]').val();
									var legbs = $('input[name="legbs"]').val();
									var nbs = $('input[name="nbs"]').val();
									var wide = $('input[name="wide"]').val();
									var runs = $('input[name="runs"]').val();
									var batsman = $('select[name="batsman"]').val();
									var bowler = $('select[name="bowler"]').val();
									var r4or6 = $('select[name="4or6"]').val();
									var outby = '0';
									if(wickets){
										var wickets = wickets;
									}else{
										var wickets = '0';
									}
									if(legbs){
										var legbs = legbs;
									}else{
										var legbs = '0';
									}
									if(nbs){
										var nbs = nbs;
									}else{
										var nbs = '0';
									}
									if(wide){
										var wide = wide;
									}else{
										var wide = '0';
									}
									if(runs){
										var runs = runs;
									}else{
										var runs = '0';
									}
									if(r4or6){
										var r4or6 = r4or6;
									}else{
										var r4or6 = '0';
									}
									if(outby){
										var outby = outby;
									}else{
										var outby = '0';
									}
									if(wide!=0 || nbs!=0 ){
										var balls ='0';
									}else{
										var balls = '1';
									}
									$.post("http://www.livecricketinfo.com/action.php",
									{	
										action:"editscore",
										wickets:wickets,
										recent_id:recent_id,
										legbs:legbs,
										nbs:nbs,
										wide:wide,
										runs:runs,
										batsman:batsman,
										bowler:bowler,
										r4or6:r4or6,
										outby:outby,
										balls:balls
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