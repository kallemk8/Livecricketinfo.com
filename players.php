<?php include('header.php'); ?>
<section id="admin-page-conttent" class="margintop15"> 
	<div class="container">
		<div class="holder">
			<div class="col-md-12" style="height:451px; overflow:scroll;">
				<table class="table">
					<tr>
						<th>Player Name</th>
						<th>Team</th>
						<th>Country</th>
					</tr>
					<?php foreach ($player as $key => $value): 
						$playerinfo = get_single_playerinfoid($value['batsman_id']);
						$playerurl = get_single_playerurl($value['batsman_id']);
						$playerdisplaypic = get_single_playerdisplaypic($value['batsman_id'])
					?>
					<tr>
						<td><?php echo $value['batsman_id']; ?></td>
						<td><?php echo $value['batsman_name']; ?></td>
						<td><?php echo get_team_name($value['team_id']) ; ?></td>
						<td><a href="edit-player.php?edit=<?php echo $value['batsman_id']; ?>">Edit</a></td>
						<?php if($playerurl): ?>
						<td><a target="_blank" href="edit-playerinfo.php?playerid=<?php echo $value['batsman_id']; ?>">Update info</a></td>
						<?php endif; ?>
						<?php if(!$playerurl): ?>
						<td><a target="_blank" href="add-playerinfo.php?playerid=<?php echo $value['batsman_id']; ?>">Add Info</a></td>
						<?php endif; ?>
						<?php if(!$playerurl): ?>
						<td><a target="_blank" href="media.php?playerinfoid=<?php echo $playerinfo; ?>&player=<?php echo $value['batsman_id']; ?>">Add Image</a></td>
						<?php endif; ?>
						<?php if($playerurl): ?>
						<td><a target="_blank" href="media.php?playerinfoid=<?php echo $playerinfo; ?>&player=<?php echo $value['batsman_id']; ?>">Update Image</a></td>
						<?php endif; ?>
						<?php if(!$playerdisplaypic): ?>
						<td><a target="_blank" href="add-player-displaypic.php?playerinfoid=<?php echo $playerinfo; ?>">Add DP Image</a></td>
						<?php endif; ?>
						<?php if($playerdisplaypic): ?>
						<td><a target="_blank" href="add-player-displaypic.php?playerinfoid=<?php echo $playerinfo; ?>">Update DP Image</a></td>
						<?php endif; ?>
						<td><a target="_blank" href="http://www.livecricketinfo.com/player/<?php echo $playerurl."/".$value['batsman_id']; ?>">View Player</a></td>
						<td ><a class="delete_player_withid" href="#" data-id="<?php echo $value['batsman_id']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
					</tr>
					<?php endforeach; ?>

				</table>
			</div>
		</div>
	</div>
</section>


<script type="text/javascript">
	$('.delete_player_withid').click(function(){
			var playerid =	$(this).attr('data-id');
			$.post("http://www.livecricketinfo.com/action.php",
			{	
				action:"deleteplayer",
				playerid:playerid
			},function(data,status){
				if(data==1){
				$(location).attr('href', 'http://www.livecricketinfo.com/players.php');
			}else{
				alert(data);
			}
			});
		});

</script>
<?php include('footer.php'); ?>