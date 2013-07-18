<?php
session_start();
include_once 'htdocs/include/db_connection.php';
?>
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
                <?php
                if (isset($_POST["Username"]) && isset($_POST["Password"])) {

                    $username = $_POST["Username"]; //Storing username in $username variable.
                    $password = $_POST["Password"]; //Storing password in $password variable.

                    $sqlCommand = "select id,accounttype from zc_do_member where username = '" . $_POST['Username'] . "'and password = '" . $_POST['Password'] . "';";
                    $result = mysqli_query($myConnection, $sqlCommand) or die(mysqli_error());
                    $num_rows = mysqli_num_rows($result);
                    if ($num_rows <= 0) {

                        echo "Sorry ,Entered incorrect username or password.
Passwords are case sensitive";

                        echo "<br/><br/>Try it again , <a href='index.html'> Back to main page</a> .";
                    } else {
                        $_SESSION['user'] = $_POST["Username"];
                        while ($row = mysqli_fetch_array($result)) {
                            $_SESSION['userType'] = $row['accounttype'];
                            $_SESSION['userID'] = $row['id'];
                        }
                        mysqli_free_result($result);
                        mysqli_close($myConnection);

                        if ($_SESSION['userType'] == 'a') {
                            header("location:admin.php");
                        } elseif ($_SESSION['userType'] == 'c') {
                            header("location:member.php");
                        }
                    }
                }
                mysqli_close($myConnection);
                ?>

            </div>

            <div style="background-image:url(htdocs/img/news_03.png); position:absolute; left:0px; top:881px; width:1024px; height:69px;" title="">
            </div>

        </div>
    </center>
</body>
</html>


