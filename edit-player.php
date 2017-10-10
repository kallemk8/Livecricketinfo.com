<?php 
	include('header.php'); 
	$playerid = $_GET['edit'];
	$singleplayer = get_single_players($playerid); 
	$playerslist = get_players();
?>
<section id="admin-page-conttent" class="margintop15"> 
	<div class="container">
		<?php foreach($singleplayer as $player): ?>
			<?php $teamtwomembers = $player['allteams']; 
			$teamtwomember = explode(",",$teamtwomembers);
			?>
		<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Player Name</label>
			    <input type="text" class="form-control" value="<?php echo $player['batsman_name']; ?> " name="batsman" >
			</div>
			
			<div class="form-group">
			    <label for="exampleInputEmail1">Select Team</label>
			    <select class="form-control" name="select_team" value="<?php echo $player['team_id']; ?> ">
			    	<option value="0">Select</option>
			    	<?php foreach($teams as $t): ?>
			    		<?php if($player['team_id']==$t['team_id']): ?>
				    	<option value="<?php echo $t['team_id']; ?>" selected><?php echo $t['team_name']; ?></option>
				    	<?php endif; ?>
				    	<?php if($player['team_id']!=$t['team_id']): ?>
				    	<option value="<?php echo $t['team_id']; ?>" ><?php echo $t['team_name']; ?></option>
				    	<?php endif; ?>
				    	<?php endforeach; ?>
			    </select>
			    
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Select Country</label>
			    <select class="form-control" name="select_country" value="<?php echo $player['country_id']; ?> ">
			    	<?php foreach($country as $c): ?>
			    		<?php if($player['country_id']==$c['CountryId']): ?>
				    	<option value="<?php echo $c['CountryId']; ?>" selected><?php echo $c['CountryName']; ?></option>
				    	<?php endif; ?>
				    	<?php if($player['country_id']!=$c['CountryId']): ?>
				    	<option value="<?php echo $c['CountryId']; ?>"><?php echo $c['CountryName']; ?></option>
				    	<?php endif; ?>
				    	<?php endforeach; ?>
			    </select>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Select haveing Teams</label>
				<select class="form-control" name="haveing_teams" multiple="multiple" style="height:200px;">
			    	<?php $count=1; foreach($teams as $t): ?>
		    		
			    	
			    	<option value="<?php echo $t['team_id']; ?>"  <?php foreach($teamtwomember as $st){if($t['team_id']==$st){echo "selected";}} ?> ><?php echo $t['team_name']; ?></option>
			    		
			    	
			    	
			    	<?php $count++; endforeach; ?>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">About Player</label>
			    <textarea class="form-control" name="about_batsman" ><?php echo $player['about']; ?></textarea>
			</div>
			<div class="form-group">
				<input type="hidden" name="post_type" value="posts">
				<input type="hidden" name="post_status" value="Open">
				<input type="submit" name="addbatsman" class="btn btn-primary btn-lg updatebatsman">
			</div>
		</div>
		<?php endforeach; ?>
		<div class="col-md-6" style="height:451px; overflow:scroll;">
			<table class="table">
				<tr>
					<th>Player Name</th>
					<th>Team</th>
					<th>Country</th>
				</tr>
				<?php foreach ($playerslist as $key => $value): ?>
				<tr>
					<td><?php echo $value['batsman_name']; ?></td>
					<td><?php echo get_team_name($value['team_id']) ; ?></td>
					<td><?php echo get_country_name($value['country_id']); ?></td>
					<td><a href="editbatsman.php?edit=<?php echo $value['batsman_id']; ?>">Edit</a></td>
				</tr>
				<?php endforeach; ?>

			</table>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$('.updatebatsman').click(function(event){
			var batsman = $('input[name="batsman"]').val();
			var select_team = $('select[name="select_team"]').val();
			var select_country = $('select[name="select_country"]').val();
			var select_state = 1;
			var haveing_teams = $('select[name="haveing_teams"]').val();
			var about_batsman = $('textarea[name="about_batsman"]').val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"updatebatsman",
				batsman_id:<?php echo $playerid; ?>,
				batsman:batsman,
				select_team:select_team,
				select_country:select_country,
				select_state:select_state,
				haveing_teams:haveing_teams,
				about_batsman:about_batsman
			},function(data,status){
				//alert(status);
			});
		});
	});
</script>
<?php include('footer.php'); ?>