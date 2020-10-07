<?php

//Sessão 
session_start();
if(isset($_SESSION['mensagem'])):
?>

<script>
    window.onload = ()=> M.toast({html: '<?php echo $_SESSION['mensagem']; ?>'})
</script>

<?php
endif;

//Limprar a sessão
session_unset();