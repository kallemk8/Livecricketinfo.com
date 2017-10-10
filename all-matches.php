<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cricket Matches Result | Latest Matches Dates | All Matches Results and Upcoming Match Details - Livecricketinfo</title>
		<meta name="keywords" content="Cricket Matches Result, Latest Matches Dates, All Matches Results and Upcoming Match Details "/>
		
		<meta name="description" content="Cricket Matches Result, Latest Matches Dates, All Matches Results and Upcoming Match Details "/>
	    <?php include('styles.php'); ?>
	</head>
<body>
<?php 
	$posts = get_all_posts(20);
?>
<div class="container">
	<div class="only-desktop">
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
	<div class="only-mobile">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- livecricket mobile 300 -->
	<ins class="adsbygoogle"
	     style="display:inline-block;width:300px;height:250px"
	     data-ad-client="ca-pub-1518250080154239"
	     data-ad-slot="7903685933"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
	</div>
</div>
<?php include('top-four-matches.php'); ?>
	<section class="schedule">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="background-color">
					<h1 class="title">Latest Matches Results</h1>
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
					<div class="">
						<?php foreach($posts as $post): ?>
							<?php if($post['match_status']!=0): ?>
						<div class="series">
							<h1><a style="color:#000; font-size:16px;" href="http://www.livecricketinfo.com/<?php echo $post['url']; ?>/<?php echo $post['ID']; ?>"><?php echo $post['match_title']; ?></a></h1>
							<?php if($post['team_one_name']!=$post['team_two_name']): ?>
							<div class="teams"><b>Teams</b> : <?php echo get_team_name($post['team_one_name']); ?>, <?php echo get_team_name($post['team_two_name']); ?></div>
							<?php endif; ?>
							<div class="teams" style="color:rgba(237, 28, 36, 0.7); font-weight:bold;">
							<?php if($post['match_status']==2): ?>
							<?php echo $post['result']; ?>
				
							<?php endif; ?>
							<?php if($post['match_status']==1||$post['match_status']==0): ?>
							<?php if($post['match_inning']==2): ?>
				
								<?php echo get_team_mini_name($post['team_name_2']); ?> need <?php echo get_match_totals($post['ID'], 1)-get_match_totals($four['ID'], 2)+1; ?> 
		
							<?php endif; ?>
							<?php if($post['match_inning']==1||$post['match_inning']==0): ?>
				
								<?php echo $post['result']; ?>
		
							<?php endif; ?>
							<?php endif; ?>
							</div>
							<div class="teams">
							<b>Date </b>: 
							<?php $date=date_create($post['matchdate']);
							echo date_format($date,"M dS Y"); ?> 
							</div>
							<?php if($post['man_of_the_match']): ?>
							<div class="teams">
							<b>Player Of The Match </b>: <?php echo $post['man_of_the_match']; ?> 
							</div>
							<?php endif; ?>
							<div class="teams">
							<b>Venue </b>: <?php echo $post['match_venue']; ?> 
							</div>
						</div>
					<?php endif; ?>
						<?php endforeach; ?>
					</div>
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
				<div class="col-md-3 paddingleft0">
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
					<?php include('sidebar.php'); ?>
				</div>
			</div>
		</div>

	</section>
	
<?php include('footer.php'); ?>