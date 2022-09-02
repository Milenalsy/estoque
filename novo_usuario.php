<?php
require_once "config.php";

if(count($_POST)> 0){
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$senha = $_POST['senha'];
$usuario = $_POST['usuario'];

$sql ="INSERT INTO usuarios SET nome=:nome,sobrenome=:sobrenome,senha=:senha,usuario=:usuario,data_criacao= NOW()";
$sql= $db->prepare($sql);
$sql->bindValue(":nome",$nome);
$sql->bindValue(":sobrenome",$sobrenome);
$sql->bindValue(":senha",$senha);
$sql->bindValue(":usuario",$usuario);
$sql->execute();

if($sql){
    header("Location: index.php");
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
    <?php require_once "./menu.php";?>
    <fieldset>
    <legend>CADASTRAR USUÁRIO</legend>
    <form method="POST">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome"/>
        <label>Sobrenome</label>
        <input type="text" class="form-control" name="Sobrenome"/>
        <label>Usuário</label>
        <input type="text" class="form-control"/>
        <label>Senha</label>
        <input type="password" class="form-control"/>
        <br/><button><a href="index.php" class="btn btn-warning">Voltar</a><button>
        <button type="submit" class="btn btn-warning">Salvar<button>
    </form>
    <fieldset>
</div>
</body>
</html>