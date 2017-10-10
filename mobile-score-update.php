<?php
	include('functions.php');
	$match_id = $_GET['match_id'];
	$innings = $_GET['inning'];
	$teamone = get_live_match_team_one($match_id);
	$teamtwo = get_live_match_team_two($match_id);
	$total = get_match_totals($match_id, $innings);
	$overs = get_match_overs($match_id, $innings);
	$wickets = get_wickets($match_id,$innings);
	$inning_ball = get_match_remaining_balls($match_id, $innings);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	    <link rel="icon" type="image/png" href="http://livecricketinfo.com/images/favicon.png" />
	    <title>
	    <?php if($innings==1): ?>
	    <?php echo get_team_mini_name($teamone); ?>  
		<?php endif; ?>
		<?php if($innings==2): ?>
	    <?php echo get_team_mini_name($teamtwo); ?>  
		<?php endif; ?>
		<?php if($innings==3): ?>
	    <?php echo get_team_mini_name($teamone); ?>  
		<?php endif; ?>
		<?php if($innings==4): ?>
	    <?php echo get_team_mini_name($teamtwo); ?>  
		<?php endif; ?>
		<?php if($innings!=0): ?>
		<?php echo $total; ?>/<?php echo $wickets; ?> (<?php echo $overs.".".$inning_ball; ?> over)<?php endif; ?>
	    <?php echo get_live_match_title($match_id) ?> - Livecricketinfo</title>
		<meta name="keywords" content="<?php echo get_live_match_title($match_id) ?>"/>
		<meta name="description" content="<?php echo get_live_match_title($match_id) ?>"/>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
		<?php include('styles.php'); ?>
		<!-- <meta http-equiv="refresh" content="60"> -->
	</head>
	<body>
		<section id="single-page-conttent" >
			<div class="container">
				<div class="row">
					<div class="col-md-8 paddingright0">
						<div class="score-card livescoreupddateadmin margintop15">
							<div class="recent">
								<div class="table-responsive">
									<div class="only-scoreupdate-mobile">
										<ul>
											<?php if($innings==1||$innings==3): ?>
											<li>
											<?php $player = get_tema_one_players($match_id); 
											?>
											<?php $player1 = explode(",",$player) ?>
												<select class="form-control" name="batsman">
													<?php foreach ($player1 as $value): ?>
													<option value="<?php echo $value; ?>"><?php echo get_player_name($value); ?></option>
													<?php endforeach; ?>
												</select>
											</li>
											<li>
											<?php $twoplayer = get_tema_two_players($match_id); ?>
											<?php $twoplayer1 = explode(",",$twoplayer) ?>
												<select class="form-control" name="bowler">
													<?php foreach ($twoplayer1 as $value): ?>
													<option value="<?php echo $value; ?>"><?php echo get_player_name($value); ?></option>
													<?php endforeach; ?>
												</select>
											</li>
											<?php endif; ?>
											<?php if($innings==2 || $innings==4): ?>
										<li>
										<?php $player = get_tema_two_players($match_id); ?>
										<?php $player1 = explode(",",$player) ?>
											<select class="form-control" name="batsman">
												<?php foreach ($player1 as $value): ?>
												<option value="<?php echo $value; ?>"><?php echo get_player_name($value); ?></option>
												<?php endforeach; ?>
											</select>
										</li>
										<li>
										<?php $player = get_tema_one_players($match_id); ?>
										<?php $player1 = explode(",",$player) ?>
											<select class="form-control" name="bowler">
												<?php foreach ($player1 as $value): ?>
												<option value="<?php echo $value; ?>"><?php echo get_player_name($value); ?></option>
												<?php endforeach; ?>
											</select>
										</li>
										<?php endif; ?>
										<li><input type="text" name="runs" placeholder="Runs"  class="width50 form-control"></li>
										<li><input type="text" name="wide" placeholder="Wides" class="width50  form-control"></li>
										<li><input type="text" name="nbs" placeholder="Nbs" class="width50 form-control"></li>
										<li><input type="text" name="legbs" placeholder="legbs" class="width50 form-control"></li>
										<li><input type="text" name="wickets" placeholder="wickets" class="width50 form-control"></li>
										<li>
											<select class="width100 form-control" name="4or6">
												<option value="0">4/6</option>
												<option value="1">4</option>
												<option value="2">6</option>
											</select>
										</li>
										<li><input type="submit" name="" class="mobile-score-update"></li>
										</ul>
									</div>
								</div>
								<?php $commentlatssix = get_match_commentrys($match_id, 6); ?>
								<table class="table commentryliveupdate">
									<tr>
										<td>Commentry Text</td>
									</tr>
									<?php foreach($commentlatssix as $lsix): ?>
									<tr>
										<td><textarea name="commentry_text" id="<?php echo $lsix['Commentry_id']; ?>" class="form-control" rows="4"><?php echo $lsix['commentry_text']; ?></textarea></td>
									</tr>
								<?php endforeach; ?>
								</table>
								<?php $matchrecent = get_recent_match_over($match_id); ?>
								<div class="table-responsive">
								<table class="table table-borderd">
									<tr>
										<th>Match ID</th>
										<th>Batsman</th>
										<th>Bowler</th>
										<th>Ball</th>
										<th>Runs</th>
										<th>Wickets</th>
										<th>Wide</th>
										<th>Nbs</th>
										<th>Legbs</th>
										<th>4s</th>
										<th>6s</th>
										<th>Edit</th>
									</tr>
									<?php foreach($matchrecent as $r): ?>
									<tr>
										
										<td><?php echo $r['match_id']; ?></td>
										<td><?php echo get_player_name($r['batsman']); ?></td>
										<td><?php echo get_player_name($r['bowler']); ?></td>
										<td><?php echo $r['ball']; ?></td>
										<td><?php echo $r['runs']; ?></td>
										<td><?php echo $r['wickets']; ?></td>
										<td><?php echo $r['wide']; ?></td>
										<td><?php echo $r['nbs']; ?></td>
										<td><?php echo $r['legbs']; ?></td>
										<td>
											<?php
											if($r['4or6']=='1'){
												echo "Four"; 
											}else{
												echo "0";
											}
											?>
										</td>
										<td>
											<?php
											if($r['4or6']=='2'){
												echo "Six"; 
											}else{
												echo "0";
											}
											?>
										</td>
										<td><a href='recentballedit.php?edit=<?php echo $r['recent_id']; ?>'>Edit</a></td>
									</tr>
									<?php endforeach; ?>
								</table>
								</div>
								<div class="col-md-12" style="background:#fff;">
								<a href="http://www.livecricketinfo.com/matchrecent.php?postid=<?php echo $match_id; ?>" class="pull-right">Full Recent</a><br/>
								<a href="http://www.livecricketinfo.com/matchrecent.php?last10overs=<?php echo $match_id; ?>" class="pull-right">Last 10 Overs</a><br/>
								<a href="http://www.livecricketinfo.com/matchrecent.php?firstinnings=<?php echo $match_id; ?>" class="pull-right">First Innings</a><br/>
								<a href="http://www.livecricketinfo.com/matchrecent.php?secondinnings=<?php echo $match_id; ?>" class="pull-right">Second Innings</a><br/>
								</div>
							</div>
						</div>


					</div>
					<div class="col-md-4">
						<?php if($innings==1|| $innings==3): ?>
						<table class="table add-batsman background-color margintop15" > 
							<tr>
								<td>Batsman Name</td>
								<td>Play Status</td>
								<td>Edit</td>
							</tr>

							<?php echo $batsman = get_all_batsman_score_update($match_id, $innings)
							 ?>
							<tr>
								<td colspan="3">
								<?php $player = get_tema_one_players($match_id); ?>
								<?php $player1 = explode(",",$player) ?>
									<select class="form-control" name="1st-inning-batsman">
										<?php foreach ($player1 as $value): ?>
									
										<option value="<?php echo $value; ?>"><?php echo get_player_name($value); ?></option>
										<?php endforeach; ?>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="6"><input type="submit" name="" class="1st-inning-batsman-button"></td>
							</tr>
						</table>
						<table class="table add-bowler background-color margintop15" >
							<tr>
								<td>Bowler Name</td>
								<td>Play Status</td>
								<td>Edit</td>
							</tr>
							<?php echo $bowler = get_all_bowler_score_update($match_id, $innings); ?>
							<tr>
								<td  colspan="3">
								<?php $player = get_tema_two_players($match_id); ?>
								<?php $player1 = explode(",",$player) ?>
								
									<select class="form-control" name="1st-inning-bowler">
										<?php foreach ($player1 as $value): ?>
										<option value="<?php echo $value; ?>"><?php echo get_player_name($value); ?></option>
										<?php endforeach; ?>
									</select>
								</td>
							</tr>
							<tr>
								<td colspan="6"><input type="submit" name="" class="1st-inning-bowler-button"></td>
							</tr>
						</table>
						<?php endif; ?>
						<?php if($innings==2 || $innings==4): ?>
						<table class="table 2nd-inning-batsman background-color margintop15">
							<tr>
								<td>Batsman Name</td>
								<td>Play Status</td>
								<td>Edit</td>
							</tr>
							<?php echo $batsman = get_all_batsman_score_update($match_id, $innings); ?>
							<tr>
								<td  colspan="3">
								<?php $player = get_tema_two_players($match_id); ?>
								<?php $player1 = explode(",",$player) ?>
								
									<select class="form-control" name="2nd-inning-batsman">
										<?php foreach ($player1 as $value): ?>
									
										<option value="<?php echo $value; ?>"><?php echo get_player_name($value); ?></option>
										<?php endforeach; ?>
									</select>
								</td>
							</tr>
							<tr >
								<td colspan="6"><input type="submit" name="" class="2nd-inning-batsman-button"></td>
							</tr>
						</table>
						<table class="table 2nd-inning-bowler background-color">
							<tr>
								<td>Bowler Name</td>
								<td>Play Status</td>
								<td>Edit</td>
							</tr>
							<?php echo $bowler = get_all_bowler_score_update($match_id, $innings); ?>
							<tr>
								<td colspan="3">
								<?php $player = get_tema_one_players($match_id); ?>
								<?php $player1 = explode(",",$player) ?>
								
									<select class="form-control" name="2nd-inning-bowler">
										<?php foreach ($player1 as $value): ?>
									
										<option value="<?php echo $value; ?>"><?php echo get_player_name($value); ?></option>
										<?php endforeach; ?>
									</select>
								</td>
							</tr>
							<tr >
								<td colspan="6"><input type="submit" name="" class="2nd-inning-bowler-button"></td>
							</tr>
						</table>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

<script type="text/javascript">
	$(document).ready(function(){
		$('.batsmanid a').click(function(event){
			event.preventDefault();
			var userid = $(this).attr('id');
			var playstatus = $(this).attr('play-id');
			var outby = "1";
			
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"editbatsmanfullscore",
				userid:userid,
				outby:outby,
				playstatus:playstatus
			},function(data,status){
				//alert(data);
			});
		});
		$(".commentryliveupdate textarea[name='commentry_text']").change(function(event){
			event.preventDefault();
			var userid = $(this).attr('id');
			var commentry_text = $(this).val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"addnewcommentry",
				userid:userid,
				commentry_text:commentry_text
			},function(data,status){
				if(data!=1){
				alert(data);
				}
			});
		});
		$("input[name='madins']").change(function(event){
			event.preventDefault();
			var userid = $(this).attr('id');
			var madins = $(this).val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"editbowlermadins",
				playbowlerid:userid,
				Madins:madins
			},function(data,status){
				//alert(data);
			});
		});
		$('.bowlerid a').click(function(event){
			event.preventDefault();
			var bowlerid = $(this).attr('id');
			var playstatus = $(this).attr('play-id');
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"editbowlerfullscore",
				playbowlerid:bowlerid,
				playstatus:playstatus
				
			},function(data,status){
				//alert(data);
			});
		});
		$("input[name='outby']").change(function(event){
			event.preventDefault();
			var userid = $(this).attr('id');
			var outby = $(this).val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"editbatsmanoutby",
				userid:userid,
				outby:outby
			},function(data,status){
				//alert(data);
			});
		});
		
		$('.1st-inning-batsman-button').click(function(event){
			event.preventDefault();
			var match_id = <?php echo $_GET['match_id']; ?>;
			var inning = <?php echo $_GET['inning']; ?>;
			var firstbatsman = $('select[name="1st-inning-batsman"]').val();
			var firstbatsmanstatus = '1';
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"addnewbatsman",
				match_id:match_id,
				firstbatsman:firstbatsman,
				inning:inning,
				firstbatsmanstatus:firstbatsmanstatus
			},function(data,status){
				$('.add-batsman table').append(data);
			});

		});
		$('.2nd-inning-batsman-button').click(function(event){
			event.preventDefault();
			var match_id = <?php echo $_GET['match_id']; ?>;
			var inning = <?php echo $_GET['inning']; ?>;
			var secondbatsman = $('select[name="2nd-inning-batsman"]').val();
			var secondbatsmanstatus = '1';
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"inning2batsman",
				match_id:match_id,
				secondbatsman:secondbatsman,
				inning:inning,
				secondbatsmanstatus:secondbatsmanstatus
			},function(data,status){
				$('.add-batsman table').append(data);
			});
		});
		$('.1st-inning-bowler-button').click(function(event){
			event.preventDefault();
			var match_id = <?php echo $_GET['match_id']; ?>;
			var inning = <?php echo $_GET['inning']; ?>;
			var firstbatsman = $('select[name="1st-inning-bowler"]').val();
			var firstbatsmanstatus = '1';
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"addnewbowler",
				match_id:match_id,
				inning:inning,
				firstbatsman:firstbatsman,
				firstbatsmanstatus:firstbatsmanstatus
			},function(data,status){
				$('.add-bowler table').append(data);
			});

		});
		$('.2nd-inning-bowler-button').click(function(event){
			event.preventDefault();
			var match_id = <?php echo $_GET['match_id']; ?>;
			var inning = <?php echo $_GET['inning']; ?>;
			var secondbatsman = $('select[name="2nd-inning-bowler"]').val();
			var secondbatsmanstatus = '1';
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"inning2bowler",
				match_id:match_id,
				inning:inning,
				secondbatsman:secondbatsman,
				secondbatsmanstatus:secondbatsmanstatus
			},function(data,status){
				//$('.add-bowler table').append(data);
			});

		});
		$('.mobile-score-update').click(function(event){
			event.preventDefault();
			var match_id = <?php echo $_GET['match_id']; ?>;
			var innings = <?php echo $_GET['inning']; ?>;
			var wickets = $('input[name="wickets"]').val();
			var legbs = $('input[name="legbs"]').val();
			var nbs = $('input[name="nbs"]').val();
			var wide = $('input[name="wide"]').val();
			var runs = $('input[name="runs"]').val();
			var batsman = $('select[name="batsman"]').val();
			var bowler = $('select[name="bowler"]').val();
			var r4or6 = $('select[name="4or6"]').val();
			var outby = '0';
			var runout = '0';
			if(wickets){
				var wickets = wickets;
			}else{
				var wickets = '0';
			}
			if(legbs){
				var legbs = legbs;
			}else{
				var legbs = '0';
			}
			if(nbs){
				var nbs = nbs;
			}else{
				var nbs = '0';
			}
			if(wide){
				var wide = wide;
			}else{
				var wide = '0';
			}
			if(runs){
				var runs = runs;
			}else{
				var runs = '0';
			}
			if(r4or6){
				var r4or6 = r4or6;
			}else{
				var r4or6 = '0';
			}
			if(outby){
				var outby = outby;
			}else{
				var outby = '0';
			}
			if(wide!=0 || nbs!=0 ){
				var balls ='0';
			}else{
				var balls = '1';
			}
			
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"livescore",
				wickets:wickets,
				match_id:match_id,
				innings:innings,
				legbs:legbs,
				nbs:nbs,
				wide:wide,
				runs:runs,
				batsman:batsman,
				bowler:bowler,
				r4or6:r4or6,
				outby:outby,
				runout:runout,
				balls:balls
			},function(data,status){
				//alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>