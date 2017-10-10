<?php include('functions.php'); 
	if($_GET['page']){
		$page = $_GET['page'];
		$pagetotal = $page*12;
	}
	else{
		$pagetotal =12;
	}
	$videos = get_number_videos($pagetotal);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Cricket Hight Quality Videos | Latest Cricket World Videos | India Cricket Team Videos | Latest Match Videos Free to Watch - Livecricketinfo</title>
		<meta name="keywords" content="Cricket Hight Quality Videos, Latest Cricket World Videos, India Cricket Team Videos, Latest Match Videos Free to Watch - Livecricketinfo"/>
		<meta name="description" content="Cricket Hight Quality Videos, Latest Cricket World Videos, India Cricket Team Videos, Latest Match Videos Free to Watch - Livecricketinfo"/>
	    <?php include('styles.php'); ?>
	</head>
<body>
<?php include('top-four-matches.php'); ?>
	<section class="schedule">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="background-color">
					<h1 class="title">Latest Cricket Videos</h1>
						<div class="row">
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
						<?php foreach($videos as $video):?>
						<div class="col-md-4">
							<div class="flag-image">
								<a href="http://www.livecricketinfo.com/cricket-videos/<?php echo $video['url']; ?>/<?php echo $video['ID']; ?>">
								<img width="100%" height="200px" src="http://www.livecricketinfo.com/<?php echo $video['videoimage']; ?>">
								<span class="post-image-play-button"></span>
								</a>
							</div>

							<div class="video-title">
								<a href="http://www.livecricketinfo.com/cricket-videos/<?php echo $video['url']; ?>/<?php echo $video['ID']; ?>"><?php echo $video['videotitle'] ?></a>
							</div>
						</div>
						<?php endforeach; ?>
						</div>
						<div class="row">
							<div class="col-md-12">
								
								<ul class="pagination">
									<li><a href="http://www.livecricketinfo.com/videos">1</a></li>
									<li><a href="http://www.livecricketinfo.com/videos?page=2">2</a></li>
									<li><a href="http://www.livecricketinfo.com/videos?page=3">3</a></li>
									<li><a href="http://www.livecricketinfo.com/videos?page=4">4</a></li>
									<li><a href="http://www.livecricketinfo.com/videos?page=5">5</a></li>
								</ul>
								
							</div>
						</div>
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