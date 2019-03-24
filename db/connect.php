<?php
    
    $dbServername = "ec2-54-246-92-116.eu-west-1.compute.amazonaws.com";
    $dbUsername = "jyiwxtfraxtnjx";
    $dbPassword = "5327bef564362147ad24f6e317c0bac765a1cf23e473ea4de2ad0b2f60314f7f";
    $dbName = "d924vchjd5ti4j";

    $conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
    
    if(!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
?>
