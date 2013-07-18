<?php
session_start();

$msg = "";

if (isset($_SESSION['user']) && isset($_SESSION['userType'])) {

    if ($_SESSION['userType'] == 'a') {
        include_once 'htdocs/include/db_connection.php';


        if (isset($_GET['docID']) && isset($_GET['userID'])) {

            foreach ($_GET['docID'] as $dID) {

                $sqlC = " INSERT INTO assigndoc (userID, docID) VALUES (" . $_GET['userID'] . " ," . $dID . ")";
                $resultDoc = mysqli_query($myConnection, $sqlC) or die(mysqli_error());
            }
        }
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

                        <?php
                        if (isset($_GET['userID'])) {
                            $sqlC1 = "select DISTINCT name , document.id , size,type  from document  where id not in (select DISTINCT document.id   from document  inner join assigndoc on document.ID=assigndoc.docID where assigndoc.userID=" . $_GET['userID'] . ");";
                            $resultDoc1 = mysqli_query($myConnection, $sqlC1) or die(mysqli_error());
                            $sqlC2 = "select DISTINCT name , document.id , size,type  from document  inner join assigndoc on document.ID=assigndoc.docID where assigndoc.userID = " . $_GET['userID'];
                            $resultDoc2 = mysqli_query($myConnection, $sqlC2) or die(mysqli_error());
                            ?>
                            <div  style="text-align: left; width: 954px;  padding: 35px;   border: 1px solid #CCC;  margin: 0 auto;">


                                <table border="1" cellspacing="0" width='100%' >
                                    <tr>
                                        <th>Document Name </th>
                                        <th>Document Type </th>
                                        <th>Size (KB)</th>
                                        <th>Remove</th>
                                    </tr>
                                    <?php
                                    while ($rowDoc2 = mysqli_fetch_array($resultDoc2)) {
                                        echo "<tr>";
                                        echo "<td><a href='document/" . $rowDoc2['name'] . "' target='_new'>" . $rowDoc2['name'] . "</a></td>";
                                        echo "<td>" . $rowDoc2['type'] . "</td>";
                                        echo "<td>" . $rowDoc2['size'] . "</td>";
                                        echo "<td><a href='unassignDoc.php?userID=" . $_GET['userID'] . "&docID=" . $rowDoc2['id'] . "' onclick=javascript:alert('are you sure ?')>...</a></td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                            </div>
                            <div  style="text-align: left; width: 954px;  padding: 35px;   border: 1px solid #CCC;  margin: 0 auto;">

                                <form  method="GET" action="assign.php">
                                    <table border="1" cellspacing="0" width='100%' >
                                        <tr>
                                            <th>Document Name </th>
                                            <th>Document Type </th>
                                            <th>Size (KB)</th>
                                            <th>Select</th>
                                        </tr>
                                        <?php
                                        while ($rowDoc1 = mysqli_fetch_array($resultDoc1)) {
                                            echo "<tr>";
                                            echo "<td><a href='document/" . $rowDoc1['name'] . "' target='_new'>" . $rowDoc1['name'] . "</a></td>";
                                            echo "<td>" . $rowDoc1['type'] . "</td>";
                                            echo "<td>" . $rowDoc1['size'] . "</td>";
                                            echo "<td><input type='checkbox' name='docID[]' value=" . $rowDoc1['id'] . " /> </td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </table>
                                    <input type="text" hidden name="userID" value="<?php echo $_GET['userID']; ?>" />
                                    <input type="submit" name="Assign document to USER" value="Assign document to USER"/>
                                </form>
                            </div>
                            <?php
                        }
                        if (!isset($_GET['userID'])) {

                            $sqlC = "select * from zc_do_member where accounttype='c'";
                            $result = mysqli_query($myConnection, $sqlC) or die(mysqli_error());
                            $num_rows = mysqli_num_rows($result);
                            ?>

                            <div style="text-align: left; width: 1004px; border: 1px solid #CCC; padding: 10px; margin: 0 auto;">
                                <form  method="GET" action="assign.php">
                                    <select name="userID">
                                        <?php
                                        while ($row = mysqli_fetch_array($result)) {
                                            echo " <option value='" . $row['id'] . "' >" . $row['username'] . " | " . $row['firstName'] . " | " . $row['lastName'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <br/>
                                    <br/>
                                    <input type="submit" value="Display User Document" />
                                </form>
                            </div>

                        <?php }
                        ?>
                        <div style="background-image:url(htdocs/img/news_03.png);
                             width:1024px;
                             height:69px;
                             margin: 20px auto;
                             " title="" >
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
