<?php include('functions.php'); ?>

<!DOCTYPE html><html lang="en"><head><title>Sunrisers Hyderabad Team Squad 2017 | Sunrisers Hyderabad Team Matches - Livecricketinfo</title><meta name="keywords" content="Sunrisers Hyderabad Team Squad 2017 | Sunrisers Hyderabad Team Matches | Free Sunrisers Hyderabad Team Squad 2017"/><meta name="description" content="IPL Team Sunrisers Hyderabad Team Squad 2017 | Sunrisers Hyderabad Team Matches | Free Sunrisers Hyderabad Team Squad 2017"/><?php include('styles.php'); ?></head><body>
<?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-8 paddingright0 margintop15">
				<?php $teams = get_selected_team_players_id(22); ?>

				<div class="content-ipl2017">
					<h1>Sunrisers Hyderabad Team Squad 2017</h1>

					<p>Sunrisers Deccan Chargers have been a part of the Indian Premier League since its first season in 2008. Its the cricket franchise from Hyderabad presently owned by Sun TV Network. Deccan Chronicle Holdings Limited was the previous owner of the team. The Hyderabad team features a strong batting & bowling line up which led its victory in the 2nd season of the League in 2009 under the captaincy of Adam Gilchrist, the elite Aussie batsman-wicket keeper. However, the team perform well in the last 2016 IPL series and again this time the Sunrisers Hyderabad 2017 squad is all geared up for a stellar performance in the upcoming season.</p>
					<div class="flag-image" style="width:100%;">
						<img src="http://www.livecricketinfo.com/images/IPL2017/Sunrisers-hyderabad-team-squad-2017.jpg" class="max-width iplimages" style="margin:auto;" >
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