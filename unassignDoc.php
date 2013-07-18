<?php

session_start();
if (isset($_SESSION['user']) && isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] == 'a') {
        include_once 'htdocs/include/db_connection.php';
//-------------------------------->  
        if (isset($_GET["docID"]) && isset($_GET["userID"])) {
            $sqlC = "delete from assigndoc WHERE docID=" . $_GET['docID'] . " and userID=" . $_GET["userID"];
            if (!mysqli_query($myConnection, $sqlC)) {
                die('Error: ' . mysqli_error($myConnection));
            }
            $msg = "Document has been removed from this user succefully !";
        }
        mysqli_close($myConnection);

        header('Location: assign.php?msg=' . $msg . '&userID=' . $_GET["userID"]);
//-------------------------------->    
    } else {
        header("index.html");
    }
} else {
    header("location:index.html");
}
?>
