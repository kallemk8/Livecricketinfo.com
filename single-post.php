<?php 
	include('functions.php');
	$postid = $_GET['postid'];
	$post = get_all_newssingle($postid);
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title><?php echo get_news_post_title($postid) ?> - Livecricketinfo</title>
		<meta name="keywords" content="<?php echo get_news_post_title($postid) ?>"/>
		<meta name="description" content="<?php echo get_news_post_title($postid) ?>"/>
		<?php include('styles.php'); ?>
		<meta property="og:image:width" content="500" />
		<meta property="og:image:height" content="281" />
	</head>
<body>
<?php include('top-four-matches.php'); ?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-8 paddingright0">
				<?php foreach ($post as $key => $value): ?>
				<div class="score-card">
				<div class="header-section">
					<h1><?php echo $value['post_title']; ?></h1>
					<ul class="venue-details">
						<li><b>Date:</b> <?php echo $value['post_date']; ?> </li>
					</ul>
				</div>

				<div class="content">
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

				<img src="http://www.livecricketinfo.com/<?php echo $value['postimage']; ?>" width="100%"  class="" />
				<br/>
				<br/>
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
				<?php echo $value['post_content'] ?>

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
			<div class="col-md-4">
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