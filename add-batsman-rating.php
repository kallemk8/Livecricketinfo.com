<?php 
include('header.php'); 
$Players = get_players(); 
?>
<section id="admin-page-conttent" class="margintop15">
	<div class="container">
		<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Select Batsman</label>
			    <select class="form-control" name="batsman" >
			    	<?php foreach($Players as $t): ?>
			    	<option value="<?php echo $t['batsman_id']; ?>"><?php echo $t['batsman_name']; ?></option>
			    	<?php endforeach; ?>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">ODI Rank</label>
			    <input type="text" class="form-control" name="odirank" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Test Rank</label>
			    <input type="text" class="form-control" name="testrank" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">20T Rank</label>
			    <input type="text" class="form-control" name="twentyrank" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">ODI Points</label>
			    <input type="text" class="form-control" name="odipoints" >
			</div>
			
			
		</div>
		<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Test Points</label>
			    <input type="text" class="form-control" name="testpoints" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">20T Points</label>
			    <input type="text" class="form-control" name="twentypoints" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">ODI Rating</label>
			    <input type="text" class="form-control" name="odirating" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Test Rating</label>
			    <input type="text" class="form-control" name="testrating" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">20T Rating</label>
			    <input type="text" class="form-control" name="twentyrating" >
			</div>
			
			<div class="form-group">
				<input type="hidden" name="post_type" value="posts">
				<input type="hidden" name="post_status" value="Open">
				<input type="submit" name="addbatsman" class="btn btn-primary  addbatsmanrating">
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		
		$('.addbatsmanrating').click(function(event){
			var batsman = $('select[name="batsman"]').val();
			var odirank = $('input[name="odirank"]').val();
			var testrank = $('input[name="testrank"]').val();
			var twentyrank = $('input[name="twentyrank"]').val();
			var odipoints = $('input[name="odipoints"]').val();
			var testpoints = $('input[name="testpoints"]').val();
			var twentypoints = $('input[name="twentypoints"]').val();
			var odirating = $('input[name="odirating"]').val();
			var testrating = $('input[name="testrating"]').val();
			var twentyrating = $('input[name="twentyrating"]').val();
			
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"addbatsmanrating",
				batsman:batsman,
				odirank:odirank,
				testrank:testrank,
				twentyrank:twentyrank,
				odipoints:odipoints,
				testpoints:testpoints,
				twentypoints:twentypoints,
				odirating:odirating,
				testrating:testrating,
				twentyrating:twentyrating
				
			},function(data,status){
				alert(data);
			});
		});
	});
</script>
<?php include('footer.php'); ?>