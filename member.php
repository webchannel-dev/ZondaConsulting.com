<?php
session_start();

if (isset($_SESSION['user']) && isset($_SESSION['userType'])) {

    if ($_SESSION['userType'] == 'c') {
        include_once 'htdocs/include/db_connection.php';
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <link href='http://fonts.googleapis.com/css?family=Tenor+Sans' rel='stylesheet' type='text/css'>
                <title>ZONDA CONSULTING - Member Section </title>
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

                    <div  style="   margin: 280px auto; width:1024px; min-height:200px;" title="">


                        <div style=" text-align: left; width: 1004px; border: 1px solid #CCC; padding: 10px; margin: 0 auto;">
                            <ul>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div>

                        <div  style="text-align: left; width: 954px; min-height:200px; padding: 35px;   border: 1px solid #CCC;  margin: 0 auto;">

                            <?php
                            echo '<p>Dear ' . $_SESSION['user'] . ',<br/><br/> You have logged into a secure area where you can download all vital documents and forms relevant to you.';
                            $sqlC2 = "select DISTINCT name , document.id , size,type  from document  inner join assigndoc on document.ID=assigndoc.docID where assigndoc.userID = " . $_SESSION['userID'];
                            $resultDoc2 = mysqli_query($myConnection, $sqlC2) or die(mysqli_error());
                            ?>
                            <div  style="text-align: left; width: 600px;  padding: 35px;   border: 1px solid #CCC;  margin: 0 auto;">


                                <table border="1" cellspacing="0" width='100%' >
                                    <tr>
                                        <th>Document Name </th>
                                        <th>Document Type </th>
                                        <th>Size (KB)</th>
                                    </tr>
                                    <?php
                                    while ($rowDoc2 = mysqli_fetch_array($resultDoc2)) {
                                        echo "<tr>";
                                        echo "<td><a href='document/" . $rowDoc2['name'] . "' target='_new'>" . $rowDoc2['name'] . "</a></td>";
                                        echo "<td>" . $rowDoc2['type'] . "</td>";
                                        echo "<td>" . $rowDoc2['size'] . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                            </div>

                        </div>
                    </div>

                    <div style="background-image:url(htdocs/img/news_03.png); width:1024px; height:69px; margin: 0 auto;" title="">
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
