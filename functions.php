<?php 
	if(isset($_GET['postid'])){
		$postid = $_GET['postid'];
	}else{
		$postid = "0";
	}
	global $data;
	function connection(){

	    $conn = new PDO("mysql:host=localhost;dbname=livecricketinfo","livecricketinfo",'M@gopi8Kallem' );
    return $conn;
	}
	function site_url(){
		$url = "http://www.livecricketinfo.com/";
		return $url;

	}


	function get_runs($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT runs FROM matchrecent where match_id = $match_id and innings = $inning_id"; 
		$res = $conn->prepare($sql);
		$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['runs'];
		}
		return $data;
	}
	function get_runs_list_in_text($match_id, $inning_id,$numbers){
		$count = get_recent_match_count($match_id);
		$count2 = $count-$numbers;
		$conn = connection();
		$sql = "SELECT runs FROM matchrecent where match_id = $match_id and innings = $inning_id ORDER BY recent_id DESC LIMIT $numbers"; 
		$res = $conn->prepare($sql);
		$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data .= $row['runs'];
		}
		return $data;
	}
	function get_last_10overs_runs($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT runs FROM matchrecent where match_id = $match_id and innings = $inning_id ORDER BY recent_id DESC LIMIT 30"; 
		$res = $conn->prepare($sql);
		$res->execute();
		$data ='';
		while($row = $res->fetch()){

			$data += $row['runs'];
		}
		return $data;
	}
	function get_last_10overs_wides($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT wide FROM matchrecent where match_id = $match_id and innings = $inning_id ORDER BY recent_id DESC LIMIT 30"; 
		$res = $conn->prepare($sql);
		$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['wide'];
		}
		return $data;
	}
	function get_balls($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT ball FROM matchrecent where match_id = $match_id and innings = $inning_id"; 
		$res = $conn->prepare($sql);
		$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['ball'];
		}
		return $data;
	}

	function get_match_wides($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT wide FROM matchrecent where match_id = $match_id and innings = $inning_id"; 
		$res = $conn->prepare($sql);
		$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['wide'];
		}
		return $data;
	}
	function get_match_nbs($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT nbs FROM matchrecent where match_id = $match_id and innings = $inning_id"; 
		$res = $conn->prepare($sql);
		$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['nbs'];
		}
		return $data;
	}
	function get_match_legbs($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT legbs FROM matchrecent where match_id = $match_id and innings = $inning_id"; 
		$res = $conn->prepare($sql);
		$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['legbs'];
		}
		return $data;
	}
	function get_wickets($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT wickets FROM matchrecent where match_id = $match_id and innings = $inning_id"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['wickets'];
		}
		return $data;
	}
	function get_match_wickets($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT * FROM matchrecent where match_id = $match_id and innings = $inning_id and wickets = 1"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()){
			$data[] = $row;
		}
		return $data;
	}

	function get_last_wickets($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT * FROM matchrecent where match_id = $match_id and innings = $inning_id and wickets = 1 ORDER BY recent_id DESC LIMIT 1"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data = '';
		while($row = $res->fetch()){
			if($row['runout']==0){
			$data .= "<tr><td><b>Last Wkt</b>".get_player_name($row['batsman'])." ".get_batsman_runs($match_id,$inning_id,$row['batsman'])."(".get_batsman_balls($match_id,$inning_id,$row['batsman']).")</td></tr>";
			}
			if($row['runout']!=0){
				$data .= "<tr><td><b>Last Wkt</b>".get_player_name($row['runout'])." ".get_batsman_runs($match_id,$inning_id,$row['runout'])."(".get_batsman_balls($match_id,$inning_id,$row['runout']).")</td></tr>";
			}

		}
		return $data;
	}
	function get_bowler_overs($match_id, $inning_id,$bowler){
		$conn = connection();
		$sql = "SELECT ball FROM matchrecent where match_id = $match_id and innings = $inning_id and bowler=$bowler"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['ball'];
		}
		return $data;
	}
	
	function get_batsman_nbs($match_id, $inning_id,$batsman){
		$conn = connection();
		$sql = "SELECT nbs FROM matchrecent where match_id = $match_id and innings = $inning_id and batsman =$batsman"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['nbs'];
		}
		return $data;
	}
	function get_batsman_balls($match_id, $inning_id,$batsman){
		$conn = connection();
		$sql = "SELECT ball FROM matchrecent where match_id = $match_id and innings = $inning_id and batsman = $batsman"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['ball'];
		}
		return $data;
	}
	function get_batsman_runs($match_id, $inning_id,$batsman){
		$conn = connection();
		$sql = "SELECT runs FROM matchrecent where match_id = $match_id and innings = $inning_id and batsman =$batsman"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['runs'];
		}
		return $data;
	}
	function get_batsman_4s($match_id, $inning_id,$batsman){
		$conn = connection();
		$sql = "SELECT 4or6 FROM matchrecent where match_id = $match_id and innings = $inning_id and batsman =$batsman and 4or6 = '1'"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['4or6'];
		}
		return $data;
	}
	function get_batsman_6s($match_id, $inning_id,$batsman){
		$conn = connection();
		$sql = "SELECT 4or6 FROM matchrecent where match_id = $match_id and innings = $inning_id and batsman =$batsman and 4or6 = '2'"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += '1';
		}
		return $data;
	}
	function get_match_players($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT batsman,bowler FROM matchrecent where match_id = $match_id and innings = $inning_id "; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()){
			$data[] = $row;
		}
		return $data;
	}
	function get_batsman_outby($match_id, $inning_id,$batsman){
		$conn = connection();
		$sql = "SELECT outby FROM matchrecent where match_id = $match_id and innings = $inning_id and batsman =$batsman"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['outby'];
		}
		return $data;
	}
	function get_bowler_runs($match_id, $inning_id,$bowler){
		$conn = connection();
		$sql = "SELECT runs FROM matchrecent where match_id = $match_id and innings = $inning_id and bowler=$bowler"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['runs'];
		}
		return $data;
	}
	function get_bowler_wide($match_id, $inning_id,$bowler){
		$conn = connection();
		$sql = "SELECT wide FROM matchrecent where match_id = $match_id and innings = $inning_id and bowler=$bowler"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['wide'];
		}
		return $data;
	}
	function get_bowler_nbs($match_id, $inning_id,$bowler){
		$conn = connection();
		$sql = "SELECT nbs FROM matchrecent where match_id = $match_id and innings = $inning_id and bowler=$bowler"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['nbs'];
		}
		return $data;
	}
	function get_bowler_wickets($match_id, $innings, $bowler){
		$conn = connection();
		$sql = "SELECT wickets FROM matchrecent where match_id = $match_id and bowler=$bowler and innings=$innings"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['wickets'];
		}
		return $data;
	}
	function get_last_10overs_wickets($match_id, $inning_id){
		$conn = connection();
		$sql = "SELECT wickets FROM matchrecent where match_id = $match_id and innings = $inning_id ORDER BY recent_id DESC LIMIT 30"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()){
			$data += $row['wickets'];
		}
		return $data;
	}
	function add_post($title,$content,$categorie,$tag,$meta_title,$meta_keywords,$post_type,$post_status,$meta_description,$posturl,$movie_desc,$movie_name,$download128,$download320,$movie_status,$movie_url){
		$conn = connection();
		$sql = "INSERT INTO audio_posts (post_title,post_content,post_excerpt,postimage,meta_title,meta_keywords,meta_description,post_url,match_id,post_author, post_type, post_status) VALUES ('$title','$content','$excerpt','$imageurl','$meta_title','$meta_keywords','$meta_description','$posturl','$match_id','$post_author','$post_type','$post_status')";
        if($conn->execute($sql)===TRUE){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	function get_match_commentrys($match_id, $number){
		$conn = connection();	
		$sql = "SELECT * FROM commentry where match_id = $match_id ORDER BY Commentry_id DESC LIMIT $number";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_over_commentry_listsss($match_id, $overcommentry){
		$conn = connection();	
		$sql = "SELECT * FROM overcommentry Where ID = $overcommentry LIMIT 1";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		if($innings==2||$innings==4){
		$team = get_live_match_team_two($postid);
		}if($innings==1|| $innings==3){
		$team = get_live_match_team_one($postid);
		}
		while($row = $res->fetch()) {
		$data = "<table class='table table-borderd overcompleted-design'><tr><td><b style='font-size:20px;'>".$row['over']."</b></td><td>Runs Scored: <br/><span class='letterspace'>".$row['overruns']."</span></td><td>Score after ".$row['over']." overs<br/><b>".$row['scoretotal']."</b></td><td>".$row['batsman1total']."</td><td>".get_player_name($row['bowlerid'])."<br/>".$row['bowlerovers']."</td></tr></table>";

	  	}
		return $data;
	}

	function get_ajax_match_commentrys($match_id){
		$conn = connection();	
		$sql = "SELECT * FROM commentry Where match_id = $match_id ORDER BY Commentry_id DESC LIMIT 20";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
		if($row['overs']!=0&&$row['overcommentry']==0){
		$data .= "<li><div class='col-md-1 col-sm-1 col-xs-1'><b>".$row['overs']."</b></div><div class='col-md-10 col-sm-10 col-xs-10'>".$row['commentry_text']."</div></li>";
		}if($row['overs']==0&&$row['overcommentry']==0){
			$data .= "<li><div class='col-md-12 col-sm-12 col-xs-12'>".$row['commentry_text']."</div></li>";
		}
		if($row['overs']==0&&$row['overcommentry']!=0){
			$data .= get_over_commentry_listsss($match_id, $row['overcommentry']);
		}
		

	  	}
		return $data;
	}
	function get_match_all_commentrys($match_id, $innings){
		$conn = connection();	
		$sql = "SELECT * FROM commentry where match_id = $match_id and innings = $innings ORDER BY Commentry_id DESC";

		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_single_playerinfo($postid){
		$conn = connection();	
		$sql = "SELECT * FROM playerinfo where playerid = $postid";

		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_single_playerfullname($postid){
		$conn = connection();	
		$sql = "SELECT fullname FROM playerinfo where playerid = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['fullname'];
	  	}
		return $data;
	}

	function get_single_playerdisplaypic($postid){
		$conn = connection();	
		$sql = "SELECT displaypic FROM playerinfo where playerid = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['displaypic'];
	  	}
		return $data;
	}
	function get_single_playercoverpic($postid){
		$conn = connection();	
		$sql = "SELECT coverpic FROM playerinfo where playerid = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['coverpic'];
	  	}
		return $data;
	}
	
	function get_single_playercountry($postid){
		$conn = connection();	
		$sql = "SELECT country_id FROM players where batsman_id = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['country_id'];
	  	}
		return $data;
	}
	function get_single_playerinfoid($postid){
		$conn = connection();	
		$sql = "SELECT ID FROM playerinfo where playerid = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['ID'];
	  	}
		return $data;
	}
	function get_single_playerurl($postid){
		$conn = connection();	
		$sql = "SELECT url FROM playerinfo where playerid = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['url'];
	  	}
		return $data;
	}
	function get_all_posts($number){
		$conn = connection();	
		$sql = "SELECT * FROM livematchscore ORDER BY ID DESC LIMIT $number";

		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_all_posts_and_matchs(){
		$conn = connection();	
		$sql = "SELECT * FROM livematchscore ORDER BY ID DESC";

		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_batsman_recods($batsmanid){
		$conn = connection();	
		$sql = "SELECT * FROM batsmanrecods where batsmanid = $batsmanid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_bowler_recods($batsmanid){
		$conn = connection();	
		$sql = "SELECT * FROM bowlersrecods where bowlerid = $batsmanid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_match_name_by_id($postid){
		$conn = connection();	
		$sql = "SELECT match_title FROM livematchscore where ID = $postid";

		$res = $conn->prepare($sql);
			$res->execute();
		
		while($row = $res->fetch()) {
			$data = $row['match_title'];
	  	}
		return $data;
	}
	function get_match_date_by_id($postid){
		$conn = connection();	
		$sql = "SELECT matchdate FROM livematchscore where ID = $postid";

		$res = $conn->prepare($sql);
			$res->execute();
		
		while($row = $res->fetch()) {
			$data = $row['matchdate'];
	  	}
		return $data;
	}
	function get_ajax_match_date_loading($postid){
		date_default_timezone_set('Asia/Calcutta'); 
		$datematch = get_match_date_by_id($postid); 
		$datetime1 = new DateTime();
		$datetime2 = new DateTime($datematch);
		$interval = $datetime1->diff($datetime2);
		if(!$interval->format('%a')){
			$data = "<div class='hour_with_mins'>".$interval->format('%h').":".$interval->format('%i')."<span class='match_time_sec'>".$interval->format('%s')."</span></div>";
		}
		return $data;
	}

	
	function get_match_type_by_id($postid){
		$conn = connection();	
		$sql = "SELECT match_type FROM livematchscore where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data ='';
		while($row = $res->fetch()) {
			$data = $row['match_type'];
	  	}
		return $data;
	}
	function get_match_content_by_id($postid){
		$conn = connection();	
		$sql = "SELECT match_content FROM livematchscore where ID = $postid";

		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()) {
			$data = $row['match_content'];
	  	}
		return $data;
	}
	function get_match_man_of_the_series_by_id($postid){
		$conn = connection();	
		$sql = "SELECT man_of_the_series FROM livematchscore where ID = $postid";

		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()) {
			$data = $row['man_of_the_series'];
	  	}
		return $data;
	}
	function get_match_man_of_the_match_by_id($postid){
		$conn = connection();	
		$sql = "SELECT man_of_the_match FROM livematchscore where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data ='';
		while($row = $res->fetch()) {
			$data = $row['man_of_the_match'];
	  	}
		return $data;
	}

	function get_match_url($postid){
		$conn = connection();	
		$site_url = site_url();
		$sql = "SELECT url FROM livematchscore where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		while($row = $res->fetch()) {
			$data = $row['url'];
	  	}
		$url = $site_url.$data."/".$postid;
		return $url;
	}
	function get_match_url_byid($postid){
		$conn = connection();	
		$site_url = site_url();
		$sql = "SELECT url FROM livematchscore where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		while($row = $res->fetch()) {
			$data = $row['url'];
	  	}
		return $data;
	}
	function get_match_toss_status($postid){
		$conn = connection();	
		$sql = "SELECT toss FROM livematchscore where ID = $postid";

		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()) {
			$data = $row['toss'];
	  	}
		return $data;
	}
	function get_single_match_status($postid){
		$conn = connection();	
		$sql = "SELECT match_status FROM livematchscore where ID = $postid";

		$res = $conn->prepare($sql);
			$res->execute();
		$data ='';
		while($row = $res->fetch()) {
			$data = $row['match_status'];
	  	}
		return $data;
	}
	function get_match_series_id($postid){
		$conn = connection();	
		$sql = "SELECT match_series FROM livematchscore where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data ='';
		while($row = $res->fetch()) {
			$data = $row['match_series'];
	  	}
		return $data;
	}
	function get_match_venue($postid){
		$conn = connection();	
		$sql = "SELECT match_venue FROM livematchscore where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		while($row = $res->fetch()) {
			$data = $row['match_venue'];
	  	}
		return $data;
	}
	function get_match_date($postid){
		$conn = connection();	
		$sql = "SELECT matchdate FROM livematchscore where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		while($row = $res->fetch()) {
			$date = date_create($row['matchdate']);
			$data = date_format($date,"M dS, h:i A");
	  	}
		return $data;
	}
	function get_match_result($postid){
		$conn = connection();	
		$sql = "SELECT result FROM livematchscore where ID = $postid";
		$res = $conn->prepare($sql);
			$res->execute();
			$data ='';
		while($row = $res->fetch()) {
			$data = $row['result'];
	  	}
		return $data;
	}

	function get_recent_4matches($number){
		$conn = connection();	
		$sql = "SELECT * FROM livematchscore ORDER BY ordertoshow DESC, ID DESC LIMIT $number";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()){
			$data[] = $row;
		}
		return $data;
	}
	function get_all_series(){
		$conn = connection();	
		$sql = "SELECT * FROM series where seriesstatus=1";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_teamonemembers_list($seriesid){
		$conn = connection();	
		$sql = "SELECT teamonemembers FROM series where ID = $seriesid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['teamonemembers'];
	  	}
		return $data;
	}
	
	function get_teamtwomembers_list($seriesid){
		$conn = connection();	
		$sql = "SELECT teamtwomembers FROM series where ID = $seriesid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['teamtwomembers'];
	  	}
		return $data;
	}
	function get_single_series($postid){
		$conn = connection();	
		$sql = "SELECT * FROM series where ID = $postid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_series_name_by_id($postid){
		$conn = connection();	
		$sql = "SELECT seriesname FROM series where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		while($row = $res->fetch()) {
			$data = $row['seriesname'];
	  	}
		return $data;
	}

	function get_series_url_by_id($postid){
		$conn = connection();	
		$sql = "SELECT url FROM series where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		while($row = $res->fetch()) {
			$data = $row['url'];
	  	}
		return $data;
	}
	function get_all_newsposts($number){
		$conn = connection();	
		$sql = "SELECT * FROM posts ORDER BY ID DESC LIMIT $number";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_number_newsposts($number){
		$conn = connection();	
		$sql = "SELECT * FROM posts ORDER BY ID DESC LIMIT $number";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_number_newsposts_series_posts($number, $series){
		$conn = connection();	
		$sql = "SELECT * FROM posts where series = $series ORDER BY ID DESC LIMIT $number";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	
	function get_all_newssingle($postid){
		$conn = connection();	
		$sql = "SELECT * FROM posts where ID = $postid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	
	function get_all_batsman($match_id, $inning){
		$conn = connection();	
		$sql = "SELECT * FROM matchbatsman where  match_id = $match_id and innings = $inning";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_over_wise_batsman_score($match_id, $inning){
		$conn = connection();	
		$sql = "SELECT * FROM matchbatsman where  match_id = $match_id and innings = $inning and Playstatus =1";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$batsmanruns = 0+get_batsman_runs($match_id,$inning,$row['batsmanid']);
			$batsman_balls = 0+get_batsman_balls($match_id,$inning,$row['batsmanid']);
			$batsman_nbs = 0+get_batsman_nbs($match_id,$inning,$row['batsmanid']);
    		$batsmanballwithnbs = $batsman_nbs + $batsman_balls;
			$data .= get_player_name($row['batsmanid'])." &nbsp;&nbsp;".$batsmanruns."(".$batsmanballwithnbs.")<br/>";
	  	}
		return $data;
	}

	function get_all_batsman_play($match_id, $inning){
		$conn = connection();	
		$sql = "SELECT * FROM matchbatsman where  match_id = $match_id and innings = $inning and Playstatus =1";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$playstatus = $row['star'];
			if($playstatus==1){
				$playid = 0;
				$playname = "Remove Star";
			}
			if($playstatus==0){
				$playid = 1;
				$playname = "Add Star";
			}
			$data .= "<tr><td>".get_player_name($row['batsmanid'])."</td><td class='starchange'><a href='#' id='".$row['ID']."' play-id='".$playid."'>".$playname."</a></td>";
	  	}
		return $data;
	}
	function get_all_batsman_score_update($match_id, $inning){
		$conn = connection();	
		$sql = "SELECT * FROM matchbatsman where  match_id = $match_id and innings = $inning";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$playstatus = $row['Playstatus'];
			if($playstatus==1){
				$playid = 0;
				$playname = "no";
			}
			if($playstatus==0){
				$playid = 1;
				$playname = "Yes";
			}
			$data .= "<tr><td>".get_player_name($row['batsmanid'])."</td><td class='batsmanid'><a href='#' id='".$row['ID']."' play-id='".$playid."'>".$playname."</a></td><td><input type='text' class='form-control' style='width:50px;' value='".$row['Outby']."' id='".$row['ID']."' name='outby'></td><td class='batsman_detelet_live'><a href id='".$row['ID']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>";
	  	}
		return $data;
	}
	function get_playing_batsman($match_id, $inning){
		$conn = connection();	
		$sql = "SELECT * FROM matchbatsman where  match_id = $match_id and innings = $inning and Playstatus =1";
		$res = $conn->prepare($sql);
		$res->execute();
		$data ="";
		while($row = $res->fetch()) {
			$batsmanruns = 0+get_batsman_runs($match_id,$inning,$row['batsmanid']);
			$playerurl = get_single_playerurl($row['batsmanid']);
			$batsman_4s = 0+get_batsman_4s($match_id,$inning,$row['batsmanid']);
			$batsman_6s = 0+get_batsman_6s($match_id,$inning,$row['batsmanid']);
			$batsman_balls = 0+get_batsman_balls($match_id,$inning,$row['batsmanid']);
			$batsman_nbs = get_batsman_nbs($match_id,$inning,$row['batsmanid']);
    		$batsmanballwithnbs = $batsman_nbs + $batsman_balls;
    		if($batsman_balls){
	    		$strickrate = 0+($batsmanruns * 100)/$batsmanballwithnbs;
				$strickratec = substr($strickrate , 0,6);
				}else{
					$strickratec = "0";
				}
			if($row['star']==1){
				$star = " * ";
			}
			if($row['star']==0){
				$star = "";
			}
			$data .= "<tr><td><a href='http://www.livecricketinfo.com/player/".$playerurl."/".$row['batsmanid']."'>".get_player_name($row['batsmanid']).$star."</a></td><td>".$batsmanruns."</td><td>".$batsmanballwithnbs."</td><td>".$batsman_4s."</td><td>".$batsman_6s."</td><td>".$strickratec."</td></tr>";
	  	}
	  	return $data;
	}
	
	function get_single_batsman($batsmanid){
		$conn = connection();	
		$sql = "SELECT * FROM matchbatsman where  ID = $batsmanid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_single_bowler($playbowler){
		$conn = connection();	
		$sql = "SELECT * FROM matchbowlers where  ID = $playbowler";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_all_bowler($match_id, $innings){
		$conn = connection();	
		$sql = "SELECT * FROM matchbowlers where  match_id = $match_id and inning = $innings";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_bowler_id_last_ball($match_id, $innings){
		$conn = connection();	
		$sql = "SELECT bowler FROM matchrecent where  match_id = $match_id and innings = $innings ORDER BY recent_id DESC LIMIT 1";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data .= $row['bowler'];
		}
		return $data;
	}
	function get_all_bowler_play($match_id, $innings){
		$conn = connection();	
		$sql = "SELECT * FROM matchbowlers where  match_id = $match_id and inning = $innings and playstatus=1";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$playstatus = $row['star'];
			if($playstatus==1){
				$playid = 0;
				$playname = "Remove Star";
			}
			if($playstatus==0){
				$playid = 1;
				$playname = "Add Star";
			}
			$data .= "<tr><td class='bowlerid'>".get_player_name($row['bowlerid'])."</td><td class='bowlerstarchange'><a href='#' id='".$row['ID']."' play-id='".$playid."'>".$playname."</a></td>";
	  	}
		return $data;
	}
	function get_all_bowler_score_update($match_id, $innings){
		$conn = connection();	
		$sql = "SELECT * FROM matchbowlers where  match_id = $match_id and inning = $innings";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$playstatus = $row['playstatus'];
			if($playstatus==1){
				$playid = 0;
				$playname = "No";
			}
			if($playstatus==0){
				$playid = 1;
				$playname = "Yes";
			}
			$data .= "<tr><td class='bowlerid'>".get_player_name($row['bowlerid'])."</td><td class='bowlerid'><a href='#' id='".$row['ID']."' play-id='".$playid."'>".$playname."</a></td><td><input type='text' class='form-control' style='width:50px;' value='".$row['Madins']."' id='".$row['ID']."' name='madins'></td><td class='bowler_detelet_live'><a href id='".$row['ID']."'><i class='fa fa-trash' aria-hidden='true'></i></a></td></tr>";
	  	}
		return $data;
	}
	function get_bowler_overs_withballs($postid,$innings,$bowlerid){
		$balls = get_bowler_overs($postid,$innings,$bowlerid); 
		$ball =$balls/6;
		$overs = (int) $ball;
		$r_ball1 = $ball-$overs;
		$favcolor = substr($r_ball1, 0,4);
		switch ($favcolor) {
		    case "0.160":
		        $inning_ball = '1';
		        break;
		    case "0.830":
		        $inning_ball = '5';
		        break;
		    case "0.330":
		        $inning_ball = '2';
		        break;
		    case "0.500":
		        $inning_ball = '3';
		        break;
		    case "0.660":
		        $inning_ball = '4';
		        break;
		    default:
		        $inning_ball = '0';
		}
		return $overs.".".$inning_ball;
	}
	function get_playing_bowler($match_id, $innings){
		$conn = connection();	
		$sql = "SELECT * FROM matchbowlers where  match_id = $match_id and inning = $innings and playstatus=1";
		$res = $conn->prepare($sql);
			$res->execute();
			$data ="";
		while($row = $res->fetch()) {
			$bowlerovers = 0+get_bowler_overs_withballs($match_id,$innings,$row['bowlerid']);
			$bowlerruns = 0+get_bowler_runs($match_id,$innings,$row['bowlerid']);
			$playerurl = get_single_playerurl($row['bowlerid']);
			$bowlerwickets = 0+get_bowler_wickets($match_id,$innings,$row['bowlerid']);
			$bowlernbs = 0+get_bowler_nbs($match_id,$innings,$row['bowlerid']);
			$bowlerwides= 0+get_bowler_wide($match_id,$innings,$row['bowlerid']);
			$totalbowlerruns = $bowlerruns + $bowlernbs + $bowlerwides;
			if($row['star']==1){
				$star = " * ";
			}
			if($row['star']==0){
				$star = "";
			}
			$data .= "<tr><td><a href='http://www.livecricketinfo.com/player/".$playerurl."/".$row['bowlerid']."'>".get_player_name($row['bowlerid']).$star."</a></td><td>".$bowlerovers."</td><td>".$totalbowlerruns."</td><td>".$bowlerwickets."</td><td>".$row['Madins']."</td><td>".$bowlernbs."</td></tr>";
	  	}
		return $data;
	}
	function get_single_post($postid){
		$conn = connection();	
		$sql = "SELECT * FROM livematchscore where ID = $postid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
	    while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}



	function get_players(){
		$conn = connection();	
		$sql = "SELECT * FROM players";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_teams_rating(){
		$conn = connection();	
		$sql = "SELECT * FROM teams_ranking";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_batsman_rating(){
		$conn = connection();	
		$sql = "SELECT * FROM batsman_ratings";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_bowler_rating(){
		$conn = connection();	
		$sql = "SELECT * FROM bowler_rating";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_single_players($playerid){
		$conn = connection();	
		$sql = "SELECT * FROM players where batsman_id = $playerid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_teams(){
		$conn = connection();	
		$sql = "SELECT * FROM teams";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_videos(){
		$conn = connection();	
		$sql = "SELECT * FROM videos";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_number_videos($number){
		$conn = connection();	
		$sql = "SELECT * FROM videos ORDER BY ID DESC LIMIT $number";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_number_videos_by_series($number, $series){
		$conn = connection();	
		$sql = "SELECT * FROM videos where series= $series ORDER BY ID DESC LIMIT $number";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_video_post_title($postid){
		$conn = connection();	
		$sql = "SELECT videotitle FROM videos Where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['videotitle'];
	  	}
		return $data;
	}
	function get_video_post_videocontent($postid){
		$conn = connection();	
		$sql = "SELECT videocontent FROM videos Where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['videocontent'];
	  	}
		return $data;
	}
	function get_video_post_videoimage($postid){
		$conn = connection();	
		$sql = "SELECT videoimage FROM videos Where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['videoimage'];
	  	}
		return $data;
	}
	function get_photo_post_title($postid){
		$conn = connection();	
		$sql = "SELECT photoname FROM photos Where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['photoname'];
	  	}
		return $data;
	}
	function get_news_post_title($postid){
		$conn = connection();	
		$sql = "SELECT post_title FROM posts Where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = $row['post_title'];
	  	}
		return $data;
	}
	function get_photos(){
		$conn = connection();	
		$sql = "SELECT * FROM photos";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_photos_type_of_photos($photosid){
		$conn = connection();	
		$sql = "SELECT * FROM media where photosid = $photosid ORDER BY ID DESC";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_series_photos_with_limit($series, $number){
		$conn = connection();	
		$sql = "SELECT * FROM photos where series = $series ORDER BY ID DESC LIMIT $number";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_gallery_media_files_count($photosid){
		$conn = connection();
		$sql = "SELECT * FROM media where photosid = $photosid"; 
		$res = $conn->prepare($sql);
		$res->execute();
		$data = $res->rowCount();
		return $data;
	}
	function get_number_photos($number){
		$conn = connection();	
		$sql = "SELECT * FROM photos ORDER BY ID DESC LIMIT $number";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_single_photos($postid){
		$conn = connection();	
		$sql = "SELECT * FROM photos where ID = $postid";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_single_videos($postid){
		$conn = connection();	
		$sql = "SELECT * FROM videos where ID = $postid LIMIT 1";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_single_team($team_id){
		$conn = connection();	
		$sql = "SELECT * FROM teams where team_id = $team_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_team_name($team_id){
		$conn = connection();	
		$sql = "SELECT team_name FROM teams where team_id = $team_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['team_name'];
	  	}
		return $data;
	}
	function get_team_mini_name($team_id){
		$conn = connection();	
		$sql = "SELECT mini_name FROM teams where team_id = $team_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['mini_name'];
	  	}
		return $data;
	}
	function get_countrys(){
		$conn = connection();	
		$sql = "SELECT * FROM country";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_recents(){
		$conn = connection();	
		$sql = "SELECT * FROM matchrecent";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_recent_match($match_id){
		$conn = connection();	
		$sql = "SELECT * FROM matchrecent where match_id = $match_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_recent_match_over($match_id){
		$conn = connection();	
		$sql = "SELECT * FROM matchrecent where match_id = $match_id ORDER BY recent_id DESC LIMIT 6";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_recent_match_over_30($match_id){
		$conn = connection();	
		$sql = "SELECT * FROM matchrecent where match_id = $match_id ORDER BY recent_id DESC LIMIT 30";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_recent_match_last_10over($match_id){
		$conn = connection();	
		$sql = "SELECT * FROM matchrecent where match_id = $match_id ORDER BY recent_id DESC LIMIT 60";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_last_overupdate_single($match_id,$innings){
		$conn = connection();	
		$sql = "SELECT * FROM matchrecent where match_id = $match_id and innings = $innings ORDER BY recent_id DESC LIMIT 6";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_recent_match_innings($match_id,$innings){
		$conn = connection();	
		$sql = "SELECT * FROM matchrecent where match_id = $match_id and innings = $innings ORDER BY recent_id DESC";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_recent_ball_score($match_id){
		$count = get_recent_match_count($match_id);
		$count2 = $count-30;
		$conn = connection();	
		$sql = "SELECT * FROM matchrecent where match_id = $match_id ORDER BY recent_id ASC LIMIT $count2, $count";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = '';
		$count=1;
		while($row = $res->fetch()) {
			if($count == 6){
				$data .= "<span class='overdivider'></span> ";
			}
			if($count == 12){
				$data .= "<span class='overdivider'></span> ";
			}
			if($count == 18){
				$data .= "<span class='overdivider'></span> ";
			}
			if($count == 24){
				$data .= "<span class='overdivider'></span> ";
			}
			if($row['wide']==1 ){
				$data .= "wd ";
			}
			if($row['ball']==1 ){
				$data11 += $row['ball'];
				$count = $data11;
			}
			if($row['nbs']==1 ){
				$data .= "nb ";
			}
			if($row['wickets']==1 ){
				$data .= "W ";
			}
			if($row['legbs'] ){
				$data .= $row['legbs']."b ";
			}
			if($row['runs']!=0 ){
				$data .= $row['runs']." ";
			}
			if($row['wide']==0 && $row['nbs']==0&&$row['wickets']==0 && $row['runs']==0 && $row['legbs']==0 ){
				$data .= ". ";
			}
			
			
	  	}
		return $data;
	}
	function get_recent_match_count($match_id){
		$conn = connection();	
		$sql = "SELECT * FROM matchrecent where match_id = $match_id";
		$res = $conn->prepare($sql);
		$res->execute();
		$data =	$res->rowCount();
		return $data;
	}
	function get_single_recent($recent_id){
		$conn = connection();	
		$sql = "SELECT * FROM matchrecent where recent_id = $recent_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;

	}

	function get_single_country($CountryId){
		$conn = connection();	
		$sql = "SELECT * FROM country where CountryId = $CountryId";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_country_name($CountryId){
		$conn = connection();	
		$sql = "SELECT CountryName FROM country where CountryId = $CountryId";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
		 
		    while($row = $res->fetch()) {
				$data = $row['CountryName'];
		  	}

		return $data;
	}
	function get_post_data($postid){
		$conn = connection();	
		$sql = "SELECT * FROM livematchscore where ID = $postid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_series_matches($match_series){
		$conn = connection();	
		$sql = "SELECT * FROM livematchscore where match_series = $match_series ORDER BY ID ASC";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()) {
			$data[] = $row;
	  	}
		return $data;
	}
	function get_cricket_match_url($postid){
		$conn = connection();	
		$sql = "SELECT url FROM livematchscore where ID = $postid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = '';
		while($row = $res->fetch()) {
			$data = "http://www.livecricketinfo.com/".$row['url']."/".$postid;
	  	}
		return $data;
	}
	function get_tema_one_players($match_id){
		$conn = connection();	
		$sql = "SELECT 	team_one_players FROM livematchscore where ID = $match_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['team_one_players'];
	  	}
		return $data;
	}
	function get_session_text($match_id){
		$conn = connection();	
		$sql = "SELECT 	session_text FROM livematchscore where ID = $match_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['session_text'];
	  	}
		return $data;
	}
	function get_live_match_title($match_id){
		$conn = connection();	
		$sql = "SELECT 	match_title FROM livematchscore where ID = $match_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['match_title'];
	  	}
		return $data;
	}
	function get_live_match_innings($match_id){
		$conn = connection();	
		$sql = "SELECT 	match_inning FROM livematchscore where ID = $match_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['match_inning'];
	  	}
		return $data;
	}
	function get_live_match_team_one($match_id){
		$conn = connection();	
		$sql = "SELECT 	team_name_1 FROM livematchscore where ID = $match_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['team_name_1'];
	  	}
		return $data;
	}
	function get_live_match_team_two($match_id){
		$conn = connection();	
		$sql = "SELECT 	team_name_2 FROM livematchscore where ID = $match_id";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['team_name_2'];
	  	}
		return $data;
	}
	function get_batsman_status($batsmanid, $match_id){
		$conn = connection();	
		$sql = "SELECT 	playstatus FROM matchbatsman where batsmanid = $batsmanid and match_id = $match_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['playstatus'];
	  	}
		return $data;
	}
	function get_bowler_status($bowlerid, $match_id){
		$conn = connection();	
		$sql = "SELECT 	playstatus FROM matchbowlers where bowlerid = $bowlerid and match_id = $match_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
		 
		    while($row = $res->fetch()) {
				$data = $row['playstatus'];
		  	}
		
		return $data;
	}
	function get_bowler_madins($bowlerid, $match_id, $innings){
		$conn = connection();	
		$sql = "SELECT 	Madins FROM matchbowlers where bowlerid = $bowlerid and match_id = $match_id and inning = $innings";
		$res = $conn->prepare($sql);
		$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['Madins'];
	  	}
		return $data;
	}
	function get_tema_two_players($match_id){
		$conn = connection();	
		$sql = "SELECT 	team_two_players FROM livematchscore where ID = $match_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['team_two_players'];
	  	}
		return $data;
	}
	function get_player_name($batsman_id){
		$conn = connection();	
		$sql = "SELECT 	batsman_name FROM players where batsman_id = $batsman_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['batsman_name'];
	  	}
		return $data;
	}
	function get_player_country($batsman_id){
		$conn = connection();	
		$sql = "SELECT 	country_id FROM players where batsman_id = $batsman_id";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['country_id'];
	  	}
		return $data;
	}
	function get_player_all_teams($postid){
		$conn = connection();	
		$sql = "SELECT 	allteams FROM players where batsman_id = $postid";
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
	    while($row = $res->fetch()) {
			$data = $row['allteams'];
	  	}
		return $data;
	}
	function get_selected_team_players($team_id){
		$conn = connection();
		
		$sql = "SELECT batsman_name, batsman_id FROM players Where FIND_IN_SET( $team_id, allteams )   ORDER BY team_id ASC"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data = "";
		while($row = $res->fetch()){
			echo "<option value='".$row['batsman_id']."'>".$row['batsman_name']."</option>";
		}
		return $data;
	}
	function get_selected_team_players_id($team_id){
		$conn = connection();
		
		$sql = "SELECT batsman_id FROM players Where FIND_IN_SET( $team_id, allteams )   ORDER BY team_id ASC"; 
		$res = $conn->prepare($sql);
			$res->execute();
		$data = new ArrayObject();
		while($row = $res->fetch()){
			$data[] = $row;
		}
		return $data;
	}
	function get_match_totals($postid, $innings){
		$runs = get_runs($postid,$innings); 
		$legbs = get_match_legbs($postid, $innings);
		$nbs = get_match_nbs($postid,$innings);
		$wide = get_match_wides($postid, $innings);
		$grand_total = $runs + $legbs + $nbs + $wide;
		return $grand_total;
	}
	function get_match_overs($postid, $innings){
		$balls = get_balls($postid, $innings);
		$ball =$balls/6;
		$overs = (int) $ball;
		return $overs;
	}

	function current_over_and_ball($postid, $innings){
		$balls = get_balls($postid, $innings);
		$ball =$balls/6;
		$overs = (int) $ball;
		$r_ball1 = $ball-$overs;

		$favcolor = substr($r_ball1, 0,4);
		switch ($favcolor) {
		    case "0.160":
		        $inning_ball = '1';
		        break;
		    case "0.830":
		        $inning_ball = '5';
		        break;
		    case "0.330":
		        $inning_ball = '2';
		        break;
		    case "0.500":
		        $inning_ball = '3';
		        break;
		    case "0.660":
		        $inning_ball = '4';
		        break;
		    default:
		        $inning_ball = '0';
		}
		if($inning_ball==0){
			$inning_ball = "6";
			$overs = $overs-1;
		}

		return $overs.".".$inning_ball;
	}
	function get_match_remaining_balls($postid, $innings){
		$balls = get_balls($postid, $innings);
		$ball =$balls/6;
		$overs = (int) $ball;
		$r_ball1 = $ball-$overs;
		$favcolor = substr($r_ball1, 0,4);
		switch ($favcolor) {
		    case "0.160":
		        $inning_ball = '1';
		        break;
		    case "0.830":
		        $inning_ball = '5';
		        break;
		    case "0.330":
		        $inning_ball = '2';
		        break;
		    case "0.500":
		        $inning_ball = '3';
		        break;
		    case "0.660":
		        $inning_ball = '4';
		        break;
		    default:
		        $inning_ball = '0';
		}
		return $inning_ball;
	}

	function get_batsman_complete_balls($postid,$innings,$bowlerid){
		$balls = get_bowler_overs($postid,$innings,$b['bowlerid']); 
		$ball =$balls/6;
		$overs = (int) $ball;
		$r_ball1 = $ball-$overs;
		$favcolor = substr($r_ball1, 0,4);
		switch ($favcolor) {
		    case "0.160":
		        $inning_ball = '1';
		        break;
		    case "0.830":
		        $inning_ball = '5';
		        break;
		    case "0.330":
		        $inning_ball = '2';
		        break;
		    case "0.500":
		        $inning_ball = '3';
		        break;
		    case "0.660":
		        $inning_ball = '4';
		        break;
		    default:
		        $inning_ball = '0';
		}
		return $overs.".".$inning_ball;
	}
	function remaining_overs_balls($postid, $innings){
		$match_type = get_match_type_by_id($postid);
		if($match_type==1){
			$totalovers = 540;
		}
		if($match_type==2){
			$totalovers = 300;
		}
		if($match_type==3){
			$totalovers = 120;
		}
		$balls22 = get_balls($postid, $innings);
		$remaining = ($totalovers-$balls22)/6;
		$remainingovers = (int) $remaining;
		$remainingballs = $remaining-$remainingovers;
		$favcolor = substr($remainingballs, 0,4);
		switch ($favcolor) {
		    case "0.160":
		        $inning_ball = '1';
		        break;
		    case "0.830":
		        $inning_ball = '5';
		        break;
		    case "0.330":
		        $inning_ball = '2';
		        break;
		    case "0.500":
		        $inning_ball = '3';
		        break;
		    case "0.660":
		        $inning_ball = '4';
		        break;
		    default:
		        $inning_ball = '0';
		}
		return $remainingovers.".".$inning_ball;
	}

	function get_match_runrate_innings($postid, $innings){
		$total = get_match_totals($postid, $innings);
		$balls22 = get_balls($postid, $innings);
		if($innings!=0){
			if($balls22!=0){
		$runrate = $total/get_balls($postid, $innings)*6;
		$runrate = substr($runrate, 0,4);
		}
		}else{
			$runrate = 0;
			
		}
	return $runrate;
	}
	function last_wicket_runrate_section($match_id, $innings){
		$remainingovers = remaining_overs_balls($match_id, $innings);
		$runs222 = get_last_10overs_runs($match_id, $innings);
		$wide222 = get_last_10overs_wides($match_id, $innings);
		$totalo = $runs222+ $wide222."&nbsp; runs ";
		$wickets = get_last_10overs_wickets($match_id, $innings);
		$wickets2 = $wickets."&nbsp; wkts";
		$toss = get_match_toss_status($match_id);
		$match_runrate = get_match_runrate_innings($match_id, $innings);
		$last_wicket = get_last_wickets($match_id, $innings);
		$data = $last_wicket."<tr><td><b>Remaining Overs:</b>".$remainingovers." </td></tr><tr><td><b>Last 5 overs:</b> ".$totalo." ".$wickets2."</td></tr><tr><td ><b>Toss</b>".$toss."</td></tr><tr><td><b>Run Rate</b> ".$match_runrate."</td></tr>";
		return $data;
	}

	$serieses = get_all_series();
	$teams = get_teams();
	$country = get_countrys();
	$innings = get_live_match_innings($postid);
	$teamone = get_live_match_team_one($postid);
	$teamtwo = get_live_match_team_two($postid);
	if($innings==2||$innings==4){
	$team = get_live_match_team_two($postid);
	}if($innings==1|| $innings==3){
	$team = get_live_match_team_one($postid);
	}
	$match_type = get_match_type_by_id($postid);
	$match_result = get_match_result($postid);
	$man_of_the_match = get_match_man_of_the_match_by_id($postid);
	$man_of_the_series = get_match_man_of_the_series_by_id($postid);
	$seriesid = get_match_series_id($postid);
	$toss = get_match_toss_status($postid);
	$match_status = get_single_match_status($postid);
	$content = get_match_content_by_id($postid);
	$total = get_match_totals($postid, $innings);
	$overs = get_match_overs($postid, $innings);
	$wickets = get_wickets($postid,$innings);
	$inning_ball = get_match_remaining_balls($postid, $innings);
	$post = get_single_post($postid); 
	$playingbatsman = get_playing_batsman($postid,$innings);
	$playingbowler= get_playing_bowler($postid, $innings); 
	$list_of_comments = get_ajax_match_commentrys($postid);
	$recentball_score = get_recent_ball_score($postid);
	$last_wicket_section = last_wicket_runrate_section($postid, $innings);
	$meta_title = get_live_match_title($postid);
	$videos = get_single_videos($postid);
	$photos = get_single_photos($postid);
	$player = get_players();
	//$get_all_matchs = get_all_posts();
	$get_all_videos = get_videos();
	$get_all_photos = get_photos();
	//$get_all_newsposts = get_all_newsposts();
?>