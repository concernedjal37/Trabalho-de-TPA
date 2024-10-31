<?php
session_start();
if(!isset($_SESSION['user_id'])) {
    echo "Sem permissão para acesso a página<br>";
    echo '<a href="../../">Ir para página de login</a>';
    exit;
}
require('../../model/Conexao.class.php');
require('../../model/Item.class.php');
require('../../utilities/Alerts.class.php');
$item = new Item;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ListaItems</title>
    <link rel="stylesheet" href="../../css/usuario">
    <!--ìcone navegador-->
    <link rel="shortcut icon" href="resources/favicon.png" type="image/x-icon">
    <!--Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <!--Icones Bootstrap 5-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />
    <!--Google Fonts-->
    <link href="fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"/>

        <style type="text/css">
            body{
                margin: 20px;
                background-color: #ffffff;
            }
        
            *{
                font-family:'Open Sans' , sans-serif;
            }
        
            h2{
                font-family:'Open Sans' , sans-serif;
            }
        
            .thead{
                background-color: #f7f7f7;
            }
        </style>
</head>
<body>
<div class="container">

<?php

if(isset($_GET['cod'])){
    switch($_GET['cod']){
        case 1:
            Alertas::success('Item confirmado com sucesso');
            break;
            case 2:
                Alertas::success('Item excluído com sucesso');
                break;
                case 3:
                    Alertas::success('Item atualizado com sucesso');
                    break;
                    default:
                        Alertas::danger('Nenhuma ação realizada');
                        break;
    }
}

?>

<h2 class="text-center"> Lista de Items <i class="bi bi-people-fill"></i> </h2>

<h5 class="text-end">
    <div id="Deslog">
    <a href="Deslogar">Deslogar</a>
    </div>
<a href="RegistrarItem.php" class="btn btn-primary btn-xs">
<i class="bi bi-person-plus-fill"></i>
</a>
</h5>


<div class="table-responsive"> 
<table class="table table-hover"> 
<thead class="thead">
<tr>
<th>ID</th>
<th>NOME</th>
<th>Quantidade</th>
<th>Tipo</th>
<th>PrecoTotal</th>
<th colspan="3">AÇÕES</th>
</tr>
</thead>
<tbody>
    <?php foreach($item->list_item() as $data):?>
<tr>
<td><?= $data['idEquipamento'] ?></td>
<td><?= $data['Nome'] ?></td>
<td><?= $data['Quantidade'] ?></td>
<td><?= $data['Tipo'] ?></td>
<td><?= $data['PrecoTotal'] ?></td>
<td>
    <form action="AtualizarItems.php" method="POST">
        <input type="hidden" name="id" value=<?= $data['idEquipamento']?>>
        <button class="btn btn-warning btn-xs">
            <i class="bi bi-pencil-square"></i>
        </button>
    </form>
</td>
<td>
    <form method="POST" action="../../controller/delete_item.php" onclick="return confirm('Tem certeza que deseja excluir ?');">
    <input type="hidden" name="id" value=<?= $data['idEquipamento'] ?>>
        <button class="btn btn-danger btn-xs">
            <i class="bi bi-trash"></i>
        </button>
    </form>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>

</div>

<footer>
<div>
    Links do git:

    <ul>
        <li>Mateus Coelho: <a href="https://github.com/concernedjal37/Trabalho-de-TPA">https://github.com/concernedjal37/Trabalho-de-TPA</a></li>
        <li>Caio Seleme: <a href="https://github.com/caioseleme/Reposit-rio-Caio-Seleme">https://github.com/caioseleme/Reposit-rio-Caio-Seleme</a></li>
        <li>Bruno Primo: <a href="https://github.com/BrunoPrimo/Bruno-Repositorio.git">https://github.com/BrunoPrimo/Bruno-Repositorio.git</a></li>
        <li>Iago Dias: <a href="https://github.com/Iago1310">https://github.com/Iago1310</a></li>
    </ul>
</div>
</footer>

<!--JQuery e JQueryMask-->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

</body>
</html>