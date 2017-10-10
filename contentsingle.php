<?php include('header.php'); ?>
<?php 
	$postid = $_GET['postid'];
	$post = get_all_newssingle($postid); 
?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-9 paddingright0">
				<?php foreach ($post as $key => $value): ?>
				<div class="score-card">
				
				<div class="header-section">
					<h1><?php echo $value['post_title']; ?></h1>

					<ul class="venue-details">
						<li><b>Series:</b> <?php echo $value['match_id']; ?> </li>
						<li><b>Venue:</b> <?php echo $value['post_author']; ?> </li>
						<li><b>Date & Time:</b> <?php echo $value['post_date']; ?> </li>
					</ul>
				</div>
				<div class="content">
					<?php echo $value['post_content'] ?>
				</div>
				<?php endforeach; ?>
				</div>
			</div>
			<div class="col-md-3">
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
					<li>Spirited Zimbabwe hope to square series against Sri Lanka
					<div class="time-remaing">2h ago</div>
					</li>
					<li>Upul Tharanga to captain Sri Lanka in Zimbabwe tri-series<div class="time-remaing">2h ago</div></li>
					<li>Shreyas Iyer - Oodles of talent, short on patience<div class="time-remaing">2h ago</div></li>
					<li>BPL 2016 to restart on November 8<div class="time-remaing">2h ago</div></li>

				</ul>
			</div>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>