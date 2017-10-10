<?php 
	include('session.php');
	include('header.php'); 
	$postid = $_GET['post'];
?>
<?php if($postid): ?>
<?php $single = get_single_post($postid); ?>
<?php foreach($single as $s): ?>
	<?php 
		$teamonemember1 = explode(",",$s['team_one_players']);
		
		$teamonemember2 = explode(",",$s['team_two_players']);
	?>
	<?php  ?>
	<style type="text/css">
		select[multiple]{
	     height: 200px;
	   }

	</style>
<section id="admin-page-conttent" class="margintop15">
	<div class="container">
		<div class="overflowhidden score-card">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
					    <label for="exampleInputEmail1">Match Title</label>
					    <input type="text" class="form-control" value="<?php echo $s['match_title']; ?>"  name="match_title" >
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
					    <label for="exampleInputEmail1">Match Content</label>
					    <input type="text" class="form-control" value="<?php echo $s['match_content']; ?>" name="match_content" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Match Series</label>
					    <select class="form-control" name="match_series" >
					    	<option value="0">Select</option>
					    	<?php foreach($serieses as $series): ?>
					    		<?php if($s['match_series']==$series['ID']): ?>
					    			<option value="<?php echo $series['ID']; ?>" selected><?php echo $series['seriesname']; ?></option>
					    		<?php endif; ?>
					    		<?php if($s['match_series']!=$series['ID']): ?>
					    			<option value="<?php echo $series['ID']; ?>"><?php echo $series['seriesname']; ?></option>
					    		<?php endif; ?>
					    	<?php endforeach; ?>
					    </select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Match Venue</label>
					    <input type="text" class="form-control" value="<?php echo $s['match_venue']; ?>" name="match_venue" >
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Match Inning Running</label>
					    <input type="text" name="match_inning" class="form-control" value="<?php echo $s['match_inning']; ?>">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Toss</label>
					    <input type="text" class="form-control" name="toss" value="<?php echo $s['toss']; ?>" >
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Man of the match</label>
					    <input type="text" class="form-control" name="man_of_the_match" value="<?php echo $s['man_of_the_match']; ?>">
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Man of the series</label>
					    <input type="text" class="form-control" name="man_of_the_series" value="<?php echo $s['man_of_the_series']; ?>" >
					</div>
				</div>
			</div>
			<?php $ids = get_selected_team_players_id($s['team_name_1']);  ?>
			<?php $ids2 = get_selected_team_players_id($s['team_name_2']);  ?>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
					    <label for="exampleInputEmail1">Team One Players</label>
					    <select class="form-control" multiple="multiple" style="height:200px;" name="team_one_players" >
					    	<option value="0">Select</option>
					    	<?php foreach($ids as $id): ?>
					    		

					    		<option value="<?php echo $id['batsman_id']; ?>" <?php foreach($teamonemember1 as $st){if($id['batsman_id']==$st){echo "selected";}} ?> ><?php echo get_player_name($id['batsman_id']) ?></option>
					    		
					    	<?php endforeach; ?>
					    	
					    </select>
					</div>
				</div>
				
				<div class="col-md-4">
					<div class="form-group">
					    <label for="exampleInputEmail1">team_two_players</label>
					    <select class="form-control" multiple="multiple" style="height:200px;" name="team_two_players" >
					    	<option value="0">Select</option>
					    	<?php foreach($ids2 as $id): ?>

					    		<option value="<?php echo $id['batsman_id']; ?>"  <?php foreach($teamonemember2 as $twt){if($id['batsman_id']==$twt){echo "selected";}} ?> ><?php echo get_player_name($id['batsman_id']) ?></option>
					    	<?php endforeach; ?>
					    </select>
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					    <label for="exampleInputEmail1">Match Type</label>
					    <select class="form-control"  name="match_type" >
					    	<option value="0">Select</option>
					    	<option value="1" <?php if($s['match_type']==1){echo "selected";} ?>>Test Match</option>
					    	<option value="2" <?php if($s['match_type']==2){echo "selected";} ?>>ODI</option>
					    	<option value="3" <?php if($s['match_type']==3){echo "selected";} ?>>T20</option>
					    </select>
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Result</label>
					    <input type="text" class="form-control" name="Result" value="<?php echo $s['result']; ?>">
					</div>
					<div class="form-group">
					    <label for="exampleInputEmail1">Url</label>
					    <input type="text" class="form-control" name="url" value="<?php echo $s['url']; ?>" >
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Select Team 1</label>
					    <select class="form-control" name="team_name_1">
					    	<option value="0">Select</option>
					    	<?php foreach($teams as $t): ?>
					    		<?php if($s['team_name_1']==$t['team_id']): ?>
					    			<option value="<?php echo $t['team_id']; ?>" selected><?php echo $t['team_name']; ?></option>
					    		<?php endif; ?>
					    		<?php if($s['team_name_1']!=$t['team_id']): ?>
					    			<option value="<?php echo $t['team_id']; ?>"><?php echo $t['team_name']; ?></option>
					    		<?php endif; ?>
					    	<?php endforeach; ?>
					    </select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Select Team 2</label>
					    <select class="form-control" name="team_name_2">
					    	<option value="0">Select</option>
					    	<?php foreach($teams as $t): ?>
					    		<?php if($s['team_name_2']==$t['team_id']): ?>
					    			<option value="<?php echo $t['team_id']; ?>" selected><?php echo $t['team_name']; ?></option>
					    		<?php endif; ?>
					    		<?php if($s['team_name_2']!=$t['team_id']): ?>
					    			<option value="<?php echo $t['team_id']; ?>"><?php echo $t['team_name']; ?></option>
					    		<?php endif; ?>
					    	<?php endforeach; ?>
					    </select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Order Show</label>
					    <input type="text" class="form-control" name="ordertoshow" value="<?php echo $s['ordertoshow']; ?>" >
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Session Test</label>
					    <input type="text" class="form-control" name="session_text" value="<?php echo $s['session_text']; ?>" >
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Important</label>
					    <input type="text" class="form-control" name="important" value="<?php echo $s['important']; ?>" >
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
					    <label for="exampleInputEmail1">Match Status</label>
					    <input type="text" class="form-control" name="match_status" value="<?php echo $s['match_status']; ?>">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="col-md-2">
				<div class="form-group">
				    <label for="exampleInputEmail1">Match Date</label>
				    <input type="datetime-local" class="form-control" name="match_date_withtime" value="<?php echo $s['matchdate']; ?>" >
				</div>
			</div>
			<div class="col-md-2">
			<div class="form-group">
				<input type="hidden" name="post_type" value="posts">
				<input type="hidden" name="post_status" value="Open">
				<input type="submit" name="addbatsman" class="btn updatematch">
			</div>
			</div>
		</div>
		</div>
	</div>
</section>
<?php endforeach; ?>
<?php endif; ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.updatematch').click(function(event){
			var postid = <?php echo $postid; ?>;
			var match_title = $('input[name="match_title"]').val();
			var match_content = $('input[name="match_content"]').val();
			var match_series = $('select[name="match_series"]').val();
			var match_venue = $('input[name="match_venue"]').val();
			var team_two_players = $('select[name="team_two_players"]').val();
			var team_one_players = $('select[name="team_one_players"]').val();
			var team_name_1 = $('select[name="team_name_1"]').val();
			var team_name_2 = $('select[name="team_name_2"]').val();
			var toss = $('input[name="toss"]').val();
			var session_text = $('input[name="session_text"]').val();
			var match_status = $('input[name="match_status"]').val();
			var match_type = $('select[name="match_type"]').val();
			var important = $('input[name="important"]').val();
			var ordertoshow = $('input[name="ordertoshow"]').val();
			var Result = $('input[name="Result"]').val();
			var match_inning = $('input[name="match_inning"]').val();
			var man_of_the_match = $('input[name="man_of_the_match"]').val();
			var man_of_the_series = $('input[name="man_of_the_series"]').val();
			var url = $('input[name="url"]').val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"updatematch",
				match_title:match_title,
				postid:postid,
				important:important,
				ordertoshow:ordertoshow,
				match_content:match_content,
				match_series:match_series,
				match_venue:match_venue,
				toss:toss,
				session_text:session_text,
				team_name_1:team_name_1,
				team_name_2:team_name_2,
				team_one_players:team_one_players,
				team_two_players:team_two_players,
				match_status:match_status,
				match_type:match_type,
				Result:Result,
				match_inning:match_inning,
				url:url,
				man_of_the_match:man_of_the_match,
				man_of_the_series:man_of_the_series
			},function(data,status){
				if(data!=1){
					alert(data);
				}
				//alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>