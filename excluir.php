<?php
    require_once "config.php";
    $id = $_GET['id'];
    global $db;
    $sql = "DELETE FROM usuarios WHERE id= $id";
    $sql = $db->prepare($sql);
    $sql->execute();

    header("Location:registros.php");
?>