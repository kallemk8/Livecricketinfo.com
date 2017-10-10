<?php
	include('session.php');
	include('header.php');
	$postid = $_GET['postid']; 
	if(isset($_POST['editpost'])){
		$post_title = $_POST['post_title'];
		$posturl = $_POST['post_url'];
		$post_content = $_POST['post_content'];
		$post_excerpt = $_POST['post_excerpt'];
		$post_author = $_POST['post_author'];
		$post_type = $_POST['post_type'];
		$post_status = $_POST['post_status'];
		$match_id = $_POST['match_id'];
		$meta_title = $_POST['meta_title'];
		$meta_keywords = $_POST['meta_keywords'];
		$meta_description = $_POST['meta_description'];
		
		$conn = connection();
		
		$sql = "UPDATE posts SET post_title='$post_title', post_content='$post_content', post_excerpt='$post_excerpt', meta_title='$meta_title', meta_keywords='$meta_keywords', meta_description='$meta_description', post_url='$posturl', match_id='$match_id', post_author='$post_author', post_type='$post_type', post_status='$post_status' Where ID = $postid ";
		if ($conn->query($sql)) {
		    echo "1";
		} else{
			echo "error";
		}
	}
	$singlepost = get_all_newssingle($postid); 

	foreach($singlepost as $post): 
?>
	<div class="container margintop15" >
		<div class="col-md-12" style="background:#fff;">
			<form action="edit-post.php?postid=<?php echo $postid ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
			    <label for="exampleInputEmail1">Post Title</label>
			    <input type="text" class="form-control" value="<?php echo $post['post_title']; ?>" name="post_title" >
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Post Content</label>
			    <textarea class="form-control" rows="10"  name="post_content"><?php echo $post['post_content']; ?></textarea>
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Post Excerpt</label>
			    <textarea class="form-control" rows="10"  name="post_excerpt"><?php echo $post['post_excerpt']; ?></textarea>
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
			    <input type="text" class="form-control" value="<?php echo $post['match_id']; ?>" name="match_id" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Url</label>
			    <input type="text" class="form-control" value="<?php echo $post['post_url']; ?>" name="post_url"  >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Meta Title</label>
			    <input type="text" class="form-control" value="<?php echo $post['meta_title']; ?>" name="meta_title"  >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Meta Keywords</label>
			    <input type="text" class="form-control" value="<?php echo $post['meta_keywords']; ?>" name="meta_keywords"  >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Meta Description</label>
			    <input type="text" class="form-control" value="<?php echo $post['meta_description']; ?>" name="meta_description"  >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Post Author</label>
			    <input type="text" class="form-control" value="<?php echo $post['post_author']; ?>" name="post_author"  >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Post Status</label>
			    <select name="post_status" class="form-control">
			    	<option value="Open">Open</option>
			    	<option value="Close">Close</option>
			    </select>
			    
			</div>
			<div class="form-group">
				
				<input type="hidden" value="News" name="post_type">
				
				<input type="submit" name="editpost" class="btn btn-primary btn-lg">
			</div>
			</form>
		</div>
	</div>
<?php 
endforeach;
include('footer.php');
?>
			
