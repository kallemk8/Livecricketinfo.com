<?php
	include('session.php');
	include('header.php'); 
	if(isset($_POST['addnewvideo'])){
		$post_title = $_POST['video_title'];
		$posturl = str_replace(" ", "-", $_POST['video_title']);
		$posturl = strtolower($posturl);
		$posturl = preg_replace('/[^A-Za-z0-9\-]/', '', $posturl);
		$post_content = $_POST['video_content'];
		$match_id = $_POST['match_id'];
		$series = $_POST['series'];
		$video_sub_title = $_POST['video_sub_title'];
		$videotype = $_POST['videotype'];
		$videoid = $_POST['videoid'];
		$customvideo ='';
		
		$filename = $_FILES["post_image"]["name"];
		$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
		$file_ext = substr($filename, strripos($filename, '.')); // get file name
		$filesize = $_FILES["post_image"]["size"];
		$allowed_file_types = array('.jpeg','.png','.jpg','.gif');	

		if (in_array($file_ext,$allowed_file_types) )
		{	
			// Rename file	
			$random= date("d_m_Y"); 
			$rand= rand(100,999);
			$newfilename = str_replace(" ", "-", $file_basename).$random."-".$rand.$file_ext;
			$newfilename2 = "playimage/".$newfilename;
			if (file_exists("playimage/" . $newfilename))
			{
				// file already exists error
				echo "You have already uploaded this file.";
			}
			else
			{		
				move_uploaded_file($_FILES["post_image"]["tmp_name"], "playimage/" . $newfilename);
		$conn = connection();
		
		$sql = "INSERT INTO videos (videotitle, videoimage, videocontent, videoid, series, url, match_id, 	customvideolink, video_type, subtitle)
		VALUES ('$post_title', '$newfilename2','$post_content','$videoid','$series','$posturl','$match_id','$customvideo','$videotype','$video_sub_title')";
		if ($conn->query($sql)) {
		    
		} 
		}
		}
		elseif (empty($file_basename))
		{	
			// file selection error
			echo "Please select a file to upload.";
		} 
		elseif ($filesize > 200000)
		{	
			// file size error
			echo "The file you are trying to upload is too large.";
		}
		else
		{
			// file type error
			echo "Only these file typs are allowed for upload: " . implode(', ',$allowed_file_types);
			unlink($_FILES["file"]["tmp_name"]);
		}
	}
	
?>
	<section class="margintop15">
	<div class="container">
		<div class="holder">
		<form action="add-video.php" method="post" enctype="multipart/form-data">
		<div class="col-md-6">
			
			<div class="form-group">
			    <label for="exampleInputEmail1">Video Title</label>
			    <input type="text" class="form-control" name="video_title" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Video Sub Title</label>
			    <input type="text" class="form-control" name="video_sub_title" >
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Video Content</label>
			    <textarea class="form-control" rows="7" name="video_content"></textarea>
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
			    <input type="text" class="form-control" name="videoid" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Match Id</label>
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
			    <label for="exampleInputEmail1">Video Image</label>
			    <input type="file" class="form-control" name="post_image">
			</div>
			<div class="form-group">
				<input type="submit" name="addnewvideo" class="btn btn-primary ">
			</div>
		</div>
		</form>
		</div>
	</div>
	</section>
<?php include('footer.php'); ?>
