<?php
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] == 'a') {
        include_once 'htdocs/include/db_connection.php';
//-------------------------------->  
        if (isset($_GET["userID"])) {
            $sqlC = "delete from zc_do_member WHERE id=" . $_GET['userID'];
            if (!mysqli_query($myConnection, $sqlC)) {
                die('Error: ' . mysqli_error($myConnection));
            }
            $msg = "Username has been removed succefully !";
        }
        mysqli_close($myConnection);

        header('Location: user.php?msg=' . $msg);
//-------------------------------->    
    } else {
        header("index.html");
    }
} else {
    header("location:index.html");
}
?>
