<?php 
include('header.php'); 

?>
<section id="admin-page-conttent" class="margintop15">
	<div class="container">
		<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Series Title</label>
			    <input type="text" class="form-control" name="series_title" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Series Content</label>
			    <input type="text" class="form-control" name="series_content" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Number of Tests</label>
			    <input type="text" class="form-control" name="notests" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Number of ODIs</label>
			    <input type="text" class="form-control" name="noodis" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Select Team 1</label>
			    <select class="form-control" name="team_name_1" >
			    	<option value="0">Select One</option>
			    	<?php foreach($teams as $t): ?>
			    	<option value="<?php echo $t['team_id']; ?>"><?php echo $t['team_name']; ?></option>
			    	<?php endforeach; ?>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Team One Players</label>
			    <select class="form-control" multiple="multiple" name="team_one_players" >
			    </select>
			</div>
		</div>
		<div class="col-md-6">
			
			<div class="form-group">
			    <label for="exampleInputEmail1">Number of 20 - 20s</label>
			    <input type="text" class="form-control" name="notwenty" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Series Start Date</label>
			    <input type="date" class="form-control" name="startdate" >
			</div>
			
			<div class="form-group">
			    <label for="exampleInputEmail1">Series End Date</label>
			    <input type="date" class="form-control" name="enddate" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Select Team 2</label>
			    <select class="form-control" name="team_name_2" >
			    	<option value="0">Select One</option>
			    	<?php foreach($teams as $t): ?>
			    	<option value="<?php echo $t['team_id']; ?>"><?php echo $t['team_name']; ?></option>
			    	<?php endforeach; ?>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Team Two Players</label>
			    <option value="0">Select</option>
			    <select class="form-control" multiple="multiple" name="team_two_players" >
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Series Status </label>
			    <select class="form-control" name="seriesstatus">
			    	<option value="1">Open</option>
			    	<option value="0">Close</option>
			    </select>
			    <input type="text"  >
			</div>
			<div class="form-group">
				<input type="hidden" name="post_type" value="posts">
				<input type="hidden" name="post_status" value="Open">
				<input type="submit" name="addbatsman" class="btn btn-primary add-series">
			</div>
		</div>
		<div class="col-md-12">

		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
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
		$('.add-series').click(function(event){
			var series_title = $('input[name="series_title"]').val();
			var series_content = $('input[name="series_content"]').val();
			var notests = $('input[name="notests"]').val();
			var noodis = $('input[name="noodis"]').val();
			var notwenty = $('input[name="notwenty"]').val();
			var startdate = $('input[name="startdate"]').val();
			var enddate = $('input[name="enddate"]').val();
			var team_name = $('select[name="team_name_1"]').val();
			var team_name_2 = $('select[name="team_name_2"]').val();
			var seriesstatus = $('select[name="seriesstatus"]').val();
			var team_two_players = $('select[name="team_two_players"]').val();
			var team_one_players = $('select[name="team_one_players"]').val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"addseries",
				series_title:series_title,
				series_content:series_content,
				notests:notests,
				noodis:noodis,
				notwenty:notwenty,
				team_name:team_name,
				team_name_2:team_name_2,
				seriesstatus:seriesstatus,
				startdate:startdate,
				team_one_players:team_one_players,
				team_two_players:team_two_players,
				enddate:enddate
			},function(data,status){
				alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>