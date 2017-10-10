<?php 
	include('functions.php');
	$action = $_POST['action'];
	if($action=="delete_recent_match_ball"){
		$userid = $_POST['userid'];
		$conn = connection();
		$sql = "DELETE FROM matchrecent WHERE recent_id='$userid'";
		if ($conn->query($sql) == TRUE) {
		    echo "Deleted";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if($action=="delete_match_bowler"){
		$userid = $_POST['userid'];
		$conn = connection();
		$sql = "DELETE FROM matchbowlers WHERE ID='$userid'";
		if ($conn->query($sql) == TRUE) {
		    echo "Deleted";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if($action=="deleteplayer"){
		$playerid = $_POST['playerid'];
		$conn = connection();
		$sql = "DELETE FROM players WHERE batsman_id='$playerid'";
		if ($conn->query($sql) == TRUE) {
		    echo "1";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if($action=="delete_comment_hole"){
		$userid = $_POST['userid'];
		$conn = connection();
		$sql = "DELETE FROM commentry WHERE Commentry_id='$userid'";
		if ($conn->query($sql) == TRUE) {
		    echo "1";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if($action=="delete_match"){
		$delete_match = $_POST['delete_match'];
		$conn = connection();
		$sql = "DELETE FROM livematchscore WHERE ID=$delete_match";
		if ($conn->query($sql) == TRUE) {
		    echo "Deleted";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if($action=="delete_content_post"){
		$delete_co_post = $_POST['delete_co_post'];
		$conn = connection();
		$sql = "DELETE FROM posts WHERE ID=$delete_co_post";
		if ($conn->query($sql) == TRUE) {
		    echo "Deleted";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if($action=="delete_video"){
		$delete_video = $_POST['delete_video'];
		$conn = connection();
		$sql = "DELETE FROM videos WHERE ID=$delete_video";
		if ($conn->query($sql) == TRUE) {
		    echo "Deleted";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	if($action=="delete_match_batsman"){
		$userid = $_POST['userid'];
		$conn = connection();
		$sql = "DELETE FROM matchbatsman WHERE ID='$userid'";
		if ($conn->query($sql) == TRUE) {
		    echo "Deleted";
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}

	if($action=="livescore"){
		$wickets = $_POST['wickets'];
		$legbs = $_POST['legbs'];
		$nbs = $_POST['nbs'];
		$commentsrikanth = $_POST['comment'];
		$runs = $_POST['runs'];
		$match_id = $_POST['match_id'];
		
		$balls = $_POST['balls'];
		$batsman = $_POST['batsman'];
		$bowler = $_POST['bowler'];
		$r4or6 = $_POST['r4or6'];
		$outby = $_POST['outby'];
		$runout = $_POST['runout'];
		$wide = $_POST['wide'];
		$innings = $_POST['innings'];
		$commentry_text1 = get_player_name($bowler)." to ".get_player_name($batsman);
		if($wide==1 ){
			$comment_text = '<b class="heightlet"> Wide </b> ball';
		}
		if($nbs==1 ){
			$comment_text = '<b class="heightlet"> Nob </b> ball';
		}
		if($wickets==1 ){
			$comment_text = '<b class="heightlet"> OUT </b>';
		}
		if($legbs!=0 ){
			$comment_text = $legbs." &nbsp; legbs";
		}
		if($r4or6==1){
			$comment_text = '<b class="heightlet"> FOUR </b> runs';
		}
		if($r4or6==2){
			$comment_text = '<b class="heightlet"> SIX </b> runs';
		}
		if($wide==0 && $nbs==0&& $wickets==0 && $r4or6 ==0 && $legbs==0 && $runs!=0){
			$comment_text = " ".$runs." runs";
		}
		if($wide==0 && $nbs==0&& $wickets==0 && $r4or6 ==0 && $legbs==0 && $runs==0 ){
			$comment_text = " no run";
		}
		if($wickets ==1){
			$commentry_heightlight = "1";
		}else{
			$commentry_heightlight = "0";
		}
		
		$commentry_text = $commentry_text1.",".$comment_text;
		$conn = connection();

		$sql = "INSERT INTO matchrecent (match_id, ball, runs, wide, nbs, legbs, wickets, innings, batsman, bowler, 4or6, outby, runout) VALUES ('$match_id','$balls','$runs','$wide','$nbs','$legbs','$wickets','$innings','$batsman','$bowler','$r4or6','$outby','$runout')";
        if($conn->exec($sql)){
        	if($commentsrikanth!=0){
	        	$last_id = $conn->lastInsertId();
	        	$comment_overandball = current_over_and_ball($match_id, $innings);
	        	$last_recent = "SELECT * FROM matchrecent where recent_id = $last_id";
	        	$comment = "INSERT INTO commentry (commentry_text, match_id, overs, wicket, heightlight, recentballid, overcommentry, innings) VALUES ('$commentry_text','$match_id','$comment_overandball','$wickets','$commentry_heightlight', '$last_id', '0','$innings')";
		        $conn->exec($comment);
	    	}
	        
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addnewcommentryspecial"){
		$match_id = $_POST['match_id'];
		$inning = $_POST['inning'];
		$commentry_text = $_POST['commentry_text'];
		$conn = connection();
		$sql = "INSERT INTO commentry (commentry_text, match_id, overs, wicket, heightlight, recentballid,overcommentry,innings) VALUES ('$commentry_text','$match_id','0','0','0', '0','0','$inning')";
	   if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="overcompletedbals"){
		$overcompletedbals = $_POST['overcompletedbals'];
		$match_id = $_POST['match_id'];
		$inning = $_POST['inning'];
		$overs = get_match_overs($match_id, $inning);
		$total = get_match_totals($match_id, $inning);
		$wickets = get_wickets($match_id, $inning);
		if($inning==2||$inning==4){
		$team = get_live_match_team_two($match_id);
		}if($inning==1|| $inning==3){
		$team = get_live_match_team_one($match_id);

		}	
		$teamname = get_team_mini_name($team);
		$tot = $teamname." &nbsp;".$total."-".$wickets;
		$bowler_id = get_bowler_id_last_ball($match_id, $inning);
		$bowlerover = get_bowler_overs($match_id,$inning,$bowler_id);
		$ball =$bowlerover/6;
		$bowlerovers = (int) $ball;
		$bowler_runs = 0+get_bowler_runs($match_id,$inning,$bowler_id);
		$bowler_nbs = 0+get_bowler_nbs($match_id,$inning,$bowler_id);
		$bowler_wides = 0+get_bowler_wide($match_id,$inning,$bowler_id);
		$bowlercompleted = $bowler_runs+$bowler_nbs+$bowler_wides;
		$bowler_wickets = 0+get_bowler_wickets($match_id,$inning,$bowler_id);
		$bowler_madins = 0+get_bowler_madins($bowler_id, $match_id, $inning);
		$bowlerovers22 = $bowlerovers."-".$bowler_madins."-".$bowlercompleted."-".$bowler_wickets;
		$batsmansscoresover = get_over_wise_batsman_score($match_id, $inning);
		$overscore = get_runs_list_in_text($match_id, $inning, $overcompletedbals);
		$conn = connection();
		$sql = "INSERT INTO overcommentry (over, batsman1total, bowlerid, bowlerovers, scoretotal, overruns, singleruns, match_id, inning) VALUES ('$overs','$batsmansscoresover','$bowler_id','$bowlerovers22','$tot', '$overscore', '$overscore', '$match_id','$inning')";

	   if($conn->exec($sql)){
        	echo $last_id = $conn->lastInsertId();
        	$comment = "INSERT INTO commentry (commentry_text, match_id, overs, wicket, heightlight, recentballid, overcommentry, innings) VALUES ('','$match_id','0','0','0', '0','$last_id', '$inning')";
        	$conn->exec($comment);
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="editscore"){
		$wickets = $_POST['wickets'];
		$legbs = $_POST['legbs'];
		$nbs = $_POST['nbs'];
		$runs = $_POST['runs'];
		
		$recent_id = $_POST['recent_id'];
		$balls = $_POST['balls'];
		$batsman = $_POST['batsman'];
		$bowler = $_POST['bowler'];
		$r4or6 = $_POST['r4or6'];
		$outby = $_POST['outby'];
		$wide = $_POST['wide'];
		$innings = $_POST['innings'];
		$conn = connection();

		$sql = "UPDATE matchrecent SET ball='$balls', runs= '$runs', wide= '$wide', nbs= '$nbs', legbs= '$legbs', wickets= '$wickets', batsman ='$batsman', bowler='$bowler', 4or6='$r4or6', outby='$outby' Where recent_id = $recent_id";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addplayerinfo"){
		$full_name = $_POST['full_name'];
		$date_of_birthday = $_POST['date_of_birthday'];
		$born_place = $_POST['born_place'];
		$nickname = $_POST['nickname'];
		$height = $_POST['height'];
		$role = $_POST['role'];
		$battingstyle = $_POST['battingstyle'];
		$bowlingstyle = $_POST['bowlingstyle'];
		$Teams = $_POST['Teams'];
		$lastmatch = $_POST['lastmatch'];
		$aboutus = $_POST['aboutus'];
		$playerid = $_POST['playerid'];
		$country = $_POST['playerid'];
		$url = str_replace(" ", "-", $_POST['full_name']);
		$url = strtolower($url);
		$url = preg_replace('/[^A-Za-z0-9\-]/', '', $url);
		$displaypic = "";
		$coverpic = "";
		$conn = connection();
		$sql = "INSERT INTO playerinfo (fullname, birthday, bornplace, nickname, height, role, battingstyle, bowlingstyle, teams, lastmatch, aboutus, playerid, country, url, displaypic, coverpic) VALUES ('$full_name','$date_of_birthday','$born_place','$nickname','$height','$role','$battingstyle','$bowlingstyle','$Teams','$lastmatch','$aboutus','$playerid','$country','$url','$displaypic','$coverpic')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="editplayerinfo"){
		$full_name = $_POST['full_name'];
		$date_of_birthday = $_POST['date_of_birthday'];
		$born_place = $_POST['born_place'];
		$nickname = $_POST['nickname'];
		$height = $_POST['height'];
		$role = $_POST['role'];
		$battingstyle = $_POST['battingstyle'];
		$bowlingstyle = $_POST['bowlingstyle'];
		$Teams = $_POST['Teams'];
		$lastmatch = $_POST['lastmatch'];
		$aboutus = $_POST['aboutus'];
		$playerid = $_POST['playerid'];
		$country = $_POST['playerid'];
		$playerinfoid = $_POST['playerinfoid'];
		$url = str_replace(" ", "-", $_POST['full_name']);
		$url = strtolower($url);
		$url = preg_replace('/[^A-Za-z0-9\-]/', '', $url);
		$displaypic = "";
		$coverpic = "";
		$conn = connection();
		$sql = "UPDATE playerinfo SET fullname='$full_name', birthday='$date_of_birthday', bornplace='$born_place', nickname='$nickname', height='$height', role='$role', battingstyle='$battingstyle', bowlingstyle='$bowlingstyle', teams='$Teams', lastmatch='$lastmatch', aboutus='$aboutus', playerid='$playerid', country='$country', url='$url', displaypic='$displaypic', coverpic='$coverpic' where ID = $playerinfoid";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addbatsmantotals"){
		$matches = $_POST['matches'];
		$playedinning = $_POST['playedinning'];
		$notout = $_POST['notout'];
		$totalruns = $_POST['totalruns'];
		$topscore = $_POST['topscore'];
		$hunders = $_POST['hunders'];
		$twohunders = $_POST['twohunders'];
		$fiftys = $_POST['fiftys'];
		$fours = $_POST['fours'];
		$sixes = $_POST['sixes'];
		$match_type = $_POST['match_type'];
		$batsmanid = $_POST['batsmanid'];
		$conn = connection();
		$sql = "INSERT INTO batsmanrecods (batsmanid, matches, playedinnings, notouts, totalruns, topscore, hundersnumbers, twohunderds, fiftys, fours, sixes, matchtype) VALUES ('$batsmanid','$matches','$playedinning','$notout','$totalruns','$topscore','$hunders','$twohunders','$fiftys','$fours','$sixes','$match_type')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addbowlertotals"){
		$matches = $_POST['matches'];
		$playedinning = $_POST['playedinning'];
		$balls = $_POST['balls'];
		$totalruns = $_POST['totalruns'];
		$wickets = $_POST['wickets'];
		$bestininnings = $_POST['bestininnings'];
		$bestinmatch = $_POST['bestinmatch'];
		$fivewickets = $_POST['fivewickets'];
		$tenwickets = $_POST['tenwickets'];
		$match_type = $_POST['match_type'];
		$bowlerid = $_POST['bowlerid'];
		$conn = connection();
		$sql = "INSERT INTO bowlersrecods (bowlerid, matches, innings, balls, runs, wickets, bestinings, bestinmatch, fivewickets, tenwickets, matchtype) VALUES ('$bowlerid','$matches','$playedinning','$balls','$totalruns','$wickets','$bestininnings','$bestinmatch','$fivewickets','$tenwickets','$match_type')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addbatsman"){
		$batsman = $_POST['batsman'];
		$select_team = $_POST['select_team'];
		$select_country = $_POST['select_country'];
		$select_state = 1;
		$haveing_teams = $_POST['haveing_teams'];
		foreach ($haveing_teams as $key => $value) {
				$haveing_team .= $value.",";
		}
		$date_of_birthday = $_POST['date_of_birthday'];
		$born_place = $_POST['born_place'];
		$nickname = $_POST['nickname'];
		$height = $_POST['height'];
		$role = $_POST['role'];
		$battingstyle = $_POST['battingstyle'];
		$bowlingstyle = $_POST['bowlingstyle'];
		$aboutus = $_POST['aboutus'];
		$url = str_replace(" ", "-", $_POST['batsman']);
		$url = strtolower($url);
		$url = preg_replace('/[^A-Za-z0-9\-]/', '', $url);
		$displaypic = "";
		$coverpic = "";
		$conn = connection();
		$sql = "INSERT INTO players (batsman_name, team_id, country_id, stateid, about, allteams) VALUES ('$batsman','$select_team','$select_country','$select_state','c','$haveing_team')";
        if($conn->exec($sql)){
        	$last_id = $conn->lastInsertId();
			$sql2 = "INSERT INTO playerinfo (fullname, birthday, bornplace, nickname, height, role, battingstyle, bowlingstyle, teams, lastmatch, aboutus, playerid, country, url, displaypic, coverpic) VALUES ('$batsman','$date_of_birthday','$born_place','$nickname','$height','$role','$battingstyle','$bowlingstyle','$haveing_team','0','$aboutus','$last_id','$select_country','$url','$displaypic','$coverpic')";
	        if($conn->query($sql2)){
	        	echo "1";
	        }else{
	        	echo "Please Enter Correct Value";
	        }
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="updatebatsman"){
		$batsman_id = $_POST['batsman_id'];
		$batsman = $_POST['batsman'];
		$select_team = $_POST['select_team'];
		$select_country = $_POST['select_country'];
		$select_state = $_POST['select_state'];
		$haveing_teams = $_POST['haveing_teams'];
		foreach ($haveing_teams as $key => $value) {
				$haveing_team .= $value.",";
		}
		$about_batsman = $_POST['about_batsman'];
		$conn = connection();
		$sql = "UPDATE players SET batsman_name='$batsman', team_id='$select_team', country_id='$select_country', stateid='$select_state', about='$about_batsman', allteams = '$haveing_team' Where batsman_id = $batsman_id";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addteam"){
		$team_name = $_POST['team_name'];
		$mini_name = $_POST['mini_name'];
		$select_team_country = $_POST['select_team_country'];
		$about_team = $_POST['about_team'];
		$conn = connection();
		$sql = "INSERT INTO teams (team_name, aboutus, CountryId, mini_name) VALUES ('$team_name','$about_team','$select_team_country', '$mini_name')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="editteam"){
		$team_id = $_POST['team_id'];
		$team_name = $_POST['team_name'];
		$mini_name = $_POST['mini_name'];
		$select_team_country = $_POST['select_team_country'];
		$about_team = $_POST['about_team'];
		$conn = connection();
		$sql = "UPDATE teams SET team_name = '$team_name', aboutus = '$about_team', CountryId='$select_team_country', mini_name = '$mini_name' where team_id = $team_id";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addnewcommentry"){
		$userid = $_POST['userid'];
		$commentry_text = $_POST['commentry_text'];
		$conn = connection();
		$sql = "UPDATE commentry SET commentry_text = '$commentry_text' where Commentry_id = $userid";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addcountry"){
		$country_name = $_POST['country_name'];
		$country_rank = $_POST['country_rank'];
		$about_country = $_POST['about_country'];
		$conn = connection();
		$sql = "INSERT INTO country (CountryName, Countryrank, aboutus, team_11) VALUES ('$country_name','$country_rank','$about_country','')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}

	if($action=="editcountry"){
		$CountryId = $_POST['CountryId'];
		$country_name = $_POST['country_name'];
		$country_rank = $_POST['country_rank'];
		$about_country = $_POST['about_country'];
		$conn = connection();
		$sql = "UPDATE country SET CountryName ='$country_name', Countryrank='$country_rank', aboutus='$about_country' Where CountryId=$CountryId";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addnewbatsman"){
		$firstbatsman = $_POST['firstbatsman'];
		$match_id = $_POST['match_id'];
		$inning = $_POST['inning'];
		$firstbatsmanstatus = $_POST['firstbatsmanstatus'];
		$conn = connection();
		$sql = "INSERT INTO matchbatsman (batsmanid, team_id, 4s, 6s, innings, runs, balls, match_id, Outby, Playstatus, star) VALUES ('$firstbatsman','0','0','0','$inning','0','0','$match_id','','$firstbatsmanstatus', '0')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="editbatsmanfullscore"){
		$userid = $_POST['userid'];
		$playstatus = $_POST['playstatus'];
		$conn = connection();
		$sql = "UPDATE matchbatsman SET Playstatus='$playstatus' Where ID = $userid";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="editbatsmanstarchange"){
		$userid = $_POST['userid'];
		$playstatus = $_POST['playstatus'];
		$conn = connection();
		$sql = "UPDATE matchbatsman SET star='$playstatus' Where ID = $userid";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	
	if($action=="editbatsmanoutby"){
		$userid = $_POST['userid'];
		$outby = $_POST['outby'];
		$conn = connection();
		$sql = "UPDATE matchbatsman SET Outby='$outby' Where ID = $userid";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="editbowlerfullscore"){
		$playbowlerid = $_POST['playbowlerid'];
		$playstatus = $_POST['playstatus'];
		$conn = connection();
		$sql = "UPDATE matchbowlers SET playstatus='$playstatus' Where ID = $playbowlerid";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="editbowlermadins"){
		$Madins = $_POST['Madins'];
		$playbowlerid = $_POST['playbowlerid'];
		$conn = connection();
		$sql = "UPDATE matchbowlers SET Madins='$Madins' Where ID = $playbowlerid";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="editbowlerstarchange"){
		$userid = $_POST['userid'];
		$playstatus = $_POST['playstatus'];
		$conn = connection();
		$sql = "UPDATE matchbowlers SET star='$playstatus' Where ID = $userid";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addnewbowler"){
		$firstbatsman = $_POST['firstbatsman'];
		$match_id = $_POST['match_id'];
		$inning = $_POST['inning'];
		$firstbatsmanstatus = $_POST['firstbatsmanstatus'];
		$conn = connection();
		$sql = "INSERT INTO matchbowlers (bowlerid, playstatus, Madins, match_id, inning, star) VALUES ('$firstbatsman','$firstbatsmanstatus','0','$match_id','$inning', '0')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="inning2batsman"){
		$secondbatsman = $_POST['secondbatsman'];
		$match_id = $_POST['match_id'];
		$inning = $_POST['inning'];
		$secondbatsmanstatus = $_POST['secondbatsmanstatus'];
		$conn = connection();
		$sql = "INSERT INTO matchbatsman (batsmanid, team_id, 4s, 6s,innings, runs, balls, match_id, Outby, Playstatus,star) VALUES ('$secondbatsman','0','0','0','$inning','0','0','$match_id','','$secondbatsmanstatus','0')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="inning2bowler"){
		$secondbatsman = $_POST['secondbatsman'];
		$match_id = $_POST['match_id'];
		$inning = $_POST['inning'];
		$secondbatsmanstatus = $_POST['secondbatsmanstatus'];
		$conn = connection();
		$sql = "INSERT INTO matchbowlers (bowlerid, playstatus, Madins, match_id, inning,star) VALUES ('$secondbatsman','$secondbatsmanstatus','0','$match_id','$inning','0')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addseries"){
		$series_title = $_POST['series_title'];
		$posturl = str_replace(" ", "-", $_POST['series_title']);
		$posturl = strtolower($posturl);
		$posturl = preg_replace('/[^A-Za-z0-9\-]/', '', $posturl);
		$series_content = $_POST['series_content'];
		$notests = $_POST['notests'];
		$noodis = $_POST['noodis'];
		$notwenty = $_POST['notwenty'];
		$seriesstatus = $_POST['seriesstatus'];
		$startdate = $_POST['startdate'];
		$enddate = $_POST['enddate'];
		$team_name = $_POST['team_name'];
		$team_name_2 = $_POST['team_name_2'];
		$team_one_player = $_POST['team_one_players'];
		foreach ($team_one_player as $key => $value) {
				$team_one .= $value.",";
		}
		$team_one_players = $team_one;
		$team_two_player = $_POST['team_two_players'];
		foreach ($team_two_player as $key => $value) {
			$team_two .= $value.",";
		}
		$team_two_players = $team_two;
		$conn = connection();
		$sql = "INSERT INTO series (seriesname, ODIs, Tests, twentytwenty, seriescontent, url, team_one_name, team_two_name, seriesstatus, teamonemembers, teamtwomembers, startseries, endseries) VALUES ('$series_title','$noodis','$notests','$notwenty','$series_content', '$posturl','$team_name','$team_name_2','$seriesstatus', '$team_one','$team_two','$startdate','$enddate')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="editseries"){
		$series_title = $_POST['series_title'];
		$posturl = $_POST['url'];
		$seriesstatus = $_POST['seriesstatus'];
		$series_content = $_POST['series_content'];
		$notests = $_POST['notests'];
		$noodis = $_POST['noodis'];
		$notwenty = $_POST['notwenty'];
		$startdate = $_POST['startdate'];
		$enddate = $_POST['enddate'];
		$seriesid = $_POST['seriesid'];
		$team_two_players = $_POST['team_two_players'];
		$team_one_players = $_POST['team_one_players'];
		$team_name = $_POST['team_name'];
		$team_name_2 = $_POST['team_name_2'];
		$conn = connection();
		$sql = "UPDATE series SET seriesname = '$series_title', ODIs = '$noodis', Tests = '$notests', twentytwenty = '$notwenty', seriescontent = '$series_content', url = '$posturl',team_one_name='$team_name', team_two_name='$team_name_2', seriesstatus='$seriesstatus', teamonemembers = '$team_one_players', teamtwomembers = '$team_two_players', startseries = '$startdate', endseries = '$enddate'  where ID = $seriesid";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addmatch"){
		$match_title = $_POST['match_title'];
		$posturl = str_replace(" ", "-", $_POST['match_title']);
		$posturl = strtolower($posturl);
		$posturl = preg_replace('/[^A-Za-z0-9\-]/', '', $posturl);
		$match_content = $_POST['match_content'];
		$important = $_POST['important'];
		$session_text = $_POST['session_text'];
		$ordertoshow = $_POST['ordertoshow'];
		$match_series = $_POST['match_series'];
		$match_will_date = $_POST['match_will_date'];
		$match_venue = $_POST['match_venue'];
		$team_name = $_POST['team_name'];
		$team_name_2 = $_POST['team_name_2'];
		$toss = $_POST['toss'];
		$match_status = $_POST['match_status'];
		$match_type = $_POST['match_type'];
		$Result = $_POST['Result'];
		$man_of_the_match = $_POST['man_of_the_match'];
		$match_inning = $_POST['match_inning'];
		$team_one_player = $_POST['team_one_players'];
		foreach ($team_one_player as $key => $value) {
				$team_one .= $value.",";
		}
		$team_one_players = $team_one;
		$team_two_player = $_POST['team_two_players'];
		foreach ($team_two_player as $key => $value) {
			$team_two .= $value.",";
		}
		$team_two_players = $team_two;
		$man_of_the_series = $_POST['man_of_the_series'];
		$conn = connection();
		$sql = "INSERT INTO livematchscore (match_title, match_content, match_series, match_venue, team_name_1, team_name_2, toss, matchdate, match_status, result, man_of_the_match, man_of_the_series,team_one_players, team_two_players, match_inning, url,match_type,important,ordertoshow, session_text) VALUES ('$match_title','$match_content','$match_series','$match_venue','$team_name','$team_name_2','$toss','$match_will_date','$match_status','$Result','$man_of_the_match','$man_of_the_series','$team_one_players','$team_two_players','$match_inning','$posturl','$match_type','$important','$ordertoshow','$session_text')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addbatsmanrating"){
		 $batsman = $_POST['batsman'];
		
		$odirank = $_POST['odirank'];
		$testrank = $_POST['testrank'];
		$twentyrank = $_POST['twentyrank'];
		$odipoints = $_POST['odipoints'];
		$testpoints = $_POST['testpoints'];
		$twentypoints = $_POST['twentypoints'];
		$odirating = $_POST['odirating'];
		$testrating = $_POST['testrating'];
		$twentyrating = $_POST['twentyrating'];
		
		$conn = connection();
		$sql = "INSERT INTO batsman_ratings (batsman, odirank, testrank, twentyrank, odipoints, testpoints, twentypoints, odirating, testrating, twentyrating) VALUES ('$batsman', '$odirank', '$testrank', '$twentyrank', '$odipoints', '$testpoints', '$twentypoints', '$odirating', '$testrating', '$twentyrating')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addbowlerrating"){
		$batsman = $_POST['batsman'];
		$odirank = $_POST['odirank'];
		$testrank = $_POST['testrank'];
		$twentyrank = $_POST['twentyrank'];
		$odipoints = $_POST['odipoints'];
		$testpoints = $_POST['testpoints'];
		$twentypoints = $_POST['twentypoints'];
		$odirating = $_POST['odirating'];
		$testrating = $_POST['testrating'];
		$twentyrating = $_POST['twentyrating'];
		$conn = connection();
		$sql = "INSERT INTO bowler_rating (bowler, odirank, testrank, twentyrank, odipoints, testpoints, twentypoints, odirating, testrating, twentyrating) VALUES ('$batsman', '$odirank', '$testrank', '$twentyrank', '$odipoints', '$testpoints', '$twentypoints', '$odirating', '$testrating', '$twentyrating')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="addteamrating"){
		$team = $_POST['team'];
		$odirank = $_POST['odirank'];
		$testrank = $_POST['testrank'];
		$twentyrank = $_POST['twentyrank'];
		$odipoints = $_POST['odipoints'];
		$testpoints = $_POST['testpoints'];
		$twentypoints = $_POST['twentypoints'];
		$odirating = $_POST['odirating'];
		$testrating = $_POST['testrating'];
		$twentyrating = $_POST['twentyrating'];
		$conn = connection();
		$sql = "INSERT INTO teams_ranking (team, ODIrank, Testrank, Twentyrank, odipoints, testpoints, twentypoints, odirating, testrating, twentyrating) VALUES ('$team', '$odirank', '$testrank', '$twentyrank', '$odipoints', '$testpoints', '$twentypoints', '$odirating', '$testrating', '$twentyrating')";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="updatematch"){
		$match_title = $_POST['match_title'];
		$postid = $_POST['postid'];
		$url = $_POST['url'];
		$match_content = $_POST['match_content'];
		$match_series = $_POST['match_series'];
		$match_venue = $_POST['match_venue'];
		
		$toss = $_POST['toss'];
		$session_text = $_POST['session_text'];
		$important = $_POST['important'];
		$ordertoshow = $_POST['ordertoshow'];
		$team_name_1 = $_POST['team_name_1'];
		$team_name_2 = $_POST['team_name_2'];
		$team_one_player = $_POST['team_one_players'];
		foreach ($team_one_player as $key => $value) {
				$team_one .= $value.",";
		}
		$team_one_players = $team_one;
		$team_two_player = $_POST['team_two_players'];
		foreach ($team_two_player as $key => $value) {
			$team_two .= $value.",";
		}
		$team_two_players = $team_two;
		$match_status = $_POST['match_status'];
		$match_type = $_POST['match_type'];
		$Result = $_POST['Result'];
		$man_of_the_match = $_POST['man_of_the_match'];
		$match_inning = $_POST['match_inning'];
		$man_of_the_series = $_POST['man_of_the_series'];
		$conn = connection();
		$sql = "UPDATE livematchscore SET match_title ='$match_title', match_content ='$match_content', match_series ='$match_series', match_venue ='$match_venue', team_name_1='$team_name_1', team_name_2 ='$team_name_2', toss='$toss', match_status='$match_status', result='$Result', man_of_the_match='$man_of_the_match', man_of_the_series='$man_of_the_series', team_one_players='$team_one_players',team_two_players='$team_two_players', match_inning='$match_inning', url ='$url', match_type ='$match_type',important='$important',ordertoshow='$ordertoshow', session_text='$session_text' WHERE ID = '$postid'";
        if($conn->query($sql)){
        	echo "1";
        }else{
        	echo "Please Enter Correct Value";
        }
	}
	if($action=="team_name_1"){
		$team_name_1 = $_POST['team_name_1'];
		get_selected_team_players($team_name_1);
	}
	if($action=="team_name_2"){
		$team_name_2 = $_POST['team_name_2'];
		get_selected_team_players($team_name_2);
	}
	if($action=="scorecard"){
		$match_id = $_POST['match_id'];
		$innings = $_POST['innings'];
		$total = get_match_totals($match_id, $innings);
		$overs = get_match_overs($match_id, $innings);
		$rballs = get_match_remaining_balls($match_id, $innings);
		$wickets = get_wickets($match_id, $innings);
		echo $score = $total."/".$wickets."&nbsp;(".$overs.".".$rballs."overs)";
	}
	if($action=="current_playing_bowler"){
		$match_id = $_POST['match_id'];
		$innings = $_POST['innings'];
		echo get_playing_bowler($match_id, $innings);
	}
	if($action=="current_playing_batsman"){
		$match_id = $_POST['match_id'];
		$innings = $_POST['innings'];
		echo get_playing_batsman($match_id, $innings);
	}

	if($action=="current_lastwicket_section"){
		$match_id = $_POST['match_id'];
		$innings = $_POST['innings'];
		echo last_wicket_runrate_section($match_id, $innings);
	}

	if($action=="ajax_commentry_update"){
		$match_id = $_POST['match_id'];
		echo get_ajax_match_commentrys($match_id);
	}
	if($action=="ajax_recent_balls"){
		$match_id = $_POST['match_id'];
		echo get_recent_ball_score($match_id);
	}
	if($action=="ajax_bowlerstarload"){
		$match_id = $_POST['match_id'];
		$innings = $_POST['inning'];
		echo get_all_bowler_play($match_id, $innings);
	}
	if($action=="ajax_batsmanstarload"){
		$match_id = $_POST['match_id'];
		$innings = $_POST['inning'];
		echo get_all_batsman_play($match_id, $innings);
	}
	if($action=="ajax_match_date_remaing"){
		$match_id = $_POST['match_id'];
		echo get_ajax_match_date_loading($match_id);
	}
?>