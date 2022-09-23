<?php
require_once "../config.php";

$id = $_GET['id'];
$produtos = array();

$sql = "SELECT * FROM produtos WHERE id = :id";
$sql = $db->prepare($sql);
$sql->bindValue(":id",$id);
$sql->execute();
$produtos = $sql->fetch();


if(count($_POST)> 0){
$nome = $_POST['nome'];
$id_categoria = $_POST['id_categoria'];
$data_entrada = $_POST['data_entrada'];
$data_validade = $_POST['data_validade'];

$sql ="INSERT INTO produtos SET nome = :nome, id_categoria = :id_categoria, data_entrada = :data_entrada, data_validade = :data_validade = NOW()";
$sql= $db->prepare($sql);
$sql->bindValue(":nome",$nome);
$sql->bindValue(":id_categoria",$id_categoria);
$sql->bindValue(":data_entrada",$data_entrada);
$sql->bindValue(":data_validade",$data_validade);
$sql->execute();
//print_r($sql->errorInfo());exit;

if($sql){
    header("Location: estoque/produtos/listar.php");
}
}
$categorias = array();
$sql = "SELECT * FROM categorias";
$sql = $db->prepare($sql);
$sql->execute();

$categorias = $sql->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../estilo.css"/>
</head>
<body>
    
<div class="container">
<?php require_once "../menu.php";
?>
   
    <fieldset>
    <legend>EDITAR PRODUTO</legend>
    <form method="POST">
        <label>Nome</label>
        <input type="text" class="form-control" name="nome" value="oleo"/>
        <label>Id_categoria</label>
        <select name="id_categoria" class="form-control">
            <option value="" disabled selected>Selecione...</option>
          
            <?php foreach($categorias as $categoria):?>
                <option value="<?php echo $categoria['id']?>" <?php echo($categoria['id'] == $produtos['id_categoria']? 'selected' : '') ?>>
                
                <?php echo $categoria['nome'] ?>

                </option>

            <?php endforeach; ?>

        </select>
        <label>Data_entrada</label>
        <input type="date" class="form-control" name="data_entrada" value=""/>
        <label>Data_validade</label>
        <input type="date" class="form-control" name="data_validade" value=""/>

        <br/><a href="../index.php" class="btn btn-warning">Voltar</a>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
    <fieldset>
</div>
</body>
</html>