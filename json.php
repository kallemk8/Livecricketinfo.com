<?php 
include('functions.php');
	$postid = $_GET['matchid'];
	$innings = $_GET['innings'];
	$totla = get_match_totals($postid, $innings);
	echo json_encode($totla);
?>