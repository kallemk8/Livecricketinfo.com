<?php include('functions.php'); 
	$postid = $_GET['postid'];
	$series = get_single_series($postid);
?>
<!DOCTYPE html><html lang="en"><head><title><?php echo get_series_name_by_id($postid) ?> - Livecricketinfo</title><meta name="keywords" content="<?php echo get_series_name_by_id($postid) ?>"/><meta name="description" content="<?php echo get_series_name_by_id($postid) ?>"/><?php include('styles.php'); ?></head><body><?php include('top-four-matches.php'); ?>
<?php 
	
?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-9 paddingright0">
				<?php foreach ($series as $key => $value): ?>
					<?php $seriesvideos = get_number_videos_by_series(6, $value['ID']); ?>
					<?php $seriesposts = get_number_newsposts_series_posts(10, $value['ID']); ?>
					<?php $series_matches = get_series_matches($value['ID']); ?>
					<?php $seriesphotos = get_series_photos_with_limit($value['ID'], 6); ?>
				<div class="score-card">
					<div class="header-section">
						<h1><?php echo $value['seriesname']; ?></h1>

						<ul class="venue-details">
							<li><b>ODIs:</b> <?php echo $value['ODIs']; ?> ODIs </li>
							<li><b>Test:</b> <?php echo $value['Tests']; ?> Tests </li>
							<li><b>T20s:</b> <?php echo $value['twentytwenty']; ?> T20I </li>
							<li><b>Start:</b> <?php echo $value['startseries']; ?> </li>
							<li><b>Ends:</b> <?php echo $value['endseries']; ?> </li>
						</ul>
					</div>
					<div class="paddingleft15">
						<ul class="nav nav-tabs" role="tablist">
						    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
						    <li role="presentation"><a href="#results" aria-controls="results" role="tab" data-toggle="tab">Schedule & Results</a></li>
						    <li role="presentation"><a href="#news" aria-controls="news" role="tab" data-toggle="tab">News</a></li>
						    <li role="presentation"><a href="#photos" aria-controls="photos" role="tab" data-toggle="tab">Photos</a></li>
						    <li role="presentation"><a href="#videos" aria-controls="videos" role="tab" data-toggle="tab">Videos</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div role="tabpanel" class="tab-pane active" id="home">
							
							<div class="latest-news">
								<ul class="cricket-news">
									<?php foreach($seriesposts as $post): ?>
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
							</div>
							<?php if(count($seriesvideos)): ?>
							<div class="col-md-12">
							<h2 class="seriessecondtitle"><?php echo $value['seriesname']; ?> Videos</h2>
							</div>
							<?php endif; ?>
							
							<div class="overflowhidden">
								<?php foreach($seriesvideos as $video):?>
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
							<?php if(count($seriesphotos)): ?>
							<div class="col-md-12">
							<h2 class="seriessecondtitle"><?php echo $value['seriesname']; ?> Photos</h2>
							</div>
							<?php endif; ?>
							<div class="overflowhidden">
										
								<?php foreach($seriesphotos as $photo):?>
								<?php $mediafiles = get_gallery_media_files_count($photo['ID']);
									$singlephotos = get_photos_type_of_photos($photo['ID']);
								?>
								<?php if($mediafiles): ?>
								<div class="col-md-4">
									<div class="flag-image">
										<a href="http://www.livecricketinfo.com/cricket-photos/<?php echo $photo['url']; ?>/<?php echo $photo['ID']; ?>">
										<?php $count=1; foreach($singlephotos as $media): ?>
										<?php if($count ==1): ?>
										<img width="100%" height="200px" src="<?php echo site_url(); ?><?php echo $media['imageurl']; ?>" title="<?php echo $media['title']; ?>" >
										<?php endif; ?>
										<?php $count++; endforeach; ?>
										</a>
									</div>
									<div class="video-title">
										<a href="http://www.livecricketinfo.com/cricket-photos/<?php echo $photo['url']; ?>/<?php echo $photo['ID']; ?>"><?php echo $photo['photoname'] ?></a>
									</div>
								</div>
								<?php endif; ?>
								<?php if(!$mediafiles): ?>
								<div class="col-md-4">

									<div class="flag-image">
										<a href="http://www.livecricketinfo.com/cricket-photos/<?php echo $photo['url']; ?>/<?php echo $photo['ID']; ?>">
										<img width="100%" height="200px" src="http://www.livecricketinfo.com/<?php echo $photo['groupimage']; ?>"></a>
									</div>
									<div class="video-title">
										<a href="http://www.livecricketinfo.com/cricket-photos/<?php echo $photo['url']; ?>/<?php echo $photo['ID']; ?>"><?php echo $photo['photoname'] ?></a>
									</div>
								</div>
								<?php endif; ?>
								<?php endforeach; ?>
							</div>
						</div>
						
						<div role="tabpanel" class="tab-pane " id="results">
							<div class="">
								<table class="table">
									<thead>
										<tr>
											<th>Date</th>
											<th>Match Details</th>
											<th>Time</th>
										</tr>
									</thead>
									<tbody>	
										<?php foreach($series_matches as $matches): 
										$date=date_create($matches['matchdate']);
										
										?>
										<tr>
											<td><?php echo date_format($date,"F-d-Y"); ?></td>
											<td>
												<a href="<?php echo get_cricket_match_url($matches['ID']); ?>" target="_blank" ><?php echo $matches['match_title'] ?></a><br/>
												<div class=""><?php echo $matches['match_venue']; ?></div>
												<a href="<?php echo get_cricket_match_url($matches['ID']); ?>" target="_blank"  ><?php echo $matches['result'] ?></a>
											</td>
											<td><?php echo get_match_date($matches['ID']); ?></td>
										</tr>
										<?php endforeach; ?>
									</tbody>
									
								</table>
							</div>
						

						</div>
						<div role="tabpanel" class="tab-pane " id="news">
							<?php $seriesposts = get_number_newsposts_series_posts(10, $value['ID']); ?>
							<div class="latest-news">
								<ul class="cricket-news">
									<?php foreach($seriesposts as $post): ?>
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
							</div>
						</div>
						<div role="tabpanel" class="tab-pane " id="videos">
							<?php if(count($seriesvideos)): ?>
							<div class="col-md-12">
							<h2 class="seriessecondtitle"><?php echo $value['seriesname']; ?> Videos</h2>
							</div>
							<?php else: ?>
								<div class="col-md-12">
									<h2 class="seriessecondtitle">No Videos</h2>
								</div>
							<?php endif; ?>
							<div class="overflowhidden">
								<?php foreach($seriesvideos as $video):?>
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
						</div>
						<div role="tabpanel" class="tab-pane " id="photos">
							<?php if(count($seriesphotos)): ?>
							<div class="col-md-12">
							<h2 class="seriessecondtitle"><?php echo $value['seriesname']; ?> Photos</h2>
							</div>
							<?php endif; ?>
							<div class="overflowhidden">
							<?php foreach($seriesphotos as $photo):?>
							<?php $mediafiles = get_gallery_media_files_count($photo['ID']);
								$singlephotos = get_photos_type_of_photos($photo['ID']);
							?>
							<?php if($mediafiles): ?>
							<div class="col-md-4">

								<div class="flag-image">
									<a href="http://www.livecricketinfo.com/cricket-photos/<?php echo $photo['url']; ?>/<?php echo $photo['ID']; ?>">
									<?php $count=1; foreach($singlephotos as $media): ?>
									<?php if($count ==1): ?>
									<img width="100%" height="200px" src="<?php echo site_url(); ?><?php echo $media['imageurl']; ?>" title="<?php echo $media['title']; ?>" >
									<?php endif; ?>
									<?php $count++; endforeach; ?>
									</a>
								</div>
								<div class="video-title">
									<a href="http://www.livecricketinfo.com/cricket-photos/<?php echo $photo['url']; ?>/<?php echo $photo['ID']; ?>"><?php echo $photo['photoname'] ?></a>
								</div>
							</div>
							<?php endif; ?>
							<?php if(!$mediafiles): ?>
							<div class="col-md-4">

								<div class="flag-image">
									<a href="http://www.livecricketinfo.com/cricket-photos/<?php echo $photo['url']; ?>/<?php echo $photo['ID']; ?>">
									<img width="100%" height="200px" src="http://www.livecricketinfo.com/<?php echo $photo['groupimage']; ?>"></a>
								</div>
								<div class="video-title">
									<a href="http://www.livecricketinfo.com/cricket-photos/<?php echo $photo['url']; ?>/<?php echo $photo['ID']; ?>"><?php echo $photo['photoname'] ?></a>
								</div>
							</div>
							<?php endif; ?>
							<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
			<div class="col-md-3">
				<?php include('sidebar.php'); ?>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>