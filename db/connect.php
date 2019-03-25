<?php
    
    $dbServername = "mysql6001.site4now.net";
    $dbUsername = "a46d51_sccdata";
    $dbPassword = "SLOME123karo123";
    $dbName = "db_a46d51_sccdata";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
?>
