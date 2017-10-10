<?php 
include('header.php'); 
$teams = get_teams(); 
 echo $_GET['playerid'];
?>
<section id="admin-page-conttent" class="margintop15">
	<div class="container">
		<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Player Full Name</label>
			    <input type="text" class="form-control" name="full_name" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Date Of Birthday</label>
			    <input type="date" class="form-control" name="date_of_birthday" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Born Place</label>
			    	<input type="text" class="form-control" name="born_place" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Nickname</label>
			    <input type="text" class="form-control" name="nickname" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Height</label>
			    <input type="text" class="form-control" name="height" >
			</div>
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
			<div class="form-group">
			    <label for="exampleInputEmail1">bowlingstyle</label>
			    <input type="text" class="form-control" name="bowlingstyle" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Teams</label>
			    <select class="form-control"  name="Teams" >
			    	<option value="0">Select</option>
			    	<option value="1">Test Match</option>
			    	<option value="2">ODI</option>
			    	<option value="2">T20</option>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">lastmatch</label>
			    <input type="text" class="form-control" name="lastmatch" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">aboutus</label>
			    <textarea class="form-control" name="aboutus" rows="5"></textarea>
			</div>
			
			<div class="form-group">
				<input type="hidden" name="post_type" value="posts">
				<input type="hidden" name="post_status" value="Open">
				<input type="submit" name="addplayerinfo" class="btn addplayerinfo">
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		
		$('.addplayerinfo').click(function(event){
			var full_name = $('input[name="full_name"]').val();
			var date_of_birthday = $('input[name="date_of_birthday"]').val();
			var born_place = $('input[name="born_place"]').val();
			var nickname = $('input[name="nickname"]').val();
			var height = $('input[name="height"]').val();
			var role = $('input[name="role"]').val();
			var battingstyle = $('input[name="battingstyle"]').val();
			var bowlingstyle = $('input[name="bowlingstyle"]').val();
			var Teams = $('select[name="Teams"]').val();
			var lastmatch = $('input[name="lastmatch"]').val();
			var aboutus = $('textarea[name="aboutus"]').val();
			var playerid = '<?php echo $_GET['playerid']; ?>';
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"addplayerinfo",
				full_name:full_name,
				date_of_birthday:date_of_birthday,
				born_place:born_place,
				nickname:nickname,
				height:height,
				role:role,
				battingstyle:battingstyle,
				bowlingstyle:bowlingstyle,
				Teams:Teams,
				lastmatch:lastmatch,
				aboutus:aboutus,
				playerid:playerid
			},function(data,status){
				alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>