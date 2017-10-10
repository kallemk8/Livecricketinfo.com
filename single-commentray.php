<?php 
	include('header.php');
	$postid = $_GET['postid'];
	$post = get_single_post($postid); 
?>
<section id="single-page-conttent">
	<div class="container">
		<div class="row">
			<div class="col-md-9 paddingright0">
				<?php foreach ($post as $key => $value): ?>
				<div class="score-card">
					<div class="header-section">
						<h1><?php echo $value['match_title']; ?></h1>
						<ul class="venue-details">
							<li><b>Series:</b> <?php echo get_series_name_by_id($value['match_series']); ?></li>
							<li><b>Venue:</b> <?php echo $value['match_venue']; ?> </li>
							<li><b>Date & Time:</b> <?php echo $value['match_date']; ?> </li>
						</ul>
						<div class="only-desktop">
							<ul class="mini-links">
								<li><a href="<?php echo get_match_url($postid); ?>">Live Commentary</a></li>
								<li><a href="<?php echo site_url(); ?>/full-score/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Scorecard</a></li>
								<li><a href="#">Highlights</a></li>
								<li><a href="<?php echo site_url(); ?>/full-commentary/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Commentary</a></li>
								<li><a href="http://www.livecricketinfo.com/latest-news">Match News</a></li>
							</ul>
						</div>
						<div class="only-mobile">
							<ul class="mini-links">
								<li><a href="<?php echo get_match_url($postid); ?>">Live</a></li>
								<li><a href="<?php echo site_url(); ?>/full-score/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Scorecard</a></li>
								<li><a href="<?php echo site_url(); ?>/full-commentary/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Commentary</a></li>
								
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="commentry">
								<ul class="nav nav-tabs" role="tablist">
								    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Commentry</a></li>
								    <li role="presentation"><a href="#firstinning" aria-controls="firstinning" role="tab" data-toggle="tab">1st Innings</a></li>
								    <li role="presentation"><a href="#secondinning" aria-controls="secondinning" role="tab" data-toggle="tab">2nd Innings</a></li>
								    <?php if($match_type==1): ?>
								    <li role="presentation"><a href="#thirdinning" aria-controls="thirdinning" role="tab" data-toggle="tab">3rd Innings</a></li>
								    <li role="presentation"><a href="#fourthinning" aria-controls="fourthinning" role="tab" data-toggle="tab">4th Innings</a></li>
									<?php endif; ?>
								  </ul>
								<div class="tab-content">
									<div role="tabpanel" class="tab-pane active" id="home">
										<ul>
											<?php $matchcomments = get_match_all_commentrys($postid, $innings); 
											?>
											<?php foreach($matchcomments as $comments): ?>
												<?php if($comments['overcommentry']==0): ?>
											<li>
												<?php if($comments['overs']!=0): ?>
												<div class="col-md-1 col-sm-1 col-xs-1">

													<b><?php echo $comments['overs']; ?></b>
												</div>
												<?php endif; ?>
												<div class="col-md-10 col-sm-11 col-xs-11">
													<?php echo $comments['commentry_text']; 
													 ?> 
												</div>
											</li>
											<?php endif; ?>
											<?php if($comments['overcommentry']!=0): ?>
											<li>
												<?php echo get_over_commentry_listsss($comments['match_id'], $comments['overcommentry']); ?>
											</li>
											<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									</div>
									<div role="tabpanel" class="tab-pane " id="firstinning">
										<ul>
									<?php $matchcomments = get_match_all_commentrys($postid, 1); ?>
											<?php foreach($matchcomments as $comments): ?>
												<?php if($comments['overcommentry']==0): ?>
											<li>
												<?php if($comments['overs']!=0): ?>
												<div class="col-md-1 col-sm-1 col-xs-1">

													<b><?php echo $comments['overs']; ?></b>
												</div>
												<?php endif; ?>
												<div class="col-md-10 col-sm-11 col-xs-11">
													<?php echo $comments['commentry_text']; 
													 ?> 
												</div>
											</li>
											<?php endif; ?>
											<?php if($comments['overcommentry']!=0): ?>
											<li>
												<?php echo get_over_commentry_listsss($comments['match_id'], $comments['overcommentry']); ?>
											</li>
											<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									</div>
									<div role="tabpanel" class="tab-pane " id="secondinning">
										<ul>
									<?php $matchcomments = get_match_all_commentrys($postid, 2); ?>
											<?php foreach($matchcomments as $comments): ?>
												<?php if($comments['overcommentry']==0): ?>
											<li>
												<?php if($comments['overs']!=0): ?>
												<div class="col-md-1 col-sm-1 col-xs-1">

													<b><?php echo $comments['overs']; ?></b>
												</div>
												<?php endif; ?>
												<div class="col-md-10 col-sm-11 col-xs-11">
													<?php echo $comments['commentry_text']; 
													 ?> 
												</div>
											</li>
											<?php endif; ?>
											<?php if($comments['overcommentry']!=0): ?>
											<li>
												<?php echo get_over_commentry_listsss($comments['match_id'], $comments['overcommentry']); ?>
											</li>
											<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									</div>
									<div role="tabpanel" class="tab-pane " id="thirdinning">
										<ul>
									<?php $matchcomments = get_match_all_commentrys($postid, 3); ?>
											<?php foreach($matchcomments as $comments): ?>
												<?php if($comments['overcommentry']==0): ?>
											<li>
												<?php if($comments['overs']!=0): ?>
												<div class="col-md-1 col-sm-1 col-xs-1">

													<b><?php echo $comments['overs']; ?></b>
												</div>
												<?php endif; ?>
												<div class="col-md-10 col-sm-11 col-xs-11">
													<?php echo $comments['commentry_text']; 
													 ?> 
												</div>
											</li>
											<?php endif; ?>
											<?php if($comments['overcommentry']!=0): ?>
											<li>
												<?php echo get_over_commentry_listsss($comments['match_id'], $comments['overcommentry']); ?>
											</li>
											<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									</div>
									<div role="tabpanel" class="tab-pane " id="fourthinning">
										<ul>
									<?php $matchcomments = get_match_all_commentrys($postid, 4); ?>
											<?php foreach($matchcomments as $comments): ?>
												<?php if($comments['overcommentry']==0): ?>
											<li>
												<?php if($comments['overs']!=0): ?>
												<div class="col-md-1 col-sm-1 col-xs-1">

													<b><?php echo $comments['overs']; ?></b>
												</div>
												<?php endif; ?>
												<div class="col-md-10 col-sm-11 col-xs-11">
													<?php echo $comments['commentry_text']; 
													 ?> 
												</div>
											</li>
											<?php endif; ?>
											<?php if($comments['overcommentry']!=0): ?>
											<li>
												<?php echo get_over_commentry_listsss($comments['match_id'], $comments['overcommentry']); ?>
											</li>
											<?php endif; ?>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
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