<?php

$banco ="controle_de_estoque";
$usuario= "root";
$senha= "";
$host= "localhost";
$url = 'http://localhost/estoque/';

global $db;

try{
    $db = new PDO("mysql:host=" .$host.";dbname=" .$banco,$usuario,$senha);
} catch (PDOException $e){
    echo $e->getmessage();
}
?>