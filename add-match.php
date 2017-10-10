<?php 
include('session.php');
include('header.php'); 
$teams = get_teams(); 
?>
<section id="admin-page-conttent" class="margintop15">
	<div class="container">
		<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Match Title</label>
			    <input type="text" class="form-control" name="match_title" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Match Content</label>
			    <input type="text" class="form-control" name="match_content" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Match Series</label>
		    	<select class="form-control" name="match_series">
		    		<?php foreach($serieses as $series): ?>
		    		<option value="<?php echo $series['ID']; ?>"><?php echo $series['seriesname']; ?></option>
		    		<?php endforeach; ?>
		    	</select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Match Venue</label>
			    <input type="text" class="form-control" name="match_venue" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Match Counduct Date</label>
			    <input type="datetime-local" class="form-control" name="match_will_date" >
			</div>
			
			<div class="form-group">
			    <label for="exampleInputEmail1">Select Team 1</label>
			    <select class="form-control" name="team_name_1" >
			    	<option value="0">Select</option>
			    	<?php foreach($teams as $t): ?>
			    	<option value="<?php echo $t['team_id']; ?>"><?php echo $t['team_name']; ?></option>
			    	<?php endforeach; ?>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Team One Players</label>
			    <select class="form-control" multiple="multiple" style="height:200px;" name="team_one_players" >
			    	<option value="0">Select</option>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Match Inning Running</label>
			    <select class="form-control" name="match_inning" >
			    	<option value="0">Select</option>
			    	<option value="1">First Inning</option>
			    	<option value="2">Second Inning</option>
			    	<option value="3">Three Inning</option>
			    	<option value="4">Fourth Inning </option>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Important</label>
			    <input type="text" class="form-control" name="match_important" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Session Test</label>
			    <input type="text" class="form-control" name="session_text" >
			</div>
			
		</div>
		<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Order Show</label>
			    <input type="text" class="form-control" name="match_order_show" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Toss</label>
			    <input type="text" class="form-control" name="toss" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Match Status</label>
			    <select class="form-control"  name="match_status" >
			    	<option value="0">Select</option>
			    	<option value="1">Running</option>
			    	<option value="2">Completed</option>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Match Type</label>
			    <select class="form-control"  name="match_type" >
			    	<option value="0">Select</option>
			    	<option value="1">Test Match</option>
			    	<option value="2">ODI</option>
			    	<option value="3">T20</option>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Result</label>
			    <input type="text" class="form-control" name="Result" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Man of the match</label>
			    <input type="text" class="form-control" name="man_of_the_match" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Man of the series</label>
			    <input type="text" class="form-control" name="man_of_the_series" >
			</div>
			
			<div class="form-group">
				
			    <label for="exampleInputEmail1">Select Team 2</label>
			    <select class="form-control" name="team_name_2">
			    	<option value="0">Select</option>
			    	<?php foreach($teams as $t): ?>
			    	<option value="<?php echo $t['team_id']; ?>"><?php echo $t['team_name']; ?></option>
			    	<?php endforeach; ?>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Team Two Players</label>
			    
			    <select class="form-control" multiple="multiple" style="height:200px;" name="team_two_players" >
			    	<option value="0">Select</option>
			    </select>
			</div>
			<div class="form-group">
				<input type="hidden" name="post_type" value="posts">
				<input type="hidden" name="post_status" value="Open">
				<input type="submit" name="addbatsman" class="btn addmatch">
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$('select[name="team_name_2"]').change(function() {
			var team_name_2 = $(this).val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"team_name_2",
				team_name_2:team_name_2
			},function(data,status){
					
			$('select[name="team_two_players"]').append(data);
			});
		});
		$('select[name="team_name_1"]').change(function() {
			var team_name_1 = $(this).val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"team_name_1",
				team_name_1:team_name_1
			},function(data,status){
				
				$('select[name="team_one_players"]').append(data);
			});

		});
	$(document).ready(function(){
		$('.addmatch').click(function(event){
			var match_title = $('input[name="match_title"]').val();
			var match_content = $('input[name="match_content"]').val();
			var match_series = $('select[name="match_series"]').val();
			var match_venue = $('input[name="match_venue"]').val();
			var team_name = $('select[name="team_name_1"]').val();
			var team_name_2 = $('select[name="team_name_2"]').val();
			var toss = $('input[name="toss"]').val();
			var match_status = $('select[name="match_status"]').val();
			var match_type = $('select[name="match_type"]').val();
			var Result = $('input[name="Result"]').val();
			var ordertoshow = $('input[name="match_order_show"]').val();
			var important = $('input[name="match_important"]').val();
			var session_text = $('input[name="session_text"]').val();
			var match_will_date = $('input[name="match_will_date"]').val();
			var man_of_the_match = $('input[name="man_of_the_match"]').val();
			var man_of_the_series = $('input[name="man_of_the_series"]').val();
			var team_two_players = $('select[name="team_two_players"]').val();
			var team_one_players = $('select[name="team_one_players"]').val();
			var match_inning = $('select[name="match_inning"]').val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"addmatch",
				match_title:match_title,
				ordertoshow:ordertoshow,
				important:important,
				session_text:session_text,
				match_will_date:match_will_date,
				match_content:match_content,
				match_series:match_series,
				match_venue:match_venue,
				team_name:team_name,
				team_name_2:team_name_2,
				toss:toss,
				match_status:match_status,
				match_type:match_type,
				Result:Result,
				man_of_the_match:man_of_the_match,
				team_one_players:team_one_players,
				team_two_players:team_two_players,
				match_inning:match_inning,
				man_of_the_series:man_of_the_series
			},function(data,status){
				//alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>