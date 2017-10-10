<?php include('functions.php'); ?>

<!DOCTYPE html><html lang="en"><head><title>Rising Pune Supergiants Team Squad 2017 | Delhi Daredevils Team Matches - Livecricketinfo</title><meta name="keywords" content="Rising Pune Supergiants Team Squad 2017 | Rising Pune Supergiants Team Matches | Free Rising Pune Supergiants Team Squad 2017"/><meta name="description" content="IPL Team Rising Pune Supergiants Team Squad 2017 | Rising Pune Supergiants Team Matches | Free Rising Pune Supergiants Team Squad 2017"/><?php include('styles.php'); ?></head><body>
<?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-8 paddingright0 margintop15">
				<?php $teams = get_selected_team_players_id(20); ?>

				<div class="content-ipl2017">
					<h1>Rising Pune Supergiants Team Squad 2017</h1>

					<p>Rising Pune Supergiants is often abbreviation as RPS and this cricket team is going to represent Pune, Maharashtra in the Indian Premier League for 2017 IPL season. This time India’s state Maharashtra have two teams such as Pune (Rising Pune Supergiants (RPS) and Mumbai (Mumbai Indian’s (MI)). Rising Pune Supergiants (RPS) was founded in 2015 and the owner of this team is Sanjiv Goenka. Officially team name was announced on 18th January, 2016 by owner Sanjiv Goenka at Kolkata.
<br/><br/>
Chennai and Rajasthan IPL teams are suspended for 2017 session also , so this team got place to play IPL for this 2017 season. Rising Pune Supergiants (RPS) captain is best wicket keeper, batsman and India captain MS Dhoni he also lead Chennai Super Kings in IPL all season. RPS coach is Stephen Fleming and the Raghu lyer is the CEO of the Super gaints. Rising Pune Supergiants (RPS) home ground is Maharashtra Cricket Association Stadium which is located in Pune.</p>
					<div class="flag-image" style="width:100%;">
						<img src="images/IPL2017/Rising-Pune-Supergiants-Team-Squad-2017.jpg" class="max-width iplimages" style="margin:auto;" >
					</div>
				
				<table class="table table-borderd" >
					<tr>
						<th>Country</th>
						<th>Player Name</th>
					</tr>
					<?php foreach($teams as $id): ?>
						
						<tr>
							<td><?php echo get_country_name(get_player_country($id['batsman_id'])); ?></td>
							<td><?php echo get_player_name($id['batsman_id']); ?></td>
						</tr>
					<?php endforeach; ?>
						
				</table>
				</div>
			</div>
			<div class="col-md-4">
				<div class="margintop15">
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
				<?php include('sidebar.php'); ?>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>