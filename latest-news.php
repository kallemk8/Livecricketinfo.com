<?php include('functions.php'); 
	if($_GET['page']){
		$page = $_GET['page'];
		$pagetotal = $page*10;
	}
	else{
		$pagetotal =10;
	}
	$posts = get_number_newsposts($pagetotal);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>India vs England 3rd Test Live Score News | Latest India vs England 3rd Test Updates | India Cricket Team Updates - Livecricketinfo</title>
		<meta name="keywords" content="India vs England 3rd Test Live Score News, Latest India vs England 3rd Test Updates, India Cricket Team Updates, Livecricketinfo"/>
		<meta name="description" content="India vs England 3rd Test Live Score News, Latest India vs England 3rd Test Updates, India Cricket Team Updates, Latest Cricket News, Free Cricket Updates, World Cricket News, India Cricket Team Updates, Top Cricket New Website"/>
		<?php include('styles.php'); ?>
	</head>
<body>
<?php include('top-four-matches.php'); ?>
	<section class="latest-news">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="background-color">
					<h1 class="title">Cricket News</h1>
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
						<ul class="cricket-news">
							<?php foreach($posts as $post): ?>
							<li>
								<div class="col-md-4">
									<a href="http://www.livecricketinfo.com/cricket-news/<?php echo $post['post_url']; ?>/<?php echo $post['ID']; ?>">
									<img src="http://www.livecricketinfo.com/<?php echo $post['postimage']; ?>" class="post-image">
									</a>
								</div>
								<div class="col-md-8">
									<h1><a href="http://www.livecricketinfo.com/cricket-news/<?php echo $post['post_url']; ?>/<?php echo $post['ID']; ?>"><?php echo $post['post_title']; ?></a></h1>
									<div class="description">
									<?php if($post['post_excerpt']){ 										echo $post['post_excerpt'];
									}else{
										echo substr($post['post_content'], 0,390);
									} 
									?>
									</div>
									<span><?php echo $post['post_date']; ?></span>
								</div>
							</li>
							<?php endforeach; ?>
						</ul>
						<ul class="pagination">
							<li><a href="http://www.livecricketinfo.com/latest-news">1</a></li>
							<li><a href="http://www.livecricketinfo.com/latest-news?page=2">2</a></li>
							<li><a href="http://www.livecricketinfo.com/latest-news?page=3">3</a></li>
							<li><a href="http://www.livecricketinfo.com/latest-news?page=4">4</a></li>
							<li><a href="http://www.livecricketinfo.com/latest-news?page=5">5</a></li>
						</ul>
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