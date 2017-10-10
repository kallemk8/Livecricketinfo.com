<?php include('functions.php'); ?>
<!DOCTYPE html><html lang="en"><head><title><?php echo get_photo_post_title($postid) ?> - Livecricketinfo</title><meta name="keywords" content="<?php echo get_photo_post_title($postid) ?>"/><meta name="description" content="<?php echo get_photo_post_title($postid) ?>"/><?php include('styles.php'); ?></head><body><?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-8 paddingright0">
				<?php $page = $_GET['photonum']; $singlephotos = get_photos_type_of_photos($postid); ?>
				<?php foreach ($photos as $key => $value): ?>
				<div class="score-card">
				<?php $urltitle = get_series_url_by_id($value['series']); ?>
				<div class="header-section">
					<h1><?php echo $value['photoname']; ?></h1>
					<ul class="venue-details">
						<li><b>Date:</b> <?php echo $value['postdate']; ?> </li>
						
						<li><b>Series:</b><a href="http://www.livecricketinfo.com/cricket-series/<?php echo $urltitle; ?>/<?php echo $value['series']; ?>"> <?php echo get_series_name_by_id($value['series']); ?></a> </li>
					</ul>
				</div>
				<div class="content" style="overflow:hidden;">
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
					<?php foreach($singlephotos as $media): ?>
					<div style="position:relative;" class="col-md-12">
						<img width="100%" src="<?php echo site_url(); ?><?php echo $media['imageurl']; ?>" title="<?php echo $media['title']; ?>" class='max-width'/>
						<div><?php echo $media['title']; ?></div>
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
						<br/>
					</div>
					<div class="col-md-1"></div>
					<?php endforeach; ?>
					

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
					<div class="col-md-12">
					<?php echo $value['photocontent'] ?>
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
				<?php endforeach; ?>
				</div>
			</div>
			<div class="col-md-4 margintop15" >
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