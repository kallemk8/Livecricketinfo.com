<?php include('header.php'); ?>
<section id="admin-page-conttent" class="margintop15">
	<div class="container">
		<div class="col-md-6">
			<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Player Name</label>
			    <input type="text" class="form-control" name="batsman" >
			</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Nickname</label>
				    <input type="text" class="form-control" name="nickname" >
				</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
				<label for="exampleInputEmail1">Select Team</label>
				<select class="form-control" name="select_team" >
			    	<?php foreach($teams as $t): ?>
			    	<option value="<?php echo $t['team_id']; ?>"><?php echo $t['team_name']; ?></option>
			    	<?php endforeach; ?>
			    </select>
			</div>
			</div>
			<div class="col-md-6">

			<div class="form-group">
			    <label for="exampleInputEmail1">Select Country</label>
			    <select class="form-control" name="select_country">
			    	<?php foreach($country as $c): ?>
			    	<option value="<?php echo $c['CountryId']; ?>"><?php echo $c['CountryName']; ?></option>
			    	<?php endforeach; ?>
			    </select>
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Date Of Birthday</label>
			    <input type="date" class="form-control" name="date_of_birthday" >
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Born Place</label>
			    	<input type="text" class="form-control" name="born_place" >
			</div>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">aboutus</label>
			    <textarea class="form-control" name="aboutus" rows="5"></textarea>
			</div>
		</div>
		<div class="col-md-6">
			
			<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Height</label>
			    <input type="text" class="form-control" name="height" >
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">role</label>
			    <input type="text" class="form-control" name="role" >
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">battingstyle</label>
			    <input type="text" class="form-control" name="battingstyle" >
			</div>
			</div>
			<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">bowlingstyle</label>
			    <input type="text" class="form-control" name="bowlingstyle" >
			</div>
			</div>
			<div class="form-group">
				<label for="exampleInputEmail1">Select haveing Teams</label>
				<select class="form-control" name="haveing_teams" multiple="multiple"  style="height:186px;">
			    	<?php foreach($teams as $t): ?>
			    	<option value="<?php echo $t['team_id']; ?>"><?php echo $t['team_name']; ?></option>
			    	<?php endforeach; ?>
			    </select>
			</div>
		</div>
		<div class="col-md-12" style="background-color:#fff;">
			<div class="form-group">
				<input type="submit" name="addbatsman" class="btn btn-primary addbatsman">
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		
		$('.addbatsman').click(function(event){
			var batsman = $('input[name="batsman"]').val();
			var select_team = $('select[name="select_team"]').val();
			var select_country = $('select[name="select_country"]').val();
			var haveing_teams = $('select[name="haveing_teams"]').val();
			var date_of_birthday = $('input[name="date_of_birthday"]').val();
			var born_place = $('input[name="born_place"]').val();
			var nickname = $('input[name="nickname"]').val();
			var height = $('input[name="height"]').val();
			var role = $('input[name="role"]').val();
			var battingstyle = $('input[name="battingstyle"]').val();
			var bowlingstyle = $('input[name="bowlingstyle"]').val();
			var aboutus = $('textarea[name="aboutus"]').val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"addbatsman",
				batsman:batsman,
				select_team:select_team,
				select_country:select_country,
				haveing_teams:haveing_teams,
				date_of_birthday:date_of_birthday,
				born_place:born_place,
				nickname:nickname,
				height:height,
				role:role,
				battingstyle:battingstyle,
				bowlingstyle:bowlingstyle,
				aboutus:aboutus
			},function(data,status){
				//alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>