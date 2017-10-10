<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include('styles.php'); ?>
		<title>Live Cricket Score,Live Coverage,Cricket News,Videos - Livecricketinfo</title>
		<meta name="keywords" content="latest india cricket score, india cricket coverage, cricket News, videos, photos, india win match details, live video streaming, download cricket info"/>
		<meta name="description" content="Live Cricket Score, Live Cricket Coverage, Cricket News, Cricket Videos, Cricket Photos, india cricket match Details, india cricket videos, world cricket info"/>
		
	</head>
	<body>
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
	<div class="slideshowads">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- leaderboard -->
		<ins class="adsbygoogle"
		     style="display:inline-block;width:728px;height:90px"
		     data-ad-client="ca-pub-8244067207703025"
		     data-ad-slot="7057648592"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
	</div>
<?php 
	$posts = get_number_newsposts('5');
	$videos = get_number_videos('10');
	$photos = get_number_photos('10');
	
?>
	<?php include('top-four-matches.php'); ?>
		<section class="page-content">
			<div class="container">
				<div class="row">
				<div class="col-md-3">
					<div class="right-sidebar">
						<h2 class="sidebar-title">LATEST VIDEOS</h2>

						<ul class="latest-news-sidebar">
							<?php foreach($videos as $video):?>
							<li><a href="http://www.livecricketinfo.com/cricket-videos/<?php echo $video['url']; ?>/<?php echo $video['ID']; ?>">
							<img src="http://www.livecricketinfo.com/<?php echo $video['videoimage']; ?>" class="max-width" width="100%" >
							<?php echo $video['videotitle'] ?></a>
							<div class="time-remaing"><?php echo $video['postdate']; ?></div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="col-md-6">
					<div class="content">
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
						<?php foreach($posts as $post): ?>
						<div class="post">
							<div class="post-image">
								<a href="http://www.livecricketinfo.com/cricket-news/<?php echo $post['post_url']; ?>/<?php echo $post['ID']; ?>">
									<img src="http://www.livecricketinfo.com/<?php echo $post['postimage']; ?>" class="post-image">
									</a>
							</div>
							<div class="post-title">
								<a href="http://www.livecricketinfo.com/cricket-news/<?php echo $post['post_url']; ?>/<?php echo $post['ID']; ?>"><?php echo $post['post_title']; ?></a>
							</div>
							<div class="post-description">
							<?php if($post['post_excerpt']){ 										
							echo $post['post_excerpt'];
							}else{
								echo substr($post['post_content'], 0,390);
							} 
							?>
							</div>
							<div class="read-more">
								<a href="http://www.livecricketinfo.com/cricket-news/<?php echo $post['post_url']; ?>/<?php echo $post['ID']; ?>" class="post-readmore">Read more</a>
							</div>
						</div>
						<?php endforeach; ?>


					</div>
					<div class="read-more-posts-ajax">
						<a href="#" class="read-more-ajax">Read More</a>
					</div>
				</div>
				<div class="col-md-3">
					<div class="left-sidebar">
						<h2 class="sidebar-title">Player Search</h2>
						<div class="player-search">
							<div class="search-input">
								<input type="text" name="search-player" placeholder="Search Player" />
							</div>
							<div class="search-button">
								<input type="submit" value="GO" class="search-button-text">
							</div>
						</div>
					</div>
					<div class="left-sidebar">
					<h2 class="sidebar-title">LATEST PHOTOS</h2>
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
					<ul class="latest-news-sidebar">
						<?php 
						$numberphotos = get_number_photos("10");
						foreach($numberphotos as $photo):?>
						<?php $mediafiles = get_gallery_media_files_count($photo['ID']);
							$singlephotos = get_photos_type_of_photos($photo['ID']);
						?>
						
						<li><a href="http://www.livecricketinfo.com/cricket-photos/<?php echo $photo['url']; ?>/<?php echo $photo['ID']; ?>">
							<?php $count=1; foreach($singlephotos as $media): ?>
								<?php if($count ==1): ?>
								<img width="100%" height="200px" src="<?php echo site_url(); ?><?php echo $media['imageurl']; ?>" title="<?php echo $media['title']; ?>" >
								<?php endif; ?>
								<?php $count++; endforeach; ?>
						<?php echo $photo['photoname'] ?>
						</a>
						<div class="time-remaing"><?php echo $photo['postdate']; ?></div>
						</li>
						<?php endforeach; ?>

					</ul>
					</div>
					<!-- <div class="left-sidebar">

						<h2 class="sidebar-title">LATEST SERIES</h2>
						<ul class="latest-news-sidebar">
							<?php foreach($serieses as $series): ?>
							<li><a href="http://www.livecricketinfo.com/cricket-series/<?php echo $series['url']; ?>/<?php echo $series['ID']; ?>"><?php echo $series['seriesname']; ?></a>
							<div class="time-remaing"><?php echo $series['seriesdate']; ?></div>
							</li>
							<?php endforeach; ?>
						</ul>
					</div> -->
				</div>
				</div>
			</div>
		</section>
<?php include('footer.php'); ?>