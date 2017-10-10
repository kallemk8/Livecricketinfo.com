<?php include('functions.php'); ?>

<!DOCTYPE html><html lang="en"><head><title>Delhi Daredevils Team Squad 2017 | Delhi Daredevils Team Matches - Livecricketinfo</title><meta name="keywords" content="Delhi Daredevils Team Squad 2017 | Delhi Daredevils Team Matches | Free Delhi Daredevils Team Squad 2017"/><meta name="description" content="Delhi Daredevils Team Squad 2017 | Delhi Daredevils Team Matches | Free Delhi Daredevils Team Squad 2017"/><?php include('styles.php'); ?></head><body>
<?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-8 paddingright0 margintop15">
				<?php $teams = get_selected_team_players_id(15); ?>

				<div class="content-ipl2017">
					<h1>Delhi Daredevils Team Squad 2017</h1>

					<p>The Delhi daredevils, founded in 2008, owned by the GMR Group, has been one of the critics and audiences favourite since the first edition of the Indian premier league. The capital citys home side, this team, lead in IPL 5 by Virender Sehwag and coached by Eric Simmons, famed ex South African cricketer, has defeated several powerful sides in the last seasons, and has yet not been able to garner an IPL trophy in its kitty . But all that is set to change in the coming season, the Indian premier league 2017.</p>
					<div class="flag-image" style="width:100%;">
						<img src="http://www.livecricketinfo.com/images/IPL2017/Delhi-daredevils-team-squad-2017.jpeg" class="max-width iplimages" style="margin:auto;" >
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