<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    </head>
    <body>
        <?php
        $time = explode(" ",microtime());
        $time = $time[1];

        // include class
        include 'sitemap-generate.php';
        include '../functions.php';
        // create object
        $sitemap = new SitemapGenerator("http://www.livecricketinfo.com/", "../");

        // will create also compressed (gzipped) sitemap
        $sitemap->createGZipFile = true;

        // determine how many urls should be put into one file
        $sitemap->maxURLsPerSitemap = 10000;

        // sitemap file name
        $sitemap->sitemapFileName = "sitemap.xml";

        // sitemap index file name
        $sitemap->sitemapIndexFileName = "sitemap-index.xml";

        // robots file name
        $sitemap->robotsFileName = "robots.txt";
        $sitemap->addUrl("http://www.livecricketinfo.com/",  date('c'),  'always',    '1');
        $get_all_matchs = get_all_posts_and_matchs();
        $get_all_players = get_players();
        $get_all_videos = get_videos();
        $get_all_photos = get_photos();
        foreach($get_all_videos as $p){
            $url = "http://www.livecricketinfo.com/cricket-videos/".$p['url']."/".$p['ID']."";
            $postdate1 = $p['postdate'];
            $date1 = date_create($postdate1);
			$postdate = date_format($date1,"Y-m-d");

            $sitemap->addUrl($url, $postdate, 'daily',    '0.8');
        }
        foreach($get_all_photos as $p){
            $url = "http://www.livecricketinfo.com/cricket-photos/".$p['url']."/".$p['ID']."";
            $postdate1 = $p['postdate'];
            $date1 = date_create($postdate1);
			$postdate = date_format($date1,"Y-m-d");
             $sitemap->addUrl($url, $postdate, 'daily',    '0.8');
        }
        foreach($get_all_matchs as $p){
            $url = "http://www.livecricketinfo.com/".$p['url']."/".$p['ID']."";
            $postdate1 = $p['postdate'];
            $date1 = date_create($postdate1);
			$postdate = date_format($date1,"Y-m-d");
            $sitemap->addUrl($url, $postdate, 'daily',    '0.8');

        }
        foreach($get_all_players as $p){
            $playerurl = get_single_playerurl($p['batsman_id']);
            $url = "http://www.livecricketinfo.com/player/".$playerurl."/".$p['batsman_id']."";
            
            $postdate1 = $p['playerdate'];
            $date1 = date_create($postdate1);
			$postdate = date_format($date1,"Y-m-d");
             $sitemap->addUrl($url, $postdate, 'daily',    '0.8');
        }

        try {
            // create sitemap
            $sitemap->createSitemap();

            // write sitemap as file
            $sitemap->writeSitemap();

            // update robots.txt file
            $sitemap->updateRobots();

            // submit sitemaps to search engines
            $result = $sitemap->submitSitemap("yahooAppId");
            // shows each search engine submitting status
            echo "<pre>";
            print_r($result);
            echo "</pre>";
            
        }
        catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        echo "Memory peak usage: ".number_format(memory_get_peak_usage()/(1024*1024),2)."MB";
        $time2 = explode(" ",microtime());
        $time2 = $time2[1];
        echo "<br>Execution time: ".number_format($time2-$time)."s";


        ?>
    </body>
</html>
