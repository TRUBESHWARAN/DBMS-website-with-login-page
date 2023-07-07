<?php

include 'dbconn.php';

session_start();

if(isset($_SESSION['username'])){
echo 'welcome'.$_SESSION['username'];
}
else{
    header("Location:login.php");
}
if ( isset($_GET["id"]) ){
    $id = $_GET["id"];
    $sql = "DELETE FROM clients WHERE id=$id";
    $con->query($sql);
}

header("Location:index.php");
exit();
?>