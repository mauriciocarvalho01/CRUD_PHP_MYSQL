<?php

//conexão
include_once 'PHP_ACTION/db_connect.php';

//Header
include_once 'INCLUDES/header.php';

if(isset($_GET['id'])):
$id = mysqli_escape_string($connect, $_GET['id']);

$sql = "SELECT * FROM clintes WHERE id = '$id'";
$resultado = mysqli_query($connect, $sql);
$dados = mysqli_fetch_array($resultado);
endif;

?>


<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class="light center">Alterar Cliente</h3>
        <form action="PHP_ACTION/update.php" method="POST">
            <div class="input-field col s12">
                <input type="text" name="id" value="<?php echo $dados['id']?>">
                <label for="id">ID Cliente</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="nome" id="nome" value="<?php echo $dados['nome'] ?>">
                <label for="nome">Nome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="sobrenome" id="sobrenome" value="<?php echo $dados['sobre'] ?>">
                <label for="sobrenome">Sobrenome</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="email" id="email" value="<?php echo $dados['email'] ?>">
                <label for="email">Email</label>
            </div>
            <div class="input-field col s12">
                <input type="text" name="idade" id="idade" value="<?php echo $dados['idade'] ?>">
                <label for="idade">Idade</label>
            </div>
            <button type="submit" class="btn" name="btn-editar">Alterar</button>
            <a href="index.php" class="btn green">Listar Clientes</a>
        </form>
    </div>
</div>


<?php
//Footer
include_once 'INCLUDES/footer.php';
?>