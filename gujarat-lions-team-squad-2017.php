<?php include('functions.php'); ?>

<!DOCTYPE html><html lang="en"><head><title>Gujarat Lions Team Squad 2017 | Gujarat Lions Team Matches - Livecricketinfo</title><meta name="keywords" content="Gujarat Lions Team Squad 2017 | Gujarat Lions Team Matches | Free Gujarat Lions Team Squad 2017"/><meta name="description" content="IPL Team Gujarat Lions Team Squad 2017 | Gujarat Lions Team Matches | Free Gujarat Lions Team Squad 2017"/><?php include('styles.php'); ?></head><body>
<?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-8 paddingright0 margintop15">
				<?php $teams = get_selected_team_players_id(16); ?>

				<div class="content-ipl2017">
					<h1>Gujarat Lions Team Squad 2017</h1>

					<p>Gujarat Lions Team is the cricket franchise which has its base in Rajkot and represents the state in the Indian Premier League. The current captain of the team is Suresh Raina who is the well known player of the Indian cricket team as well. The team has never been the lifted the IPL trophy because it is just a year old in Indian Premier Leauge. Gujarat Lions Team is a new team after Chennai Super Kings (CSK) and Rajasthan Royals (RR) face a termination in the year of 2015 by BCCI due to violation of the agreement terms . However, Both terminated teams will participale in IPL once again in 2018 . The owner of the franchise is Keshav Bansal from Intex Technologies . He also happens to be the chairman of the franchise. Other players of this team are Ravindra Jadeja , Brendon McCullum, James Faulkner, and Dwayne Bravo. An amount of sixty seven million dollars were spent by the group for acquiring the team. This was the cheapest acquisition in the auction.</p>
					<div class="flag-image" style="width:100%;">
						<img src="http://www.livecricketinfo.com/images/IPL2017/Gujarat-Lions-team-squad-2017.jpg" class="max-width iplimages" style="margin:auto;" >
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