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
			    <label for="exampleInputEmail1">notouts</label>
			    <input type="text" class="form-control" name="notout" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Total Runs</label>
			    <input type="text" class="form-control" name="totalruns" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Top Score</label>
			    <input type="text" class="form-control" name="topscore" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">100s</label>
			    <input type="text" class="form-control" name="hunders" >
			</div>
		</div>
		<div class="col-md-6">
			
			
			<div class="form-group">
			    <label for="exampleInputEmail1">200s</label>
			    <input type="text" class="form-control" name="twohunders" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">50s</label>
			    <input type="text" class="form-control" name="fiftys" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">4s</label>
			    <input type="text" class="form-control" name="fours" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">6s</label>
			    <input type="text" class="form-control" name="sixes" >
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
				<input type="submit" name="addbatsmantotals" class="btn addbatsmantotals">
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$('.addbatsmantotals').click(function(event){
			var matches = $('input[name="matches"]').val();
			var batsmanid = '<?php echo $_GET['batsmanid']; ?>';
			var playedinning = $('input[name="playedinning"]').val();
			var notout = $('input[name="notout"]').val();
			var totalruns = $('input[name="totalruns"]').val();
			var topscore = $('input[name="topscore"]').val();
			var hunders = $('input[name="hunders"]').val();
			var twohunders = $('input[name="twohunders"]').val();
			var fiftys = $('input[name="fiftys"]').val();
			var fours = $('input[name="fours"]').val();
			var sixes = $('input[name="sixes"]').val();
			var match_type = $('select[name="match_type"]').val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"addbatsmantotals",
				batsmanid:batsmanid,
				matches:matches,
				playedinning:playedinning,
				notout:notout,
				totalruns:totalruns,
				topscore:topscore,
				hunders:hunders,
				twohunders:twohunders,
				fours:fours,
				fiftys:fiftys,
				match_type:match_type,
				sixes:sixes
			},function(data,status){
				//alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>