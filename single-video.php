<?php include('functions.php'); ?>

<?php $meta_desc = get_video_post_videocontent($postid); ?>
<!DOCTYPE html><html lang="en"><head><title><?php echo get_video_post_title($postid); ?> - Livecricketinfo</title><meta name="keywords" content="<?php echo get_video_post_title($postid); ?>"/><meta name="description" content="<?php echo substr($meta_desc,0,200); ?>"/><meta property="og:image" content="http://www.livecricketinfo.com/<?php echo get_video_post_videoimage($postid); ?>" />
<meta property="og:image:width" content="1024" />
<meta property="og:image:height" content="576" />
<?php include('styles.php'); ?></head><body>
<?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-9 paddingright0">
				<?php foreach ($videos as $key => $value): ?>
				<div class="score-card">
				<div class="header-section">
					<h1><?php echo $value['videotitle']; ?></h1>
					<?php $urltitle = get_series_url_by_id($value['series']); ?>
					<ul class="venue-details">
						<li><b>Date:</b> <?php echo $value['postdate']; ?> </li>
						<li><b>Series:</b><a href="http://www.livecricketinfo.com/cricket-series/<?php echo $urltitle; ?>/<?php echo $value['series']; ?>"> <?php echo get_series_name_by_id($value['series']); ?></a> </li>
					</ul>
				</div>
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
				<?php if($value['video_type']==1): ?>
					<iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo $value['videoid']; ?>" frameborder="0" allowfullscreen></iframe>
				<?php endif; ?>
				<?php if($value['video_type']==2): ?>
					<video id="my-video" class="video-js video_height" controls preload="auto" width="100%"  poster="http://www.livecricketinfo.com/<?php echo $value['videoimage']; ?>" data-setup="{}" ><source src="<?php echo $value['videoid']; ?>" type='video/mp4'><source src="MY_VIDEO.webm" type='video/webm'></video>
				<?php endif; ?>
				<?php if($value['video_type']==3): ?>
					<iframe width="100%" height="400" src="<?php echo $value['videoid']; ?>" frameborder="0" allowfullscreen></iframe>
				<?php endif; ?>
				<h2 style="font-size:17px;"><?php echo $value['subtitle']; ?></h2>
					<br/>
					<?php echo $value['videocontent']; ?>
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
					<?php if($value['videoimage']): ?>
						<br/>
						<br/>
					<a href="#" title="<?php echo $value['videotitle']; ?>">
					<img src="http://www.livecricketinfo.com/<?php echo $value['videoimage']; ?>" class="max-width" title="<?php echo $value['videotitle']; ?>" alt="<?php echo $value['videotitle']; ?>" ></a>
					<br/>
						<br/>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
				</div>
			</div>
			<div class="col-md-3">
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