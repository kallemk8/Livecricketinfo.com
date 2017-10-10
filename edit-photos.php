<?php 
	include('header.php'); 
	$postid = $_GET['postid'];
	$photos = get_single_photos($postid);
	if(isset($_POST['gallery-edit'])){
		$post_title = $_POST['gallery_title'];
		$posturl = $_POST['url'];
		$post_content = $_POST['about_photos'];
		$match_id = $_POST['match_id'];
		$series = $_POST['series'];
		$conn = connection();
		
		$sql = "UPDATE photos SET photoname = '$post_title', photocontent = '$post_content', url = '$posturl', series = '$series', match_id = '$match_id' Where ID = $postid";
		if ($conn->query($sql)) {
		    echo "Success";
		} 
	}
	foreach($photos as $photo):
	
	?>
<section class="margintop15">
	<div class="container">
		<div class="holder">
			<form action="edit-photos.php?postid=<?php echo $postid; ?>" method="post" enctype="multipart/form-data">
				<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Photos Title</label>
				    <input type="text" class="form-control" value="<?php echo $photo['photoname']; ?>" name="gallery_title" >
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">About Photos</label>
				    <input type="text" class="form-control" value="<?php echo $photo['photocontent']; ?>" name="about_photos" >
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Match ID</label>
				    <input type="text" class="form-control" value="<?php echo $photo['match_id']; ?>" name="match_id" >
				</div>
				</div>
				<div class="col-md-6">
				
				<div class="form-group">
				    <label for="exampleInputEmail1">Url</label>
				    <input type="text" class="form-control" value="<?php echo $photo['url']; ?>" name="match_id" >
				</div>
				<div class="form-group">
			    <label for="exampleInputEmail1">Series</label>
			    <?php foreach($serieses as $series): ?>
			    	<select class="form-control" name="series" value="<?php echo $photo['series']; ?>">
			    		<option value="<?php echo $series['ID']; ?>"><?php echo $series['seriesname']; ?></option>
			    	</select>
			    <?php endforeach; ?>
				</div>
				<div class="form-group">
					<input type="submit" name="gallery-edit" class="btn btn-primary ">
				</div>
				</div>
			</form>
		</div>
	</div>
</section>
<?php 
endforeach;
include('footer.php'); 
?>	