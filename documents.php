<?php
session_start();

$msg = "";

if (isset($_SESSION['user']) && isset($_SESSION['userType'])) {

    if ($_SESSION['userType'] == 'a') {
        include_once 'htdocs/include/db_connection.php';

        if (isset($_POST['upload']) && $_FILES['userfile']['size'] > 0) {
            $fileName = $_FILES['userfile']['name'];
            $tmpName = $_FILES['userfile']['tmp_name'];
            $fileSize = $_FILES['userfile']['size'];
            $fileType = $_FILES['userfile']['type'];

            $fp = fopen($tmpName, 'r');
            $content = fread($fp, filesize($tmpName));
            $content = addslashes($content);
            fclose($fp);

            $folder = "document/";

            move_uploaded_file($_FILES["userfile"]["tmp_name"], "$folder" . $_FILES["userfile"]["name"]);

            if (!get_magic_quotes_gpc()) {
                $fileName = addslashes($fileName);
            }

            $query = "INSERT INTO document (name, size, type ) " . "VALUES ('$fileName', '$fileSize', '$fileType' )";

            if (!mysqli_query($myConnection, $query)) {
                die('Error: ' . mysqli_error($myConnection));
            }

            $msg = "<br>File $fileName uploaded<br>";
        }

        $sqlC = "SELECT id, name,type ,size  FROM document";
        $result = mysqli_query($myConnection, $sqlC) or die(mysqli_error());
        $num_rows = mysqli_num_rows($result);
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
                        <div  style="text-align: left; width: 954px;  padding: 35px;   border: 1px solid #CCC;  margin: 0 auto;">


                            <table border="1" cellspacing="0" width='100%' >
                                <tr>
                                    <th>Document Name </th>
                                    <th>Document Type </th>
                                    <th>Size (KB)</th>
                                    <th>Remove</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td><a href='document/" . $row['name'] . "' target='_new'>" . $row['name'] . "</a></td>";
                                    echo "<td>" . $row['type'] . "</td>";
                                    echo "<td>" . $row['size'] . "</td>";
                                    echo "<td><a href='removeDocument.php?docID=" . $row['id'] . "' onclick=javascript:alert('are you sure ?')>...</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                        </div>
                        <div style="text-align: left; width: 1004px; border: 1px solid #CCC; padding: 10px; margin: 0 auto;">
                            <br/>
                            <?php
                            if (isset($_GET["msg"])) {
                                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $_GET["msg"];
                            }
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $msg;
                            ?>
                            <br/>
                            <br/>
                            <br/>
                            <div style="text-align: left; width: 500px; border: 1px solid #CCC; padding: 10px; margin: 0 auto;">
                                <form  method="POST" enctype="multipart/form-data">
                                    Document File:  <input type="hidden" name="MAX_FILE_SIZE" value="200000000" required>
                                    <input name="userfile" type="file" id="userfile">
                                    <input name="upload" type="submit" class="box" id="upload" value=" Upload ">
                                </form>
                            </div>
                            <br/>
                            <br/>
                            <br/>
                        </div>
                        <div style="background-image:url(htdocs/img/news_03.png);  width:1024px; height:69px; margin: 20px auto;" title="" >
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
