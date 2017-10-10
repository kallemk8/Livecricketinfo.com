<?php 
include('header.php');
$team_id = $_GET['edit']; 
$teams = get_single_team($team_id); 
?>
<section class="margintop15">
	<div class="container">
		<div style="background:#fff; overflow: hidden;">
			<?php foreach($teams as $team): ?>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Team Name</label>
				    <input type="text" class="form-control" value="<?php echo $team['team_name']; ?>" name="team_name" >
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Team Short Name</label>
				    <input type="text" class="form-control" value="<?php echo $team['mini_name']; ?>" name="mini_name" >
				</div>
				<div class="form-group">
				<?php $country = get_countrys(); ?>
			    <label for="exampleInputEmail1">Select Country</label>
			    <select class="form-control" value="<?php echo $team['CountryId']; ?>" name="select_team_country">
			    	<?php foreach($country as $c): ?>
			    	<option value="<?php echo $c['CountryId']; ?>"><?php echo $c['CountryName']; ?></option>
			    	<?php endforeach; ?>
			    </select>
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">About Team</label>
				    <textarea class="form-control" name="about_team"><?php echo $team['aboutus']; ?></textarea>
				</div>
				<div class="form-group">
					<input type="hidden" name="post_type" value="posts">
					<input type="hidden" name="post_status" value="Open">
					<input type="submit" name="addbatsman" class="btn btn-primary btn-lg edit-team">
				</div>
			</div>
			<?php endforeach; ?>
			<div class="col-md-6">
				<?php $teams = get_teams($team_id); ?>
				<table class="table">
					<tr>
						<th>Player Name</th>
						<th>Team</th>
						<th>Country</th>
					</tr>
					<?php foreach ($teams as $key => $value): ?>
					<tr>
						<td><?php echo $value['team_id']; ?></td>
						<td><?php echo $value['team_name']; ?></td>
						<td><?php echo get_country_name($value['CountryId']); ?></td>
						<td><a href="edit-team.php?edit=<?php echo $value['team_id']; ?>">Edit</a></td>
					</tr>
					<?php endforeach; ?>
				</table>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$('.edit-team').click(function(event){
			var team_id = '<?php echo $_GET['edit']; ?>';
			var team_name = $('input[name="team_name"]').val();
			var mini_name = $('input[name="mini_name"]').val();
			var select_team_country = $('select[name="select_team_country"]').val();
			var about_team = $('textarea[name="about_team"]').val();
			
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"editteam",
				team_id:team_id,
				team_name:team_name,
				mini_name:mini_name,
				select_team_country:select_team_country,
				about_team:about_team
			},function(data,status){
				//alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>