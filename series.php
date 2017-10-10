<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>India, England Series | World Cricket Series | Popular Cricket Series | Cricket Worlds Cup Series - Livecricketinfo</title>
		<meta name="keywords" content="India, England Series, New World Cricket Series | Most Popular Cricket Series | Latest Cricket Worlds Cup Series"/>
		
		<meta name="description" content="India, England Series, New World Cricket Series | Most Popular Cricket Series | Latest Cricket Worlds Cup Series"/>
	    <?php include('styles.php'); ?>
	</head>
<body>
<?php include('top-four-matches.php'); ?>
	<section class="schedule">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="background-color">
					<h1 class="title">Current Running Series</h1>
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
						<?php foreach($serieses as $series): ?>
						<div class="series">
							<h1><a href="http://www.livecricketinfo.com/cricket-series/<?php echo $series['url']; ?>/<?php echo $series['ID']; ?>"><?php echo $series['seriesname']; ?></a></h1>
							<?php if($series['team_one_name']!=$series['team_two_name']): ?>
							<div class="teams"><b>Teams</b> : <?php echo get_team_name($series['team_one_name']); ?>, <?php echo get_team_name($series['team_two_name']); ?></div>
							<?php endif; ?>
							<div class="teams"><b>Matches </b>: <?php if($series['ODIs']!=0){echo $series['ODIs'].' '.' ODIs';} ?>  <?php if($series['Tests']!=0){echo $series['Tests'].' '.' Tests';} ?> <?php if($series['twentytwenty']!=0){echo $series['twentytwenty'].' '.' T20s';} ?> </div>
							<div class="teams"><b>Date </b>: <?php echo $series['startseries']; ?> - <?php echo $series['endseries']; ?></div>
						</div>
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