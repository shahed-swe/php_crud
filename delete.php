<?php

    $id = $_GET['id'];
    require_once "connection.php";
    $sql = "DELETE FROM information WHERE id=$id";
    if(mysqli_query($link, $sql)){
        header('location: index.php');
    }else{
        echo "Data is not deleted Yet!";
    }
?>