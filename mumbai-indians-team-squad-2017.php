<?php include('functions.php'); ?>

<!DOCTYPE html><html lang="en"><head><title>Mumbai Indians Team Squad 2017 | Mumbai Indians Team Matches - Livecricketinfo</title><meta name="keywords" content="Mumbai Indians Team Squad 2017 | Mumbai Indians Team Matches | Free Mumbai Indians Team Squad 2017"/><meta name="description" content="IPL Team Mumbai Indians Team Squad 2017 | Mumbai Indians Team Matches | Free Mumbai Indians Team Squad 2017"/><?php include('styles.php'); ?></head><body>
<?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-8 paddingright0 margintop15">
				<?php $teams = get_selected_team_players_id(19); ?>

				<div class="content-ipl2017">
					<h1>Mumbai Indians Team Squad 2017</h1>

					<p>When it comes to performance, the Mumbai Indians have been successful in all the seasons. Even this year, they will want something great to happen so that they are able to make their place as one of the strongest finalists for the Indian Premier League T20 2017 series. With Rohit Sharma being their captain, the team is already on cloud eight as the tactics of Rohit Sharma are just superb. His ability to take quick actions can surprise any team. The team receives the support of both the young as well as experienced players thus maintaining a balance which is a good combination. The key players of this team are Corey Anderson and Kieron Polland. Both these players are just fantastic as Polland is an all-round player thus proving an asset to the team. On the other hand Corey Anderson is also an all-rounder who can be utilized both as a batsman and a bowler in times of need .</p>
					<div class="flag-image" style="width:100%;">
						<img src="http://www.livecricketinfo.com/images/IPL2017/Mumbai_Indians_team-2017.jpg" class="max-width iplimages" style="margin:auto;" >
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