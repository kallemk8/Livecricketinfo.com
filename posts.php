<?php 
	include('session.php');
	include('header.php'); 
	$posts = get_all_posts(10);
	$contentposts = get_all_newsposts(10);
	$get_number_videos = get_number_videos(10);
?>
		<section id="admin-page-conttent" class="margintop15">
			<div class="container">
				<h4 class="margin0 onlybackground-color">Live Matchs <a href="http://livecricketinfo.com/logout.php">Logout</a></h4>
				<table class="table table-borderd" style="background:#fff;">
				<?php foreach ($posts as $key => $value): ?>
					<tr>
						<td><?php echo $value['ID']; ?></td>
						<td><?php echo $value['match_title']; ?></td>
						<td><a href="edit-match.php?post=<?php echo $value['ID']; ?>">Edit</a></td>
						<?php if($value['match_type']==1): ?>
						<td>
							<?php for($i=1; $i<5; $i++): ?>
							<a href="livescoreupdate.php?match_id=<?php echo $value['ID']; ?>&inning=<?php echo $i; ?>"><?php echo $i; ?> innings</a>
							<?php endfor; ?>
						</td>
						<?php endif; ?>
						<?php if($value['match_type']==2||$value['match_type']==3): ?>
							<td>
							<?php for($i=1; $i<3; $i++): ?>
							<a href="livescoreupdate.php?match_id=<?php echo $value['ID']; ?>&inning=<?php echo $i; ?>&comment=1"><?php echo $i; ?> innings</a>
							<?php endfor; ?>
							</td>
						<?php endif; ?>
						<td class="delete-match"><a href="#" id='<?php echo $value['ID']; ?>' >Delete</a></td>
					</tr>
				<?php endforeach; ?>
				</table>
			</div>
		</section>
		<section id="admin-page-conttent">
			<div class="container" >
				<h4 class="margin0 onlybackground-color">Content Posts</h4>
				<table class="table table-borderd" style="background:#fff;">
				<?php foreach ($contentposts as $key => $value): ?>
					<tr>
						<td><?php echo $value['ID']; ?></td>
						<td><?php echo $value['post_title']; ?></td>
						<td><?php echo $value['match_id']; ?></td>
						<td><?php echo $value['post_author']; ?></td>
						<td><a href="edit-post.php?post=<?php echo $value['ID']; ?>">Edit</a></td>
						<td class="delete-content-post"><a href="#" id="<?php echo $value['ID']; ?>" >Delete</a></td>
					</tr>
				<?php endforeach; ?>
				</table>
			</div>
		</section>
		<section id="admin-page-conttent">
			<div class="container" >
				<h4 class="margin0 onlybackground-color">Latest Video Posts</h4>
				<table class="table table-borderd" style="background:#fff;">
				<?php foreach ($get_number_videos as $key => $value): ?>
					<tr>
						<td><?php echo $value['ID']; ?></td>
						<td><?php echo $value['videotitle'] ?></td>
						<td><?php echo get_series_url_by_id($value['series']); ?></td>
						<td><a href="edit-video.php?postid=<?php echo $value['ID']; ?>">Edit</a></td>
						<td class="delete-video"><a href="#" id="<?php echo $value['ID']; ?>">Delete</a></td>
					</tr>
				<?php endforeach; ?>
				</table>
			</div>
		</section>

		<script type="text/javascript">
			$('.delete-match a').click(function(){
				var delete_match = $(this).attr('id');
				$.post("http://www.livecricketinfo.com/action.php",{
                	action:"delete_match",
                	delete_match:delete_match
                },function(data,status){
					alert(data);
				});

			});
			$('.delete-video a').click(function(){
				var delete_video = $(this).attr('id');
				$.post("http://www.livecricketinfo.com/action.php",{
                	action:"delete_video",
                	delete_video:delete_video
                },function(data,status){
					alert(data);
				});

			});
			$('.delete-content-post a').click(function(){
				var delete_co_post = $(this).attr('id');
				$.post("http://www.livecricketinfo.com/action.php",{
                	action:"delete_content_post",
                	delete_co_post:delete_co_post
                },function(data,status){
					alert(data);
				});

			});

		</script>
<?php 
include('footer.php');
?>