<?php 
include('header.php'); 
$postid = $_GET['edit'];
$series = get_single_series($postid);
$teams = get_teams();
?>
<?php foreach($series as $s): ?>
<section id="admin-page-conttent" class="margintop15">
	<div class="container">
		<div class="overflowhidden score-card">
		<div class="col-md-12">
			<div class="row">
			<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Series Title</label>
			    <input type="text" class="form-control" value="<?php echo $s['seriesname']; ?>" name="series_title" >
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Series Content</label>
			    <input type="text" class="form-control" value="<?php echo $s['seriescontent']; ?>" name="series_content" >
			</div>
			</div>
			</div>
			<div class="row">
			<div class="col-md-4">
			<div class="form-group">
			    <label for="exampleInputEmail1">Number of Tests</label>
			    <input type="text" class="form-control" value="<?php echo $s['Tests']; ?>" name="notests" >
			</div>
			</div>
			<div class="col-md-4">
			<div class="form-group">
			    <label for="exampleInputEmail1">Number of ODIs</label>
			    <input type="text" class="form-control" value="<?php echo $s['ODIs']; ?>" name="noodis" >
			</div>
			</div>
			<div class="col-md-4">
			<div class="form-group">
			    <label for="exampleInputEmail1">Number of 20 - 20s</label>
			    <input type="text" class="form-control" value="<?php echo $s['twentytwenty']; ?>" name="notwenty" >
			</div>
			</div>
			</div>
			<div class="row">
			<div class="col-md-4">
			<div class="form-group">
			    <label for="exampleInputEmail1">Select Team 1</label>
			    <select class="form-control" name="team_name_1" >
			    	<?php foreach($teams as $t): ?>
			    		<?php if($s['team_one_name']==$t['team_id']): ?>
			    			<option value="<?php echo $t['team_id']; ?>" selected><?php echo $t['team_name']; ?></option>
			    		<?php endif; ?>
			    		<?php if($s['team_one_name']!=$t['team_id']): ?>
			    			<option value="<?php echo $t['team_id']; ?>"><?php echo $t['team_name']; ?></option>
			    		<?php endif; ?>
			    	<?php endforeach; ?>
			    </select>
			</div>
			</div>
			<div class="col-md-4">
			<div class="form-group">
			    <label for="exampleInputEmail1">Select Team 2</label>
			    <select class="form-control" name="team_name_2" >
			    	<?php foreach($teams as $t): ?>
			    		<?php if($s['team_two_name']==$t['team_id']): ?>
			    			<option value="<?php echo $t['team_id']; ?>" selected><?php echo $t['team_name']; ?></option>
			    		<?php endif; ?>
			    		<?php if($s['team_two_name']!=$t['team_id']): ?>
			    			<option value="<?php echo $t['team_id']; ?>"><?php echo $t['team_name']; ?></option>
			    		<?php endif; ?>
			    	<?php endforeach; ?>
			    </select>
			</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
				    <label for="exampleInputEmail1">Series Status</label>
				    <input type="text" class="form-control" value="<?php echo $s['seriesstatus']; ?>" name="seriesstatus" >
				</div>
			</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div class="form-group">
					    <label for="exampleInputEmail1">Series Start Date</label>
					    <input type="date" class="form-control" name="startdate" value="<?php echo $s['startseries'];  ?>" >
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					    <label for="exampleInputEmail1">Series End Date</label>
					    <input type="date" class="form-control" name="enddate" value="<?php echo $s['endseries'];  ?>" >
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
					    <label for="exampleInputEmail1">Url</label>
					    <input type="text" class="form-control" value="<?php echo $s['url']; ?>" name="url" >
					</div>
				</div>
			</div>
			<div class="row">
			<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Team_two_players</label>
			    <input type="text" name="team_one_players" class="form-control"  value="<?php echo $s['teamonemembers']; ?>">
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">team_two_players</label>
			    <input type="text" name="team_two_players"  class="form-control"  value="<?php echo $s['teamtwomembers']; ?>">
			</div>
			</div>
			</div>
		</div>

		<div class="col-md-12">
			
			<div class="form-group">
				<input type="hidden" name="post_type" value="posts">
				<input type="hidden" name="post_status" value="Open">
				<input type="submit" name="addbatsman" class="btn btn-primary edit-series">
			</div>
		</div>
		</div>
	</div>
</section>
<?php endforeach; ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('.edit-series').click(function(event){
			var series_title = $('input[name="series_title"]').val();
			var series_content = $('input[name="series_content"]').val();
			var notests = $('input[name="notests"]').val();
			var noodis = $('input[name="noodis"]').val();
			var notwenty = $('input[name="notwenty"]').val();
			var startdate = $('input[name="startdate"]').val();
			var enddate = $('input[name="enddate"]').val();
			var url = $('input[name="url"]').val();
			var seriesstatus = $('input[name="seriesstatus"]').val();
			var team_name = $('select[name="team_name_1"]').val();
			var team_name_2 = $('select[name="team_name_2"]').val();
			var team_two_players = $('input[name="team_two_players"]').val();
			var team_one_players = $('input[name="team_one_players"]').val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"editseries",
				seriesid:<?php echo $postid; ?>,
				series_title:series_title,
				series_content:series_content,
				notests:notests,
				noodis:noodis,
				team_two_players:team_two_players,
				team_one_players:team_one_players,
				notwenty:notwenty,
				team_name:team_name,
				team_name_2:team_name_2,
				startdate:startdate,
				url:url,
				seriesstatus:seriesstatus,
				enddate:enddate
			},function(data,status){
				//alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>