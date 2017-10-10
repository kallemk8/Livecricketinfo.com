<?php include('functions.php'); ?>

<!DOCTYPE html><html lang="en"><head><title>Sitemap - Livecricketinfo</title><meta name="keywords" content="Sitemap - Livecricketinfo"/><meta name="description" content="Sitemap - Livecricketinfo"/><?php include('styles.php'); ?><?php if($match_status==1): ?><meta http-equiv="refresh" content="60"><?php endif; ?></head><body>

	<?php foreach($player as $p): ?>
		<?php $playerurl = get_single_playerurl($p['batsman_id']); ?>
		<?php if(get_single_playerurl($p['batsman_id'])): ?>
		<a href='http://www.livecricketinfo.com/player/<?php echo $playerurl."/".$p['batsman_id']; ?>'><?php echo get_player_name($p['batsman_id']);  ?></a><br/>
		<?php endif; ?>
	<?php endforeach; ?>

	<?php foreach($get_all_matchs as $p): ?>
		
		<a href='http://www.livecricketinfo.com/<?php echo $p['url']."/".$p['ID']; ?>'><?php echo get_live_match_title($p['ID']);  ?></a><br/>
	<?php endforeach; ?>
	<?php foreach($get_all_videos as $p): ?>
		
		<a href='http://www.livecricketinfo.com/cricket-videos/<?php echo $p['url']; ?>/<?php echo $p['ID']; ?>'><?php echo $p['videotitle']; ?></a><br/>
	<?php endforeach; ?>
	<?php foreach($get_all_photos as $p): ?>
		
		<a href='http://www.livecricketinfo.com/cricket-photos/<?php echo $photo['url']; ?>/<?php echo $photo['ID']; ?>'><?php echo $p['photoname'] ?></a><br/>
	<?php endforeach; ?>
	<?php foreach($get_all_newsposts as $p): ?>
		<a href='http://www.livecricketinfo.com/cricket-news/<?php echo $p['post_url']; ?>/<?php echo $p['ID']; ?>'><?php echo $p['post_title']; ?></a><br/>
	<?php endforeach; ?>


</body>
</html>