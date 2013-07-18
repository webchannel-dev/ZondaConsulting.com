<?php

/* Created by Adam Khoury @ www.developphp.com */

// Place db host name. Sometimes "localhost" but  
// sometimes looks like this: >>      ???mysql??.someserver.net 
$db_host = "176.32.230.26";
// Place the username for the MySQL database here 
$db_username = "cl49-customer";
// Place the password for the MySQL database here 
$db_password = "customer";
// Place the name for the MySQL database here 
$db_name = "cl49-customer";

// Run the connection here   
$myConnection = mysqli_connect("$db_host", "$db_username", "$db_password", "$db_name") or die("could not connect to mysql");
// Now you can use the variable $myConnection to connect in your queries      
?> 