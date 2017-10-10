<?php include('functions.php'); ?>
<!DOCTYPE html><html lang="en"><head><title><?php if($total!=0): ?><?php echo get_team_mini_name($team); ?> <?php echo $total; ?><?php if($wickets!=10){echo "/".$wickets;} if($wickets==10){echo '-all out' ;}?> (<?php echo $overs.".".$inning_ball; ?> over)<?php endif; ?> <?php echo $meta_title; ?> - Livecricketinfo</title><meta name="keywords" content="<?php echo $meta_title; ?>"/><meta name="description" content="<?php echo $meta_title; ?>"/><?php include('styles.php'); ?><?php if($match_status==1): ?><meta http-equiv="refresh" content="60"><?php endif; ?></head><body>
<?php include('top-four-matches.php'); ?>
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
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-9 paddingright0">
				<div class="score-card">
					<div class="header-section">
						<h1 ><?php echo get_match_name_by_id($postid); ?></h1>
						<ul class="venue-details">
							<li><b>Series:</b> <?php echo get_series_name_by_id($seriesid); ?></li>
							<li><b>Venue:</b> <?php echo get_match_venue($postid); ?> </li>
							<li><b>Date & Time:</b> <?php echo get_match_date($postid); ?> </li>
						</ul>
						 <a href="http://www.livecricketinfo.com/videos/" target="_blank" style="color:red; font-size:20px;"> Live Video</a>
						<div class="only-desktop">
							<ul class="mini-links">
								<li><a href="<?php echo get_match_url($postid); ?>">Live Commentary</a></li><li><a href="<?php echo site_url(); ?>full-score/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Scorecard</a></li><li><a href="#">Highlights</a></li>
								<li><a href="<?php echo site_url(); ?>full-commentary/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Commentary</a></li>
								<li><a href="http://www.livecricketinfo.com/latest-news">Match News</a></li>
							</ul>
						</div>
					</div>
						<div class="live-match-score">
							<?php if($match_type==1): ?>
							
							<div class="second-innings <?php if($innings==2||$innings==4){echo "completed"; } ?>" >
								<?php if($innings==1||$innings==3): ?>
								<span><?php echo get_team_mini_name($teamone); ?></span>
								<?php endif; ?>
								<?php if($innings==1): ?>
								<span class="<?php if($innings==1){echo "match_running"; } ?>"><?php echo get_match_totals($postid, 1); ?>/<?php echo get_wickets($postid, 1); ?><?php echo "&nbsp;&nbsp;(".get_match_overs($postid, 1).".".get_match_remaining_balls($postid, 1)."overs)"; ?></span>
								<?php endif; ?>
								<?php if($innings>1): ?>
									<?php echo get_match_totals($postid, 1); ?><?php if($innings==3||$innings==4){echo ","; } ?>
									<span class="<?php if($innings==3){echo "match_running"; } ?>">
									<?php  if(get_match_totals($postid, 3)!=0): ?>
										<?php echo get_match_totals($postid, 3); ?>/<?php echo get_wickets($postid, 3); ?><?php echo "&nbsp;(".get_match_overs($postid,3).".".get_match_remaining_balls($postid, 3)."overs)"; ?>
									<?php endif; ?>
									</span>
								<?php endif; ?> 
							</div>
							<div class="second-innings <?php if($innings==1||$innings==3){echo "completed"; } ?>" >
								<?php if($innings==2||$innings==4): ?>
								<span><?php echo get_team_mini_name($teamtwo); ?></span> 
								<?php endif; ?>
								<?php if($innings==2): ?>
									<span class="<?php if($innings==2){echo "match_running"; } ?>">
										<?php echo get_match_totals($postid, 2); ?>/<?php echo get_wickets($postid, 2); ?><?php echo "&nbsp;&nbsp;(".get_match_overs($postid, 2).".".get_match_remaining_balls($postid, 2)."overs)"; ?>		
									</span>
								<?php endif; ?>
								<?php if($innings>2): ?>
									<?php echo get_match_totals($postid, 2); ?><?php if($innings==4){echo ","; } ?>
									<?php if($innings==4): ?>
									<span class="<?php if($innings==4){echo "match_running"; } ?>"><?php echo get_match_totals($postid, 4); ?>/<?php echo get_wickets($postid, 4); ?><?php echo "&nbsp;&nbsp;(".get_match_overs($postid,4).".".get_match_remaining_balls($postid, 4)."overs)"; ?></span>
									<?php endif; ?> 
								<?php endif; ?> 
							</div>
							<?php endif; ?>
							<?php if($match_type==2 || $match_type==3): ?>
							<?php if($innings!=0): ?>
							<div class="second-innings <?php if($innings==2){echo "completed";} ?>" >
								<span><?php echo get_team_mini_name($teamone); ?></span>
								<span class="<?php if($innings==1){echo "match_running";} ?>"><?php echo get_match_totals($postid, 1); ?><?php if(get_wickets($postid, 1)!=10){echo "/".get_wickets($postid, 1);} if(get_wickets($postid, 1)==10){echo '-all out' ;} ?><?php echo "&nbsp;&nbsp;(".get_match_overs($postid, 1).".".get_match_remaining_balls($postid, 1)."overs)"; ?></span>
							</div>
							<?php endif; ?>
							<?php if($innings==2): ?>
							<div class="second-innings " >
								<span><?php echo get_team_mini_name($teamtwo); ?></span> 
								<span class="<?php if($innings==2){echo "match_running";} ?>"><?php echo get_match_totals($postid, 2); ?><?php if(get_wickets($postid, 2)!=10){echo "/".get_wickets($postid, 2);} if(get_wickets($postid, 2)==10){echo '-all out' ;} ?><?php echo "&nbsp;&nbsp;(".get_match_overs($postid, 2).".".get_match_remaining_balls($postid, 2)."overs)"; ?></span>
							</div>
							<?php endif; ?>
							<?php endif; ?>
							
						</div>

						<div class="match_status" style="padding:0px 15px;">
							<?php if($match_type==2||$match_type==3||$match_status==2): ?>
							<div class="match-result-completed" >
							<?php if($match_status==2): ?>
							<?php echo $match_result;?>
							<?php endif; ?>
								<?php if($match_status==1||$match_status==0): ?>
									<?php if($innings==2): ?>
										<?php echo get_team_name($team); ?> Need <?php echo get_match_totals($postid, 1)-get_match_totals($postid, 2)+1; ?> runs in  <?Php if($match_type==3):?>
								<?php echo 120-get_balls($postid, 2); ?> ball
								<?Php endif; ?>
								<?Php if($match_type==2):?>
								<?php echo 300-get_balls($postid, 2); ?> ball
								<?Php endif; ?>
									<?php endif; ?>
									<?php if($innings==1): ?>
									<?php echo get_session_text($postid); ?>
									<?php endif; ?> 
								<?php endif; ?>
							</div>
							<?php endif; ?>
							<?php if($match_status==1): ?>
							<?php if($match_type==1): ?>
								<?php if($innings==1): ?>
								<div class="match-result-completed" >
								<?php echo get_session_text($postid); ?> 
								</div>
								<?php endif; ?>
							<?php if($innings==2): ?>
							<div class="match-result-completed" >
								 <?php echo get_session_text($postid); ?>  - <?php echo get_team_name($team); ?>
								<?php if(get_match_totals($postid, 1)>get_match_totals($postid, 2)): ?>
								trail by <?php echo get_match_totals($postid, 1)-get_match_totals($postid, 2); ?> runs
								<?php endif; ?>
								<?php if(get_match_totals($postid, 2)>get_match_totals($postid, 1)): ?>
									Lead <?php echo get_match_totals($postid,2)-get_match_totals($postid, 1); ?> Runs
								<?php endif; ?>
							</div>
							<?php endif; ?>
							<?php if($innings==3): ?>
							<div class="match-result-completed" >
								<?php echo get_session_text($postid); ?>  - <?php echo get_team_name($team); ?>
								<?php if(get_match_totals($postid, 2)>(get_match_totals($postid, 1)+get_match_totals($postid, 3))): ?>
								trail by <?php echo get_match_totals($postid, 2)-(get_match_totals($postid, 1)+get_match_totals($postid, 3)); ?> runs
								<?php endif; ?>
							 	<?php if(get_match_totals($postid, 2)<get_match_totals($postid, 1)+get_match_totals($postid, 3)): ?>
									Lead <?php echo (get_match_totals($postid, 1)+get_match_totals($postid, 3))-get_match_totals($postid, 2); ?> 
								<?php endif; ?>
							</div>
							<?php endif; ?>
							<?php if($innings==4): ?>
							<div class="match-result-completed" >
								<?php echo get_session_text($postid); ?>  - <?php echo get_team_name($team); ?>
								<?php if((get_match_totals($postid, 1)+get_match_totals($postid, 3))>get_match_totals($postid, 2)): ?>
								need <?php echo (get_match_totals($postid, 1)+get_match_totals($postid, 3)+1)-(get_match_totals($postid, 2)+get_match_totals($postid, 4)); ?> runs
								<?php endif; ?>
							</div>
							<?php endif; ?>
							<?php endif; ?>
							<?php endif; ?>
							<?php if($man_of_the_match): ?>
							<div class="man-of-the-match">
								PLAYER OF THE MATCH
								<br/>
								<span><?php echo $man_of_the_match; ?></span>
							</div>
							<?php endif; ?>
							<?php if($man_of_the_series): ?>
							<div class="man-of-the-match">
								PLAYER OF THE SERIES 
								<br/>
								<span><?php echo $man_of_the_series; ?></span>
							</div>
							<?php endif; ?>
						</div>
						<?php if($innings!=0): ?>
						<div class="batsman-on-pitch">
							<div class="row">
							<div class="col-md-8">
							<?php if($playingbatsman): ?>
							<table class="table  table-batsmanonly">
							<thead><tr><th ><b>Batsman</b></th><th class="width50"><b>R</b></th><th class="width50"><b>B</b></th><th class="width50"><b>4s</b></th><th class="width50"><b>6s</b></th><th class="width50"><b>SR</b></th></tr></thead>
							<tbody>
								<?php echo $playingbatsman; ?>
							</tbody>
							</table>
							<?php endif; ?>
							<?php if($playingbowler): ?>
							<table class="table  table-bowleronly"><thead><tr><th><b>Bowler</b></th><th class="width50"><b>O</b></th><th class="width50"><b>R</b></th><th class="width50"><b>W</b></th><th class="width50"><b>M</b></th><th class="width50"><b>NB</b></th></tr></thead>
							<tbody>
								<?php echo $playingbowler; ?>
							</tbody>
							</table>
							<?php endif; ?>
							</div>
							<div class="col-md-4">
								<table class="table table-bordered table-lastwicketsetion">
									<thead>
										<tr>
											<th>Key Stars</th>
										</tr>
									</thead>
									<tbody>
										<?php echo $last_wicket_section; ?>
									</tbody>
								</table>
							</div>
							<div class="only-mobile">
								<ul class="mini-links">
									<li><a href="<?php echo site_url(); ?>/full-score/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Scorecard</a></li>
									<li><a href="<?php echo site_url(); ?>/full-commentary/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Commentary</a></li>
									<li><a href="<?php echo get_match_url($postid); ?>">Refresh</a></li>
								</ul>
							</div>
							<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- mturk -->
							<ins class="adsbygoogle"
							     style="display:block"
							     data-ad-client="ca-pub-1518250080154239"
							     data-ad-slot="9404697537"
							     data-ad-format="auto"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
							</div>

							<div class="recent-balls">
								<b>Recent: </b> 
								<span>
								<?php echo $recentball_score; ?>
								</span>
							</div>
						</div>
						<?php endif; ?>
						<?php if($innings==0): ?>
							<div class="col-md-12" style="background:#fff;">
								<div class="match_date_ajax_loading">
									<?php get_ajax_match_date_loading($postid);	?>
								</div>
								<span class="match-before-content">
								
								<?php echo $content; ?>
								</span>
							</div>
						<?php endif; ?>
						<div class="commentry">
							<ul class="livecommentry_ajax">
								<?php echo $list_of_comments; ?>
							</ul>
						</div>
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
							<!-- mturk -->
							<ins class="adsbygoogle"
							     style="display:block"
							     data-ad-client="ca-pub-1518250080154239"
							     data-ad-slot="9404697537"
							     data-ad-format="auto"></ins>
							<script>
							(adsbygoogle = window.adsbygoogle || []).push({});
							</script>
						</div>
					</div>
					<div class="col-md-3">
						<div class="margintop15">
						<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- Main sidebar large -->
						<ins class="adsbygoogle"
						     style="display:inline-block;width:300px;height:600px"
						     data-ad-client="ca-pub-1518250080154239"
						     data-ad-slot="5431288735"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
						</script>
						</div>
						<?php include('sidebar.php'); ?>
					</div>
				</div>
			</div>
		</section>

		<?php if($match_status==1): ?>
		 <script type="text/javascript">
	    	$(document).ready(function(){
	        	setInterval(function() {
	        	var match_id = <?php echo $postid; ?>;
	        	var innings = <?php echo $innings; ?>;
	                $.post("http://www.livecricketinfo.com/action.php",{
	                	action:"scorecard",
	                	match_id:match_id,
	                	innings:innings
	                },function(data,status){
						var statname = "<?php echo get_team_mini_name($team); ?>";
						var post_title = "<?php echo get_live_match_title($postid) ?>";
						var titletag = statname+" "+data+" "+post_title;
						var titletag2 = statname+" "+data;
						$('head title').html(titletag);
						$('span.match_running').html(data);
					});
	            }, 2000);
	            setInterval(function() {
	        	var match_id = <?php echo $postid; ?>;
	        	var innings = <?php echo $innings; ?>;
	            
	                $.post("http://www.livecricketinfo.com/action.php",{
	                	action:"current_playing_bowler",
	                	match_id:match_id,
	                	innings:innings
	                },function(data,status){
						$('.table-bowleronly tbody').html(data);
					});
	            }, 2000);
	            setInterval(function() {
	        	var match_id = <?php echo $postid; ?>;
	        	var innings = <?php echo $innings; ?>;
	            
	                $.post("http://www.livecricketinfo.com/action.php",{
	                	action:"current_playing_batsman",
	                	match_id:match_id,
	                	innings:innings
	                },function(data,status){
						$('.table-batsmanonly tbody').html(data);
					});
	            }, 2000);
	            setInterval(function() {
	        	var match_id = <?php echo $postid; ?>;
	        	var innings = <?php echo $innings; ?>;
	                $.post("http://www.livecricketinfo.com/action.php",{
	                	action:"current_lastwicket_section",
	                	match_id:match_id,
	                	innings:innings
	                },function(data,status){
						$('.table-lastwicketsetion tbody').html(data);
					});
	            }, 2000);
	            setInterval(function() {
	        	var match_id = <?php echo $postid; ?>;
	                $.post("http://www.livecricketinfo.com/action.php",{
	                	action:"ajax_commentry_update",
	                	match_id:match_id
	                },function(data,status){
						$('.commentry ul.livecommentry_ajax').html(data);
					});
	            }, 2000);
	            setInterval(function() {
	        	var match_id = <?php echo $postid; ?>;
	                $.post("http://www.livecricketinfo.com/action.php",{
	                	action:"ajax_recent_balls",
	                	match_id:match_id
	                },function(data,status){
						$('.recent-balls span').html(data);
					});
	            }, 2000);
	            
	        });
		</script>  
	<?php endif; ?>

	<script type="text/javascript">
		$(document).ready(function(){
		setInterval(function() {
    	var match_id = <?php echo $postid; ?>;
            $.post("http://www.livecricketinfo.com/action.php",{
            	action:"ajax_match_date_remaing",
            	match_id:match_id
            },function(data,status){
				$('.match_date_ajax_loading').html(data);
			});
        }, 500);
		});
	</script>
<?php include('footer.php'); ?>