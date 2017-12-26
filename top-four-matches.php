<header><div class="container"><div class="header"><div class="col-md-3 col-sm-6"><h1 class="logo"><img src="http://www.livecricketinfo.com/images/logo.png" width="40px"><a href="http://www.livecricketinfo.com/" title="Watch Live cricket score and Live Cricket Streaming">Livecricketinfo</a></h1></div><div class="col-md-9 col-sm-6"><div class="menu"><div class="mobile-menu-icon"><a href="#"><i class="fa fa-align-justify" aria-hidden="true"></i></a></div><ul class="comman-menu"><li><a href="http://www.livecricketinfo.com/match-results">Live Scores</a></li><li><a href="http://www.livecricketinfo.com/schedule">Schedule</a></li><li><a href="http://www.livecricketinfo.com/latest-news">News</a></li><li><a href="http://www.livecricketinfo.com/series">Series</a></li><li><a href="http://www.livecricketinfo.com/teams">Teams</a></li><li><a href="http://www.livecricketinfo.com/videos">Videos</a></li><li><a href="http://www.livecricketinfo.com/photos">Photos</a></li><li><a href="http://www.livecricketinfo.com/rankings">Rankings</a></li></ul></div></div></div>
		<div class="live-match-list onlymobile">
			<?php $fourmatchs = get_recent_4matches('2'); print_r($fourmatchs); ?>
			<?php foreach($fourmatchs as $four): 
				$grand_total12 = get_match_totals($four['ID'], 1); 
				$overs12 = get_match_overs($four['ID'], 1);
				$inning_ball12 = get_match_remaining_balls($four['ID'], 1);
				$wickets12 = get_wickets($four['ID'],1);
				$grand_total2 = get_match_totals($four['ID'], 2); 
				$overs2 = get_match_overs($four['ID'], 2);
				$inning_ball2 = get_match_remaining_balls($four['ID'], 2);
				$wickets2 = get_wickets($four['ID'],2);
				if($four['match_inning']==2||$four['match_inning']==4){
				$team1 = get_live_match_team_two($four['ID']);
				}if($four['match_inning']==1||$four['match_inning']==3){
				$team1 = get_live_match_team_one($four['ID']);
				}
			?>
			<div class="col-md-3">
				<a href="http://www.livecricketinfo.com/<?php echo $four['url']; ?>/<?php echo $four['ID']; ?>" class="short-score" title="<?php echo $four['match_title']; ?>" >
					<?php if($four['match_type']==1): ?>
					<div class="team-one">
						<span class="team-name"><?php echo get_team_mini_name($four['team_name_1']); ?></span> 
						<span class="team-score ">
						<?php if(get_match_totals($four['ID'], 1)!=0){echo get_match_totals($four['ID'], 1);} ?>
						<?php if($four['match_inning']==1): ?>
						/<?php echo get_wickets($four['ID'],1); ?> (<?php echo get_match_overs($four['ID'], 1).".".get_match_remaining_balls($four['ID'], 1); ?> over)
						<?php endif; ?>
						<?php if(get_match_totals($four['ID'], 3)!=0){echo get_match_totals($four['ID'], 3);}; ?>
						<?php if($four['match_inning']==3): ?>/<?php echo get_wickets($four['ID'],3); ?> (<?php echo get_match_overs($four['ID'], 3).".".get_match_remaining_balls($four['ID'], 3); ?> over)
						<?php endif; ?>
						</span>
					</div>
					<div class="team-one">
						<span class="team-name"><?php echo get_team_mini_name($four['team_name_2']); ?></span> <span class="team-score ">
						<?php if(get_match_totals($four['ID'], 2)!=0){echo get_match_totals($four['ID'], 2);} ?>
						<?php if($four['match_inning']==2): ?>
						/<?php echo get_wickets($four['ID'],2); ?> (<?php echo get_match_overs($four['ID'], 2).".".get_match_remaining_balls($four['ID'], 2); ?> over)
						<?php endif; ?>
						<?php if(get_match_totals($four['ID'], 4)!=0){echo get_match_totals($four['ID'], 4);}; ?>
						<?php if($four['match_inning']==4): ?>
							/<?php echo get_wickets($four['ID'],4); ?> (<?php echo get_match_overs($four['ID'], 4).".".get_match_remaining_balls($four['ID'], 4); ?> over)
						<?php endif; ?>
						</span>
					</div>
					<?php endif; ?>
					<?php if($four['match_type']==2||$four['match_type']==3): ?>
					<div class="team-one">
						<span class="team-name"><?php echo get_team_mini_name($four['team_name_1']); ?></span> 
						<?php if($four['match_inning']!=0): ?>
						<span class="team-score ">
						<?php echo get_match_totals($four['ID'], 1); ?>/<?php echo get_wickets($four['ID'],1); ?> (<?php echo get_match_overs($four['ID'], 1).".".get_match_remaining_balls($four['ID'], 1); ?> over)
						</span>
						<?php endif; ?>
					</div>
					<div class="team-one">
						<span class="team-name"><?php echo get_team_mini_name($four['team_name_2']); ?></span> 
						<span class="team-score ">
						<?php if($four['match_inning']==2): ?>
						<?php echo get_match_totals($four['ID'], 2); ?>/<?php echo get_wickets($four['ID'],2); ?> (<?php echo get_match_overs($four['ID'], 2).".".get_match_remaining_balls($four['ID'], 2); ?> over)
						<?php endif; ?>
						</span>
					</div>
					<?php endif; ?>
					<div class="match-details">
						<?php if($four['match_status']==2||$four['match_inning']==1||$four['match_inning']==0){echo $four['result'];} ?>
						<?php if($four['match_type']==2||$four['match_type']==3): ?>
						<?php if($four['match_status']==1||$four['match_status']==0): ?>
							<?php if($four['match_inning']==2): ?>
								<?php echo get_team_name($four['team_name_2']); ?> Need <?php echo get_match_totals($four['ID'], 1)-get_match_totals($four['ID'], 2)+1; ?> runs in  
								<?Php if($four['match_type']==3):?>
								<?php echo 120-get_balls($four['ID'], 2); ?> ball
								<?Php endif; ?>
								<?Php if($four['match_type']==2):?>
								<?php echo 300-get_balls($four['ID'], 2); ?> ball
								<?Php endif; ?>
							<?php endif; ?>
						<?php endif; ?>
						<?php endif; ?>
						<?php if($four['match_type']==1): ?>
							<?php if($four['match_status']==1||$four['match_status']==0): ?>
							
							<?php if($four['match_inning']==2): ?>
								<?php echo $four['session_text']; ?> <?php echo get_team_name($team1); ?>
								<?php if(get_match_totals($four['ID'], 1)>get_match_totals($four['ID'], 2)): ?>
								Trail by <?php echo get_match_totals($four['ID'], 1)-get_match_totals($four['ID'], 2); ?> 
								<?php endif; ?>
								<?php if(get_match_totals($four['ID'], 1)<get_match_totals($four['ID'], 2)): ?>
									Lead <?php echo get_match_totals($four['ID'],2)-get_match_totals($four['ID'], 1); ?> 
								<?php endif; ?>
							<?php endif; ?>
							<?php if($four['match_inning']==3): ?>
								<?php echo $four['session_text']; ?> <?php echo get_team_name($team1); ?>
								<?php if(get_match_totals($four['ID'], 2)>get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3)): ?>
								Trail by <?php echo get_match_totals($four['ID'], 2)-(get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3)); ?> 
								<?php endif; ?>
						 
								<?php if(get_match_totals($four['ID'], 2)<get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3)): ?>
									Lead <?php echo (get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3))-get_match_totals($four['ID'], 2); ?> 
								<?php endif; ?>
							<?php endif; ?>
							<?php if($four['match_inning']==4): ?>
								<?php echo $four['session_text']; ?> <?php echo get_team_name($team1); ?>
								<?php if((get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3))>get_match_totals($four['ID'], 2)): ?>
								Need <?php echo (get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3))-(get_match_totals($four['ID'], 2)+get_match_totals($four['ID'], 4)); ?> Runs
								<?php endif; ?>
							<?php endif; ?>
							<?php endif; ?>
							<?php endif; ?>
					</div>
					<?php if($four['match_status']==1): ?>
					<div class="match_running_live_red">Live</div>
					<?php endif; ?>
				</a>
			</div>
			<?php endforeach; ?>
			<div class="col-md-12">
				<a href="http://www.livecricketinfo.com/match-results" class="more-live-matches">All Matches</a>
				
			</div>
		</div>
		<div class="live-match-list">
			<?php $fourmatchs = get_recent_4matches('4'); ?>
			<?php foreach($fourmatchs as $four): 
				$grand_total12 = get_match_totals($four['ID'], 1); 
				$overs12 = get_match_overs($four['ID'], 1);
				$inning_ball12 = get_match_remaining_balls($four['ID'], 1);
				$wickets12 = get_wickets($four['ID'],1);
				$grand_total2 = get_match_totals($four['ID'], 2); 
				$overs2 = get_match_overs($four['ID'], 2);
				$inning_ball2 = get_match_remaining_balls($four['ID'], 2);
				$wickets2 = get_wickets($four['ID'],2);
				if($four['match_inning']==2||$four['match_inning']==4){
				$team1 = get_live_match_team_two($four['ID']);
				}if($four['match_inning']==1||$four['match_inning']==3){
				$team1 = get_live_match_team_one($four['ID']);
				}
			?>
			<div class="col-md-3">
				<a href="http://www.livecricketinfo.com/<?php echo $four['url']; ?>/<?php echo $four['ID']; ?>" title="<?php echo $four['match_title']; ?>" class="short-score">
					<?php if($four['match_type']==1): ?>
					<div class="team-one">
						<span class="team-name"><?php echo get_team_mini_name($four['team_name_1']); ?></span> 
						<span class="team-score ">
						<?php if(get_match_totals($four['ID'], 1)!=0){echo get_match_totals($four['ID'], 1);} ?><?php if($four['match_inning']==1): ?>/<?php echo get_wickets($four['ID'],1); ?> (<?php echo get_match_overs($four['ID'], 1).".".get_match_remaining_balls($four['ID'], 1); ?> over)
						<?php endif; ?>
						<?php if(get_match_totals($four['ID'], 3)!=0){echo get_match_totals($four['ID'], 3);}; ?><?php if($four['match_inning']==3||$four['match_inning']==4){echo ",";} ?> <?php if($four['match_inning']==3): ?>/<?php echo get_wickets($four['ID'],3); ?> (<?php echo get_match_overs($four['ID'], 3).".".get_match_remaining_balls($four['ID'], 3); ?> over)
						<?php endif; ?>
						</span>
					</div>
					<div class="team-one">
						<span class="team-name"><?php echo get_team_mini_name($four['team_name_2']); ?></span> <span class="team-score ">
						<?php if(get_match_totals($four['ID'], 2)!=0){echo get_match_totals($four['ID'], 2);} ?><?php if($four['match_inning']==2): ?>/<?php echo get_wickets($four['ID'],2); ?> (<?php echo get_match_overs($four['ID'], 2).".".get_match_remaining_balls($four['ID'], 2); ?> over)
						<?php endif; ?>
						<?php if(get_match_totals($four['ID'], 4)!=0){echo get_match_totals($four['ID'], 4);}; ?>
						<?php if($four['match_inning']==4): ?>
							/<?php echo get_wickets($four['ID'],4); ?> (<?php echo get_match_overs($four['ID'], 4).".".get_match_remaining_balls($four['ID'], 4); ?> over)
						<?php endif; ?>
						</span>
					</div>
					<?php endif; ?>
					<?php if($four['match_type']==2||$four['match_type']==3): ?>
					<div class="team-one">
						<span class="team-name"><?php echo get_team_mini_name($four['team_name_1']); ?></span> 
						<?php if($four['match_inning']!=0): ?>
						<span class="team-score ">
						<?php echo get_match_totals($four['ID'], 1); ?>/<?php echo get_wickets($four['ID'],1); ?> (<?php echo get_match_overs($four['ID'], 1).".".get_match_remaining_balls($four['ID'], 1); ?> over)
						</span>
						<?php endif; ?>
					</div>
					<div class="team-one">
						<span class="team-name"><?php echo get_team_mini_name($four['team_name_2']); ?></span> 
						<span class="team-score ">
						<?php if($four['match_inning']==2): ?>
						<?php echo get_match_totals($four['ID'], 2); ?>/<?php echo get_wickets($four['ID'],2); ?> (<?php echo get_match_overs($four['ID'], 2).".".get_match_remaining_balls($four['ID'], 2); ?> over)
						<?php endif; ?>
						</span>
					</div>
					<?php endif; ?>
					<div class="match-details">
						<?php if($four['match_status']==2||$four['match_inning']==1||$four['match_inning']==0){echo $four['result'];} ?>
						<?php if($four['match_type']==2||$four['match_type']==3): ?>
						<?php if($four['match_status']==1||$four['match_status']==0): ?>
							<?php if($four['match_inning']==2): ?>
								<?php echo get_team_name($four['team_name_2']); ?> Need <?php echo get_match_totals($four['ID'], 1)-get_match_totals($four['ID'], 2)+1; ?> runs in  <?Php if($four['match_type']==3):?>
								<?php echo 120-get_balls($four['ID'], 2); ?> ball
								<?Php endif; ?>
								<?Php if($four['match_type']==2):?>
								<?php echo 300-get_balls($four['ID'], 2); ?> ball
								<?Php endif; ?>
							<?php endif; ?>
						<?php endif; ?>
						<?php endif; ?>
						<?php if($four['match_type']==1): ?>
							<?php if($four['match_status']==1||$four['match_status']==0): ?>
							<?php if($four['match_inning']!=0): ?>
							<?php echo $four['test_session_text']; ?> 
							
							<?php endif; ?>
							<?php if($four['match_inning']==2): ?>
								<?php echo $four['session_text']; ?> - <?php echo get_team_name($team1); ?>
								<?php if(get_match_totals($four['ID'], 1)>get_match_totals($four['ID'], 2)): ?>
								Trail by <?php echo get_match_totals($four['ID'], 1)-get_match_totals($four['ID'], 2); ?> 
								<?php endif; ?>
								<?php if(get_match_totals($four['ID'], 1)<get_match_totals($four['ID'], 2)): ?>
									Lead <?php echo get_match_totals($four['ID'],2)-get_match_totals($four['ID'], 1); ?> 
								<?php endif; ?>
							<?php endif; ?>
							<?php if($four['match_inning']==3): ?>
								<?php echo $four['session_text']; ?> - <?php echo get_team_name($team1); ?>
								<?php if(get_match_totals($four['ID'], 2)>get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3)): ?>
								Trail by <?php echo get_match_totals($four['ID'], 2)-(get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3)); ?> 
								<?php endif; ?>
						 
								<?php if(get_match_totals($four['ID'], 2)<get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3)): ?>
									Lead <?php echo (get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3))-get_match_totals($four['ID'], 2); ?> 
								<?php endif; ?>
							<?php endif; ?>
							<?php if($four['match_inning']==4): ?>
								<?php echo $four['session_text']; ?> - <?php echo get_team_name($team1); ?>
								<?php if((get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3))>get_match_totals($four['ID'], 2)): ?>
								Need <?php echo (get_match_totals($four['ID'], 1)+get_match_totals($four['ID'], 3))-(get_match_totals($four['ID'], 2)+get_match_totals($four['ID'], 4)); ?> Runs
								<?php endif; ?>
							<?php endif; ?>
							<?php endif; ?>
							<?php endif; ?>
					</div>
					<?php if($four['match_status']==1): ?>
					<div class="match_running_live_red">Live</div>
					<?php endif; ?>
				</a>
			</div>
			<?php endforeach; ?>
			<div class="col-md-12">
				<a href="http://www.livecricketinfo.com/match-results" class="more-live-matches">All Matches</a>
				
			</div>
		</div>
	</div>
</header>
<!-- <div class="container">
	<div class="row">
		<div class="col-md-12">
		<ul>
			<li><a href="http://www.livecricketinfo.com/ipl2017">IPL 2017 </a></li>
			<li><a href="http://www.livecricketinfo.com/cricket-series/indian-premier-league-ipl-2017/20">Points Table </a></li>
			<li><a href="http://www.livecricketinfo.com/cricket-series/indian-premier-league-ipl-2017/20#news">Schedule</a></li>
			<li><a href="">Teams </a></li>
			<li><a href="http://www.livecricketinfo.com/cricket-series/indian-premier-league-ipl-2017/20#news">News </a></li>
			<li><a href="">Photos </a></li>
		</ul>
		</div>
	</div>
</div> -->
<div class="slideshowads">
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<!-- leaderboard -->
	<ins class="adsbygoogle"
	     style="display:inline-block;width:728px;height:90px"
	     data-ad-client="ca-pub-8244067207703025"
	     data-ad-slot="7057648592"></ins>
	<script>
	(adsbygoogle = window.adsbygoogle || []).push({});
	</script>
</div>