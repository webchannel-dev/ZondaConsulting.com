<?php
session_start();

$msg = "";

if (isset($_SESSION['user']) && isset($_SESSION['userType'])) {

    if ($_SESSION['userType'] == 'a') {
        include_once 'htdocs/include/db_connection.php';

        if (isset($_POST["username"]) && isset($_POST["password"])) {

            $sqlC = "insert into zc_do_member( `username`, `firstName`, `lastName`, `email`, `password`, `singupdate`, `lastlogin`, `accounttype`) values('" . $_POST['username'] . "','" . $_POST['firstName'] . "','" . $_POST['lastName'] . "','" . $_POST['email'] . "','" . $_POST['password'] . "',CURRENT_TIMESTAMP,null,'" . $_POST['accountType'] . "' )";
            if (!mysqli_query($myConnection, $sqlC)) {
                die('Error: ' . mysqli_error($myConnection));
            }
            $msg = "New username has been created succefully !";
        }




        $sqlC = "select * from zc_do_member";
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
                                    <th>Username </th>
                                    <th>First Name </th>
                                    <th>Last Name </th>
                                    <th>Email </th>
                                    <th>Password </th>
                                    <th>Sing up date </th>
                                    <th>Last Login</th>
                                    <th>Account type</th>
                                    <th>Remove</th>
                                </tr>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['username'] . "</td>";
                                    echo "<td>" . $row['firstName'] . "</td>";
                                    echo "<td>" . $row['lastName'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['password'] . "</td>";
                                    echo "<td>" . $row['singupdate'] . "</td>";
                                    echo "<td>" . $row['lastlogin'] . "</td>";
                                    echo "<td>" . $row['accounttype'] . "</td>";
                                    echo "<td><a href='removeUser.php?userID=" . $row['id'] . "' onclick=javascript:alert('are you sure ?')>...</a></td>";
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
                            <div style="text-align: left; width: 220px; border: 1px solid #CCC; padding: 10px; margin: 0 auto;">

                                <form action="user.php" method="POST" enctype="multipart/form-data">
                                    Username&nbsp;&nbsp;&nbsp;: <input type="text" name="username" value="" size="30" required/>
                                    First Name&nbsp;&nbsp;: <input type="text" name="firstName" value="" size="30" required/>
                                    Last Name&nbsp;&nbsp;: <input type="text" name="lastName" value="" size="30" required />
                                    Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type="email" name="email" value="" size="30" required/>
                                    Password&nbsp;&nbsp;&nbsp;: <input type="password" name="password" value="" size="30" required/>
                                    User Type&nbsp;&nbsp;: <select name="accountType">
                                        <option value="a">Administrator</option>
                                        <option value="c" selected>Customer</option>
                                    </select><br/><br/>
                                    <input type="submit" value="Create" />
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
