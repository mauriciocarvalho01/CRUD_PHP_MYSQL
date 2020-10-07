<?php

//Conexão com o banco para o READ
include_once 'PHP_ACTION/db_connect.php';

//Header
include_once 'INCLUDES/header.php';

//Message
include_once 'INCLUDES/message.php';

//Nav
include_once 'INCLUDES/menu.php';
?>


<div class="row">
    <div class="col s12 m6 push-m3 z-depth-5">
        <h3 class="light center">Clientes</h3>
            <table  class="striped responsive-table">
                <thread>
                    <tr>
                        <th>ID Cliente:</th>
                        <th>Nome:</th>
                        <th>Sobrenome:</th>
                        <th>Email:</th>
                        <th>Idade:</th>
                    </tr>
                </thread>
                <tbody>

                    <?php
                    $sql = "SELECT * FROM clintes";
                    $resultado = mysqli_query($connect, $sql);

                    if(mysqli_num_rows($resultado) > 0):

                    while($dados = mysqli_fetch_array($resultado)):
                    ?>
                    <tr>
                        <td><?php echo $dados['id'];?></td>
                        <td><?php echo $dados['nome'];?></td>
                        <td><?php echo $dados['sobre'];?></td>
                        <td><?php echo $dados['email'];?></td>
                        <td><?php echo $dados['idade'];?></td>
                        <td>
                            <a href="editar.php?id=<?php echo $dados['id'];?>" class="btn-floating orange">
                                <i class="material-icons">edit</i>
                            </a>
                        </td>
                        <td><a href="#modal<?php echo $dados['id'];?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</i></a></td>

                         <!-- Modal Structure -->
                        <div id="modal<?php echo $dados['id'];?>" class="modal">
                            <div class="modal-content">
                            <h4>Opa!!</h4>
                            <p>Tem certeza que deseja excluir o cliente <?php echo $dados['nome'];?>?</p>
                            </div>
                            <div class="modal-footer">
                            <form action="PHP_ACTION/delete.php" method="POST">
                                <input type="hidden" name="id" value="<?php echo $dados['id'];?>">
                                <button type="submit" name="btn-deletar" class="btn red">Excluir<button>
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Cancelar</a>
                            </form>
                            </div>
                        </div>
                    </tr>

                    <?php endwhile;
                    else:?>
                    <tr>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                        <td>-</td>
                    </tr>
                    <?php
                    endif;
                    ?>
                    <tr class="centered">
                        <td> <a href="adiconar.php" class="btn">Adicionar Cliente</a></td>
                    </tr>
                    <?php 

                        if(mysqli_num_rows($resultado) > 10):
                    ?>
                    <tr>
                        <td>
                            <ul class="pagination">
                                <li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
                                <li class="active"><a href="#!">1</a></li>
                                <li class="waves-effect"><a href="#!">2</a></li>
                                <li class="waves-effect"><a href="#!">3</a></li>
                                <li class="waves-effect"><a href="#!">4</a></li>
                                <li class="waves-effect"><a href="#!">5</a></li>
                                <li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
                            </ul>
                        </td>
                    </tr>
                <?php
                endif;
                ?>
                </tbody>
            </table>
    </div>
</div>
<?php
//Footer
include_once 'INCLUDES/footer.php';
?>