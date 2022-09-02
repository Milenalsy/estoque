<?php
require_once "config.php";

global $db;

$dados = array();

if (isset($_GET['campo_busca'])) {
    
$nome = $_GET['campo_busca'];

$sql = "SELECT * FROM usuarios WHERE nome LIKE :nome";
$sql = $db->prepare($sql);
$sql->bindValue(":nome", "%".$nome."%");
$sql->execute();

$dados = $sql->fetchALL();
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<title></title>

</head>
<body>
    <div class="container fundo">
    
        <div class="fundo-menu">



        <a href="novo-produto.php" class="botao-menu">  
            <img class="icone" src=""/>
            <div class="botao-menu"></div>
        </a>



        <a href="#" class="botao-menu" > 
        <img class="icone" src="" alt=""/>
            <div class="botao-menu" ></div>
        </a>



        <a href="registros.php" class="botao-menu" >
            <img class="icone" src=""/>
            <div class="botao-menu"></div>
        </a>
        </div>



        <div class="fundo-conteudo">
            <div class="mensagem-bem-vindo"> </div> 
            
            <div class="tabela">
                <fieldset>
                    <legend> Buscar Registros</legend>
                    </hr>


                    <form method="">
                        <div class="row"> 
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="campo_busca" placeholder="PESQUISE UM NOME"/>
                            </div>
                            <div class="col-sm-6">  
                                <button type="submit" class="btn btn-primary">Buscar</button>   
                            </div>    
                        </div>  
                    </form>
                    </br>


                    <table class="table table-dark table-striped" >
                        <thrad>
                            <th> #ID </th>
                            <th> Nome </th>
                            <th> Sobrenome </th>
                            <th> Senha </th>
                            <th> Data da Criação </th>
                            <th> Usuario </th>
                            <th> Opções </th>
                        </thead>

                            <tbody>
                                <?php foreach($dados as $dado): ?>
                                    <tr>
                                        <td><?php echo $dado['id']?></td>

                                            <td><?php echo $dado['nome']?></td>

                                            <td><?php echo $dado['sobrenome']?></td>

                                            <td><?php echo $dado['senha']?></td>

                                            <td><?php echo $dado['data_criacao']?></td>
                                            
                                            <td><?php echo $dado['usuario']?></td>

                                                <td>
                                                    <a href="excluir.php?id=<?php echo $dado['id'] ?>" class="btn btn-danger"> Excluir </a>
                                                    <a href="editar.php?id=<?php echo $dado['id'] ?>" class="btn btn-warning"> Editar </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        </hr>
                        <a href="novo-usuario.php" class="btn btn-primary"> Cadastre-se</a>
                </fieldset>
            </div>

        </div>

    </div>
</body>
</html>