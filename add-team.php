<?php include('session.php'); include('header.php'); ?>
<section class="margintop15">
	<div class="container" >
		<div style="background:#fff; overflow:hidden;" >
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Team Name</label>
				    <input type="text" class="form-control" name="team_name" >
				</div>
				<div class="form-group">
					<?php $country = get_countrys(); ?>
				    <label for="exampleInputEmail1">Select Country</label>
				    <select class="form-control" name="select_team_country">
				    	<?php foreach($country as $c): ?>
				    	<option value="<?php echo $c['CountryId']; ?>"><?php echo $c['CountryName']; ?></option>
				    	<?php endforeach; ?>
				    </select>
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">About Team</label>
				    <textarea class="form-control" name="about_team"></textarea>
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Team Mini Name</label>
				    <input type="text" class="form-control" name="mini_name" >
				</div>
				<div class="form-group">
					<input type="hidden" name="post_type" value="posts">
					<input type="hidden" name="post_status" value="Open">
					<input type="submit" name="addbatsman" class="btn btn-primary btn-lg addbatsman">
				</div>
			</div>
			<div class="col-md-6">
				<?php $teams = get_teams(); ?>
				<table class="table">
					<tr>
						<th>Team ID</th>
						<th>Team Name</th>
						<th>Edit</th>
					</tr>
					<?php foreach ($teams as $key => $value): ?>
					<tr>
						<td><?php echo $value['team_id']; ?></td>
						<td><?php echo $value['team_name']; ?></td>
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
		$('.addbatsman').click(function(event){
			var team_name = $('input[name="team_name"]').val();
			var mini_name = $('input[name="mini_name"]').val();
			var select_team_country = $('select[name="select_team_country"]').val();
			var about_team = $('textarea[name="about_team"]').val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"addteam",
				team_name:team_name,
				mini_name:mini_name,
				select_team_country:select_team_country,
				about_team:about_team
			},function(data,status){
				alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>