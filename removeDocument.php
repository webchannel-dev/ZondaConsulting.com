<?php
session_start();
if (isset($_SESSION['user']) && isset($_SESSION['userType'])) {
    if ($_SESSION['userType'] == 'a') {
        include_once 'htdocs/include/db_connection.php';
//-------------------------------->  
        if (isset($_GET["docID"])) {
            $sqlC = "delete from document WHERE id=" . $_GET['docID'];
            if (!mysqli_query($myConnection, $sqlC)) {
                die('Error: ' . mysqli_error($myConnection));
            }
            $msg = "Document has been removed succefully !";
        }
        mysqli_close($myConnection);

        header('Location: documents.php?msg=' . $msg);
//-------------------------------->    
    } else {
        header("index.html");
    }
} else {
    header("location:index.html");
}
?>
