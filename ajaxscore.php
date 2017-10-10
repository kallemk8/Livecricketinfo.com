<?php 
include('functions.php');
$match_id = $_POST['match_id'];
$innings = $_POST['innings'];
$total = get_match_totals($match_id, $innings);
$overs = get_match_overs($match_id, $innings);
$rballs = get_match_remaining_balls($match_id, $innings);
$wickets = get_wickets($match_id, $innings);
echo $score = $total."/".$wickets."&nbsp;(".$overs.".".$rballs." over)";
?>