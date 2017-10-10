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
	<?php 
		if($_GET['postid']){
			$match_id = $_GET['postid']; 
		}
		if($_GET['last10overs']){
			$last10overs = $_GET['last10overs']; 
		}
		if($_GET['firstinnings']){
			$firstinnings = $_GET['firstinnings'];  
		}
		if($_GET['secondinnings']){
			$secondinnings = $_GET['secondinnings']; 
		}
		if($_GET['threeinnings']){
			$threeinnings = $_GET['threeinnings'];  
		}
		if($_GET['fourthinnings']){
			$fourthinnings = $_GET['fourthinnings']; 
		}
	?>
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
		<?php 
			$matchrecent = get_recent_match($match_id); 
			$matchlast10overs = get_recent_match_last_10over($last10overs); 
			$firstinnings = get_recent_match_innings($firstinnings,1);
			$secondinnings = get_recent_match_innings($secondinnings,2);
			$threeinnings = get_recent_match_innings($threeinnings,3);
			$fourthinnings = get_recent_match_innings($fourthinnings,4);

		?>
		<section>
			<div class="container" style="background:#fff;">
				<table class="table table-borderd">
					<tr>
						<th>Match ID</th>
						<th>Batsman</th>
						<th>Bowler</th>
						<th>Ball</th>
						<th>Runs</th>
						<th>Wickets</th>
						<th>Wide</th>
						<th>Nbs</th>
						<th>Legbs</th>
						<th>4s</th>
						<th>6s</th>
						<th>Edit</th>
					</tr>
					<?php foreach($fourthinnings as $r): ?>
					<tr>
						<td><?php echo $r['match_id']; ?></td>
						<td><?php echo get_player_name($r['batsman']); ?></td>
						<td><?php echo get_player_name($r['bowler']); ?></td>
						<td><?php echo $r['ball']; ?></td>
						<td><?php echo $r['runs']; ?></td>
						<td><?php echo $r['wickets']; ?></td>
						<td><?php echo $r['wide']; ?></td>
						<td><?php echo $r['nbs']; ?></td>
						<td><?php echo $r['legbs']; ?></td>
						<td>
							<?php
							if($r['4or6']=='1'){
								echo "Four"; 
							}else{
								echo "0";
							}
							?>
						</td>
						<td>
							<?php
							if($r['4or6']=='2'){
								echo "Six"; 
							}else{
								echo "0";
							}
							?>
						</td>
						
						<td><a href='recentballedit.php?edit=<?php echo $r['recent_id']; ?>'>Edit</a></td>
					</tr>
					<?php endforeach; ?>
					<?php foreach($threeinnings as $r): ?>
					<tr>
						<td><?php echo $r['match_id']; ?></td>
						<td><?php echo get_player_name($r['batsman']); ?></td>
						<td><?php echo get_player_name($r['bowler']); ?></td>
						<td><?php echo $r['ball']; ?></td>
						<td><?php echo $r['runs']; ?></td>
						<td><?php echo $r['wickets']; ?></td>
						<td><?php echo $r['wide']; ?></td>
						<td><?php echo $r['nbs']; ?></td>
						<td><?php echo $r['legbs']; ?></td>
						<td>
							<?php
							if($r['4or6']=='1'){
								echo "Four"; 
							}else{
								echo "0";
							}
							?>
						</td>
						<td>
							<?php
							if($r['4or6']=='2'){
								echo "Six"; 
							}else{
								echo "0";
							}
							?>
						</td>
						
						<td><a href='recentballedit.php?edit=<?php echo $r['recent_id']; ?>'>Edit</a></td>
					</tr>
					<?php endforeach; ?>
					<?php foreach($secondinnings as $r): ?>
					<tr>
						<td><?php echo $r['match_id']; ?></td>
						<td><?php echo get_player_name($r['batsman']); ?></td>
						<td><?php echo get_player_name($r['bowler']); ?></td>
						<td><?php echo $r['ball']; ?></td>
						<td><?php echo $r['runs']; ?></td>
						<td><?php echo $r['wickets']; ?></td>
						<td><?php echo $r['wide']; ?></td>
						<td><?php echo $r['nbs']; ?></td>
						<td><?php echo $r['legbs']; ?></td>
						<td>
							<?php
							if($r['4or6']=='1'){
								echo "Four"; 
							}else{
								echo "0";
							}
							?>
						</td>
						<td>
							<?php
							if($r['4or6']=='2'){
								echo "Six"; 
							}else{
								echo "0";
							}
							?>
						</td>
						
						<td><a href='recentballedit.php?edit=<?php echo $r['recent_id']; ?>'>Edit</a></td>
					</tr>
					<?php endforeach; ?>
					<?php foreach($firstinnings as $r): ?>
					<tr>
						
						<td><?php echo $r['match_id']; ?></td>
						<td><?php echo get_player_name($r['batsman']); ?></td>
						<td><?php echo get_player_name($r['bowler']); ?></td>
						<td><?php echo $r['ball']; ?></td>
						<td><?php echo $r['runs']; ?></td>
						<td><?php echo $r['wickets']; ?></td>
						<td><?php echo $r['wide']; ?></td>
						<td><?php echo $r['nbs']; ?></td>
						<td><?php echo $r['legbs']; ?></td>
						<td>
							<?php
							if($r['4or6']=='1'){
								echo "Four"; 
							}else{
								echo "0";
							}
							?>
						</td>
						<td>
							<?php
							if($r['4or6']=='2'){
								echo "Six"; 
							}else{
								echo "0";
							}
							?>
						</td>
						
						<td><a href='recentballedit.php?edit=<?php echo $r['recent_id']; ?>'>Edit</a></td>
					</tr>
					<?php endforeach; ?>
					<?php foreach($matchlast10overs as $r): ?>
					<tr>
						
						<td><?php echo $r['match_id']; ?></td>
						<td><?php echo get_player_name($r['batsman']); ?></td>
						<td><?php echo get_player_name($r['bowler']); ?></td>
						<td><?php echo $r['ball']; ?></td>
						<td><?php echo $r['runs']; ?></td>
						<td><?php echo $r['wickets']; ?></td>
						<td><?php echo $r['wide']; ?></td>
						<td><?php echo $r['nbs']; ?></td>
						<td><?php echo $r['legbs']; ?></td>
						<td>
							<?php
							if($r['4or6']=='1'){
								echo "Four"; 
							}else{
								echo "0";
							}
							?>
						</td>
						<td>
							<?php
							if($r['4or6']=='2'){
								echo "Six"; 
							}else{
								echo "0";
							}
							?>
						</td>
						
						<td><a href='recentballedit.php?edit=<?php echo $r['recent_id']; ?>'>Edit</a></td>
					</tr>
					<?php endforeach; ?>
					<?php foreach($matchrecent as $r): ?>
					<tr>
						
						<td><?php echo $r['match_id']; ?></td>
						<td><?php echo get_player_name($r['batsman']); ?></td>
						<td><?php echo get_player_name($r['bowler']); ?></td>
						<td><?php echo $r['ball']; ?></td>
						<td><?php echo $r['runs']; ?></td>
						<td><?php echo $r['wickets']; ?></td>
						<td><?php echo $r['wide']; ?></td>
						<td><?php echo $r['nbs']; ?></td>
						<td><?php echo $r['legbs']; ?></td>
						<td>
							<?php
							if($r['4or6']=='1'){
								echo "Four"; 
							}else{
								echo "0";
							}
							?>
						</td>
						<td>
							<?php
							if($r['4or6']=='2'){
								echo "Six"; 
							}else{
								echo "0";
							}
							?>
						</td>
						
						<td><a href='recentballedit.php?edit=<?php echo $r['recent_id']; ?>'>Edit</a></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</section>
		<footer id='footer'>
			<div class="container">
				<p>&copy; copyrights 2016 livecricketinfo.com</p>
			</div>
		</footer>
    </body>
</html>