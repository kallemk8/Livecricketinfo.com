<?php 
	include('functions.php');
	$postid = $_GET['postid'];
	$post = get_single_playerinfo($postid);
	$bowlerrecords = get_bowler_recods($postid); 
	$batsmanrecord = get_batsman_recods($postid);
	$playername = get_single_playerfullname($postid);
	$playercountry = get_single_playercountry($postid);
	$playerallteams = get_player_all_teams($postid);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo $playername; ?> <?php echo get_country_name($playercountry); ?> Player | <?php echo get_country_name($playercountry); ?> Players Full Details | <?php echo $playername; ?> batting and bowling statistics - Livecricketinfo</title>
		<meta name="keywords" content="<?php echo $playername; ?> player profile, <?php echo $playername; ?> batting and bowling statistics, <?php echo $playername; ?> <?php echo get_country_name($playercountry); ?> Player | <?php echo get_country_name($playercountry); ?> Player Full Details, <?php echo $playername; ?> bornplace, country, <?php echo $playername; ?> Full Score "/>
		<meta name="description" content="<?php echo $playername; ?> player profile, <?php echo $playername; ?> batting and bowling statistics, <?php echo $playername; ?> <?php echo get_country_name($playercountry); ?> Player | <?php echo get_country_name($playercountry); ?> Player Full Details | <?php echo $playername; ?> Height, <?php echo $playername; ?> bornplace, <?php echo $playername; ?> country, <?php echo $playername; ?> batting style, <?php echo $playername; ?> bowling style, <?php echo $playername; ?> Full Score"/>
		<?php include('styles.php'); ?>
	</head>
<body>
<?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php foreach ($post as $key => $value): ?>
				<div class="margintop15">
					<?php if($value['coverpic']): ?>
					<div class="player-image-with-title" style="background:url('http://www.livecricketinfo.com/<?php echo $value['coverpic']; ?>'); background-size:cover;   <?php if($value['coverpic']){echo "min-height: 375px";} ?> ">
					<!-- <h1 class="player-title"><?php echo $value['fullname']; ?></h1> -->
					</div>
					<?php endif; ?>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="header-section">
							<?php if($value['displaypic']): ?>
							<img src="http://www.livecricketinfo.com/<?php echo $value['displaypic']; ?>" class="max-width" />
							<br/>
							<?php endif; ?>
							<h1 class="player-name-title"><?php echo $value['fullname']; ?></h1>
							<h1 class="player-name-title"><?php echo get_country_name($playercountry); ?></h1>
							<div class="personal-info">Personal Information</div>
							<div class="player-mini-items"><b>Date Of birthday:</b> <span>
							<?php 
							$date = date_create($value['birthday']);
							echo $data = date_format($date,"F d, Y"); 
							$date2 = date_diff($date, date_create('today'))->y;
							echo " &nbsp;(".$date2. " &nbsp;Years)";
							?> 
							</span></div>
							<div class="player-mini-items"><b>Nick Name:</b> <?php echo $value['nickname']; ?> </div>
							<div class="player-mini-items"><b>Born Place:</b> <?php echo $value['bornplace']; ?> </div>
							<div class="player-mini-items"><b>Height:</b> <?php echo $value['height']; ?> </div>
							<div class="player-mini-items"><b>Playing role:</b> <?php echo $value['role']; ?> </div>
							<div class="player-mini-items"><b>Batting style:</b> <?php echo $value['battingstyle']; ?> </div>
	
							<div class="player-mini-items"><b>Bowling style:</b> <?php echo $value['bowlingstyle']; ?> </div>
							<?php $playerallteam = explode(",",$playerallteams) ?>
							
							<?php $count=1; foreach($playerallteam as $s): ?>
							<div class="player-mini-items">
								<?php if($count==1){echo "<b>Major teams:</b> ";} ?>
								<?php echo get_team_name($s).", &nbsp;"; ?>
							</div>
							<?php $count++; endforeach; ?>
						</div>
					</div>
					<div class="col-md-8 paddingleft0">
						<div class="content margintop15" >
							<?php if(count($batsmanrecord)!=0): ?>
							<div class="about-profile-title">Batting Career Summary</div>
							<div class="">
								<table class="table fontsize14">
									<thead>
									<tr>
										<th></th><th>M</th><th>Inn</th><th>no</th><th>Runs</th><th>HS</th><th>100s</th><th>200s</th><th>50s</th><th>4s</th><th>6s</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach($batsmanrecord as $batsman): ?>
										<tr>
											<td><b>
												<?php if($batsman['matchtype']==1){echo "Test";} ?>
												<?php if($batsman['matchtype']==2){echo "ODI's";} ?>
												<?php if($batsman['matchtype']==3){echo "T20's";} ?>
												</b>
											</td>
											<td><?php echo $batsman['matches']; ?></td>
											<td><?php echo $batsman['playedinnings']; ?></td>
											<td><?php echo $batsman['notouts']; ?></td>
											<td><?php echo $batsman['totalruns']; ?></td>
											<td><?php echo $batsman['topscore']; ?></td>
											<td><?php echo $batsman['hundersnumbers']; ?></td>
											<td><?php echo $batsman['twohunderds']; ?></td>
											<td><?php echo $batsman['fiftys']; ?></td>
											<td><?php echo $batsman['fours']; ?></td>
											<td><?php echo $batsman['sixes']; ?></td>
										</tr>
										<?php endforeach; ?>
									</tbody>

								</table>
							</div>
							<?php endif; ?>
							<?php if(count($bowlerrecords)!=0): ?>
							<div class="about-profile-title">Bowling Career Summary</div>
							<div class="">
								<table class="table fontsize14">
									<thead>
									<tr>
										<th></th><th>M</th><th>Inn</th><th>B</th><th>Runs</th><th>Wick</th><th>BBI</th><th>BIM</th><th>5 W</th><th>10 W</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach($bowlerrecords as $bowler): ?>
										<tr>
											<td>
												<?php if($bowler['matchtype']==1){echo "Test";} ?>
												<?php if($bowler['matchtype']==2){echo "ODI's";} ?>
												<?php if($bowler['matchtype']==3){echo "T20's";} ?>
											</td>
											<td><?php echo $bowler['matches']; ?></td>
											<td><?php echo $bowler['innings']; ?></td>
											<td><?php echo $bowler['balls']; ?></td>
											<td><?php echo $bowler['runs']; ?></td>
											<td><?php echo $bowler['wickets']; ?></td>
											<td><?php echo $bowler['bestinings']; ?></td>
											<td><?php echo $bowler['bestinmatch']; ?></td>
											<td><?php echo $bowler['fivewickets']; ?></td>
											<td><?php echo $bowler['tenwickets']; ?></td>
										</tr>
										<?php endforeach; ?>
									</tbody>

								</table>
							</div> 
							<?php endif; ?>
							<div class="about-profile-title">About <?php echo $playername; ?></div>
							<div class="fontsize14"><?php echo $value['aboutus'] ?></div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>

		</div>
	</div>
</section>
<?php include('footer.php'); ?>