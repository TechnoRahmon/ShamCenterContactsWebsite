<?php
    include_once '..\db\connect.php';

    $ID = $_POST['id'];

    $sql = "DELETE FROM shamcenter WHERE ContactID='$ID';";
    $result = mysqli_query($conn, $sql);

    header("location: ..\index.php");
?>
