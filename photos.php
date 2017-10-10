<?php 
include('header.php'); 
if($_GET['page']){
	$page = $_GET['page'];
	$pagetotal = $page*12;
}
else{
	$pagetotal =12;
}
$photos = get_number_photos($pagetotal);

?>
	<section class="schedule">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<div class="background-color">
					<h1 class="title">Latest Cricket Photos</h1>
						<div class="row">
						
						<?php foreach($photos as $photo):?>
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
				<div class="col-md-3 paddingleft0">
					<?php include('sidebar.php'); ?>
				</div>
			</div>
		</div>

	</section>
	
<?php include('footer.php'); ?>