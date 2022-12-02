<?php
    require_once 'Db/Connect.php';
    echo "<br>";

    if(isset($_GET['DCusId']) && !empty($_GET['DCusId']))
    {
        $takeIdToDel = $_GET['DCusId'];
        $deleteSQL = "DELETE FROM customertable WHERE CustomerId='$takeIdToDel'";
        mysqli_query($connect,$deleteSQL);
        header('Location:HomePage.php');    
    }
?>