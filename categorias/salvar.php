<?php
require_once "./config.php";
$categoria= $_POST['nome'];

if(isset($_GET['id'])){
    $id = $GET['id'];


    $sql = "SELECT * FROM categoria WHERE id = :id";
    $sql = $db->prepare($sql);
    $sql->bindValue(":id,$id");
    $sql->execute();


?>