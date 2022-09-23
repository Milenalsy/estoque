<?php
require_once "config.php";

if(count($_POST)> 0){
$nome = $_POST['nome'];
$id_categoria = $_POST['id_categoria'];
$data_entrada = $_POST['data_entrada'];
$data_validade = $_POST['data_validade'];

$sql ="INSERT INTO produtos SET nome=:nome,id_categoria=:id_categoria,data_entrada=:data_entrada,data_validade=:data_validade= NOW()";
$sql= $db->prepare($sql);
$sql->bindValue(":nome",$nome);
$sql->bindValue(":id_categoria",$id_categoria);
$sql->bindValue(":data_entrada",$data_entrada);
$sql->bindValue(":data_validade",$data_validade);
$sql->execute();
print_r($sql->errorInfo());exit;

if($sql){
    header("Location: estoque/produtos/listar.php");
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./estilo.css"/>
</head>
<body>
    
<div class="container">
   
    <fieldset>
    <legend>CADASTRAR PRODUTO</legend>
    <form method="POST">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome"/>
        <label>Id_categoria</label>
        <input type="text" class="form-control" name="id_categoria"/>
        <label>Data_entrada</label>
        <input type="date" class="form-control" name="data_entrada"/>
        <label>Data_validade</label>
        <input type="date" class="form-control"/>
        <br/><button><a href="index.php" class="btn btn-warning">Voltar</a><button>
        <button type="submit" class="btn btn-warning">Salvar<button>
    </form>
    <fieldset>
</div>
</body>
</html>