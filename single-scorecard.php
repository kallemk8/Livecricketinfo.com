<?php include('functions.php'); ?>
<!DOCTYPE html><html lang="en"><head><title><?php if($total!=0): ?><?php echo get_team_mini_name($team); ?> <?php echo $total; ?>/<?php echo $wickets; ?> (<?php echo $overs.".".$inning_ball; ?> over)<?php endif; ?> <?php echo $meta_title; ?> - Livecricketinfo</title><meta name="keywords" content="<?php echo $meta_title; ?>"/><meta name="description" content="<?php echo $meta_title; ?>"/><?php include('styles.php'); ?><?php if($match_status==1): ?><meta http-equiv="refresh" content="60"><?php endif; ?></head><body>
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
				<div class="score-card" style="min-height:1px;">
					<div class="header-section">
						<div class="post-refresh-code"></div>
						<h1><?php echo get_match_name_by_id($postid); ?></h1>
						<ul class="venue-details">
							<li><b>Series:</b> <?php echo get_series_name_by_id($seriesid); ?></li>
							<li><b>Venue:</b> <?php echo get_match_venue($postid); ?> </li>
							<li><b>Date & Time:</b> <?php echo get_match_date($postid); ?> </li>
						</ul>
						<div class="only-desktop">
							<ul class="mini-links">
								<li><a href="<?php echo get_match_url($postid); ?>">Live Commentary</a></li>
								<li><a href="<?php echo site_url(); ?>full-score/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Scorecard</a></li>
								<li><a href="#">Highlights</a></li>
								<li><a href="<?php echo site_url(); ?>full-commentary/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Commentary</a></li>
								<li><a href="http://www.livecricketinfo.com/latest-news">Match News</a></li>
							</ul>
						</div>
						<div class="only-mobile">
							<ul class="mini-links2">
								<li><a href="<?php echo get_match_url($postid); ?>">Live</a></li>
								<li><a href="<?php echo site_url(); ?>/full-score/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Scorecard</a></li>
								<li><a href="<?php echo site_url(); ?>/full-commentary/<?php echo get_match_url_byid($postid); ?>/<?php echo $postid; ?>">Full Commentary</a></li>
							</ul>
						</div>
					</div>
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
				<div class="background-color">
				<?php if($match_result): ?>
				<div class="match-result-completed" >
				<?php echo $match_result; ?>
				</div>
				</div>
				<?php endif; ?>
				<?php for($i=$innings; $i>=1; $i--):
					$allbatsmans = get_all_batsman($postid, $i);
					$allbowler = get_all_bowler($postid, $i);
					$allinningtotal = get_match_totals($postid, $i);
					$match_type = get_match_type_by_id($postid);
					if($match_type==1){
						if($i==4){$etratext = "Second Inning";}
						if($i==2){$etratext = "First Inning";}
						if($i==3){$etratext = "Second Inning";}
						if($i==1){$etratext = "First Inning";}
					}
					if($i==1 || $i==3){
						$team = get_live_match_team_one($postid);
						$teambowling = get_live_match_team_two($postid);
					}
					if($i==2 || $i==4){
						$team = get_live_match_team_two($postid);
						$teambowling = get_live_match_team_one($postid);
					}
				?>
				<table class="table" style="background:#fff;">
					<tr><th colspan="2"><?php echo get_team_name($team); ?> <?php echo $etratext; ?> Batting</th><td colspan="5" style="text-align:right;"><span class="team-score"><?php echo get_match_totals($postid, $i); ?>/<?php echo get_wickets($postid, $i); ?> (<?php echo get_match_overs($postid, $i).".".get_match_remaining_balls($postid, $i);; ?> over)</span></td></tr>
					<tr><th>Batsman</th><th></th><th>R</th><th>B</th><th>4s</th><th>6s</th><th>SR</th></tr><?php foreach($allbatsmans as $s): ?><tr>
						<td><?php echo get_player_name($s['batsmanid']); ?></td>
						<td><?php echo $s['Outby'] ?></td>
						<td><?php echo get_batsman_runs($postid ,$i,$s['batsmanid'])+0; ?></td>
						<td><?php $nbs = get_batsman_nbs($postid ,$i,$s['batsmanid'])+0;
							$batsmanballs = get_batsman_balls($postid ,$i,$s['batsmanid'])+0;
							echo $totalruns = $batsmanballs + $nbs; ?></td>
						<td><?php echo get_batsman_4s($postid ,$i,$s['batsmanid'])+0; ?></td>
						<td><?php echo get_batsman_6s($postid ,$i,$s['batsmanid'])+0; ?></td>
						<td>
						<?php if(get_batsman_balls($postid ,$i,$s['batsmanid'])): ?>
						<?php $sr = (get_batsman_runs($postid ,$i,$s['batsmanid']) *100)/get_batsman_balls($postid ,$i,$s['batsmanid']); 
							echo $sr = substr($sr,0,6);?>
						<?php else: ?>
						<?php echo "0"; ?>
						<?php endif; ?>
						</td></tr><?php endforeach; ?>
					<tr><td colspan="2">Extras</td><td colspan="5"><span class="team-score">
						<?php $legbs = get_match_legbs($postid, $i);
						$nbs = get_match_nbs($postid, $i);
						$wides = get_match_wides($postid, $i);
						$totlaextras = $legbs + $nbs + $wides; ?>
						<?php echo $totlaextras; ?> (<?php echo $wides." wides, &nbsp;&nbsp;".$nbs." nbs, &nbsp; &nbsp;&nbsp;".$legbs." legbs";?>)
						</span></td></tr>
					<tr><td colspan="2">Total</td><td colspan="5"><span class="team-score"><?php echo get_match_totals($postid, $i); ?>/<?php echo get_wickets($postid, $i); ?> (<?php echo get_match_overs($postid, $i).".".get_match_remaining_balls($postid, $i);; ?> over)</span></td></tr>
				</table>
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
				<table class="table" style="background:#fff;"><thead><tr><th colspan="7"><?php echo get_team_name($teambowling); ?> <?php echo $etratext; ?>  Bowling</th></tr><tr><th><b>Bowler</b></th><th><b>O</b></th><th><b>R</b></th><th><b>W</b></th><th><b>M</b></th><th><b>NB</b></th><th><b>Wd</b></th></tr></thead>
				<tbody>
				<?php foreach($allbowler as $sb): ?>
					<tr><td><?php echo get_player_name($sb['bowlerid']); ?></td><td>
							<?php if(get_bowler_overs($postid,$i,$sb['bowlerid'])): ?>
							<?php $balls2 = get_bowler_overs($postid,$i,$sb['bowlerid']); 
								$ball2 =$balls2/6;
								$overs2 = (int) $ball2;
								$r_ball12 = $ball2-$overs2;
								$favcolor2 = substr($r_ball12, 0,4);
								switch ($favcolor2) {
								    case "0.160":
								        $inning_ball = '1';
								        break;
								    case "0.830":
								        $inning_ball = '5';
								        break;
								    case "0.330":
								        $inning_ball = '2';
								        break;
								    case "0.500":
								        $inning_ball = '3';
								        break;
								    case "0.660":
								        $inning_ball = '4';
								        break;
								    default:
								        $inning_ball = '0';
								}
								echo $overs2.".".$inning_ball;
							?>
							<?php else: ?>
							<?php echo "0"; ?>
							<?php endif; ?>
						</td>
						<td>
							<?php if(get_bowler_runs($postid,$i,$sb['bowlerid'])): ?>
							<?php 
							$runss = get_bowler_runs($postid,$i,$sb['bowlerid']); 
							$wdess = get_bowler_wide($postid, $i,$sb['bowlerid']);
							echo $totalruns = $runss + $wdess;
							?>
							<?php else: ?>
							<?php echo "0"; ?>
						<?php endif; ?>
						</td>
						<td><?php echo get_bowler_wickets($postid,$i,$sb['bowlerid'])+0; ?></td>
						<td><?php echo $sb['Madins']+0; ?></td>
						<td><?php echo get_bowler_nbs($postid,$i,$sb['bowlerid'])+0; ?></td>
						<td><?php echo get_bowler_wide($postid,$i,$sb['bowlerid'])+0; ?></td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				</table>
				<div style="background:#fff; padding:10px; margin-bottom:15px;">
					<h3 style="margin-top:10px;">Fall of Wickets</h3>
					<?php $secondwickets = get_match_wickets($postid, $i); ?>
					<?php foreach($secondwickets as $wi): ?>
						<?php echo get_player_name($wi['batsman']); ?>&nbsp;&nbsp;-&nbsp;&nbsp;<?php echo get_batsman_runs($postid ,$i,$wi['batsman']) ?>(<?php echo get_batsman_balls($postid ,$i,$wi['batsman']) ?>)&nbsp;&nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp;&nbsp; 
					<?php endforeach; ?>
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
				<?php endfor; ?>
			</div>
			<div class="col-md-3">
				<?php include('sidebar.php'); ?>
			</div>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>