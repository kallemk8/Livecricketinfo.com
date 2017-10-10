<?php include('functions.php'); 
	$serieses = get_all_series();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>India vs England Series Schedule 2016 | Latest India vs England 3rd Test Updates | India Cricket Team Updates - Livecricketinfo</title>
		<meta name="keywords" content="India vs England Series Schedule 2016, India vs England 3rd Test Live Score News, Latest India vs England 3rd Test Updates, India Cricket Team Updates, Livecricketinfo"/>
		<meta name="description" content="India vs England Series Schedule 2016, India vs England 3rd Test Live Score News, Latest India vs England 3rd Test Updates, India Cricket Team Updates, Latest Cricket News, Free Cricket Updates, World Cricket News, India Cricket Team Updates, Top Cricket New Website"/>
		<?php include('styles.php'); ?>
	</head>
<body>
<?php include('top-four-matches.php'); ?>
	<section class="schedule">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="background-color">
					<h1 class="title">Cricket Schedule</h1>
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
					<table class="table">
						<thead>
							<tr>
								<th>Month</th>
								<th>Series Name</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($serieses as $series): ?>
							<tr>
								<td><?php echo $series['startdate']; ?></td>
								<td><a href="http://www.livecricketinfo.com/cricket-series/<?php echo $series['url']; ?>/<?php echo $series['ID']; ?>"><?php echo $series['seriesname']; ?></a><br/><span><?php echo $series['startdate']; ?> - <?php echo $series['enddate']; ?></span></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
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