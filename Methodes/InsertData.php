<?php
    include_once '..\db\connect.php';
    
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $PersNum = $_POST['PersNum'];
    $Adress = $_POST['Adress'];
    $PostNum = $_POST['PostNum'];
    $MobNum = $_POST['MobNum'];
    $Email = $_POST['Email'];
    $Date = $_POST['Date'];
    $Money = $_POST['Money']; 
    
    $sql = "INSERT INTO shamcenter (FirstName, LastName, PersNum, Adress, PostNum, MobNum, Email, Date, Money) VALUES ('$FirstName', '$LastName', '$PersNum', '$Adress', '$PostNum', '$MobNum', '$Email', '$Date', '$Money');";
    $result = mysqli_query($conn, $sql);

    header("location: ..\index.php");
?>
