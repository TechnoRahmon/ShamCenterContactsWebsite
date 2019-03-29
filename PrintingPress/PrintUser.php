<?php
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

    if(empty($ID)){

    }
    else {
    $myfile = fopen("Text.txt", "w") or die("unable to open file!");
    fwrite($myfile, $FirstName . "\n");
    fwrite($myfile, $LastName . "\n");
    fwrite($myfile, $PersNum . "\n");
    fwrite($myfile, $Adress . "\n");
    fwrite($myfile, $PostNum . "\n");
    fwrite($myfile, $MobNum . "\n");
    fwrite($myfile, $Email . "\n");
    fwrite($myfile, $Date . "\n");
    fwrite($myfile, $Money . "\n");
    fclose($myfile);
    }

    header("location: ..\index.php");
?>
