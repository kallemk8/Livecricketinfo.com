<?php include('functions.php'); ?>

<!DOCTYPE html><html lang="en"><head><title>Royal Challengers Bangalore Team Squad 2017 | RCB Team Matche Details - Livecricketinfo</title><meta name="keywords" content="Royal Challengers Bangalore Team Squad 2017 | Royal Challengers Bangalore Team Matches | Free Royal Challengers Bangalore Team Squad 2017"/><meta name="description" content="IPL Team Royal Challengers Bangalore Team Squad 2017 | Royal Challengers Bangalore Team Matches | Free Royal Challengers Bangalore Team Squad 2017"/><?php include('styles.php'); ?></head><body>
<?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-8 paddingright0 margintop15">
				<?php $teams = get_selected_team_players_id(21); ?>

				<div class="content-ipl2017">
					<h1>Royal Challengers Bangalore Team Squad 2017</h1>

					<p>Royal Challengers Bangalore is Armed With a Strong Squad for IPL 2017 . Indian premier League was introduced in 2008 with eight teams all representing either a state or a city. This far IPL has produced five editions. Royal challengers Bangalore was with the IPL organization since its inception and the first edition had Indian batting legend Rahul Dravid spearheading the team. But for the second and third editions Anil Kumble was named captain of this side. Royal challengers had a tough time with the first edition of IPL but the second edition proved to be good for the Bangalore team. Royal challengers Bangalore became the finalist in the second , fourth and nineth editions of IPL. The owner of this team is the business tycoon Mr.Vijaya Malya.</p>
					<div class="flag-image" style="width:100%;">
						<img src="http://www.livecricketinfo.com/images/IPL2017/Royal-Challengers-Bangalore-team-squad-2017.jpg" class="max-width iplimages" style="margin:auto;" >
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