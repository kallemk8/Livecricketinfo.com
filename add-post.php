<?php include('session.php'); include('header.php'); ?>
<?php
	if(isset($_POST['addnewpost'])){
		$post_title = $_POST['post_title'];
		$posturl = str_replace(" ", "-", $_POST['post_title']);
		$posturl = strtolower($posturl);
		$posturl = preg_replace('/[^A-Za-z0-9\-]/', '', $posturl);
		$post_content = $_POST['post_content'];
		$post_author = $_POST['post_author'];
		$post_type = $_POST['post_type'];
		$post_status = $_POST['post_status'];
		$match_id = $_POST['match_id'];
		$series = $_POST['series'];
		$meta_title = $_POST['meta_title'];
		$meta_keywords = $_POST['meta_keywords'];
		$meta_description = $_POST['meta_description'];
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
			$newfilename2 = "postimages/".$newfilename;
			if (file_exists("postimages/" . $newfilename))
			{
				// file already exists error
				echo "You have already uploaded this file.";
			}
			else
			{		
				move_uploaded_file($_FILES["post_image"]["tmp_name"], "postimages/" . $newfilename);
		$conn = connection();
		
		$sql = "INSERT INTO posts (post_title, post_content, post_excerpt,	postimage,	meta_title, meta_keywords, meta_description, post_url, match_id, post_author,post_type, post_status,series)
		VALUES ('$post_title', '$post_content', '','$newfilename2','$meta_title','$meta_keywords','$meta_description','$posturl', '$match_id','$post_author','$post_type','$post_status','$series')";
		if ($conn->query($sql)) {
		    echo "1";
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
			<div class="container" >

		<div class="col-md-12" style="background:#fff;">
			<form action="add-post.php" method="post" enctype="multipart/form-data">
			<div class="form-group">
			    <label for="exampleInputEmail1">Post Title</label>
			    <input type="text" class="form-control" name="post_title" >
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Post Content</label>
			    <textarea class="form-control" rows="10" name="post_content"></textarea>
			</div>
			<!-- <div class="form-group">
			    <label for="exampleInputEmail1">Post Categorie</label>
			    <select class="form-control" name='post_categorie'>
			    	<option value="0">Select</option>
			    	<option value="1">Live Score</option>
			    	<option value="2">Schedule</option>
			    	<option value="3">Archives</option>
			    	<option value="4">Archives</option>
			    	<option value="5">News</option>
			    	<option value="6">Series</option>
			    	<option value="7">Teams</option>
			    	<option value="8">Videos</option>
			    	<option value="9">Photos</option>
			    	<option value="10">Ranking</option>
			    </select>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Post Tags</label>
			    <input type="text" class="form-control" name="post_tags" >
			</div> 
			<div class="form-group">
			    <label for="exampleInputEmail1">You Tube Video ID</label>
			    <input type="text" class="form-control" name="post_videoid" >
			</div>-->
			<div class="form-group">
			    <label for="exampleInputEmail1">Match ID</label>
			    <input type="text" class="form-control" name="match_id" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Feature Image</label>
			    <input type="file" class="form-control" name="post_image">
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Meta Title</label>
			    <input type="text" class="form-control" name="meta_title"  >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Meta Keywords</label>
			    <input type="text" class="form-control" name="meta_keywords"  >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Meta Description</label>
			    <input type="text" class="form-control" name="meta_description"  >
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
				<input type="hidden" value="Srikanth Kallem" name="post_author">
				<input type="hidden" value="News" name="post_type">
				<input type="hidden" value="open" name="post_status">
				<input type="submit" name="addnewpost" class="btn btn-primary btn-lg">
			</div>
			</form>
		</div>
	</div>
	</div>
	</section>
		<footer id='footer'>
			<div class="container">
				<p>&copy; copyrights 2016 livecricketinfo.com</p>
			</div>
		</footer>
		
    </body>
</html>
			
