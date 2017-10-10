<?php include('functions.php'); ?>
<?php 
	$teamrating = get_teams_rating();
	$batsmanrating = get_batsman_rating();
	$bowlerrating = get_bowler_rating();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>ICC Cricket Ranking | ICC Player and Team Rankings | World Cricket Test, ODI, T20's Ranking  - Livecricketinfo</title>
		<meta name="keywords" content="ICC Cricket Ranking | ICC Player and Team Rankings | World Cricket Test, ODI, T20's Ranking  - Livecricketinfo"/>
		<meta name="description" content="ICC Cricket Ranking | ICC Player and Team Rankings | World Cricket Test, ODI, T20's Ranking  - Livecricketinfo"/>
		<?php include('styles.php'); ?>
	</head>
<body>
<?php include('top-four-matches.php'); ?>
<style type="text/css">
	.col-md-3{
		padding:0px;
	}
</style>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="rating-heading">ICC Cricket Player and Team Rankings</h2>
				<div class="col-md-3">
					<table class="table" style="background:#fff; ">
						<tr>
							<th >Rating</th>
						</tr>
						<tr>
							<th>Team</th>
						</tr>
						<?php foreach($teamrating as $team): ?>
						<tr>
							<th  class="selectedone"><?php echo get_team_name($team['team']); ?></th>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-md-3">
				
					<table class="table" style="background:#fff; ">
						<tr>
							<th colspan="3">Test Rating</th>
						</tr>
						<tr>
							<th>Position</th>
							<th>Rating</th>
							<th>Points</th>
						</tr>
						<?php foreach($teamrating as $team): ?>
						<tr>
							<td><?php echo $team['Testrank']; ?></td>
							
							<td><?php echo $team['testrating']; ?></td>
							<td><?php echo $team['testpoints']; ?></td>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-md-3">
				<table class="table" style="background:#fff; ">
					<tr>
						<th colspan="3">ODI Rating</th>
					</tr>
					<tr>
						<th>Position</th>
						<th>Rating</th>
						<th>Points</th>
					</tr>
					<?php foreach($teamrating as $team): ?>
					<tr>
						<td><?php echo $team['ODIrank']; ?></td>
						<td><?php echo $team['odirating']; ?></td>
						<td><?php echo $team['odipoints']; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				</div>
				<div class="col-md-3">
				<table class="table" style="background:#fff;">
					<tr>
						<th colspan="3">T20 Rating</th>
					</tr>
					<tr>
						<th>Position</th>
						<th>Rating</th>
						<th>Points</th>
					</tr>
					<?php foreach($teamrating as $team): ?>
					<tr>
						<td><?php echo $team['Twentyrank']; ?></td>
						<td><?php echo $team['twentyrating']; ?></td>
						<td><?php echo $team['twentypoints']; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				</div>
				<!--<h2 class="rating-heading">Batsman Ratings</h2>
				<div class="col-md-3">
					<table class="table" style="background:#fff;">
						<tr>
							<th >Rating</th>
						</tr>
						<tr>
							<th >Player</th>
						</tr>
						<?php foreach($batsmanrating as $batsman): ?>
						<tr>
							<th  class="selectedone"><?php echo get_player_name($batsman['batsman']); ?></th>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-md-3">
				<table class="table" style="background:#fff; ">
					<tr>
						<th colspan="3">Test Rating</th>
					</tr>
					<tr>
						<th>Position</th>
						<th>Points</th>
						<th>Best Rating</th>
					</tr>
					<?php foreach($batsmanrating as $batsman): ?>
					<tr>
						<td><?php echo $batsman['testrank']; ?></td>
						
						<td><?php echo $batsman['testrating']; ?></td>
						<td><?php echo $batsman['testpoints']; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				</div>
				<div class="col-md-3">
				<table class="table" style="background:#fff;">
					<tr>
							<th  colspan="3">ODI Rating</th>
						</tr>
					<tr>
						<th>Position</th>
						<th>Points</th>
						<th>Best Rating</th>
					</tr>
					<?php foreach($batsmanrating as $batsman): ?>
					<tr>
						<td><?php echo $batsman['odirank']; ?></td>
						<td><?php echo $batsman['odirating']; ?></td>
						<td><?php echo $batsman['odipoints']; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				</div>
				<div class="col-md-3">
				<table class="table" style="background:#fff; ">
					<tr>
						<th colspan="3">T20 Rating</th>
					</tr>
					<tr>
						<th >Position</th>
						<th >Points</th>
						<th >Best Rating</th>
					</tr>
					<?php foreach($batsmanrating as $batsman): ?>
					<tr>
						<td><?php echo $batsman['twentyrank']; ?></td>
						<td><?php echo $batsman['twentyrating']; ?></td>
						<td><?php echo $batsman['twentypoints']; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				</div>

				<h2 class="rating-heading">Bowler Ratings</h2>
				<div class="col-md-3">
					<table class="table" style="background:#fff;">
						<tr>
							<th >Rating</th>
						</tr>
						<tr>
							<th >Player</th>
						</tr>
						<?php foreach($bowlerrating as $bowler): ?>
						<tr>
							<th class="selectedone"><?php echo get_player_name($bowler['bowler']); ?></th>
						</tr>
						<?php endforeach; ?>
					</table>
				</div>
				<div class="col-md-3">

				<table class="table" style="background:#fff;">
					<tr>
							<th colspan="3">Test Rating</th>
						</tr>
					<tr>
						<th class="blackselected">Position</th>
						<th class="blackselected">Points</th>
						<th class="blackselected">Best Rating</th>
					</tr>
					<?php foreach($bowlerrating as $bowler): ?>
					<tr>
						<td><?php echo $bowler['testrank']; ?></td>
						<td><?php echo $bowler['testrating']; ?></td>
						<td><?php echo $bowler['testpoints']; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				</div>
				<div class="col-md-3">
				<table class="table" style="background:#fff;">
					<tr>
							<th  colspan="3">ODI Rating</th>
						</tr>
					<tr>
						<th class="blackselected">Position</th>
						<th class="blackselected">Points</th>
						<th class="blackselected">Best Rating</th>
					</tr>
					<?php foreach($bowlerrating as $bowler): ?>
					<tr>
						<td><?php echo $bowler['odirank']; ?></td>
						<td><?php echo $bowler['odirating']; ?></td>
						<td><?php echo $bowler['odipoints']; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				</div>
				<div class="col-md-3">
				<table class="table" style="background:#fff; ">
					<tr>
							<th  colspan="3">T20 Rating</th>
						</tr>
					<tr>
						<th class="blackselected">Position</th>
						<th class="blackselected">Points</th>
						<th class="blackselected">Best Rating</th>
					</tr>
					<?php foreach($bowlerrating as $bowler): ?>
					<tr>
						<td><?php echo $bowler['twentyrank']; ?></td>
						<td><?php echo $bowler['twentyrating']; ?></td>
						<td><?php echo $bowler['twentypoints']; ?></td>
					</tr>
					<?php endforeach; ?>
				</table>
				</div>
				-->

				<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
				<!-- contact -->
				<ins class="adsbygoogle"
				     style="display:block"
				     data-ad-client="ca-pub-1518250080154239"
				     data-ad-slot="2550265139"
				     data-ad-format="auto"></ins>
				<script>
				(adsbygoogle = window.adsbygoogle || []).push({});
				</script>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>