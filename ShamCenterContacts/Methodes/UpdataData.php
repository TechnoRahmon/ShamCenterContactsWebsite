<?php
   include_once '..\db\connect.php';
    
    $ID = $_POST['id'];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $PersNum = $_POST['PersNum'];
    $Adress = $_POST['Adress'];
    $PostNum = $_POST['PostNum'];
    $MobNum = $_POST['MobNum'];
    $Email = $_POST['Email'];
    $Date = $_POST['Date'];
    $Money = $_POST['Money'];

    $sql = "UPDATE shamcenter SET FirstName='$FirstName', LastName='$LastName', PersNum='$PersNum', Adress='$Adress', PostNum='$PostNum', MobNum='$MobNum', Email='$Email', Date='$Date', Money='$Money' WHERE ContactID='$ID';";
    $result = mysqli_query($conn, $sql);

    header("location: ..\index.php");
?>
