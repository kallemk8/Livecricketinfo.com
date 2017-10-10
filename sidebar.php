<?php $posts = get_number_newsposts('10'); ?>
<div class="sidebar-points-table">
<?php include('points-table.php'); ?>
</div>
<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Flivecricketinfodotcom&tabs&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="100%" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
<div class="left-sidebar margintop15">
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
	
	<h2 class="sidebar-title">LATEST NEWS</h2>

	<ul class="latest-news-sidebar">
		<?php foreach($posts as $post): ?>
		<li><a href="http://www.livecricketinfo.com/cricket-news/<?php echo $post['post_url']; ?>/<?php echo $post['ID']; ?>"><?php echo $post['post_title']; ?></a>
		<div class="time-remaing"><?php echo $post['post_date']; ?></div>
		</li>
		<?php endforeach; ?>
		
	</ul>
</div>