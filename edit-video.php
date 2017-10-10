
<?php
	include('header.php'); 
	$postid = $_GET['postid'];
	$videos = get_single_videos($postid);
	if(isset($_POST['addnewvideo'])){
		$post_title = $_POST['video_title'];
		$posturl = $_POST['url'];
		$post_content = $_POST['video_content'];
		$match_id = $_POST['match_id'];
		$series = $_POST['series'];
		$video_sub_title = $_POST['video_sub_title'];
		$videotype = $_POST['videotype'];
		$videoid = $_POST['videoid'];
		$customvideo ='';
		
		$conn = connection();
		
		$sql = "UPDATE videos SET videotitle = '$post_title', videocontent = '$post_content', videoid = '$videoid', series = '$series', url = '$posturl', match_id = '$match_id',  video_type='$videotype', subtitle='$video_sub_title' Where ID = $postid";
		if ($conn->query($sql)) {
		    echo "success";
		} 
	}
	foreach ($videos as $key => $value):
?>	
	<section class="margintop15">
	<div class="container">
		<div class="holder">
		<form action="edit-video.php?postid=<?php echo $postid; ?>" method="post" enctype="multipart/form-data">
		<div class="col-md-6">
			
			<div class="form-group">
			    <label for="exampleInputEmail1">Video Title</label>
			    <input type="text" class="form-control" value="<?php echo $value['videotitle']; ?>" name="video_title" >
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Video Content</label>
			    <textarea class="form-control" rows="5"  name="video_content"><?php echo $value['videocontent']; ?></textarea>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Video Sub Title</label>
			    <input type="text" class="form-control" name="video_sub_title" value="<?php echo $value['subtitle']; ?>" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Match ID</label>
			    <input type="text" class="form-control" name="match_id" value="<?php echo $value['match_id']; ?>" >
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
			    <label for="exampleInputEmail1">Video Type</label>
			    <select class="form-control" name="videotype" >
			    	<option value="0">Select</option>
			    	<option value="1">Youtube</option>
			    	<option value="2">Own Video</option>
			    	<option value="3">Iframe</option>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Link</label>
			    <input type="text" class="form-control" name="videoid" value="<?php echo $value['videoid']; ?>">
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Series</label>
			    
			    	<select class="form-control" name="series"  value="<?php echo $value['series']; ?>" >
			    	<?php foreach($serieses as $series): ?>
			    		<option value="<?php echo $series['ID']; ?>"><?php echo $series['seriesname']; ?></option>
			    		<?php endforeach; ?>
			    	</select>
			    
			</div>
			
			<div class="form-group">
			    <label for="exampleInputEmail1">Url</label>
			    <input type="text" class="form-control" name="url" value="<?php echo $value['url']; ?>" >
			</div>
			
			<div class="form-group">
				<input type="hidden" value="Srikanth Kallem" name="post_author">
				<input type="hidden" value="News" name="post_type">
				<input type="hidden" value="open" name="post_status">
				<input type="submit" name="addnewvideo" class="btn btn-primary ">
			</div>
		</div>
		</form>
		</div>
	</div>
	</section>
<?php 
	endforeach;
include('footer.php'); ?>
