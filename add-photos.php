<?php 
	include('session.php');
	include('header.php'); 
	if(isset($_POST['gallery-upload'])){
		$gallery_title = $_POST['gallery_title'];
		$about_photos = $_POST['about_photos'];
		$series = $_POST['series'];
		$match_id = $_POST['match_id'];
		$foldername = str_replace(" ", "-", $_POST['gallery_title']);
		$foldername = strtolower($foldername);
		$foldername = preg_replace('/[^A-Za-z0-9\-]/', '', $foldername);
		$gallery_type = $_POST['gallery_type'];
		$GalleryMode = "";
		$total = count($_FILES['gallery_images']['name']);
		$random= date("d_m_Y"); 
		$rand= rand(100,999);
		$filelocation = "uploads/".$foldername.$rand;
		mkdir($filelocation, 0777, true);
		$conn = connection();
		$sql = "INSERT INTO photos (photoname, photogroupid, groupimage, photosfolder, photocontent, url, series, match_id)
		VALUES ('$gallery_title', '0', 'k','$filelocation','$about_photos','$foldername','$series','$match_id')";
		if ($conn->exec($sql)) {
			$last_id = $conn->lastInsertId();
		   
		for($i=0; $i<$total; $i++) {
		  $tmpFilePath = $_FILES['gallery_images']['tmp_name'][$i];
		  	if ($tmpFilePath != ""){
			   	$newFilePath = $filelocation.'/' . $_FILES['gallery_images']['name'][$i];
			    if(move_uploaded_file($tmpFilePath, $newFilePath)) {
			    	move_uploaded_file($_FILES["gallery_images"]["tmp_name"][$i], $filelocation.'/'.$tmpFilePath);
			    	$sql = "INSERT INTO media (countryid, photosid, videosid, postsid, playerinfoid, imageurl, title, description) VALUES ('1','$last_id','0','0','0','$newFilePath','$gallery_title','$gallery_title')";
			    	$conn->exec($sql);
			    }
		  	}
		}
		} 
		
		}
	?>
<section class="margintop15">
	<div class="container">
		<div class="holder">
			<form action="add-photos.php" method="post" enctype="multipart/form-data">
				<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Photos Title</label>
				    <input type="text" class="form-control" name="gallery_title" >
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">About Photos</label>
				    <input type="text" class="form-control" name="about_photos" >
				</div>
				
				<div class="form-group">
				    <label for="exampleInputEmail1">Feature Image</label>
				    <input type="file" class="form-control" name="post_image">
				</div>
				</div>
				<div class="col-md-6">
				<div class="form-group">
				    <label for="exampleInputEmail1">Match ID</label>
				    <input type="text" class="form-control" name="match_id" >
				</div>
				<div class="form-group">
			    <label for="exampleInputEmail1">Series</label>
			   
			    	<select class="form-control" name="series">
			    	 <?php foreach($serieses as $series): ?>
			    		<option value="<?php echo $series['ID']; ?>"><?php echo $series['seriesname']; ?></option>
			    		<?php endforeach; ?>
			    	</select>
			    
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Select Images for Gallery</label>
				    <input type="file" class="form-control" name="gallery_images[]" multiple="multiple" >
				</div>
				<div class="form-group">
					<input type="submit" name="gallery-upload" class="btn btn-primary btn-lg">
				</div>
				</div>
			</form>
		</div>
	</div>
</section>
<?php include('footer.php'); ?>	
