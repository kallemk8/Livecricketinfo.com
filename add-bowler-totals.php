<?php 
include('header.php'); 
$teams = get_teams(); 
?>
<section id="admin-page-conttent" class="margintop15">
	<div class="container">
		<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Total Matches</label>
			    <input type="text" class="form-control" name="matches" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Innings</label>
			    <input type="text" class="form-control" name="playedinning" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Balls</label>
			    <input type="text" class="form-control" name="balls" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Total Runs</label>
			    <input type="text" class="form-control" name="totalruns" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Wickets</label>
			    <input type="text" class="form-control" name="wickets" >
			</div>
			
		</div>
		<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Best in innings</label>
			    <input type="text" class="form-control" name="bestininnings" >
			</div>
			
			<div class="form-group">
			    <label for="exampleInputEmail1">Best in Match</label>
			    <input type="text" class="form-control" name="bestinmatch" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">5 wickets</label>
			    <input type="text" class="form-control" name="fivewickets" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">10 wickets</label>
			    <input type="text" class="form-control" name="tenwickets" >
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
				<input type="hidden" name="post_type" value="posts">
				<input type="hidden" name="post_status" value="Open">
				<input type="submit" name="addbowlertotals" class="btn addbowlertotals">
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$('.addbowlertotals').click(function(event){
			var matches = $('input[name="matches"]').val();
			var bowlerid = '<?php echo $_GET['bowlerid']; ?>';
			var playedinning = $('input[name="playedinning"]').val();
			var balls = $('input[name="balls"]').val();
			var totalruns = $('input[name="totalruns"]').val();
			var wickets = $('input[name="wickets"]').val();
			var bestininnings = $('input[name="bestininnings"]').val();
			var bestinmatch = $('input[name="bestinmatch"]').val();
			var fivewickets = $('input[name="fivewickets"]').val();
			var tenwickets = $('input[name="tenwickets"]').val();
			var match_type = $('select[name="match_type"]').val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"addbowlertotals",
				bowlerid:bowlerid,
				matches:matches,
				playedinning:playedinning,
				balls:balls,
				totalruns:totalruns,
				wickets:wickets,
				bestininnings:bestininnings,
				bestinmatch:bestinmatch,
				fivewickets:fivewickets,
				tenwickets:tenwickets,
				match_type:match_type
			},function(data,status){
				alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>