<?php
session_start();

if (isset($_SESSION['user']) && isset($_SESSION['userType'])) {

    if ($_SESSION['userType'] == 'a') {
        include_once 'htdocs/include/db_connection.php';
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <link href='http://fonts.googleapis.com/css?family=Tenor+Sans' rel='stylesheet' type='text/css'>
                <title>ZONDA CONSULTING - Admin Section </title>
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


                        <div style=" text-align: left; width: 1004px; border: 1px solid #CCC; padding: 10px; margin: 0 auto;">
                            <ul>
                                <li><a href="user.php">Users</a></li>
                                <li><a href="documents.php">Documents</a></li>
                                <li><a href="assign.php">Assign document to user</a></li>
                                <li><a href="newsInput.php">News</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div  style="text-align: left; width: 954px; min-height: 380px; padding: 35px;   border: 1px solid #CCC;  margin: 0 auto;">

                            <?php
                            echo '<p>Dear ' . $_SESSION['user'] . ', <br/><br/>You have logged into a secure admin area where you can add/remove user , news , documents and assign the docuemnts to customer .';
                            ?>
                        </div>
                    </div>

                    <div style="background-image:url(htdocs/img/news_03.png); position:absolute; left:0px; top:881px; width:1024px; height:69px;" title="">
                    </div>

                </div>
            </center>
        </body>
        </html>
        <?php
    } else {
        header("location:index.html");
    }
} else {
    header("location:index.html");
}
?>
