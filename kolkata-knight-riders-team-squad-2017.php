<?php include('functions.php'); ?>

<!DOCTYPE html><html lang="en"><head><title>Kolkata Knight Riders Team Squad 2017 | Kolkata Knight Riders Team Matches | KKR Team Details 2017 - Livecricketinfo</title><meta name="keywords" content="Kolkata Knight Riders Team Squad 2017 | Kolkata Knight Riders Team Matches | Free Kolkata Knight Riders Team Squad 2017"/><meta name="description" content="IPL Team Kolkata Knight Riders Team Squad 2017 | Kolkata Knight Riders Team Matches | Free Kolkata Knight Riders Team Squad 2017"/><?php include('styles.php'); ?></head><body>
<?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-8 paddingright0 margintop15">
				<?php $teams = get_selected_team_players_id(18); ?>

				<div class="content-ipl2017">
					<h1>Kolkata Knight Riders Team Squad 2017</h1>

					<p>Kolkata Knight Riders (KKR) is one of the teams which play in the Indian Premier League (IPL). This team represents the city of Kolkata, West Bengal. This is one of the most consistent teams of IPL . From the very first year i.e. 2008 till date KKR holds a very stable position in an unstable game of cricket. It is considered as the most successful team of IPL so far. The owner of this team come from the cinema industry of India . Bollywood celebs Sahrukh Khan ,Juhi Chawala and Jay Mehta are the owners of KKR . KKR has numerous followers because of their incredible potential to turn a match around thus always defeating their opponent. Audiences are holding on to their seats for Kolkata Knight Riders IPL 10 squad and wait for the magic from KKR in IPL 2017 .</p>
					<div class="flag-image" style="width:100%;">
						<img src="http://www.livecricketinfo.com/images/IPL2017/Kolkata-Knight-Riders-IPL-2017-Squad.jpg" class="max-width iplimages" style="margin:auto;" >
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