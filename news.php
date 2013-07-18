<!DOCTYPE html>
<html>
    <head>
        <link href='http://fonts.googleapis.com/css?family=Tenor+Sans' rel='stylesheet' type='text/css'>
        <title>ZONDA CONSULTING HOME PAGE </title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="htdocs/css/main.css" type="text/css"/>
        <script type="text/javascript" src="htdocs/js/analyticstracking.js"></script>
    </head>
    <body>
    <center>
        <div id="wrapper">

            <div style=" position:absolute; left:0px; top:0px; width:1024px; height:280px;" title="">
                <img src="htdocs/img/news_01.png" width="1024px" height="280px" usemap="#Navigation"/>
                <map name="Navigation">
                    <area shape="rect" coords="451,181,511,203" href="about.html">
                    <area shape="rect" coords="544,182,587,202" href="http://www.zondaconsulting.com/forum">
                    <area shape="rect" coords="618,181,679,203" href="client.html">
                    <area shape="rect" coords="707,181,785,203" href="carrers.php">
                    <area shape="rect" coords="810,182,886,204" href="contact.html">
                    <area shape="poly" coords="110,117,389,148,337,237,137,242" href="http://www.zondaconsulting.com/">
                </map>
            </div> 

            <div  style="   position:absolute; left:0px; top:280px; width:1024px; min-height:601px;" title="">
                <div id="twitter-feed">
                    <script src="htdocs/js/twitter_widget.js"></script>
                    <script>
                        new TWTR.Widget({
                            version: 3,
                            type: 'profile',
                            rpp: 3,
                            interval: 100,
                            width: 180,
                            height: 250,
                            theme: {
                                shell: {
                                    background: '#e3e3e3',
                                    color: '#00C4FF'
                                },
                                tweets: {
                                    background: '#e3e3e3',
                                    color: '#666666',
                                    links: '#00C4FF'
                                }
                            },
                            features: {
                                scrollbar: true,
                                loop: true,
                                live: false,
                                hashtags: true,
                                timestamp: false,
                                avatars: false
                            }
                        }).render().setUser('zondaconsulting').start();
                    </script> 
                </div>

                <div><?php
                    $url = "http://www.bbc.co.uk/persian/sport/2013/07/130705_u02_bd_volleyball_iran_cuba.shtml";
                    $file = file_get_contents($url);

                    if (preg_match("/<title>(.+)<\/title>/i", $file, $result))
                        echo "The title of " . $url . " is <b>" . $result[1] . "</b></br></br>";
                    else
                        echo "The page doesn't have a title tag";

                    if (preg_match("/<p>(.+)<\/p>/i", $file, $result))
                        echo $result[1];

                    $html5 = new DOMDocument();

                    @$html5->loadHtmlFile('http://www.bbc.co.uk/persian/sport/2013/07/130705_u02_bd_volleyball_iran_cuba.shtml');
                    $xpath5 = new DOMXPath($html5);

                    $nodes = $xpath5->query('//div[@class="sb_tlst"]/h3');
                    $nodes = $xpath5->query('//div[@class="sb_meta"]/cite');
                    $nodes = $xpath5->query('//div[@id="results"]/ul[@id="wg0"]/li/div/div/p');

                    $data = array();
                    $data2 = array();
                    $data3 = array();


                    ?></div>
            </div>

            <div style="background-image:url(htdocs/img/news_03.png); position:absolute; left:0px; top:881px; width:1024px; height:69px;" title="">
            </div>

        </div>
    </center>
</body>
</html>


