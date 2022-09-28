<?php
require_once "../config.php";
    $produtos = array();
    global $db;
   
    $sql="SELECT produtos.id,produtos.nome,produtos.data_validade, produtos.quantidade, categorias.nome AS nome_categoria FROM produtos INNER JOIN categorias ON produtos.id_categoria = categorias.id ";
    $sql =$db->prepare($sql);
    $sql->execute();

    if($sql->rowCount()>0){
        $produtos = $sql->fetchAll();
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
    <link rel="stylesheet" href="../estilo.css"/>
</head>
<body>
<div class="container">
<?php require_once "../menu.php";
?>
   
   <fieldset>
   <legend>Listar Produtos</legend>
   <table class="table">
                    <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Categoria</th>
                        <th>Data de Validade</th>
                        <th>Quantidade</th>
                        <th>Opções</th>
                        
                    </thead>
                    <tbody>
                        <?php foreach($produtos as $produtos):?>
                            <tr>

                                <td><?php echo $produtos['id']?></td>
                                <td><?php echo $produtos['nome']?></td>
                                <td><?php echo $produtos['nome_categoria']?></td>
                                <td><?php echo $produtos['data_validade']?></td>
                                <td><?php echo $produtos['quantidade']?></td>
                                
                        
                        </br><td><a href="./editar.php?id=<?php echo $produtos['id']?>" class="btn btn-warning">Editar</td>

                            </tr>
                            <?php endforeach?>
                    </tbody>
                </table>

   <fieldset>
</div>
</body>
</html>