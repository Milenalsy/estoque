<?php
require_once "../config.php";
global $db;
$categoria= array();
if(isset($_GET['id'])){
    $id = $GET['id'];
    $sql = "SELECT * FROM categoria WHERE id = :id";
    $sql = $db->prepare($sql);
    $sql->bindValue(":id,$id");
    $sql->execute();

    if($sql->rowCount()>0){
        $categoria = $sql->fetch();
    }else{
        header("lacation: ../nova-categoria.php");
        exit;
    }


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../estilo.css"/>
</head>
<body>
<?php require_once "../menu.php";?>
    <div class="container fundo">
    
    <div class="container">
        <fieldset>
            <legend>EDITAR CATEGORIA</legend>
            <form method="POST" action="">
                <label for="">NOME DA CATEGORIA</label>
                <input type="text" name="nome" class="form-control"/><br>
                <button class="btn btn-success">Salvar</button>
            </form>
        </fieldset>

    </div>

    </div>
</body>
</html>