<?php include('functions.php'); ?>

<!DOCTYPE html><html lang="en"><head><title>Kings XI Punjab Team Squad 2017 | Kings XI Punjab Team Matches - Livecricketinfo</title><meta name="keywords" content="Kings XI Punjab Team Squad 2017 | Kings XI Punjab Team Matches | Free Kings XI Punjab Team Squad 2017"/><meta name="description" content="IPL Team Kings XI Punjab Team Squad 2017 | Kings XI Punjab Team Matches | Free Kings XI Punjab Team Squad 2017"/><?php include('styles.php'); ?></head><body>
<?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-8 paddingright0 margintop15">
				<?php $teams = get_selected_team_players_id(17); ?>

				<div class="content-ipl2017">
					<h1>Kings XI Punjab Team Squad 2017</h1>

					<p>Sanjay Banger, the former player in Team India, is preparing himself to look in new avatar to become a coach of Kings XI Punjab in Indian Premier League 2017 . During the auction, he is very happy for the decision of team to have Glenn Maxwell and Mitchell Johnson. Mitchell Johnson played very well in last season for Mumbai Indians as he is considered to be the fastest bowler of the world. He is expecting his awe-inspiring form this season. On the other side, Glenn Maxwell and George Bailey are said to be most explosive and best batsmen in T20 World Championship in the globe. Thisara Perera is the all-rounder in Sri Lanka team who has potential to win matches on his own. Balaji is proven T20 bowler and Rishi Dhawan is all-rounder player in one-day format. For ideal strike, team also has Virender Sehwag with five more Australian players.</p>
					<div class="flag-image" style="width:100%;">
						<img src="http://www.livecricketinfo.com/images/IPL2017/Kings-XI-punjab-team-squad-2017.jpg" class="max-width iplimages" style="margin:auto;" >
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