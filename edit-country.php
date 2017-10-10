<?php 
include('header.php');  
$CountryId = $_GET['edit']; 
$countrys = get_single_country($CountryId);
$Country1 = get_countrys();
?>
<section>
	<div class="container margintop15" >
		<div class="overflow" style="background:#fff; overflow:hidden;">
		<?php foreach($countrys as $country): ?>
		<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Country Name</label>
			    <input type="text" class="form-control" value="<?php echo $country['CountryName']; ?>" name="country_name" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Country Rank</label>
			    <input type="text" class="form-control" value="<?php echo $country['Countryrank']; ?>" name="country_rank" >
			</div>
			
			<div class="form-group">
			    <label for="exampleInputEmail1">About Country</label>
			    <textarea class="form-control" name="about_country"><?php echo $country['aboutus']; ?></textarea>
			</div>
			<div class="form-group">
				<input type="hidden" name="post_type" value="posts">
				<input type="hidden" name="post_status" value="Open">
				<input type="submit" name="addbatsman" class="btn btn-primary btn-lg edit-country">
			</div>
		</div>
		<?php endforeach; ?>
		<div class="col-md-6">
			<table class="table">
				<tr>
					<th>Country ID</th>
					<th>Country Name</th>
					<th>Edit</th>
				</tr>
				<?php foreach ($Country1 as $key => $value): ?>
				<tr>
					<td><?php echo $value['CountryId']; ?></td>
					<td><?php echo $value['CountryName']; ?></td>
					<td><a href="edit-country.php?edit=<?php echo $value['CountryId']; ?>">Edit</a></td>
				</tr>
				<?php endforeach; ?>
			</table>
		</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	$(document).ready(function(){
		$('.edit-country').click(function(event){
			var country_name = $('input[name="country_name"]').val();
			var country_rank = $('input[name="country_rank"]').val();
			var about_country = $('textarea[name="about_country"]').val();
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"editcountry",
				CountryId:<?php echo $CountryId; ?>,
				country_name:country_name,
				country_rank:country_rank,
				about_country:about_country
			},function(data,status){
			});
		});
	});
</script>
<?php include('footer.php'); ?>